<?php
require_once 'MongoDatabase.php';
class ReportDAO {
	
	/**
	 * get food report
	 * @param $date datetime - datetime to make report
	 * @param $type 0 - all - don't care about the datetime 
	 * @param $type 1 - get date of $date
	 * @param $type 2 - get month of date
	 * @param $type 3 - get year of date
	 * @return dataArr - foodName and total money
	 */
	public function getFoodReport($date, $type){
		
	}
	
	/**
	 * get total money of day
	 * @param $date datetime - datetime to make report
	 * @param $type 0 - all - don't care about the datetime
	 * @param $type 1 - get date of $date
	 * @param $type 2 - get month of date
	 * @param $type 3 - get year of date
	 * @return dataArr - day and money total
	 */
	public function getTotalMoneyOfDay($date, $type){
		
	}
	
	/**
	 * get total money of month
	 * @param $date datetime - datetime to make report
	 * @param $type 0 - all - don't care about the datetime
	 * @param $type 1 - get date of $date (don't care about this - error)
	 * @param $type 2 - get month of date
	 * @param $type 3 - get year of date
	 * @return dataArr - day and money total
	 */
	public function getTotalMoneyOfMonth($date, $type){
	
	}
	
	/**
	 * get total money of year
	 * @param $date datetime - datetime to make report
	 * @param $type 0 - all - don't care about the datetime
	 * @param $type 1 - get date of $date (don't care about this - error)
	 * @param $type 2 - get month of date (don't care about this - error)
	 * @param $type 3 - get year of date
	 * @return dataArr - day and money total
	 */
	public function getTotalMoneyOfYear($date, $type){
	
	}
}
?>