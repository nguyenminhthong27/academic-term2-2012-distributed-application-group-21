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
}


// hard code to test
// $dao = new IngredientDAO();
// $data = $dao->getInfo("NL01");
// print_r($data);
?>