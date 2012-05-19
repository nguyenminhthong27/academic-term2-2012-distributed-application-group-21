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
		
		// insert
		try {
			MongoDatabase::addDataTo("PhieuDatCho", $arrBookingInfo);
			foreach ($arrBookingDetailInfo as $detailInfo) {
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