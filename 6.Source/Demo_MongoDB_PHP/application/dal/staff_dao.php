<?php
require_once 'MongoDatabase.php';
class StaffDAO{
	public function __construct(){
		
	}
	public function getAllStaff(){
		$array = MongoDatabase::getAllDataFrom("nhanvien", null);
		return $array;
	}
	
	public function addStaff($info){
		MongoDatabase::addDataTo("nhanvien", $info);			
	}
	
	public function removeStaff($id){
		MongoDatabase::removeDataFrom("nhanvien", "MaNV", $id);
	}
	
	public function modifyStaff(StaffDTO $info){
		MongoDatabase::modifyDataFrom("nhanvien", $info->convert_to_array(), "MaNV", $info->_maNV);
	}
}
?>