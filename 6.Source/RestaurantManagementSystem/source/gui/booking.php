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
        <link rel="stylesheet" href="../css/start/jquery-ui-1.8.20.custom.css" type="text/css" media="all" />
        <link rel="stylesheet" href="../css/jquery-ui-timepicker-addon.css" type="text/css" media="all" />
        <link rel="stylesheet" href="../css/seatManagement.css" type="text/css" media="all" />
        <script src="../js/lib/jquery-1.7.2.min.js" type="text/javascript"></script>
        <script src="../js/lib/jquery.jcarousel.pack.js" type="text/javascript"></script>
        <script src="../js/lib/jquery-ui-1.8.20.custom.min.js" type="text/javascript"></script>
        <script src="../js/lib/jquery-ui-timepicker-addon.js" type="text/javascript"></script>
         <script src="../js/general_functions.js" type="text/javascript"></script>
        <script src="../js/general_functions.js" type="text/javascript"></script>
        <script src="../js/module_booking.js" type="text/javascript"></script>
        
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
                        <li><a href="javascript:booking()"><img src="../css/images/plusIcon.png" title="Đặt chỗ"/></a></li>
                        <li><a href="javascript:showTableList()"><img src="../css/images/tableIcon.png" title="Danh sách bàn"/></a></li>
                    </ul>
                </div>
                <!-- END Menu -->             
                <div class="main-content">
                    <div id="main-header">ĐẶT CHỖ</div>
                    <div class="customerInfo">
                        <table>
                            <tr>
                                <td>Họ tên khách hàng</td>
                                <td><input type="text" id="customerNameTxtBox"></input></td>
                            </tr>
                            <tr>
                                <td>Chứng minh nhân dân</td>
                                <td><input type="text" id="customerIdNumberTxtBox"></input></td>
                            </tr>
                            <tr>
                                <td>Số điện thoại</td>
                                <td><input type="text" id="customerPhoneNumberTxtBox"></input></td>
                            </tr>
                        </table>
                    </div>
                    <div class="bookingDetailInfo">
                        <table id="bookingDetailInfoTable">
                            <tr>
                                <td>Mã bàn ăn</td>
                                <td><input type="text" class="tableId" ></input></td><br/>
                            </tr>
                            <tr>
                                <td>Từ</td>
                                <td><input type="text" class="fromDtPker"></input></td>
                                <td>Đến</td>
                                <td><input type="text" class="toDtPker"></input></td>
                            </tr>
                        </table>                        
                    </div>
                    <div class="buttonToolBar">
                        <button onclick="saveBookingDetail()">Lưu</button>
                        <button onclick="addTable();">Thêm bàn ăn</button>
                        <button id="searchTableBut">Tra cứu bàn ăn</button>
                    </div>
                </div>              
                <!-- END Main content -->
            </div>
            <!-- END Main -->
            <!-- Footer -->
             <?php 
             echo IncludeGenerator::FooterGenerate();
             ?>
            <!-- END Footer -->        
            <!-- Addtional -->
            <!-- Table Info Dialog -->
            <div class="tableInfoDialog">
                <div class="main-content-dialog">
                    <!-- Search food table -->
                    <div class="search-table">
                        <table>
                            <tr>
                                <td>Nhà hàng</td>
                                <td>
                                    <?php
                                    echo GUIGenerator::htmlShowRestaurantSelect(); 
                                    ?>
                                </td>                      
                            </tr>
                            <tr>
                                <td>Khu vực</td>
                                <td>
                                    <?php echo GUIGenerator::htmlShowAreaSelect();?>
                                </td>
                                <td>Tình trạng</td>
                                <td>
                                	<select id="selectStatus">
                                        <option value="-1" selected>Tất cả</option>
                                        <option value="0">Chưa đặt</option>
                                        <option value="1">Đã đặt</option>                        
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Từ</td>
                                <td>
                                    <input id="seachFromDtPker" type="text" class="fromDtPker"></input>
                                </td>
                                <td>Đến</td>
                                <td>
                                    <input id="seachToDtPker" type="text" class="toDtPker"></input><br/>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><button onclick="javascript:searchTable()">Tìm kiếm</button></td>
                            </tr>
                        </table>                                                

                    </div>
                    <!-- END search table -->
                    <!-- Table of food table -->
                    <div class="foodTableTbl">
                        <!-- Dialog for information about region (khu vuc ban an) -->
                        <div id="regionInfoDialog" title="Thông tin khu vực">
                            <p>Mô tả trang trí</p>
                        </div>
                        <!-- END Dialog for information about region (khu vuc ban an) -->
                        <!-- Dialog for booking detail -->
                        <div id="bookingDetailDialog" title="Thông tin đặt chỗ">
                            <table>
                                <tr>
                                    <th>Khách hàng</th>
                                    <th>Từ</th>
                                    <th>Đến</th>
                                    <th>Giá đặt(VND)</th>
                                </tr>
                                <tr>
                                    <td>T4V</td>
                                    <td>16:00 12/3/2012 </td>
                                    <td>20:00 12/3/2012 </td>
                                    <td>250.000</td>
                                </tr>
                                <tr>
                                    <td>T4V</td>
                                    <td>16:00 15/3/2012 </td>
                                    <td>20:00 15/3/2012 </td>
                                    <td>250.000</td>
                                </tr>
                            </table>
                        </div>
                        <!-- END Dialog for booking detail -->
                        <div id="searchTableResult">
	                        
                        </div>
                    </div>
                </div>
                <!-- END table of food table -->
            </div>  
            <!-- END table info Dialog -->
            <br />
    </body>

</html>