<?php
require_once '../dal/MongoDatabase.php';
require_once '../dal/staff_dao.php';

class StaffController{
	var $data;	
	public function __construct(){
	}
	
	public function getAllStaff(){
		$data = new StaffDAO();
		return $data->getAllStaff();
	}
	
	public function addStaff($info){
		$data = new StaffDAO();
		return $data->addStaff($info);		
	}
	
	public function modifyStaff($info){
		$data = new StaffDAO();
		return $data->modifyStaff($info);
	}
	
	public function removeStaff($id){
		$data = new StaffDAO();
		return $data->removeStaff($id);
	}
}
?>