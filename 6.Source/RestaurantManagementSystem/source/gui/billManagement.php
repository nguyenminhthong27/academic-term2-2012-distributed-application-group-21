
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>T4V RESTAURANT</title>
        <link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />
        <link rel="stylesheet" href="../css/billManagement.css" type="text/css" media="all" />
        <link rel="stylesheet" href="../css/start/jquery-ui-1.8.20.custom.css" type="text/css" media="all" />
        <link rel="stylesheet" href="../css/jquery-ui-timepicker-addon.css" type="text/css" media="all" />
        <script src="../js/lib/jquery-1.7.2.min.js" type="text/javascript"></script>
        <script src="../js/lib/jquery.jcarousel.pack.js" type="text/javascript"></script>
        <script src="../js/lib/jquery-ui-1.8.20.custom.min.js" type="text/javascript"></script>
        <script src="../js/lib/jquery-ui-timepicker-addon.js" type="text/javascript"></script>
        <script src="../js/billManagementFunc.js" type="text/javascript"></script>
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
                        <li><a href="#"><img src="../css/images/plusIcon.png" title="Thêm hóa đơn"/></a></li>
                        <li><a href="#"><img src="../css/images/cashierIcon.png" title="Quản lý và thanh toán hóa đơn"/></a></li>
                    </ul>
                </div>
                <!-- END Menu -->         
                <!-- Main content -->
                <div class="main-content">
                    <!-- Search div -->
                    <div class="search-table">
                        <table>
                            <tr>
                                <td>Ngày lập</td>
                                <td></td>
                                <td><input class="dtpker" id="search-date-dtpker" type="text"></input></td>                                
                            </tr>
                            <tr>
                                <td>Tổng tiền</td>
                                <td>Từ</td>
                                <td><input type="text"></input></td>
                                <td>Đến</td>
                                <td><input type="text"></input></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><button>Tìm kiếm</button></td>
                            </tr>
                        </table>
                    </div>
                    <!-- END Search div -->
                    <!-- Div for Unpaid bill -->
                    <div>     
                        <fieldset>
                            <legend>Hóa đơn chưa thanh toán</legend>
                            <table class="unpaid-bill-table">
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>MÃ HÓA ĐƠN</th>
                                    <th>NGÀY LẬP</th>
                                    <th>TỔNG TIỀN</th>
                                    <th>MÃ PHIẾU ĐẶT CHỖ</th>
                                </tr>
                                <tr>
                                    <td><a onclick="payForBill()" title="Thanh toán"><img src="../css/images/calculatorIcon.png"/></a></td>
                                    <td><a onclick="deleteConfirm()" title="Xóa hóa đơn"><img src="../css/images/trashIcon.png"/></a></td>
                                    <td><a onclick="viewBillDetail()" title="Xem chi tiết"><img src="../css/images/infoIcon.png"/></a></td>
                                    <td>123</td>
                                    <td>14:00 23/03/2012</td>
                                    <td>140.000</td>
                                    <td><a onclick="viewBookingNoteDetail()">PDC123</a></td>
                                </tr>
                                <tr>
                                   <td><a onclick="payForBill()" title="Thanh toán"><img src="../css/images/calculatorIcon.png"/></a></td>
                                    <td><a onclick="deleteConfirm()" title="Xóa hóa đơn"><img src="../css/images/trashIcon.png"/></a></td>
                                    <td><a onclick="viewBillDetail()" title="Xem chi tiết"><img src="../css/images/infoIcon.png"/></a></td>
                                    <td>121</td>
                                    <td>15:00 23/03/2012</td>
                                    <td>125.000</td>
                                    <td><a onclick="viewBookingNoteDetail()">PDC125</a></td>
                                </tr>
                            </table>
                        </fieldset>                       
                    </div>
                    <!-- END div for unpaid bill -->                    
                    <!-- Div for paid bill -->
                    <div>
                        <fieldset>
                            <legend>Hóa đơn đã thanh toán</legend>
                            <table class="paid-bill-table">
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>MÃ HÓA ĐƠN</th>
                                    <th>NGÀY LẬP</th>
                                    <th>TỔNG TIỀN</th>
                                    <th>MÃ PHIẾU ĐẶT CHỖ</th>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><a onclick="deleteConfirm()" title="Xóa hóa đơn"><img src="../css/images/trashIcon.png"/></a></td>
                                    <td><a onclick="viewBillDetail()" title="Xem chi tiết"><img src="../css/images/infoIcon.png"/></a></td>                 
                                    <td>121</td>
                                    <td>15:00 22/03/2012</td>
                                    <td>125.000</td>
                                    <td><a onclick="viewBookingNoteDetail()">PDC123</a></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><a onclick="deleteConfirm()" title="Xóa hóa đơn"><img src="../css/images/trashIcon.png"/></a></td>
                                    <td><a onclick="viewBillDetail()" title="Xem chi tiết"><img src="../css/images/infoIcon.png"/></a></td>                                 
                                    <td>121</td>
                                    <td>15:00 20/03/2012</td>
                                    <td>125.000</td>
                                    <td><a onclick="viewBookingNoteDetail()">PDC125</a></td>
                                </tr>
                            </table>
                        </fieldset>
                    </div>
                    <!-- END div for paid bill -->                    
                    <!-- Div for additional dialog boxes -->
                    <div>
                        <!-- slider -->
                        <div id="slider" title="Thông tin thanh toán">
                            <!-- slider holder -->
                            <div id="slider-holder">
                                <ul>
                                    <li>
                                        <!-- pay for bill info -->
                                        <div>
                                            <div class="pay-for-bill-info">
                                            <p>Chi tiết hóa đơn</p>
                                            <table id="bill-detail-table">
                                                <tr>
                                                    <th>Món ăn</th>
                                                    <th>Đơn giá(VND)</th>
                                                    <th>Số lượng</th>
                                                    <th>Thành tiền(VND)</th>
                                                </tr>
                                                <tr>
                                                    <td>Gà rán</td>
                                                    <td>15000</td>
                                                    <td>5</td>
                                                    <td>75.000</td>
                                                </tr>
                                                <tr>
                                                    <td>Xà lách trộn</td>
                                                    <td>15.000</td>
                                                    <td>2</td>
                                                    <td>30.000</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td>Tổng tiền</td>
                                                    <td>105.000</td>
                                                </tr>
                                            </table>
                                            <p>Chi tiết đặt chỗ</p>
                                            <table>
                                                <tr>
                                                    <th>Mã bàn ăn</th>                                    
                                                    <th>Khu vực</th>
                                                    <th>Giá thành(VND)</th>
                                                </tr>
                                                <tr>
                                                    <td>123</td>
                                                    <td>VIP</td>
                                                    <td>125.000</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>Tổng tiền</td>
                                                    <td>125.000</td>
                                                </tr>
                                            </table>
                                            <div>
                                                <p>Tổng tiền phải trả:<span>150.000</span></p>
                                            </div>
                                            <div>
                                                <button id="cashBut" title="Nhấp để thanh toán">Thanh toán</button>
                                                <button onclick="cancelPayForBillButClicked();">Hủy bỏ</button>
                                            </div>
                                        </div>
                                        <!-- END pay for bill info -->
                                        </div>
                                    </li>
                                    <li>
                                        <!-- pay for bill -->
                                        <div class ="pay-for-bill" title="Thanh toán">
                                            <table>
                                                <tr>
                                                    <td>Số tiền nhập vào</td>
                                                    <td><input type="text" onkeyup="calulateReturnedMoney()" id="inputMoney"></input></td>                                    
                                                </tr>
                                                <tr>
                                                    <td>Số tiền phải trả</td>
                                                    <td id="paidMoney" >150000</td>                                    
                                                </tr>
                                                <tr>
                                                    <td>Số tiền hoàn lại</td>
                                                    <td type="text" id="returnedMoney"></td>
                                                </tr>                                
                                            </table>
                                            <div>
                                                <button id="backBut">Trở về</button>
                                                <button>Hoàn tất</button>
                                            </div>
                                        </div>
                                        <!-- END pay for bill -->
                                    </li>
                                </ul>
                            </div>
                            <!-- END slider holder -->
                        </div>
                        <!-- END slider -->
                        <!-- bill detail info -->
                        <div class="bill-detail-info-dialog" title="Chi tiết hóa đơn">
                            <table>
                                <tr>
                                    <th>Món ăn</th>
                                    <th>Đơn giá(VND)</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền(VND)</th>
                                </tr>
                                <tr>
                                    <td>Gà rán</td>
                                    <td>15000</td>
                                    <td>5</td>
                                    <td>75.000</td>
                                </tr>
                                <tr>
                                    <td>Xà lách trộn</td>
                                    <td>15.000</td>
                                    <td>2</td>
                                    <td>30.000</td>
                                </tr>
                            </table>
                        </div>
                        <!-- END bill detail info -->                        
                        <!-- booking detail info -->
                        <div class="booking-note-detail-dialog" title="Chi tiết phiếu đặt chỗ">
                            <table>
                                <tr>
                                    <td>Ngày lập:</td>
                                    <td>12:00 15/03/2012</td>
                                </tr>
                                <tr>
                                    <td>Họ tên khách hàng:</td>
                                    <td>Hà Thị Phương Thảo</td>
                                </tr>
                                <tr>
                                    <td>Số CMND:</td>
                                    <td>123456789</td>
                                </tr>
                                <tr>
                                    <td>Số điện thoại:</td>
                                    <td>12345678901</td>
                                </tr>
                                <tr>
                                    <td>Người lập:</td>
                                    <td>Lê Văn Tuấn</td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <th>Mã bàn ăn</th>                                    
                                    <th>Khu vực</th>
                                    <th>Giá thành(VND)</th>
                                </tr>
                                <tr>
                                    <td>123</td>
                                    <td>VIP</td>
                                    <td>125.000</td>
                                </tr>
                            </table>
                        </div>
                        <!-- END booking detail info -->
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