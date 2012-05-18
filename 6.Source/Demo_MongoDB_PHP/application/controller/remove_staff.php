<?php
require_once 'staff_controller.php';
require_once 'Ultilities.php';

$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : null;
$ctrl = new StaffController();

if ($id) {	
	try {
		$ctrl->removeStaff($id);	
	} catch (Exception $e) {
		echo "<script>alert('$e->getMessage()');</script>";
	}
} 

$array = $ctrl->getAllStaff();
Ultilites::html_show_staffs($array);
?>