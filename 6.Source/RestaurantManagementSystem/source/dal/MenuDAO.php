<?php 
require_once 'MongoDatabase.php';
/**
 * 
 * @author Stanley
 *
 */
class MenuDAO {
	public function getAllMenu(){
		return MongoDatabase::getAllDataFrom("ThucDon");
	}
	
	public function getAllYearOnMenu(){
		$menus = $this->getAllMenu();
		$years = array();
		foreach ($menus as $menu){
			$date = date_parse_from_format("Y-m-d H:i:s", date('Y-M-d h:i:s', $menu["NgayLap"]->sec));
			$year = $date["year"];
			if (!array_key_exists($year, $years)) {
				$years[$year] = $year;
			}
		}
		return $years;
	}
}

// hard code to test 
// $dao = new MenuDAO();
// $data = $dao->getAllYearOnMenu();
// echo print_r($data);
?>