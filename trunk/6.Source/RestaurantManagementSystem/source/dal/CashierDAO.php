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
		//$condition = $this->createConditionToSearchBill($from, $to, $fromValue, $toValue);
		
		//return MongoDatabase::getAllDataFrom("HoaDon", $condition);
		$conn = new Mongo(IDatabaseConfig::Host);
		$db = $conn->selectDB(IDatabaseConfig::DbName);
		return $db->execute('function(manv) {return db.NhanVien.findOne({MaNV : manv});}', array("NV0001"));
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
				'$lte' => $end);
		$arrCondition["TongTien"] = array(
				'$gte' => $fromValue,
				'$lte' => $toValue);
		
		return $arrCondition;		
	}
} 

// hard code to test
// $dao = new CashierDAO();
// $date = new MongoDate(strtotime("2012-05-01 00:00:00"));
// print_r($date);
// $data = $dao->searchBill("2012-05-01 00:00:00", "2012-05-01 23:59:59", 0, 2000000);
// print_r($data);
?>