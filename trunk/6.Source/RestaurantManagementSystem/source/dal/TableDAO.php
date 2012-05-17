<?php
require_once 'MongoDatabase.php';

/**
 * all methods that're relatives to table object
 * @author vantuanlee@gmail.com
 *
 */
class TableDAO {
	
	/**
	 * get available table
	 * @param string $restaurant local restaurant or the other
	 * @param string $areaID area
	 * @param string $status table status
	 * @param datetime $from 
	 * @param datetime $to
	 * @return array
	 */
	public function getAvailableTable($restaurant, $areaID = null, $status = null, $from, $to){
		// if status = null => status = not booked.
		$status = $status == null? 0 : $status;
	}
} 
?>