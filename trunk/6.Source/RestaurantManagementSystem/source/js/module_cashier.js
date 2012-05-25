/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function _init_slider(carousel) {
	$('#slider .slider-controls a').bind('click', function() {
		var index = $(this).parent().find('a').index(this) + 1;
		carousel.scroll(index);
		return false;
	});

	$('#cashBut').bind('click', function() {
		carousel.next();
		return false;
	});

	$('#backBut').bind('click', function() {
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

$(document).ready(function() {
	$("#slider-holder").jcarousel({
		scroll : 1,
		wrap : 'both',
		initCallback : _init_slider,
		itemFallbackDimension : _set_slide,
		buttonNextHTML : null,
		buttonPrevHTML : null
	});

	$('.dtpker').datetimepicker();

	$('#slider').dialog({
		autoOpen : false,
		height : 550,
		width : 750,
		modal : true
	});

	$('.bill-detail-info-dialog').dialog({
		autoOpen : false,
		height : 350,
		width : 650,
		modal : true
	});
	$('.delete-confirmation-box-dialog').dialog({
		autoOpen : false,
		height : 120,
		width : 300,
		modal : true,
		resizable : false
	});
	$('.booking-note-detail-dialog').dialog({
		autoOpen : false,
		height : 450,
		width : 630,
		modal : true
	});
	$('#button-show').click(function() {
		$('#menuDiv').toggle("drop", {
			width : 30,
			height : 60
		}, 500);
	});
});

function payForBill(billID) {
	$('#slider').dialog("open");
}

function cancelPayForBillButClicked() {
	$('#slider').dialog("close");
}

function viewBillDetail(billID) {
	var http = createXMLHttpRequest();

	var nocache = Math.random();

	var serverURL = "../controller/ModuleCashierController.php?action=detailBill&billID="
			+ billID + "&nocache=" + nocache;
	http.open("POST", serverURL, true);
	http.onreadystatechange = function() {
		if (http.readyState == 4 && http.status == 200) {
			var respone = http.responseText;
			$('.bill-detail-info-dialog').innerHTML = respone;
			$('.bill-detail-info-dialog').dialog("open");
		}
	}
	http.send();
}

function viewBookingNoteDetail(billID) {
	var http = createXMLHttpRequest();

	var nocache = Math.random();

	var serverURL = "../controller/ModuleCashierController.php?action=detailBooking&bookingID="
			+ billID + "&nocache=" + nocache;
	http.open("POST", serverURL, true);
	http.onreadystatechange = function() {
		if (http.readyState == 4 && http.status == 200) {
			var respone = http.responseText;
			$('.booking-note-detail-dialog').innerHTML = respone;
			$('.booking-note-detail-dialog').dialog("open");
		}
	}
	http.send();
}

function deleteConfirm(billID) {
	$('.delete-confirmation-box-dialog').dialog("open");
}

function cancelDeleteBill() {
	$('.delete-confirmation-box-dialog').dialog("close");
}

function calulateReturnedMoney() {
	var input = document.getElementById("inputMoney");
	var inputMoney = parseInt(input.value);
	var paidMoney = parseInt(document.getElementById("paidMoney").innerHTML);
	var returnedMoney = document.getElementById("returnedMoney");
	returnedMoney.innerHTML = (inputMoney - paidMoney).toString();
}

/**
 * search bill with condition
 * 
 * @author vantuanlee@gmail.com
 */
function searchBill() {
	var time = document.getElementById("search-date-dtpker").value;
	var fromValue = document.getElementById("fromValue").value;
	var toValue = document.getElementById("toValue").value;

	var nocache = Math.random();

	var http = createXMLHttpRequest();
	var serverURL = "../controller/ModuleCashierController.php?action=search&time="
			+ time
			+ "&fromValue="
			+ fromValue
			+ "&toValue="
			+ toValue
			+ "&nocache=" + nocache;

	http.open("POST", serverURL, true);
	http.onreadystatechange = function() {
		if (http.readyState == 4 && http.status == 200) {
			var respone = http.responseText;
			document.getElementById("searchBillResult").innerHTML = respone;
		}
	};
	http.send();

}