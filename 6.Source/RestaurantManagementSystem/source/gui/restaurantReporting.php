<?php
//check is_login
session_start();
$is_login = isset($_SESSION['is_login']) ? $_SESSION['is_login'] : false;
$uname = isset($_SESSION['uname']) ? $_SESSION['uname'] : "";
$staff_type = isset($_SESSION['staff_type']) ? $_SESSION['staff_type'] : "";

// check login
if ($is_login == false) {
	require_once '../configure/GeneralFunctions.php';
	echo GeneralFunctions::Alert("Bạn chưa đăng nhập.");
	header("Location: index.php");
}

// hard code to test staff_type
$staff_type = "LNV001";
if ($staff_type != "LNV001") {
	require_once '../configure/GeneralFunctions.php';
	echo GeneralFunctions::Alert("Bạn không có đủ quyền để thực hiện chức năng này.");
	header("Location: home.php");
}

require_once '../configure/IncludeGenerator.php';
require_once '../controller/ModuleIngredientImportingController.php';
require_once '../controller/GUIGenerator.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>T4V RESTAURANT</title>
        <link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />
        <link rel="stylesheet" href="../css/restaurantReporting.css" type="text/css" media="all" />
        <link rel="stylesheet" href="../css/start/jquery-ui-1.8.20.custom.css" type="text/css" media="all" />
        <link rel="stylesheet" href="../css/jquery-ui-timepicker-addon.css" type="text/css" media="all" />
        <link rel="stylesheet" href="dhtmlx/dhtmlxgrid.css" type="text/css" media="all" />
        <link rel="stylesheet" href="dhtmlx/dhtmlxgrid_skins.css" type="text/css" media="all" />
        <link rel="stylesheet" href="dhtmlx/skins/dhtmlxgrid_dhx_skyblue.css" type="text/css" media="all" />
        <link rel="stylesheet" href="dhtmlx/ext/chart/dhtmlxchart.css" type="text/css" media="all" />
        <script src="../js/lib/jquery-1.7.2.min.js" type="text/javascript"></script>
        <script src="../js/lib/jquery.jcarousel.pack.js" type="text/javascript"></script>
        <script src="../js/lib/jquery-ui-1.8.20.custom.min.js" type="text/javascript"></script>
        <script src="../js/lib/jquery-ui-timepicker-addon.js" type="text/javascript"></script>
        <script src="dhtmlx/dhtmlxcommon.js" type="text/javascript"></script>
        <script src="dhtmlx/dhtmlxgrid.js" type="text/javascript"></script>
        <script src="dhtmlx/ext/dhtmlxgrid_filter.js" type="text/javascript"></script>
        <script src="dhtmlx/dhtmlxgridcell.js" type="text/javascript"></script>
        <script src="dhtmlx/ext/dhtmlxgrid_export.js" type="text/javascript"></script>
        <script src="dhtmlx/ext/chart/dhtmlxchart.js" type="text/javascript"></script>
        <script src="../js/restaurantReportingFunc.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="page" class="shell">
            <!-- Logo + Search + Navigation -->
		<?php echo IncludeGenerator::LogoGenerate();?>
		<!-- END Logo + Search + Navigation -->                                 
            <!-- Main -->
            <div id="main">	
                <!-- Menu -->
                <div ><img id="button-show" title="Click here" src="css/images/button-next.gif"/></div>
                <div id="menuDiv" class="menu" style="display:none">
                    <ul>
                        <li><a href="#"><img src="css/images/addIngredientIcon.png" title="Nhập hàng"/></a></li>
                        <li><a href="#"><img src="css/images/restaurantIcon.png" title="Quản lý nhà cung cấp"/></a></li>
                        <li><a href="#"><img src="css/images/ingredientIcon.png" title="Quản lý kho hàng"/></a></li>
                    </ul>
                </div>
                <!-- END Menu -->         
                <!-- Main content -->
                <div class="main-content">
                    <div id="main-header">BÁO CÁO DOANH THU</div>
                    <!-- reportingCriteriaDiv -->
                    <div id="reportingCriteriaDiv">
                        <p>Nhấp chọn các tiêu chí thống kê</p>
                            <table>
                                <tr>
                                    <td>Tiêu chí</td>
                                    <td><select id="criteriaSBox">                                            
                                            <option>Theo món ăn</option>
                                            <option>Theo doanh thu từng ngày</option>
                                            <option>Theo doanh thu từng tháng</option>
                                            <option>Theo doanh thu từng năm</option>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Thời gian thống kê</td>
                                    <td>
                                        <select id="dateRangeSBox">
                                            <option>Tất cả</option>
                                            <option>Theo ngày</option>
                                            <option>Theo tháng</option>
                                            <option>Theo năm</option>
                                        </select>
                                    </td>
                                    <td><input type="text" class="dtpker" id="dateRangeDtPker"></input></td>
                                </tr>
                            </table>        
                    </div>
                    <!-- END reportingCriteriaDiv -->
                    <button onclick="makeReport()" id="reportBut">Thống kê</button>                    
                    <!-- report Div -->
                    <div id="reportDiv" ></div>
                    <!-- END report Div-->
                    <button onclick="exportGridToExcel()" id="exportBut">Export</button>
                    <button onclick="changeChartStyle()" id="changeStyleBut">Change chart style</button>
                    <!-- chartDiv -->
                    <div id="chartDiv"></div>
                    <!--END chartDiv -->                    
                </div>
                <!-- END Main content -->
            </div>
            <!-- END Main -->
            <!-- Footer -->
            <?php echo IncludeGenerator::FooterGenerate();?>           
            <!-- END Footer -->        
            <!-- Additional -->
            <!-- Table Info Dialog -->
            <div class="tableInfoDialog">
                <div class="main-content-dialog">
                    <!-- Search food table -->                    
                    <!-- END search table -->                    
                </div>
            </div>
            <!-- END table info Dialog -->
        </div> 
        <!-- END page -->
    </body>
</html>