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
	
	/**
	 * @param unknown_type $fromDate
	 * @param unknown_type $toDate
	 * @return multitype:multitype:unknown Ambigous <unknown>  
	 */
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
				"MaChiTiet" => 1,
				"DonGia" => 1
				);
		foreach($menus as $menu){			
			$foodWithUnitPrice = MongoDatabase::getAllDataFrom("ChiTietThucDon_MonAn", 
					array(
							"MaTD" => $menu["MaTD"]
							),
					 $keys1);
			foreach($foodWithUnitPrice as $food_menu){
				$temp["MaChiTietThucDon_MonAn"] = $food_menu["MaChiTiet"];
				$temp["DonGia"] = $food_menu["DonGia"];
				$temp["MaMonAn"] = $food_menu["MaMonAn"];
				$food = MongoDatabase::getOneDataFrom("MonAn", "MaMonAn=". $food_menu["MaMonAn"]);
				$temp["TenMonAn"] = $food["TenMonAn"];
				$result[] = $temp;
			}
		}
		
		return $result;
	}
	
	/**
	 * @param unknown_type $MaCTThucDon_MonAn
	 */
	public function getFoodByMenuFoodDetailID($MaCTThucDon_MonAn){
		$menuFoodDetail = MongoDatabase::getOneDataFrom("ChiTietThucDon_MonAn", "MaChiTiet=" . $MaCTThucDon_MonAn);
		
		$result = array();
		$result["MaChiTietThucDon_MonAn"] =  $menuFoodDetail["MaChiTiet"];
		$result["DonGia"] =  $menuFoodDetail["DonGia"];
		$result["TenMonAn"] = $this->getFoodName($menuFoodDetail["MaMonAn"]);
		
		return $result;
	}
	
	/**
	 * Get food name by food id
	 * @param unknown_type $foodID
	 * @return Ambigous <unknown>
	 */
	private function getFoodName($foodID){
		$data = MongoDatabase::getOneDataFrom("MonAn", "MaMonAn=" . $foodID);
		return $data["TenMonAn"];
	}
	
	public function getFoodAmout($MaCTThucDon_MonAn){
		$food = MongoDatabase::getOneDataFrom("ChiTietHoaDon", "MaCTTD_MA=" . $MaCTThucDon_MonAn);
		return $food["SoLuong"];
	}
} 

// hard code to test
// $dao = new FoodDAO();
// $data = $dao->getFoodAmout("CT_TD_MA01");
// echo $data;
// print_r($data);
?>