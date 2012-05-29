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
}


// hard code to test
// $dao = new IngredientDAO();
// $data = $dao->getInfo("NL01");
// print_r($data);
?>