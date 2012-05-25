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
<link rel="stylesheet" href="../css/style.css" type="text/css"
	media="all" />
<link rel="stylesheet" href="../css/billManagement.css" type="text/css"
	media="all" />
<link rel="stylesheet" href="../css/start/jquery-ui-1.8.20.custom.css"
	type="text/css" media="all" />
<link rel="stylesheet" href="../css/jquery-ui-timepicker-addon.css"
	type="text/css" media="all" />
<script src="../js/lib/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="../js/lib/jquery.jcarousel.pack.js" type="text/javascript"></script>
<script src="../js/lib/jquery-ui-1.8.20.custom.min.js"
	type="text/javascript"></script>
<script src="../js/lib/jquery-ui-timepicker-addon.js"
	type="text/javascript"></script>

<script src="../js/general_functions.js" type="text/javascript"></script>
<script src="../js/module_cashier.js" type="text/javascript"></script>
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
			<div>
				<img id="button-show" title="Click here"
					src="../css/images/button-next.gif" />
			</div>
			<div id="menuDiv" class="menu" style="display: none">
				<ul>
					<li><a href="javascript:addBill()"><img
							src="../css/images/plusIcon.png" title="Thêm hóa đơn" /> </a></li>
					<li><a href="javascript:billingManagement()"><img
							src="../css/images/cashierIcon.png"
							title="Quản lý và thanh toán hóa đơn" /> </a></li>
				</ul>
			</div>
			<!-- END Menu -->
			<!-- Main content -->
			<div class="main-content">
				<div id="main-header">QUẢN LÝ HÓA ĐƠN</div>
				<!-- Search div -->
				<div class="search-table">
					<table>
						<tr>
							<td>Ngày lập</td>
							<td></td>
							<td><input class="dtpker" id="search-date-dtpker" type="text"></input>
							</td>
						</tr>
						<tr>
							<td>Tổng tiền</td>
							<td>Từ</td>
							<td><input id="fromValue" type="text"></input></td>
							<td>Đến</td>
							<td><input id="toValue" type="text"></input></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td><button onclick="javascript:searchBill()">Tìm kiếm</button></td>
						</tr>
					</table>
				</div>
				<!-- END Search div -->

				<!-- Bill search result div -->
				<div id="searchBillResult"></div>

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
												<p>
													Tổng tiền phải trả:<span>150.000</span>
												</p>
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
									<div class="pay-for-bill" title="Thanh toán">
										<table>
											<tr>
												<td>Số tiền nhập vào</td>
												<td><input type="text" onkeyup="calulateReturnedMoney()"
													id="inputMoney"></input></td>
											</tr>
											<tr>
												<td>Số tiền phải trả</td>
												<td id="paidMoney">150000</td>
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
									</div> <!-- END pay for bill -->
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
					<div class="booking-note-detail-dialog"
						title="Chi tiết phiếu đặt chỗ">
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
