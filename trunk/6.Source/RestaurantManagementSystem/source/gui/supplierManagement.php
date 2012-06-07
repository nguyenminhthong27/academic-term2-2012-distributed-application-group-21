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
        <link rel="stylesheet" href="../css/supplierManagement.css" type="text/css" media="all" />
        <link rel="stylesheet" href="../css/start/jquery-ui-1.8.20.custom.css" type="text/css" media="all" />
        <link rel="stylesheet" href="../css/jquery-ui-timepicker-addon.css" type="text/css" media="all" />
        <link rel="stylesheet" href="dhtmlx/dhtmlxgrid.css" type="text/css" media="all" />
        <link rel="stylesheet" href="dhtmlx/dhtmlxgrid_skins.css" type="text/css" media="all" />
        <link rel="stylesheet" href="dhtmlx/skins/dhtmlxgrid_dhx_skyblue.css" type="text/css" media="all" />
        <script src="../js/lib/jquery-1.7.2.min.js" type="text/javascript"></script>
        <script src="../js/lib/jquery.jcarousel.pack.js" type="text/javascript"></script>
        <script src="../js/lib/jquery-ui-1.8.20.custom.min.js" type="text/javascript"></script>
        <script src="../js/lib/jquery-ui-timepicker-addon.js" type="text/javascript"></script>
        <script src="dhtmlx/dhtmlxcommon.js" type="text/javascript"></script>
        <script src="dhtmlx/dhtmlxgrid.js" type="text/javascript"></script>
        <script src="dhtmlx/ext/dhtmlxgrid_filter.js" type="text/javascript"></script>
        <script src="dhtmlx/dhtmlxgridcell.js" type="text/javascript"></script>
        <script src="../js/supplierManagementFunc.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="page" class="shell">
            <!-- Logo + Search + Navigation -->
		<?php echo IncludeGenerator::LogoGenerate();?>
		<!-- END Logo + Search + Navigation -->                           
            <!-- Main -->
            <div id="main">	
                <!-- Menu -->
                <div ><img id="button-show" title="Click here" src="../css/images/button-next.gif"/></div>
                <div id="menuDiv" class="menu" style="display:none">
                    <ul>
                        <li><a href="javascript:ingredientImporting()"><img src="../css/images/addIngredientIcon.png" title="Nhập hàng"/></a></li>
                        <li><a href="javascript:supplierManagement()"><img src="../css/images/restaurantIcon.png" title="Quản lý nhà cung cấp"/></a></li>
                        <li><a href="javascript:ingredientManagement()"><img src="../css/images/ingredientIcon2.png" title="Quản lý kho hàng"/></a></li>
                    </ul>
                </div>
                <!-- END Menu -->         
                <!-- Main content -->
                <div class="main-content">
                    <div id="main-header">QUẢN LÝ NHÀ CUNG CẤP</div>
                    <!-- tool-bar -->
                    <div class="tool-bar">
                        <button title="Thêm nhà cung cấp" onclick="addSupplier()"><img src="../css/images/plusIcon.png" /></button>
                        <button title="Cập nhật thông tin nhà cung cấp" onclick="editSupplier()"><img src="../css/images/editIcon_w.png" /></button>
                        <button title="Xóa nhà cung cấp" onclick="deleteConfirm()"><img src="../css/images/trashIcon_w.png" /></button>
                        <button title="Thông tin tài khoản" onclick="viewAccountInfo()"><img src="../css/images/infoIcon_w.png"/></button>
                    </div>
                    <!-- END tool-bar -->                    
                    <!-- Div for supplier info -->
                    <div id="supplierInfoDiv" ></div>
                    <!-- END div for supplier info-->                                            
                    <!-- Div for additional dialog boxes -->
                    <div>
                        <!-- add supplier slider -->
                        <div id="addSupplierSlider" title="Thêm nhà cung cấp">
                            <!-- slider holder -->
                            <div id="addSupplier-SliderHolder">
                                <ul>
                                    <li>
                                        <!-- add new supplier info -->
                                        <div class="add-supplier-info">
                                            <p>Nhập thông tin nhà cung cấp</p>
                                            <table>                                                
                                                <tr>
                                                    <td>Tên nhà cung cấp</td>
                                                    <td><input type="text" title="Tên nhà cung cấp"></input></td>                                                    
                                                </tr>
                                                <tr>
                                                    <td>Địa chỉ</td>
                                                    <td><input type="text"></input></td>
                                                </tr>
                                                <tr>
                                                    <td>Số điện thoại</td>
                                                    <td><input type="text"></input></td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td><input type="text"></input></td>
                                                </tr>
                                                <tr>
                                                    <td>Định mức</td>
                                                    <td><input type="text"></input></td>
                                                </tr>                                                
                                            </table>
                                            <div>
                                                <button class="nextBut">Kế tiếp</button>
                                            </div>
                                        </div>
                                        <!-- END add new supplier info -->
                                    </li>
                                    <li>
                                        <!-- add account info for new supplier -->
                                        <div class ="add-account-info" title="Thanh toán">
                                            <p>Nhập thông tin tài khoản của nhà cung cấp</p>
                                            <table>
                                                <tr>
                                                    <td>Số tài khoản</td>
                                                    <td><input type="text"></input></td>
                                                </tr>
                                                <tr>
                                                    <td>Ngày lập</td>                                    
                                                    <td><input type="text" class="dtpker"></input></td>
                                                </tr>
                                                <tr>
                                                    <td>Ngân hàng</td>
                                                    <td><input type="text"></input></td>
                                                </tr>        
                                                <tr>
                                                    <td>Tên loại thẻ</td>
                                                    <td>
                                                        <select>
                                                            <option>Credit Card</option>
                                                            <option>Visa Card</option>
                                                            <option>Debit Card</option>
                                                            <option>Master Card</option>
                                                            <option>ATM</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div>
                                                <button class="backBut">Trở về</button>
                                                <button>Lưu</button>
                                            </div>
                                        </div>
                                        <!-- END add account info for new supplier -->
                                    </li>
                                </ul>
                            </div>
                            <!-- END slider holder -->
                        </div>
                        <!-- END add supplier slider -->
                        <!-- edit supplier slider -->
                        <div id="editSupplierSlider" title="Cập nhật thông tin nhà cung cấp">
                            <!-- slider holder -->
                            <div id="editSupplier-SliderHolder">
                                <ul>
                                    <li>
                                        <!-- add new supplier info -->
                                        <div class="edit-supplier-info">
                                            <p>Thay đổi thông tin và nhấp Lưu</p>
                                            <table>                                                
                                                <tr>
                                                    <td>Tên nhà cung cấp</td>
                                                    <td><input type="text" title="Tên nhà cung cấp" value="123"></input></td>                                                    
                                                </tr>
                                                <tr>
                                                    <td>Địa chỉ</td>
                                                    <td><input type="text" value="321"></input></td>
                                                </tr>
                                                <tr>
                                                    <td>Số điện thoại</td>
                                                    <td><input type="text"></input></td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td><input type="text"></input></td>
                                                </tr>
                                                <tr>
                                                    <td>Định mức</td>
                                                    <td><input type="text"></input></td>
                                                </tr> 
                                                <tr>
                                                    <td>Tình trạng</td>
                                                    <td><select>
                                                            <option>Đang cung cấp</option>
                                                            <option>Ngừng cung cấp</option>
                                                        </select></td>
                                                </tr> 
                                            </table>
                                            <div>
                                                <button class="nextBut">Kế tiếp</button>
                                            </div>
                                        </div>
                                        <!-- END add new supplier info -->
                                    </li>
                                    <li>
                                        <!-- add account info for new supplier -->
                                        <div class ="edit-account-info" title="Thanh toán">
                                            <p>Thay đổi thông tin và nhấp Lưu</p>
                                            <table>
                                                <tr>
                                                    <td>Số tài khoản</td>
                                                    <td><input type="text"></input></td>
                                                </tr>
                                                <tr>
                                                    <td>Ngày lập</td>                                    
                                                    <td><input type="text" class="dtpker"></input></td>
                                                </tr>
                                                <tr>
                                                    <td>Ngân hàng</td>
                                                    <td><input type="text"></input></td>
                                                </tr>        
                                                <tr>
                                                    <td>Tên loại thẻ</td>
                                                    <td>
                                                        <select>
                                                            <option>Credit Card</option>
                                                            <option>Visa Card</option>
                                                            <option>Debit Card</option>
                                                            <option>Master Card</option>
                                                            <option>ATM</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div>
                                                <button class="backBut">Trở về</button>
                                                <button>Lưu</button>
                                            </div>
                                        </div>
                                        <!-- END add account info for new supplier -->
                                    </li>
                                </ul>
                            </div>
                            <!-- END slider holder -->
                        </div>
                        <!-- END edit supplier slider -->
                        <!-- account-info -->
                        <div class="account-info" title="Thông tin tài khoản">
                            <table>                                
                                <tr>
                                    <td>Số tài khoản:</td>
                                    <td>12345</td>
                                </tr>
                                <tr>
                                    <td>Ngày lập:</td>
                                    <td>12/08/2011</td>
                                </tr>
                                <tr>
                                    <td>Ngân hàng:</td>
                                    <td>Eximbank</td>
                                </tr>
                                <tr>
                                    <td>Loại thẻ:</td>
                                    <td>Master Card</td>
                                </tr>                           
                            </table>
                            <button onclick="OKButClicked_accountInfo()">OK</button>
                        </div>
                        <!-- END account-info --> 
                        <!-- Delete Confirmation box -->
                        <div class="delete-confirmation-box-dialog">
                            <title>Xóa</title>
                            <p>Bạn có muốn xóa không?</p>
                            <button id="okDeleteBillBut">OK</button>
                            <button onclick="cancelDeleteBill()">Hủy bỏ</button>
                        </div>
                        <!-- END Delete Confirmation box -->
                    </div>
                    <!-- END Div for additional dialog boxes -->
                </div>
                <!-- END Main content -->
            </div>
            <!-- END Main -->
            <!-- Footer -->
            <div id="footer">
                <p class="right">&copy; 2012 - T4V Restaurant &nbsp; Design by T4V Group
                    <p>
                        <a href="#">Trang chủ</a><span>&nbsp;</span>
                        <a href="#">Giới thiệu</a><span>&nbsp;</span>
                        <a href="#">Liên hệ</a><span>&nbsp;</span>
                        <div class="cl">&nbsp;</div>
                    </p>
                </p>
            </div>           
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