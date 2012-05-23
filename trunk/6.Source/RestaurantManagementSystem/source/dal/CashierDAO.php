<?php
require_once 'MongoDatabase.php';
/**
 * all method which're relatives to module cashier management.
 * @author Stanley
 *
 */
class CashierDAO implements IDatabaseConfig {
	/**
	 * search bill with conditions
	 * @param date $from time that's create bill.
	 * php datetime, formatted with standard ("2010-01-15 00:00:00")
	 * @param date $to
	 * php datetime, formatted with standard ("2010-01-15 00:00:00")
	 * @param int $fromValue
	 * @param int $toValue
	 */
	public function searchBill($from, $to, $fromValue, $toValue){
		$condition = $this->createConditionToSearchBill($from, $to, $fromValue, $toValue);
		
		$data = MongoDatabase::getAllDataFrom("HoaDon", $condition);
		$result = array();
		foreach ($data as $bill){
			$bill["NgayLap"] = date('Y-M-d h:i:s', $bill["NgayLap"]->sec); 
			$result[] = $bill;
		}
		return $result;
	}
	
	/**
	 * create search conditions
	 * @param MongoDate $time time that's create bill.
	 * @param int $fromValue
	 * @param int $toValue
	 * @return array condition
	 */
	private function createConditionToSearchBill($from, $to, $fromValue, $toValue){
		$arrCondition = array();
		$start = new MongoDate(strtotime($from));
		$end = new MongoDate(strtotime($to));
		
		$arrCondition["NgayLap"] = array (
				'$gte' => $start,
				'$lte' => $end
		);
		$arrCondition["TongTien"] = array(
				'$gte' => (int)$fromValue,
				'$lte' => (int)$toValue);
		
		return $arrCondition;		
	}
	
	/**
	 * get booking info by booking id
	 * @param string $bookingID
	 * @return array data
	 */
	public function getBookingInfo($bookingID){
		$condition = 'MaPhieu=' . $bookingID;
		return MongoDatabase::getOneDataFrom("PhieuDatCho", $condition);		
	}
	
	/**
	 * get booking detail by booking id
	 * @param unknown_type $booingID
	 */
	public function getBookingDetail($bookingID){
		$condition = array(
				"MaPhieu" => $bookingID
		);
		return MongoDatabase::getAllDataFrom("ChiTietDatCho", $condition);
	}
	
	public function getBillDetail($billID){
		$condition = array(
				"MaHD" => $billID
		);
		$keys = array(
				'_id' => 0,
				'MaCTTD_MA' => 1,
				'SoLuong' => 1
		);
		$MaCTTD_MAs  =  MongoDatabase::getAllDataFrom("ChiTietHoaDon", $condition, $keys);
		
		$result = array();
		$temp = array();
		foreach ($MaCTTD_MAs as $MaCTTD_MA){
			$temp["SoLuong"] = $MaCTTD_MA["SoLuong"];
			$menuFood = $this->getMenuFoodsByBill_Food_ID($MaCTTD_MA["MaCTTD_MA"]);
			$temp["DonGia"] = $menuFood["DonGia"];
			$temp["TenMonAn"] = $this->getNameOfFood($menuFood["MaMonAn"]);
			$result[] = $temp;
		}
		
		return $result;
	}
	
	/**
	 * get name of food by food id
	 * @param string $foodID
	 * @return name of food
	 */
	private function getNameOfFood($foodID){
		$condition = array(
				'MaMonAn' => $foodID
		);
		$keys = array(
				'_id' => 0,
				'TenMonAn' => 1
		);
		$data = MongoDatabase::getAllDataFrom("MonAn", $condition, $keys);
		return $data == null ? null : $data[0]["TenMonAn"];
	}
	
	/**
	 * @param string $bill_food_id bill food id
	 */
	private function getMenuFoodsByBill_Food_ID($bill_food_id){
		$condition = array(
				'MaChiTiet' => $bill_food_id
		);
		$keys = array(
				'_id' => 0
		);
		$foods = MongoDatabase::getAllDataFrom("ChiTietThucDon_MonAn", $condition, $keys);
		return $foods == null ? null : $foods[0];
	}
} 

// hard code to test
// $dao = new CashierDAO();

// $data = $dao->getBillDetail("HD001");
// print_r($data);
?>