<?php
require_once 'MongoDatabase.php';
require_once 'FoodDAO.php';
require_once 'MenuDao.php';
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
		$arrDate = date_parse_from_format("Y-m-d H:i:s", $date);
		$day = $arrDate["day"];
		$month = $arrDate["month"];
		$year = $arrDate["year"];

		switch ($type){
			case 1: // Get date of #date
				// 1. Get all food on the date.
				$fromDate = date("Y-m-d H:i:s", mktime(0, 0, 0, $month, $day -1, $year));
				$toDate = date("Y-m-d H:i:s", mktime(0, 0, 0, $month, $day + 1, $year));
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
			$result []= $this->staticticsFoodByTime($fromDate, $toDate);
		}

		return $result;
	}

	/**
	 * get total money of day
	 * @param $date datetime - datetime to make report
	 * @param $type 0 - all - don't care about the datetime
	 * @param $type 1 - get date of $date
	 * @param $type 2 - get month of date
	 * @param $type 3 - get year of date
	 * @return dataArr - days on month and money total
	 */
	public function staticticsByDays($date, $type){
		$date = date_parse_from_format("Y-m-d H:i:s", $date);
		$month = $date["month"];
		$year = $date["year"];

		// Get number of days of the selected month
		$num = cal_days_in_month(CAL_GREGORIAN, $month, $year);
		$result = array();
		for ($i = 0; $i < $num; $i++) {
			$fromDate = new MongoDate(strtotime(date("Y-m-d H:i:s", mktime(0, 0, 0, $month, $i, $year))));
			$toDate = new MongoDate(strtotime(date("Y-m-d H:i:s", mktime(23, 59, 59, $month, $i, $year))));
			$foods = $this->staticticsFoodByTime($fromDate, $toDate);

			$totalValue = 0;
			foreach ($foods as $food){
				$totalValue += $food["TongDoanhThu"];
			}
			$result []= $totalValue;
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
	 * @return dataArr - months in year and money total
	 */
	public function staticticsByMonths($date, $type){
		$date = date_parse_from_format("Y-m-d H:i:s", $date);
		$month = $date["month"];
		$year = $date["year"];

		$result = array();
		for ($i = 0; $i < 12; $i++) {
			$fromMonth = new MongoDate(strtotime(date("Y-m-d H:i:s", mktime(0, 0, 0, $i, 1, $year))));
			$toMonth = new MongoDate(strtotime(date("Y-m-d H:i:s", mktime(0, 0, 0, $i + 1, 1, $year))));

			$foods = $this->staticticsFoodByTime($fromMonth, $toMonth);
			$revenues = 0;
			foreach ($foods as $food){
				$revenues += $food["TongDoanhThu"];
			}
			$result []=  $revenues;
		}

		return $result;
	}

	/**
	 * statictics by years.
	 * @return array year => revenues
	 */
	public function staticticsByYears(){
		$menuDao = new MenuDAO();
		$years = $menuDao->getAllYearOnMenu();

		$result = array();
		for ($i = 0; $i < 12; $i++) {
			$fromMonth = date("Y-m-d H:i:s", mktime(0, 0, 0, $i, 1, $year));
			$toMonth = date("Y-m-d H:i:s", mktime(0, 0, 0, $i + 1, 1, $year));

			$foods = $this->staticticsFoodByTime($fromYear, $toYear);
			$revenues = 0;
			foreach ($foods as $food){
				$revenues += $food["TongDoanhThu"];
			}
			$result[$year] = $revenues;
		}
		return $result;
	}

	/**
	 * Statictics by time.
	 * @param MongoDate $from
	 * @param MongoDate $to
	 * @return array
	 */
	private function staticticsFoodByTime($from, $to){
		$fDao = new FoodDAO();
				$d = new MongoDate(strtotime($to));
		// 		echo date("Y-m-d H:i:s", $d->sec);
		$foodWithUnitPrices  = $fDao->getListFoodWithUnitPrice($from, $to);
		// 2. Compute total values
		$result = array();
		foreach ($foodWithUnitPrices as $key => $food){
			$temp["MaMonAn"] = $food["MaMonAn"];
			$temp["TenMonAn"] = $food["TenMonAn"];
			$revenues = $fDao->getFoodAmout($food["MaChiTietThucDon_MonAn"]);
			$temp["TongDoanhThu"] = $revenues == null ? 0 : $revenues;
			$result[] = $temp;
		}
		return $result;
	}
}
?>