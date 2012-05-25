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
<link rel="stylesheet" href="../css/style.css" type="text/css"	media="all" />
<link rel="stylesheet" href="../css/ingredientImporting.css"	type="text/css" media="all" />
<link rel="stylesheet" href="../css/start/jquery-ui-1.8.20.custom.css"	type="text/css" media="all" />
<link rel="stylesheet" href="../css/jquery-ui-timepicker-addon.css"	type="text/css" media="all" />
<script src="../js/lib/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="../js/lib/jquery.jcarousel.pack.js" type="text/javascript"></script>
<script src="../js/lib/jquery-ui-1.8.20.custom.min.js"	type="text/javascript"></script>
<script src="../js/lib/jquery-ui-timepicker-addon.js"	type="text/javascript"></script>
<script src="../js/general_functions.js" type="text/javascript"></script>
<script src="../js/module_ingredient_importing.js"	type="text/javascript"></script>
</head>
<body>
	<div id="page" class="shell">
		<!-- Logo + Search + Navigation -->
		<?php echo IncludeGenerator::LogoGenerate();?>
		<!-- END Logo + Search + Navigation -->
		<!-- Main -->
		<div id="main">
			<!-- Menu -->
			<div>
				<img id="button-show" title="Click here"
					src="../css/images/button-next.gif" />
			</div>
			
			<?php echo IncludeGenerator::ReporsitoryManagementToolbar();?>
			<!-- END Menu -->
			<!-- Main content -->
			<div class="main-content">
			<div id="main-header">NHẬP HÀNG</div>
				<div id="slider-holder">
					<ul>
						<li>
							<!-- Div for bill general info -->
							<div class="supplier-info">
								<table>
									<tr>
										<td>Tên nhà cung cấp</td>
										<td>
										<?php echo GUIGenerator::htmlShowSupplierSelect();?>
										</td>
									</tr>									
									<tr>
										<td>Mã hợp đồng</td>
										<td><select id="contractIDSelect" onchange="javascript:contractIDSelectOnchange(this)">
												
										</select></td>
									</tr>
								</table>
							</div> <!-- END Div for bill info --> <!-- Div for food detail -->
							<div class="ingredient-detail" >
								<div id="ingredient-detail">
								</div>
								<!-- END food-tab -->
								<button class="nextBut" id="addIngredientAmountBut">Nhập số
									lượng</button>
							</div>

						</li>
						<li>
							<!-- Div for food amount -->
							<div class="ingredient-amount">
								<table>
									<!-- Note: to create a user-friendly GUI, set value of food amount (so luong mon an) to 1 (default)-->
									<tr>
										<th>Nguyên liệu</th>
										<th>Đơn giá</th>
										<th>Số lượng nhập vào</th>
									</tr>
									<tr>
										<td>Thịt gà(kg)</td>
										<td><input type="text"></input></td>
										<td><input type="text"></input></td>
									</tr>
									<tr>
										<td>Pepsi(thùng)</td>
										<td><input type="text"></input></td>
										<td><input type="text"></input></td>
									</tr>
								</table>
								<button class="backBut">Trở về</button>
								<button class="nextBut">Kế tiếp</button>
							</div> <!-- END Div for food amount -->
						</li>
						<li>
							<!-- Div for creating bill confirmation -->
							<div class="ingredient-importing-confirmation"
								title="Xác nhận thông tin nhập hàng">
								<p>Xin xác nhận lại thông tin đã nhập và nhấp "Lưu"</p>
								<table>
									<tr>
										<th>Nguyên liệu</th>
										<th>Đơn giá</th>
										<th>Số lượng nhập vào</th>
									</tr>
									<tr>
										<td>Thịt gà(kg)</td>
										<td>45000</td>
										<td>10</td>
									</tr>
									<tr>
										<td>Pepsi(thùng)</td>
										<td>200000</td>
										<td>20</td>
									</tr>
								</table>
								<button class="backBut">Trở về</button>
								<button>Lưu</button>
							</div> <!-- END Div for creating bill confirmation -->
						</li>
					</ul>
				</div>
				<!-- END Div for food detail -->
			</div>
			<!-- END Main content -->
		</div>
		<!-- END Main -->

		<!-- Additional -->
		<div></div>
		<!-- END Addtitional -->
		<!-- Footer -->
		<div id="footer">
			<p class="right">
				&copy; 2012 - T4V Restaurant &nbsp; Designed by T4V Group
				<p>
					<a href="#">Trang chủ</a><span>&nbsp;</span> <a href="#">Giới thiệu</a><span>&nbsp;</span>
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
