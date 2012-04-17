<?php
require_once '../dto/StaffDTO.php';
require_once 'staff_controller.php';


$id = (isset($_REQUEST["txtMaNV"])) ? $_REQUEST["txtMaNV"] : null;
$name = (isset($_REQUEST["txtHoTen"])) ? $_REQUEST["txtHoTen"] : null;
$birth = (isset($_REQUEST["txtNgaySinh"])) ? $_REQUEST["txtNgaySinh"] : null;
$addr = (isset($_REQUEST["txtDiaChi"])) ? $_REQUEST["txtDiaChi"] : null;
$sex = (isset($_REQUEST["txtPhai"])) ? $_REQUEST["txtPhai"] : null;
$salary = (isset($_REQUEST["txtLuong"])) ? $_REQUEST["txtLuong"] : null;
$dept = (isset($_REQUEST["txtMaPhong"])) ? $_REQUEST["txtMaPhong"] : null;

$info = new StaffDTO($id, $name, $birth, $addr, $sex, $salary, $dept);
$ctrl = new StaffController();

try {	
	$ctrl->modifyStaff($info);
	header('location:../gui/staff_manager.php');
} catch (Exception $e) {
	echo "<script>alert($e->getMessage())</script>";
}

?>