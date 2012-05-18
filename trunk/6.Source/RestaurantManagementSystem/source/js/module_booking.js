/**
 * all method support for booking management fucntions
 * @author vantuanlee@gmail.com
 */

function _init_slider(carousel) {
	$('#slider .slider-controls a').bind('click', function() {
		var index = $(this).parent().find('a').index(this) + 1;
		carousel.scroll( index );
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
	if (field.title==field.value || this.value == '') {
		$(field).removeClass('field-focused');
	} else {
		$(field).addClass('field-focused');
	};
};

function addTable()
{
    var elements = "<tr>"
                          + "<td>M� b�n an</td>"
                          + "<td><input type='text'></input></td><br/>"
                          + "</tr>"
                          + "<tr>"
                          + " <td>T?</td>"
                          + "<td><input type='text' class='fromDtPker'></input></td>"
                          + "<td>�?n</td>"
                          + "<td><input type='text' class='toDtPker'></input></td>"
                          + "</tr>";
                      
	 
    $('#bookingDetailInfoTable').append(elements);
	// bookingDetailInfo
    $('.fromDtPker').datetimepicker();
    $('.toDtPker').datetimepicker();
}

$(document).ready(function() {
	$("#slider-holder").jcarousel({
		scroll: 1,
		auto: 5,
		wrap: 'both',
		initCallback: _init_slider,
		itemFirstInCallback: _set_slide,
		buttonNextHTML: null,
		buttonPrevHTML: null
	});
	
	$('.field').each(function() {
		check_fields(this);
	});
	
	$('.field').focus(function() {
        if(this.title==this.value) {
            this.value = '';
            check_fields(this);
        }
    }).blur(function(){
        if(this.value=='') {
            this.value = this.title;
            check_fields(this);
        }
    });
    
    // bookingDetailInfo
    $('.fromDtPker').datetimepicker();
    $('.toDtPker').datetimepicker();
    $('.tableInfoDialog').dialog({autoOpen: false,
			height: 450,
			width: 780,
			modal: true});
    
    //END bookingDetailInfo

    $('#button-show').click(function(){
       $('#menuDiv').toggle("drop",{width: 30, height: 60}, 500);
    });    
    
    $('#searchTableBut').click(function() {
        $('.tableInfoDialog').dialog("open");
    });
    
    //Food table link (href)
    $('#regionInfoDialog').dialog({autoOpen: false,
			height: 300,
			width: 450,
			modal: true});
                    
    $('#bookingDetailDialog').dialog({autoOpen: false,
			height: 300,
			width: 650,
			modal: true});
});

/*
* functions control food table link 
*/
function regionInfoLinkClicked()
{
     $('#regionInfoDialog').dialog("open");
}

function bookingDetailLinkClicked()
{
    $('#bookingDetailDialog').dialog("open");
}

/*
* END functions control food table link
*/


/**
 * general method for booking management
 */
function bookingManagement() {
	window.location  = "../gui/booking.php";
}

/**
 * save booking detail info to db
 * 
 * @param null
 * @returns alert message and clear form
 * @author hathao298@gmail.com
 */
function saveBookingDetail() {
	// get customer info
	var cusName = document.getElementById("customerNameTxtBox").value;
	var cusIdNumber = document.getElementById("customerIdNumberTxtBox").value;
	var cusPhoneNumber = document.getElementById("customerPhoneNumberTxtBox").value;

	// validate customer info
	if (!customerInfoValtion(cusIdNumber, cusPhoneNumber)) {
		alert("Thông tin khách hàng không hợp lệ");
		return;
	}

	var tableId = $(".tableId").get();
	var fromDtPker = $(".fromDtPker").get();
	var toDtPker = $(".toDtPker").get();

	var tableIdStr = "";
	var fromDateStr = "";
	var toDateStr = "";

	for ( var i = 0; i < fromDtPker.length; i++) {
		if (!dateValidation(fromDtPker[i].value, toDtPker[i].value)) {
			alert("Thông tin ngày ở bàn thứ" + (i + 1).toString()
					+ " không hợp lệ");
			return;
		} else {
			tableIdStr = tableIdStr + "&tableId=" + tableId[i].value;
			fromDateStr = fromDateStr + "&fromDate=" + fromDtPker[i].value;
			toDateStr = toDateStr + "&toDate=" + toDtPker[i].value;
		}
	}
	
}

/**
 * general method for booking
 * @author vantuanlee@gmail.com
 */
function booking(){
	window.location  = "../gui/booking.php";
}

/**
 * general method for table management
 * @author vantuanlee@gmail.com
 */
function showTableList(){
	window.location  = "../gui/tableManagement.php";	
}


/**
 * search table with condition 
 * @author vantuanlee@gmail.com
 */
function searchTable(){	
	
}

/**
 * validate customer's info: idenitity number, phone number
 * 
 * @param idnumber string
 * @param phonenumber-string
 * @returns boolean
 * @author hathao298@gmail.com
 */
function customerInfoValtion(idNumber, phoneNumber) {

}

/**
 * validate date 
 * @param fromDate date
 * @param toDate date
 * @returns boolean
 * @author hathao298@gmail.com
 */
function dateValidation(fromDate, toDate) {

}
