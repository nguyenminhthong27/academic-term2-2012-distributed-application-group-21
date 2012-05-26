
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>T4V RESTAURANT</title>
        <link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />
        <link rel="stylesheet" href="../css/ingredientManagement.css" type="text/css" media="all" />
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
        <script src="../js/ingredientManagementFunc.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="page" class="shell">
            <!-- Logo + Search + Navigation -->
            <div id="top">
                <div class="cl">&nbsp;</div>
                <h1 id="logo"><a href="#">T4V RESTAURANT</a></h1>          
                <div class="cl">&nbsp;</div>
                <div id="navigation">
                    <ul>
                        <li><a href="#" class="active"><span>Trang chủ</span></a></li>                        
                        <li><a href="#"><span>Giới thiệu</span></a></li>
                        <li><a href="#"><span>Liên hệ</span></a></li>
                    </ul>
                </div>	
            </div>
            <!-- END Logo + Search + Navigation -->                                  
            <!-- Main -->
            <div id="main">	
                <!-- Menu -->
                <div ><img id="button-show" title="Click here" src="../css/images/button-next.gif"/></div>
                <div id="menuDiv" class="menu" style="display:none">
                    <ul>
                        <li><a href="#"><img src="../css/images/addIngredientIcon.png" title="Nhập hàng"/></a></li>
                        <li><a href="#"><img src="../css/images/restaurantIcon.png" title="Quản lý nhà cung cấp"/></a></li>
                        <li><a href="#"><img src="../css/images/ingredientIcon.png" title="Quản lý kho hàng"/></a></li>
                    </ul>
                </div>
                <!-- END Menu -->         
                <!-- Main content -->
                <div class="main-content">
                    <div id="main-header">QUẢN LÝ KHO HÀNG</div>
                    <!-- tool-bar -->
                    <div class="tool-bar">
                        <button title="Thêm nguyên liệu" onclick="addIngredient()"><img src="../css/images/plusIcon.png" /></button>
                        <button title="Cập nhật thông tin nguyên liệu" onclick="editIngredient()"><img src="../css/images/editIcon_w.png" /></button>
                        <button title="Xóa nguyên liệu" onclick="deleteConfirm()"><img src="../css/images/trashIcon_w.png" /></button>                       
                    </div>
                    <!-- END tool-bar -->                    
                    <!-- Div for ingredient info -->
                    <div id="ingredientInfoDiv" ></div>
                    <!-- END div for ingredient info-->                                            
                    <!-- Div for additional dialog boxes -->
                    <div>
                        <!-- add ingredient slider -->
                        <div id="addIngredientDialog" title="Thêm nhà cung cấp">
                            <!-- add new ingredient info -->
                            <div class="add-ingredient-info">
                                <p>Nhập thông tin nguyên liệu mới</p>
                                <table>                                                
                                    <tr>
                                        <td>Tên nguyên liệu</td>
                                        <td><input type="text" title="Tên nguyên liệu"></input></td>                                                    
                                    </tr>
                                    <tr>
                                        <td>Loại nguyên liệu</td>
                                        <td><select>
                                                <option>Thịt</option>
                                                <option>Rau</option>
                                                <option>Gạo</option>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td>Số lượng tối thiểu</td>
                                        <td><input type="text"></input></td>
                                    </tr>
                                    <tr>
                                        <td>Số lượng tối đa</td>
                                        <td><input type="text"></input></td>
                                    </tr>                                               
                                </table>
                                <button>Thêm mới</button>
                            </div>
                            <!-- END add new ingredient info -->

                        </div>
                        <!-- END add ingredient slider -->
                        <!-- edit ingredient slider -->
                        <div id="editIngredientDialog" title="Cập nhật thông tin nhà cung cấp">                            
                            <!-- edit new ingredient info -->
                            <div class="edit-ingredient-info">
                                <p>Thay đổi thông tin và nhấp Lưu</p>
                                <table>                                                
                                    <tr>
                                        <td>Tên nguyên liệu</td>
                                        <td><input type="text" title="Tên nguyên liệu"></input></td>                                                    
                                    </tr>
                                    <tr>
                                        <td>Loại nguyên liệu</td>
                                        <td><select>
                                                <option>Thịt</option>
                                                <option>Rau</option>
                                                <option>Gạo</option>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td>Số lượng</td>
                                        <td><input type="text"></input></td>
                                    </tr>
                                    <tr>
                                        <td>Số lượng tối thiểu</td>
                                        <td><input type="text"></input></td>
                                    </tr>
                                    <tr>
                                        <td>Số lượng tối đa</td>
                                        <td><input type="text"></input></td>
                                    </tr> 
                                </table>
                                <button>Lưu</button>
                            </div>
                            <!-- END edit new ingredient info -->
                        </div>
                        <!-- END edit ingredient slider -->                       
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