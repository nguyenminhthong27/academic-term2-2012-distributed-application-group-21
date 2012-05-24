<?php
require_once 'MongoDatabase.php';

/**
 * all methods that're relatives to "DatCho" object
 * @author vantuanlee@gmail.com
 *
 */
class BookingDAO {
	/**
	 * @param array $arrBookingInfo content data to insert to PhieuDatCho collection
	 * @param unknown_type $arrBookingDetailInfo content data to insert to ChiTietDatCho collection
	 * return true if success and otherwise 
	 */
	public function save($arrBookingInfo, $arrBookingDetailInfo){
		// check input
		$arrBookingInfo["NgayLap"] = new MongoDate(strtotime($arrBookingInfo["NgayLap"]));
		
		// convert date time string to MongoDate
		$temp = array();	
		foreach($arrBookingDetailInfo as $bookingDetailInfo){			
			$bookingDetailInfo["TuThoiGian"] = new MongoDate(strtotime($bookingDetailInfo["TuThoiGian"]));
			$bookingDetailInfo["DenThoiGian"] = new MongoDate(strtotime($bookingDetailInfo["DenThoiGian"]));
			$temp[] = $bookingDetailInfo;
		}
		// insert
		try {
			MongoDatabase::addDataTo("PhieuDatCho", $arrBookingInfo);
			foreach ($temp as $detailInfo) {
				MongoDatabase::addDataTo("ChiTietDatCho", $detailInfo);
			}			
			return true;
		} catch (Exception $e) {
			return false;
		}
		return false;
	}
	
	
	/**
	 * search all booking with datetime, customer name or customer id.
	 * @param string $date
	 * @param string $cusName
	 * @param string $cusID
	 * @return array booking info.
	 */
	public function search($from, $to, $cusName, $cusID){
		$condition = $this->createConditionToSearch($from, $to, $cusName, $cusID);
		$data =  MongoDatabase::getAllDataFrom("PhieuDatCho", $condition);
		
		$result = array();
		foreach($data as $booking){
			$booking["NgayLap"] = date('Y-M-d h:i:s', $booking["NgayLap"]->sec);
			$result[] = $booking;
		}
		
		return $result;
	}
	
	
	/**
	 * create condition with datetime, customer name, custormer id to searching
	 * @param string $date
	 * @param string $cusName
	 * @param string $cusID
	 * @return array condition
	 */
	private function createConditionToSearch($from, $to, $cusName, $cusID){
		$condition = array();
		if ($from != null && $to != null) {
			$condition["NgayLap"] = array(
					'$gte' => new MongoDate(strtotime($from)),
					'$lte' => new MongoDate(strtotime($to))
					);
		}
		if ($cusName != null) {
			//$condition["HoTenKH"] = "/" . $cusName . "/i"; // RegEx, search with case insensitive.
			$regex = "/" . $cusName . "/iu";
			$condition["HoTenKH"] = new MongoRegEx($regex);
		}
		if ($cusID != null) {
			$condition["CMND"] = "/" . $cusID . "/i"; // RegEx, search with case insensitive
		}
		
		return $condition;
	}
}


// hard code to test
// $dao = new BookingDAO();
// $data = $dao->search("2012-05-23", "2012-05-24", null, null);
// print_r($data);
?>