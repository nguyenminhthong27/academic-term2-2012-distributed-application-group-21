<?php
require_once 'MongoDatabase.php';
require_once 'FoodDAO.php';
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
		$date = date_parse_from_format("Y-m-d H:i:s", $date);
		$month = $date["month"];
		$year = $date["year"];

		switch ($type){
			case 1: // Get date of #date
				// 1. Get all food on the date.
				$fromDate = new MongoDate(strtotime($date));
				$toDate = new MongoDate(strtotime($date));
				return $this->staticticsFoodByTime($fromDate, $toDate);
				break;
			case 2: // Get month of #date
				$fromMonth = date("Y-m-d H:i:s", mktime(0, 0, 0, $month, 1, $year));
				$toMonth = date("Y-m-d H:i:s", mktime(0, 0, 0, $month + 1, 1, $year));
				$fromMonth = new MongoDate(strtotime($fromMonth));
				$toMonth = new MongoDate(strtotime($toMonth));

				return $this->staticticsFoodByTime($fromMonth, $toMonth);
				break;
			case 3: // Get year of #date
				$fromYear = new MongoDate(strtotime(date("Y-m-d H:i:s", mktime(0, 0, 0, 1, 1, $year))));
				$toYear = new MongoDate(strtotime(date("Y-m-d H:i:s", mktime(0, 0, 0, 12, 31, $year))));
				return $this->staticticsFoodByTime($fromYear, $toYear);
			default:
				return null;
				break;
		}
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
		$date = date_parse_from_format("Y-m-d H:i:s", $date);
		$month = $date["month"];
		$year = $date["year"];
		
		// Get number of days of the selected month
		$num = cal_days_in_month(CAL_GREGORIAN, $month, $year);
		$result = array();
		for ($i = 0; $i < $num; $i++) {
			$fromDate = new MongoDate(strtotime(date("Y-m-d H:i:s", mktime(0, 0, 0, $month, $i, $year))));
			$toDate = new MongoDate(strtotime(date("Y-m-d H:i:s", mktime(23, 59, 59, $month, $i, $year))));
			$result []= $this->staticticsFoodByTime($fromYear, $toYear);			
		} 
		
		return $result;
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

	/**
	 * Statictics by time.
	 * @param MongoDate $from
	 * @param MongoDate $to
	 * @return array
	 */
	private function staticticsFoodByTime($from, $to){
		$fDao = new FoodDAO();
		$foodWithUnitPrices  = $fDao->getListFoodWithUnitPrice($from, $to);
		// 2. Compute total values
		$result = array();
		foreach ($foodWithUnitPrices as $key => $food){
			$temp["MaMonAn"] = $food["MaMonAn"];
			$temp["TenMonAn"] = $food["TenMonAn"];
			$temp["TongDoanhThu"] = $fDao->getFoodAmout($food["MaCTTD_MA"]);
			$result[] = $temp;
		}
		return $result;
	}
}
?>