<?php
require_once 'MongoDatabase.php';
class IngredientTypeDAO{
	/**
	 * get all ingredientType 
	 * @param null
	 * @return ingredientType array 
	 * @author hathao298@gmail.com
	 */
	public function getAllIngredientType(){
		$key = array(
				"_id" => 0,
				"MaLoaiNL" => 1,
				"TenLoaiNL" => 1
				);
		return MongoDatabase::getAllDataFrom("LoaiNguyenLieu", null, $key);		
	}
}
?>