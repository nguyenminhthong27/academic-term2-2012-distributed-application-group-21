<?php
require_once 'Mongodatabase.php';
class FoodDAO{
	/**
	 * get list of food
	 * @return array foods
	 */
	public function  getListFood(){
		return MongoDatabase::getAllDataFrom("MonAn");		
	}
	
	public function getListFoodWithUnitPrice($fromDate, $toDate){
		// get menus on date.
		$keys = array(
				'_id' => 0,
				'MaTD' => 1
				);
		$condition = array(
				"NgayLap" => array(
						'$gte' => new MongoDate(strtotime($fromDate)),
						'$lte' => new MongoDate(strtotime($toDate))
						)
				);
		$menus = MongoDatabase::getAllDataFrom("ThucDon", $condition, $keys);
		
		// get foods from menu
		$result = array();
		$temp = array();
		$keys1 = array(
				"_id" => 0,
				"MaMonAn" => 1,
				"DonGia" => 1
				);
		foreach($menus as $menu){			
			$foodWithUnitPrice = MongoDatabase::getAllDataFrom("ChiTietThucDon_MonAn", 
					array(
							"MaTD" => $menu["MaTD"]
							),
					 $keys1);
			foreach($foodWithUnitPrice as $food_menu){
				$temp["DonGia"] = $food_menu["DonGia"];
				$temp["MaMonAn"] = $food_menu["MaMonAn"];
				$food = MongoDatabase::getOneDataFrom("MonAn", "MaMonAn=". $food_menu["MaMonAn"]);
				$temp["TenMonAn"] = $food["TenMonAn"];
				$result[] = $temp;
			}
		}
		
		return $result;
	}
} 

// hard code to test
// $dao = new FoodDAO();
// $data = $dao->getListFoodWithUnitPrice("2011-05-24", "2014-05-25");
// print_r($data);
?>