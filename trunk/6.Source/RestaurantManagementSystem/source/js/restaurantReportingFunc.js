/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

var reportGrid;
var chartView;
var gridData = {
	rows : [ {
		id : 1001,
		data : [ '', '1001', 'Thịt gà', 'Thịt', '150', '120', '150' ]
	},

	{
		id : 1002,
		data : [ '', '1002', 'Rau xà lách', 'Rau', '11.9', '15', '152' ]
	},

	{
		id : 1003,
		data : [ '', '1003', 'Bông cải xanh', 'Rau', '30', '35', '158' ]
	} ]
};

var chartData = [ {
	sales : 2.9,
	time : "2000"
}, {
	sales : 3.5,
	time : "2001"
}, {
	sales : 3.5,
	time : "2002"
} ];

var url;

/* grid property for initialization */
/* END grid property for initialization */

/* chart property for initialization */
var chartStyle = "pie3D";
var chartValue = "#sales#";
var chartLabel = "#time#";

// bar chart
var xTitle = "Thời gian";
var yTitle = "Doanh thu";
var xTemplate = "#time#";
var yTemplate = "#time#";
/* END chart property for initialization */

$(document).ready(function() {
	$('.dtpker').datetimepicker();

	$('#button-show').click(function() {
		$('#menuDiv').toggle("drop", {
			width : 30,
			height : 60
		}, 500);
	});
	chartView = new dhtmlXChart({
		view : "bar",
		container : "chartDiv",
		value : "#sales#",
		label : "#year#"
	});
	reportGrid = new dhtmlXGridObject("reportDiv");

	initReportGrid();
	setAllValueForSelectFilter();

});

function initReportGrid() {
	reportGrid = new dhtmlXGridObject("reportDiv");
	reportGrid.setImagePath("dhtmlx/imgs/");// path to images required by
											// grid7\4
	reportGrid.setHeader(",MÃ MÓN ĂN, TỔNG DOANH THU (VND)");// set column
																// names
	reportGrid.attachHeader(",#select_filter");
	reportGrid.setInitWidths("80,300,300");// set column width in px
	reportGrid.setColAlign("left,left,left");// set column values align
	reportGrid.setColTypes("ro,ro,ro");// set column types
	reportGrid.setColSorting(",str,int");// set sorting
	reportGrid.enableAutoWidth();

	reportGrid.init();// initialize grid
	reportGrid.setSkin("dhx_skyblue");// set grid skin

	// input data must be like below format
	var str = "{rows:[{ id:1001, data:['','1001','Thịt gà','Thịt','150','120','150']}, \n\
{ id:1002, data:['','1002','Rau xà lách','Rau','11.9','15','152']},\n\
{ id:1003, data:['','1003','Bông cải xanh','Rau','30','35','158']}\n\
        ]}";
	var js = eval('(' + str + ')');
	reportGrid.parse(js, "json");
}

/*
 * export report data to excel file @param null @return null @author:
 * hathao298@gmail.com
 */
function exportGridToExcel() {
	reportGrid.toExcel('dhtmlx/ext/grid-excel-php/generate.php');
}

/*
 * set "Tất cả" value for first option of select group @param null @return null
 * @note call everytime report data changes @author hathao298@gmail.com
 */
function setAllValueForSelectFilter() {
	var selectArr = $('#reportDiv .filter select').get();
	for ( var i = 0; i < selectArr.length; i++) {
		var select = selectArr[i];
		var option = select.options[0];
		option.innerHTML = "Tất cả";
	}
}

/*
 * set red color for font of ingredient amount which is under min amount @param
 * null @return null @note call everytime ingredient data changes @author
 * hathao298@gmail.com
 */
function setFontColorForIngredientAmountUnderMin() {
	var amountArr = $('#reportDiv .objbox .obj tr td:nth-child(5)').get();
	var minArr = $('#reportDiv .objbox .obj tr td:nth-child(6)').get();
	for ( var i = 0; i < amountArr.length; i++) {
		var amount = parseFloat(amountArr[i].innerHTML);
		var min = parseFloat(minArr[i].innerHTML);
		if (amount <= min) {
			amountArr[i].style.color = "red";
			amountArr[i].style.fontStyle = "italic";
		}
	}
}

/*
 * init (generate) chart from data @param data in JSON format @return null
 * @author hathao298@gmail.com
 */
function initChartView() {
	var data = [ {
		sales : 2.9,
		year : "2000"
	}, {
		sales : 3.5,
		year : "2001"
	} ];
	chartView = new dhtmlXChart({
		view : "bar",
		container : "chartDiv",
		value : "#sales#",
		label : "#year#"
	});
	chartView.parse(data, "json");
}

/*
 * change chart style (pie, bar, pie3d, line) @param null @return null @author
 * hathao298@gmail.com
 */
function changeChartStyle() {
	switch (chartStyle) {
	case "bar":
		chartStyle = "pie";
		break;
	case "pie":
		chartStyle = "pie3D";
		break;
	case "pie3D":
		chartStyle = "line";
		break;
	case "line":
		chartStyle = "bar";
		break;
	}
	makeChart(chartStyle);
}

/*
 * show date time criteria when click radio button @param radio button @return
 * null @author hathao298@gmail.com
 */
function showDateTimeCriteria(radio) {
	var radioArr = $('#reportingCriteriaDiv table tr td input').get();
	for ( var i = 0; i < radioArr.length; i++) {
		if (radioArr[i].type == "radio") {
			radioArr[i].checked = false;
		}
	}
	radio.checked = true;

	var index = radio.value;
	var tdArr = $('#reportingCriteriaDiv .dateInput td').get();
	for ( var i = 0; i < tdArr.length; i++) {
		tdArr[i].style.display = "none";
	}

	var tdShowArr = $(
			'#reportingCriteriaDiv .dateInput:nth-child(' + index + ') td')
			.get();
	for ( var i = 0; i < tdShowArr.length; i++) {
		tdShowArr[i].style.display = "table-cell";
	}
}

/*
 * make report when report button clicked load data for grid and refresh chart
 * @param null @return null @author hathao298@gmail.com
 */
function makeReport() {
	var criteria = document.getElementById("criteriaSBox");
	var dateRange = document.getElementById("dateRangeSBox").selectedIndex;
	var date = document.getElementById("dateRangeDtPker").value;
	if (dateRange != 0 && date == "") {
		alert("Bạn chưa nhập thời gian lập báo cáo");
		return;
	}
	var url = "";
	
	// remember to set url for each case
	switch (criteria.selectedIndex) {
	case 0:
		setParamForFoodReport(dateRange, date);
		url = "&type=food&range=" + dateRange + "&date=" + date;
		break;
	case 1:
		setParamForIncomeReport(criteria.selectedIndex - 1, dateRange, date);
		url = "&type=day&range=" + dateRange + "&date=" + date;
		break;
	case 2:
		if (dateRange == 1) {
			alert("Tiêu chí và thời gian thống kê không phù hợp");
			return;
		}
		setParamForIncomeReport(criteria.selectedIndex - 1, dateRange, date);
		url = "&type=month&range=" + dateRange + "&date=" + date;
		break;
	case 3:
		if (dateRange == 1 || dateRange == 2) {
			alert("Tiêu chí và thời gian thống kê không phù hợp");
			return;
		}
		setParamForIncomeReport(criteria.selectedIndex - 1, dateRange, date);
		url = "&type=year&range=" + dateRange + "&date=" + date;
		break;
	}
	setAllValueForSelectFilter();
	
	var http = createXMLHttpRequest();

	var nocache = Math.random();

	var serverURL = "../controller/ModuleRestaurantReportingController.php?action=report"
			+ url + "&nocache=" + nocache;
	http.open("POST", serverURL, true);
	http.onreadystatechange = function() {
		if (http.readyState == 4 && http.status == 200) {
			var response = http.responseText;		
			gridData = eval(response);
			refreshReportGrid();
			var chart = document.getElementById("chartDiv");
			chart.style.display = "block";
			makeChart(chartStyle);
		}
	}
	http.send();

	

}

/*
 * set parameter for foodreport @param dateRange make report on days, months or
 * years, or all date date of report @return null author hathao298@gmail.com
 */
function setParamForFoodReport(dateRange, date) {
	setHeader(1, "TÊN MÓN ĂN");
	// parse date
	switch (dateRange) {
	}
}

/*
 * set parameter for food table report @param dateRange make report on days (1),
 * months(2) or years (3), or all(0) @param date date of report @return null
 * @author hathao298@gmail.com
 */
function setParamForFoodTableReport(dateRange, date) {
	setHeader(1, "TÊN KHU VỰC BÀN");
}

/*
 * make report grid when user click make report @param null use global variable
 * @return null @author hathao298@gmail.com
 */
function refreshReportGrid() {
	reportGrid.clearAll();
	reportGrid.parse(gridData, "json");
	reportGrid.refreshFilters();
	setAllValueForSelectFilter();
}

/*
 * make chart from style(input) and data @param style string style of chart
 * ex:pie, line, spline @return null @author hathao298@gmail.com
 */
function makeChart(style) {
	chartView.destructor();
	switch (style) {
	case "bar":
		var index = 1;
		chartView = new dhtmlXChart({
			view : style,
			container : "chartDiv",
			value : chartValue,
			title : xTemplate,
			tooltip : xTemplate,
			label : chartValue,
			xAxis : {
				title : xTitle,
				template : xTemplate,
				lines : true
			},
			yAxis : {
				title : yTitle
			},
			color : function(obj) {
				index++;
				if (index % 3 == 0)
					return "#ff9900";
				else if (index % 3 == 1)
					return "#52B7F2";
				else
					return "#66cc00";
			}
		});
		break;
	case "line":
		chartView = new dhtmlXChart({
			view : style,
			container : "chartDiv",
			value : chartValue,
			label : chartValue,
			xAxis : {
				title : xTitle,
				template : xTemplate
			},
			yAxis : {
				title : yTitle
			},
			item : {
				borderColor : "#ffffff",
				color : "#52B7F2"
			},
			line : {
				color : "#ff9900",
				width : 3
			}
		});
		break;
	case "pie3D":
		var index = 1;
		chartView = new dhtmlXChart({
			view : style,
			container : "chartDiv",
			value : chartValue,
			label : chartLabel,
			cant : 0.6,
			height : 30,
			pieInnerText : "<b>" + chartValue + "%" + "</b>",
			color : function(obj) {
				index++;
				if (index % 3 == 0)
					return "#ff9900";
				else if (index % 3 == 1)
					return "#52B7F2";
				else
					return "#66cc00";
			}
		});
		break;
	case "pie":
		var index = 1;
		chartView = new dhtmlXChart({
			view : style,
			container : "chartDiv",
			value : chartValue,
			label : chartLabel,
			pieInnerText : "<b>" + chartValue + "%" + "</b>",
			color : function(obj) {
				index++;
				if (index % 3 == 0)
					return "#ff9900";
				else if (index % 3 == 1)
					return "#52B7F2";
				else
					return "#66cc00";
			}
		});
		break;
	}
	chartView.parse(chartData, "json");
}

/*
 * set parameter for income report @param incomeType int day-0, month -1, year
 * -2 @param dateRange int all - 0, day -1, month -2, year -3 @param date date
 * of report @return null @author hathao298@gmail.com
 */
function setParamForIncomeReport(incomeType, dateRange, date) {
	switch (incomeType) {
	case 0: // day
		setHeader(1, "NGÀY");
		break;
	case 1: // month
		setHeader(1, "THÁNG");
		break;
	case 2: // year
		setHeader(1, "NĂM");
		break;
	}
}

/*
 * set header inner html @param position int position of header @param header
 * string new header @return null @author hathao298@gmail.com
 */
function setHeader(position, header) {
	var hdrCell = $('#reportDiv .xhdr .hdr .hdrcell').get();
	hdrCell[position].innerHTML = header;
}

/*
 * parse date to get return type @param date datetime dateformat 05/01/2012
 * 00:00 mm/dd/yyyy @param returnType int 1-date 2 - month 3 - year @return
 * returnType month - 9/2012 @author hathao298@gmail.com
 */
function parseDate(date, returnType) {

}