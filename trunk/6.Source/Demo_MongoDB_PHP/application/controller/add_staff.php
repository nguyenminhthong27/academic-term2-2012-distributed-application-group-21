<?php
require_once 'staff_controller.php';
require_once 'Ultilities.php';

$id = (isset($_REQUEST["id"])) ? $_REQUEST["id"] : null;
$name = (isset($_REQUEST["name"])) ? $_REQUEST["name"] : null;
$birth = (isset($_REQUEST["birth"])) ? $_REQUEST["birth"] : null;
$addr = (isset($_REQUEST["addr"])) ? $_REQUEST["addr"] : null;
$sex = (isset($_REQUEST["sex"])) ? $_REQUEST["sex"] : null;
$salary = (isset($_REQUEST["salary"])) ? $_REQUEST["salary"] : null;
$dept = (isset($_REQUEST["dept"])) ? $_REQUEST["dept"] : null;


if ($id) {
	$ctrl = new StaffController();
	$info = array(
				"MaNV" => $id,
				"HoTen" => $name,
				"NgaySinh" => $birth,
				"DiaChi" => $addr,
				"Phai" => $sex,
				"Luong" => $salary,
				"Phong" => $dept
			);
	
	try {
		$ctrl->addStaff($info);
	} catch (Exception $e) {
	}
}

$staff = $ctrl->getAllStaff();
Ultilites::html_show_staffs($staff);
?>
