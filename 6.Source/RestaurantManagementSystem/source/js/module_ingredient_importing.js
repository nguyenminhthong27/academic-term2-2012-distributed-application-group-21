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
	})

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
 * when supplier select is changing, we need to load new contract select options.
 * @param selectObj
 */
function supplierSelectOnChange(selectObj) {
	var str = selectObj.options[selectObj.selectedIndex].value;
	
	var http = createXMLHttpRequest();
	var nocache = Math.random();
	var serverURL = "../controller/ModuleIngredientImportingController.php?action=searchContract&ncc=" + str + "&nocache=" + nocache;
	http.open("POST", serverURL, true);
	http.onreadystatechange = function(){
			if(http.readyState==4 && http.status==200){
				var respone = http.responseText;
				document.getElementById("contractIDSelect").innerHTML = respone;
			}
		};
	http.send();
}

function contractIDSelectOnchange(selectObj){
	var contract = selectObj.options[selectObj.selectedIndex].value;
	
	var http = createXMLHttpRequest();
	var nocache = Math.random();
	var serverURL = "../controller/ModuleIngredientImportingController.php?action=searchContractDetail&contract=" + contract + "&nocache=" + nocache;
	http.open("POST", serverURL, true);
	http.onreadystatechange = function(){
			if(http.readyState==4 && http.status==200){
				var respone = http.responseText;
				document.getElementById("ingredient-detail").innerHTML = respone;
			}
		};
	http.send();
}