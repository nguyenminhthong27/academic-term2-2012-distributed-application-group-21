<?php
require_once 'Mongodatabase.php';
class BillDAO{
	/** save bill
	 * @param array $data
	 * @return boolean
	 */
	public function saveBill($data){
		return MongoDatabase::addDataTo("HoaDon", $data);
	}
	
	/**
	 * save bill detail
	 * @param array $data
	 * @return boolean
	 */
	public function saveBillDetail($data){
		return MongoDatabase::addDataTo("ChiTietHoaDon", $data);	
	}
} 
?>