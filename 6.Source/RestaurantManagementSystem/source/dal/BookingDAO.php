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
}
?>