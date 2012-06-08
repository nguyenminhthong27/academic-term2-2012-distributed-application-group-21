<?php
//check is_login
session_start();
$is_login = isset($_SESSION['is_login']) ? $_SESSION['is_login'] : false;
$staff_type = isset($_SESSION['staff_type']) ? $_SESSION['staff_type'] : "";

// check login
if ($is_login == false) {
	require_once '../configure/GeneralFunctions.php';
	echo GeneralFunctions::Alert("Bạn chưa đăng nhập.");
	header("Location: index.php");
}

// hard code to test staff_type
$staff_type = "NV Thu Ngan";
if ($staff_type != "NV Thu Ngan") {
	require_once '../configure/GeneralFunctions.php';
	echo GeneralFunctions::Alert("Bạn không có đủ quyền để thực hiện chức năng này.");
	header("Location: home.php");
}

require_once '../configure/IncludeGenerator.php';
require_once '../controller/GUIGenerator.php';

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>T4V RESTAURANT</title>
        <link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />
        <link rel="stylesheet" href="../css/createBill.css" type="text/css" media="all" />
        <link rel="stylesheet" href="../css/start/jquery-ui-1.8.20.custom.css" type="text/css" media="all" />
        <link rel="stylesheet" href="../css/jquery-ui-timepicker-addon.css" type="text/css" media="all" />   
        <script src="../js/lib/jquery-1.7.2.min.js" type="text/javascript"></script>
        <script src="../js/lib/jquery.jcarousel.pack.js" type="text/javascript"></script>
        <script src="../js/lib/jquery-ui-1.8.20.custom.min.js" type="text/javascript"></script>
        <script src="../js/lib/jquery-ui-timepicker-addon.js" type="text/javascript"></script>
        <script src="../js/lib/jquery.numericupdown.js" type="text/javascript"></script>
        
        <script src="../js/module_create_bill.js" type="text/javascript"></script>
        <script src="../js/general_functions.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="page" class="shell">
            <!-- Logo + Search + Navigation -->
            <?php
            echo IncludeGenerator::LogoGenerate(); 
            ?>
            <!-- END Logo + Search + Navigation -->                                  
            <!-- Main -->
            <div id="main">	
                <!-- Menu -->
                <div ><img id="button-show" title="Click here" src="../css/images/button-next.gif"/></div>
                <div id="menuDiv" class="menu" style="display:none">
                    <ul>
                        <li><a href="javascript:addBill()"><img src="../css/images/plusIcon.png" title="Thêm hóa đơn"/></a></li>
                        <li><a href="javascript:billingManagement()"><img src="../css/images/cashierIcon.png" title="Quản lý và thanh toán hóa đơn"/></a></li>
                    </ul>
                </div>
                <!-- END Menu -->         
                <!-- Main content -->
                <div class="main-content">       
                <div id="main-header">THÊM MỚI HÓA ĐƠN</div>      
                    <div id="slider-holder">
                        <ul>
                            <li>
                                <!-- Div for bill general info -->
                                <div class="bill-general-info">
                                    <table>
                                        <tr>
                                            <td>Ngày lập</td>
                                            <td><input id="date_founded" type="text" class="dtpker"></input></td>
                                            <td><button id="btnSearchFood" onclick="javascript:searchFood()">Lấy món ăn</button></td>                                
                                        </tr>
                                        <tr>
                                            <td>Mã phiếu đặt chỗ</td>
                                            <td><input id="bookingID" type="text"></input></td>
                                            <td><button id="bookingSearchBut">Tìm kiếm</button></td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- END Div for bill info -->
                                <!-- Div for food detail -->                    
                                <div  class="food-detail">
                                	<div id="food-list-detail">
                                		<p>Chọn món ăn nhập vào hóa đơn</p>
	                                    <table>
	                                        <tr>
	                                            <th><input type="checkbox" id="checkAllCBox" onclick="checkAllCBoxClicked();"></input></th>
	                                            <th>Món ăn</th>
	                                            <th>Giá thành</th>
	                                        </tr>
	                                    </table>
                                	</div>                                    
                                    <!-- END food-tab -->
                                    <button id="addFoodAmountBut">Nhập số lượng</button>
                                </div>

                            </li>
                            <li>
                                <!-- Div for food amount -->
                                <div class ="food-amount">
                                	<div id="food-amount">
                                	</div>
                                    
                                    <button class="backBut">Trở về</button>
                                    <button id="confirm-info-button" >Kế tiếp</button>
                                </div>
                                <!-- END Div for food amount -->
                            </li>
                            <li>
                                <!-- Div for creating bill confirmation -->
                                <div id="save-bill-result" class="bill-confirmation" title="Xác nhận lập hóa đơn">
	                                <div id="bill-confirmation">
	                                </div>
                                    
                                    <button class="backBut">Trở về</button>
                                    <button onclick="javascript:saveBill()">Lưu</button>
                                </div>
                                <!-- END Div for creating bill confirmation -->
                            </li>
                        </ul>
                    </div>
                    <!-- END Div for food detail -->                    
                </div>
                <!-- END Main content -->
            </div>
            <!-- END Main --> 

            <!-- Additional -->
            <!-- booking-search-dialog-->
            <div class="booking-search-dialog"  title="Tìm kiếm phiếu đặt chỗ">
                <!-- booking-search-table -->
                <div class="booking-search-div">
                    <table>
                        <tr>
                            <td>Ngày lập</td>
                            <td><input id="date_booking_founded" type="text" class="dtpker" ></input></td>
                        </tr>
                        <tr>
                            <td>Họ tên khách hàng</td>
                            <td><input id="customer_name" type="text"></input></td>
                        </tr>
                        <tr>
                            <td>Số CMND</td>
                            <td><input id="customer_id" type="text"></input></td>
                        </tr>
                        <tr>
                            <td>Số điện thoại</td>
                            <td><input id="customer_phone" type="text"></input></td>
                        </tr>
                    </table>
                    <button id="bookingSearchDialogBut">Tìm kiếm</button>
                </div>
                <!-- END booking-search-table -->
                <div id="booking-detail-div" class="booking-detail-div">
                </div>
            </div>
            <!-- END Addtitional -->         
            <!-- Footer -->
            <div id="footer">
                <p class="right">&copy; 2012 - T4V Restaurant &nbsp; Designed by T4V Group
                    <p>
                        <a href="#">Trang chủ</a><span>&nbsp;</span>
                        <a href="#">Giới thiệu</a><span>&nbsp;</span>
                        <a href="#">Liên hệ</a><span>&nbsp;</span>
                        <div class="cl">&nbsp;</div>
                    </p>
                </p>
            </div>
            <!-- END Footer -->
        </div> 
        <!-- END page -->        
    </body>

</html>