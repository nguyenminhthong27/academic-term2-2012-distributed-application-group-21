/**
 * all method support for booking management fucntions
 * 
 * @author vantuanlee@gmail.com
 */

function _init_slider(carousel) {
	$('#slider .slider-controls a').bind('click', function() {
		var index = $(this).parent().find('a').index(this) + 1;
		carousel.scroll(index);
		return false;
	});

	$('#slider .slider-nav .next').bind('click', function() {
		carousel.next();
		return false;
	});

	$('#slider .slider-nav .prev').bind('click', function() {
		carousel.prev();
		return false;
	});
};

function _set_slide(carousel, item, idx, state) {
	var index = idx - 1;

	$('#slider .slider-controls a').removeClass('active');
	$('#slider .slider-controls a').eq(index).addClass('active');
};

function check_fields(field) {
	if (field.title == field.value || this.value == '') {
		$(field).removeClass('field-focused');
	} else {
		$(field).addClass('field-focused');
	}
	;
};

function addTable()
{
    var elements = "<tr>"
                          + "<td>Mã bàn ăn</td>" 
                          + "<td><input type='text' class='tableId'></input></td><br/>"
                          + "</tr>"
                          + "<tr>"
                          + " <td>Từ</td>"
                          + "<td><input type='text' class='fromDtPker'></input></td>"
                          + "<td>Đến</td>"
                          + "<td><input type='text' class='toDtPker'></input></td>"
                          + "</tr>";
                      
	 
    $('#bookingDetailInfoTable').append(elements);
	// bookingDetailInfo
	$('.fromDtPker').datetimepicker();
	$('.toDtPker').datetimepicker();
}

$(document).ready(function() {
	$("#slider-holder").jcarousel({
		scroll : 1,
		auto : 5,
		wrap : 'both',
		initCallback : _init_slider,
		itemFirstInCallback : _set_slide,
		buttonNextHTML : null,
		buttonPrevHTML : null
	});

	$('.field').each(function() {
		check_fields(this);
	});

	$('.field').focus(function() {
		if (this.title == this.value) {
			this.value = '';
			check_fields(this);
		}
	}).blur(function() {
		if (this.value == '') {
			this.value = this.title;
			check_fields(this);
		}
	});

	// bookingDetailInfo
	$('.fromDtPker').datetimepicker();
	$('.toDtPker').datetimepicker();
	$('.tableInfoDialog').dialog({
		autoOpen : false,
		height : 450,
		width : 780,
		modal : true
	});

	// END bookingDetailInfo

	$('#button-show').click(function() {
		$('#menuDiv').toggle("drop", {
			width : 30,
			height : 60
		}, 500);
	});

	$('#searchTableBut').click(function() {
		$('.tableInfoDialog').dialog("open");
	});

	// Food table link (href)
	$('#regionInfoDialog').dialog({
		autoOpen : false,
		height : 300,
		width : 450,
		modal : true
	});

	$('#bookingDetailDialog').dialog({
		autoOpen : false,
		height : 300,
		width : 650,
		modal : true
	});
});

/*
 * functions control food table link
 */
function regionInfoLinkClicked() {
	$('#regionInfoDialog').dialog("open");
}

function bookingDetailLinkClicked() {
	$('#bookingDetailDialog').dialog("open");
}

/*
 * END functions control food table link
 */



/**
 * save booking detail info to db
 * 
 * @param null
 * @returns alert message and clear form
 * @author hathao298@gmail.com
 */
function saveBookingDetail() {
	// get customer info
	var cusName = $.trim(document.getElementById("customerNameTxtBox").value);
	var cusIdNumber = $.trim(document.getElementById("customerIdNumberTxtBox").value);
	var cusPhoneNumber = $.trim(document.getElementById("customerPhoneNumberTxtBox").value);

	// validate customer info
	if (!customerInfoValidation(cusIdNumber, cusPhoneNumber) || cusName == "") {
		alert("Thông tin khách hàng không hợp lệ");
		return;
	}

	// get table booking info
	var tableId = $("#bookingDetailInfoTable .tableId").get();
	var fromDtPker = $("#bookingDetailInfoTable .fromDtPker").get();
	var toDtPker = $("#bookingDetailInfoTable .toDtPker").get();

	var tableIdStr = "";
	var fromDateStr = "";
	var toDateStr = "";

	// validate booking info
	for ( var i = 0; i < fromDtPker.length; i++) {
		var from = $.trim(fromDtPker[i].value);
		var to = $.trim(toDtPker[i].value);
		var table_id = $.trim(tableId[i].value);

		if (table_id == "") {
			alert("Thông tin mã bàn ăn ở bàn thứ " + (i + 1).toString()
					+ " không hợp lệ");
			return false;
		}

		if (!dateValidation(from, to)) {
			alert("Thông tin ngày ở bàn thứ " + (i + 1).toString()
					+ " không hợp lệ");
			return;
		} else {
			tableIdStr = tableIdStr + "&tableId[]=" + table_id;
			fromDateStr = fromDateStr + "&fromDate[]=" + from;
			toDateStr = toDateStr + "&toDate[]=" + to;
		}
	}

	// send request
	var http = createXMLHttpRequest();
	var serverURL = "../controller/ModuleBookingController.php?action=save"
			+ "&cusName=" + cusName + "&cusIdNumber=" + cusIdNumber
			+ "&cusPhoneNumber=" + cusPhoneNumber + tableIdStr + fromDateStr
			+ toDateStr;

	http.open("POST", serverURL, true);
	http.onreadystatechange = function() {
		if (http.readyState == 4 && http.status == 200) {
			var response = http.responseText;
			if (response == true) {
				// if booking is successful
				alert("Đặt chỗ thành công");
				window.location = "../gui/booking.php";
			} else {
				if (response == "\r\n\r\ninvalid") {
					alert("Mã bàn ăn nhập sai. Đặt chỗ không thành công");
					return;
				}
				// if booking is not success
				alert("Đặt chỗ không thành công");
			}
		}
	};
	http.send();

}

/**
 * search table with condition
 * 
 * @author vantuanlee@gmail.com
 */
function searchTable(){	
	var selectRestaurantObj = document.getElementById("selectRestaurant");
	var restaurant = selectRestaurantObj.options[selectRestaurantObj.selectedIndex].value;
	
	var selectAreaObj = document.getElementById("selectArea");
	var area = selectAreaObj.options[selectAreaObj.selectedIndex].value;
	
	var selectStatusObj = document.getElementById("selectStatus");
	var status = selectStatusObj.options[selectStatusObj.selectedIndex].value;
	
	var from = document.getElementById("seachFromDtPker").value;
	var to = document.getElementById("seachToDtPker").value;

	var nocache = Math.random();
	
	var http = createXMLHttpRequest();
	var serverURL = "../controller/ModuleBookingController.php?action=searchAvailTable&res=" + restaurant + 
	"&area=" + area + "&status=" + status + "&from=" + from + "&to=" + to + "&nocache=" + nocache;
	http.open("POST", serverURL, true);
	http.onreadystatechange = function()
		{
			if(http.readyState==4 && http.status==200){
				var respone = http.responseText;
				document.getElementById("searchTableResult").innerHTML = respone;
			}
		};
	http.send();
}
	

/**
 * validate customer's info: idenitity number, phone number
 * 
 * @param idnumber string
 * @param phonenumber-string
 * @returns boolean
 * @author hathao298@gmail.com
 */

function customerInfoValidation(idNumber, phoneNumber) {
	for ( var i = 0; i < idNumber.length; i++) {
		if (!(idNumber[i] >= '0' && idNumber[i] <= '9'))
			return false;
	}

	for ( var i = 0; i < phoneNumber.length; i++) {
		if (!(phoneNumber[i] >= '0' && phoneNumber[i] <= '9'))
			return false;
	}

	return true;
}

/**
 * validate date
 * 
 * @param fromDate
 *            date
 * @param toDate
 *            date
 * @returns boolean
 * @author hathao298@gmail.com
 */
function dateValidation(fromDate, toDate) {
	if (fromDate == "" || toDate == "")
		return false;	
	var regExp = /^(0[1-9]|1[0-2])\/(0[1-9]|[12][0-9]|3[01])\/([0-9][0-9][0-9][0-9]) ([0-1][0-9]|2[0-3]):([0-5][0-9])$/;
	var matchArray1 = fromDate.match(regExp);
	var matchArray2 = toDate.match(regExp);
	if (matchArray1 == null || matchArray2 == null)
		return false;
	else
		return true;
}
