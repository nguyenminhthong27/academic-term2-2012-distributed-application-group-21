/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

var ingredientGrid;

$(document).ready(function() {
	$('#addIngredientDialog').dialog({
		autoOpen : false,
		height : 300,
		width : 600,
		modal : true,
		resizable : false
	});

	$('#editIngredientDialog').dialog({
		autoOpen : false,
		height : 350,
		width : 600,
		modal : true,
		resizable : false
	});

	$('.delete-confirmation-box-dialog').dialog({
		autoOpen : false,
		height : 120,
		width : 300,
		modal : true,
		resizable : false
	});

	$('#button-show').click(function() {
		$('#menuDiv').toggle("drop", {
			width : 30,
			height : 60
		}, 500);
	});

	initIngredientGrid();

	setFontColorForIngredientAmountUnderMin();
});

/**
 * open add ingredient dialog when click add ingredient
 * 
 * @param null
 * @returns null
 * @author hathao298@gmail.com
 */
function openAddIngredientDialog() {
	// get all ingredient type to attach to select box
	var http = createXMLHttpRequest();
	var nocache = Math.random();
	var serverURL = "../controller/ModuleIngredientManagementController.php?action=getAllIngredientType&nocache="
			+ nocache;
	http.open("POST", serverURL, true);
	http.onreadystatechange = function() {
		if (http.readyState == 4 && http.status == 200) {
			var response = http.responseText;
			var sbox = document.getElementById("typeSBox_addIngredient");
			sbox.innerHTML = response;
			$('#addIngredientDialog').dialog("open");
		}
	};
	http.send();

}

/**
 * open delete confirmation when click delete ingredient
 * 
 * @param null
 * @returns null
 * @author hathao298@gmail.com
 */
function deleteConfirm() {
	var rowIds = ingredientGrid.getCheckedRows(0);
	if (rowIds == "") {
		alert("Bạn chưa chọn nguyên liệu");
		return;
	}
	$('.delete-confirmation-box-dialog').dialog("open");
}

/**
 * close delete confirmation when click cancel
 * 
 * @param null
 * @returns null
 * @author hathao298@gmail.com
 */
function cancelDeleteIngredient() {
	$('.delete-confirmation-box-dialog').dialog("close");
}

/**
 * open edit ingredient dialog when click edit ingredient
 * 
 * @param null
 * @returns null
 * @author hathao298@gmail.com
 */
function openEditIngredientDialog() {
	var rowId = ingredientGrid.getSelectedId();
	if (rowId == null) {
		alert("Bạn chưa chọn dòng cần thay đổi");
		return;
	}

	// get data from server (in JSON format)
	var http = createXMLHttpRequest();
	var nocache = Math.random();
	var serverURL = "../controller/ModuleIngredientManagementController.php?action=loadEdit&nocache="
			+ nocache;
	http.open("POST", serverURL, true);
	http.onreadystatechange = function() {
		if (http.readyState == 4 && http.status == 200) {
			var response = http.responseText;
			var editDialog = $("#editIngredientDialog .edit-ingredient-info")
					.get();
			if (response == null) {
				alert("Không thể nhận thông tin từ cơ sở dữ liệu");
				return;
			}
			editDialog.innerHTML = response;
			$('#editIngredientDialog').dialog("open");
		}
	};
	http.send();

}

/**
 * init ingredient grid on page load
 * 
 * @param null
 * @returns null
 * @author hathao298@gmail.com
 */
function initIngredientGrid() {
	// init Grid for ingredient
	ingredientGrid = new dhtmlXGridObject("ingredientInfoDiv");
	ingredientGrid.setImagePath("dhtmlx/imgs/");// path to images required by
	// grid7\4
	ingredientGrid
			.setHeader("#master_checkbox,MÃ NGUYÊN LIỆU,TÊN NGUYÊN LIỆU,LOẠI NGUYÊN LIỆU,SỐ LƯỢNG,SỐ LƯỢNG TỐI THIỂU,SỐ LƯỢNG TỐI ĐA");// set
	// column
	// names
	ingredientGrid
			.attachHeader(",#text_filter,#select_filter,#select_filter,#numeric_filter,#numeric_filter,#numeric_filter");
	ingredientGrid.setInitWidths("40,80,180,150,100,100,100");// set column
	// width in px
	ingredientGrid.setColAlign("left,center,left,left,center,center,center");// set
	// column
	// values
	// align
	ingredientGrid.setColTypes("ch,ro,ro,ro,ro,ro,ro");// set column types
	ingredientGrid.setColSorting(",str,str,str,int,int,int");// set sorting
	ingredientGrid.enableAutoWidth();

	ingredientGrid.init();// initialize grid
	ingredientGrid.setSkin("dhx_skyblue");// set grid skin
	setAllValueForSelectFilter();

	// get data from server (in JSON format)
	var http = createXMLHttpRequest();
	var nocache = Math.random();
	var serverURL = "../controller/ModuleIngredientManagementController.php?action=getAllIngredient&nocache="
			+ nocache;
	http.open("POST", serverURL, true);
	http.onreadystatechange = function() {
		if (http.readyState == 4 && http.status == 200) {
			var response = http.responseText;
			var jsData = eval('(' + response + ')');
			ingredientGrid.parse(jsData, "json");
			setFontColorForIngredientAmountUnderMin();
			setAllValueForSelectFilter();
		}
	};
	http.send();
}

/**
 * set red color for font of ingredient amount which is under min amount
 * 
 * @param null
 * @returns null
 * @note call everytime ingredient data changes
 * @author hathao298@gmail.com
 */
function setFontColorForIngredientAmountUnderMin() {
	var amountArr = $('#ingredientInfoDiv .objbox .obj tr td:nth-child(5)')
			.get();
	var minArr = $('#ingredientInfoDiv .objbox .obj tr td:nth-child(6)').get();
	for ( var i = 0; i < amountArr.length; i++) {
		var amount = parseFloat(amountArr[i].innerHTML);
		var min = parseFloat(minArr[i].innerHTML);
		if (amount <= min) {
			amountArr[i].style.color = "red";
			amountArr[i].style.fontStyle = "italic";
		}
	}
}

/**
 * set "Tất cả" value for first option of select group
 * 
 * @param null
 * @returns null
 * @note call everytime report data changes
 * @author hathao298@gmail.com
 */
function setAllValueForSelectFilter() {
	var selectArr = $('#ingredientInfoDiv .filter select').get();
	for ( var i = 0; i < selectArr.length; i++) {
		var select = selectArr[i];
		var option = select.options[0];
		option.innerHTML = "Tất cả";
	}
}

/**
 * add ingredient (data get from dialog box)
 * 
 * @param null
 * @returns null
 * @author hathao298@gmail.com
 */
function addIngredientButClicked() {
	var name = document.getElementById("nameInput_addIngredient").value;
	var selIndex = document.getElementById("typeSBox_addIngredient").selectedIndex;
	var minAmount = document.getElementById("minAmountInput_addIngredient").value;
	var maxAmount = document.getElementById("maxAmountInput_addIngredient").value;
	// type id
	var type = document.getElementById("typeSBox_addIngredient").options[selIndex].value;

	// validate input data
	var validationRes = ingredientInfoValidation(name, "1", minAmount, maxAmount);
	switch (validationRes) {
	case 0:
		break;
	case 1:
		alert("Tên nguyên liệu không hợp lệ");
		return;
	case 2:
		alert("Số lượng không hợp lệ");
		return;
	case 3:
		alert("Số lượng tối thiểu không hợp lệ");
		return;
	case 4:
		alert("Số lượng tối đa không hợp lệ");
		return;
	}

	var http = createXMLHttpRequest();
	var nocache = Math.random();
	var serverURL = "../controller/ModuleIngredientManagementController.php?action=insert&nocache="
			+ nocache
			+ "&materialname="
			+ $.trim(name)
			+ "&materialtype="
			+ $.trim(type)
			+ "&minquantity="
			+ $.trim(minAmount)
			+ "&maxquantity=" + $.trim(maxAmount);
	http.open("POST", serverURL, true);
	http.onreadystatechange = function() {
		if (http.readyState == 4 && http.status == 200) {
			var response = http.responseText;
			if (response == true) {
				$('#addIngredientDialog').dialog("close");
				alert("Thêm nguyên liệu mới thành công");
				reloadIngredientGrid();
			} else {
				alert("Thêm nguyên liệu mới không thành công");
				return;
			}
		}
	};
	http.send();
}

/**
 * reload data from database to grid refresh all filter
 * 
 * @param null
 * @returns null
 * @author hathao298@gmail.com
 */
function reloadIngredientGrid() {
	var http = createXMLHttpRequest();
	var nocache = Math.random();
	var serverURL = "../controller/ModuleIngredientManagementController.php?action=getAllIngredient&nocache="
			+ nocache;
	http.open("POST", serverURL, true);
	http.onreadystatechange = function() {
		if (http.readyState == 4 && http.status == 200) {
			var response = http.responseText;
			var jsData = eval('(' + response + ')');
			if (response != null)
				ingredientGrid.clearAll();
			var inputArr = $('#ingredientInfoDiv .xhdr .hdr tr td input').get();
			for(var i=0; i<inputArr.length; i++){
				if(inputArr[i].type == "checkbox"){
					inputArr[i].checked = false;
				}
			}
			ingredientGrid.parse(jsData, "json");
			setFontColorForIngredientAmountUnderMin();
			ingredientGrid.refreshFilters();
			setAllValueForSelectFilter();
		}
	};
	http.send();
}

/**
 * save ingredient after editting
 * 
 * @param null
 * @returns null
 * @author hathao298@gmail.com
 */
function editIngredientButClicked() {
	var id = document.getElementById("ingredientId").value;
	var name = document.getElementById("nameInput_editIngredient").value;
	var selIndex = document.getElementById("typeSBox_editIngredient").selectedIndex;
	var minAmount = document.getElementById("minAmountInput_editIngredient").value;
	var maxAmount = document.getElementById("maxAmountInput_editIngredient").value;
	var amount = document.getElementById("amountInput_editIngredient").value;

	// type id
	var type = document.getElementById("typeSBox_addIngredient").options[selIndex].value;

	// validate input data
	var validationRes = ingredientInfoValidation(name, amount, minAmount, maxAmount);
	switch (validationRes) {
	case 0:
		break;
	case 1:
		alert("Tên nguyên liệu không hợp lệ");
		return;
	case 2:
		alert("Số lượng không hợp lệ");
		return;
	case 3:
		alert("Số lượng tối thiểu không hợp lệ");
		return;
	case 4:
		alert("Số lượng tối đa không hợp lệ");
		return;
	}

	var http = createXMLHttpRequest();
	var nocache = Math.random();
	var serverURL = "../controller/ModuleIngredientManagementController.php?action=update&nocache="
			+ nocache
			+"&id="
			+ id
			+ "&materialname="
			+ $.trim(name)
			+ "&materialtype="
			+ $.trim(type)
			+ "&quantity="
			+ $.trim(amount)
			+ "&minquantity="
			+ $.trim(minAmount) + "&maxquantity=" + $.trim(maxAmount);
	http.open("POST", serverURL, true);
	http.onreadystatechange = function() {
		if (http.readyState == 4 && http.status == 200) {
			var response = http.responseText;
			if (response == true) {
				$('#editIngredientDialog').dialog("close");
				alert("Cập nhật thông tin nguyên liệu thành công");
				reloadIngredientGrid();
			} else {
				alert("Cập nhật thông tin nguyên liệukhông thành công");
				return;
			}
		}
	};
	http.send();
}

/**
 * delete selected ingredients in ingredientGrid (check checkboxes)
 * 
 * @param null
 * @returns null
 * @author hathao298@gmail.com
 */
function deleteIngredientButClicked() {
	var rowIds = ingredientGrid.getCheckedRows(0).split(",");
	var idStr = "";
	for ( var i = 0; i < rowIds.length; i++) {
		idStr = idStr + "&arrid[]=" + rowIds[i];
	}

	var http = createXMLHttpRequest();
	var nocache = Math.random();
	var serverURL = "../controller/ModuleIngredientManagementController.php?action=delete&nocache="
			+ nocache + idStr;
	http.open("POST", serverURL, true);
	http.onreadystatechange = function() {
		if (http.readyState == 4 && http.status == 200) {
			var response = http.responseText;
			$('.delete-confirmation-box-dialog').dialog("close");
			if (response == true) {
				alert("Đã xóa thành công");
			} else
				alert("Thao tác xóa không thành công");
			reloadIngredientGrid();
		}
	};
	http.send();
}

/**
 * check information of ingredient
 * 
 * @param name
 *            string name of ingredient
 * @param minAmount
 *            string min amount of ingredient
 * @param maxAmount
 *            string max amount of ingredient
 * @param amount
 *            string amount of ingredient
 * @returns 0 -successful 1 - false name 2 - false amount 3 - false minamount 4 -
 *          false maxamount
 * @author hathao298@gmail.com
 */
function ingredientInfoValidation(name, amount, minAmount, maxAmount) {
	name = $.trim(name);
	amount = $.trim(amount);
	minAmount = $.trim(minAmount);
	maxAmount = $.trim(maxAmount);
	if (name == null || name == "") {
		return 1;
	}
	if (isNaN(amount))
		return 2;
	if (isNaN(minAmount))
		return 3;
	if (isNaN(maxAmount))
		return 4;
	amount = parseFloat(amount);
	minAmount = parseFloat(minAmount);
	maxAmount = parseFloat(maxAmount);

	if (amount < 0)
		return 2;
	if (minAmount < 0)
		return 3;
	if (maxAmount < 0) {
		return 4;
	}

	return 0;
}