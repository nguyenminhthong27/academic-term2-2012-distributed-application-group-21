<?php
require_once 'MongoDatabase.php';
class IngredientDAO {
	/**
	 * get ingredient info by ID
	 * @param string $inID
	 */
	public function getInfo($inID){
		return MongoDatabase::getOneDataFrom("NguyenLieu", "MaNL=" . $inID);
	}
	
	/**
	 * get all ingredient info
	 * @param null
	 * @return ingredient array include "MaNL, TenNL, TenLoaiNL, SoLuong, SoLuongToiThieu, SoLuongToiDa"
	 * @author hathao298@gmail.com
	 */
	public function getAllIngredient(){
		return MongoDatabase::getAllDataFrom("NguyenLieu");
	}
	
	/**
	 * get ingredient info by id
	 * @param id string
	 * @return ingredient array include "MaNL, TenNL, TenLoaiNL, SoLuong, SoLuongToiThieu, SoLuongToiDa"
	 * @author hathao298@gmail.com
	 */
	public function getIngredientInfo($id){
		return null;
	}
	
	/**
	 * delete ingredient
	 * @param id string
	 * @return bool true if successfull
	 * @author hathao298@gmail.com
	 */
	public function deleteIngredient($id){
		
	}
	
	/**
	 * add new ingredient
	 * @param $name ingredient name
	 * @param $ingreTypeId ingredient type id
	 * @param $minAmount min amount
	 * @param $maxAmount max amount
	 * @return bool true if successful
	 */
	public function addIngredient($name, $ingreTypeId, $minAmount, $maxAmount){
		
	}
	
	/**
	 * update ingredient info
	 * @param $name ingredient name
	 * @param $ingreTypeId ingredient type id
	 * @param $amount amount
	 * @param $minAmount min amount
	 * @param $maxAmount max amount
	 * @return bool true if successful
	 */
	public function updateIngredient($name, $ingreTypeId, $amount, $minAmount, $maxAmount){
		
	}
}


// hard code to test
// $dao = new IngredientDAO();
// $data = $dao->getInfo("NL01");
// print_r($data);
?>