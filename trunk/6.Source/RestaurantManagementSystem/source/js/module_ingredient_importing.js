/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
	$('.dtpker').datetimepicker();
	$('#button-show').click(function() {
		$('#menuDiv').toggle("drop", {
			width : 30,
			height : 60
		}, 500);
	});

	$("#slider-holder").jcarousel({
		scroll : 2,
		wrap : 'both',
		initCallback : _init_slider,
		itemFallbackDimension : _set_slide,
		buttonNextHTML : null,
		buttonPrevHTML : null
	});

});

function _init_slider(carousel) {
	$('.nextBut').bind('click', function() {
		carousel.next();
		return false;
	});

	$('#addIngredientAmountBut').bind('click', function() {
		if(!getIngredientChecked())
			{
				alert("Bạn chưa chọn nguyên liệu");
				return;
			}
		carousel.next();
		return false;
	});

	$('#confirmIngredient').bind('click', function() {
		inputIngredientInfo();
		carousel.next();
		return false;
	});	
	
	$('.backBut').bind('click', function() {
		carousel.prev();
		return false;
	});
};

function _set_slide(carousel, item, idx, state) {
	var index = idx - 1;

	$('#slider .slider-controls a').removeClass('active');
	$('#slider .slider-controls a').eq(index).addClass('active');
};

function checkAllCBoxClicked() {
	var checkAll = document.getElementById("checkAllCBox");
	if (checkAll.checked) {
		var cbox = $('.ingredient-detail table tr td input').get();
		for ( var i = 0; i < cbox.length; i++)
			cbox[i].checked = true;
	} else {
		var cbox = $('.ingredient-detail table tr td input').get();
		for ( var i = 0; i < cbox.length; i++)
			cbox[i].checked = false;
	}
}

/**
 * when supplier select is changing, we need to load new contract select
 * options.
 * 
 * @param selectObj
 */
function supplierSelectOnChange(selectObj) {
	var str = selectObj.options[selectObj.selectedIndex].value;

	var http = createXMLHttpRequest();
	var nocache = Math.random();
	var serverURL = "../controller/ModuleIngredientImportingController.php?action=searchContract&ncc="
			+ str + "&nocache=" + nocache;
	http.open("POST", serverURL, true);
	http.onreadystatechange = function() {
		if (http.readyState == 4 && http.status == 200) {
			var respone = http.responseText;
			document.getElementById("contractIDSelect").innerHTML = respone;
		}
	};
	http.send();
}

/**
 * @param selectObj
 */
function contractIDSelectOnchange(selectObj) {
	var contract = selectObj.options[selectObj.selectedIndex].value;

	var http = createXMLHttpRequest();
	var nocache = Math.random();
	var serverURL = "../controller/ModuleIngredientImportingController.php?action=searchContractDetail&contract="
			+ contract + "&nocache=" + nocache;
	http.open("POST", serverURL, true);
	http.onreadystatechange = function() {
		if (http.readyState == 4 && http.status == 200) {
			var respone = http.responseText;
			document.getElementById("ingredient-detail").innerHTML = respone;
		}
	};
	http.send();
}

/**
 * get ingredient checked.
 */
function getIngredientChecked() {
	var cbox = $('.ingredient-detail table tr td input').get();
	var materialList = "";
	for ( var i = 0; i < cbox.length; i++){
		if(cbox[i].checked == true){
			materialList += "&MaCTHDs[]=" + cbox[i].value;
//			materialList.push(cbox[i].value);
		}			
	}
	
	if(materialList == ""){		
		return false;
	}
	
	var http = createXMLHttpRequest();
	var nocache = Math.random();
	var serverURL = "../controller/ModuleIngredientImportingController.php?action=selectIngredient" +
				materialList + "&nocache=" + nocache;
	http.open("POST", serverURL, true);
	http.onreadystatechange = function() {
		if (http.readyState == 4 && http.status == 200) {
			var respone = http.responseText;
			document.getElementById("ingredient-selected").innerHTML = respone;
		}
	};
	http.send();
	return true;
}

/**
 * input info : unit price and amout foreach ingredient
 */
function inputIngredientInfo(){
	var tbox = $('#ingredient-selected table tr td input').get();
	var amount = "";
	var unitPrice = "";
	var MaCTHDs = "";
	for ( var i = 0; i < tbox.length; i++){
		if (i / 2 == 0) {
			unitPrice += "&unitPrice[]=" + tbox[i].value;
			MaCTHDs += "&MaCTHDs[]=" + tbox[i].id;
		} else {
			amount += "&amount[]=" + tbox[i].value;
		}
	}
	
	var http = createXMLHttpRequest();
	var nocache = Math.random();
	var serverURL = "../controller/ModuleIngredientImportingController.php?action=inputIngredientInfo" +
			MaCTHDs + unitPrice + amount + "&nocache=" + nocache;
	http.open("POST", serverURL, true);
	http.onreadystatechange = function() {
		if (http.readyState == 4 && http.status == 200) {
			var respone = http.responseText;
			document.getElementById("ingredient-importing-confirmation").innerHTML = respone;
		}
	};
	http.send();
}

function saveImporting(){
	var td = $('.cell_import').get();
	
	var MaCTHDs = "";
	var unitPrice = "";
	var amount = "";
	for ( var i = 0; i < td.length; i++){
		if (i % 3 == 0) {
			MaCTHDs += "&MaCTHDs[]=" + td[i].attributes.value.value;
		} else if((i % 3 == 1)) {
			unitPrice += "&unitPrice[]=" + td[i].innerHTML;
		} else {
			amount += "&amount[]=" + td[i].innerHTML;
		}
	}
	
	var http = createXMLHttpRequest();
	var nocache = Math.random();
	var serverURL = "../controller/ModuleIngredientImportingController.php?action=saveImporting" +
				MaCTHDs + unitPrice + amount + "&nocache=" + nocache;
	http.open("POST", serverURL, true);
	http.onreadystatechange = function() {
		if (http.readyState == 4 && http.status == 200) {
			var respone = http.responseText;
			document.getElementById("ingredient-importing-result").innerHTML = respone;
		}
	};
	http.send();
}