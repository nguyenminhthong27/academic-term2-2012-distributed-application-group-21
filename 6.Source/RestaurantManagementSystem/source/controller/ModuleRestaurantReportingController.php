<?php
require '../dal/ReportDAO.php';
require_once '../configure/GeneralFunctions.php';

class ModuleRestaurantReportingController {
	
	public function makeReport($type, $range, $date){
		$dao = new ReportDAO();
		$result = array();
		$date = $this->changeFormatDate($date);
		switch($type){
			case "food":
				$result = $dao->getFoodReport($date, $range);
				break;
			case "day":
				$result =  $dao->getTotalMoneyOfDay($date, $range);
				break;
			case "month":
				$result =  $dao->getTotalMoneyOfMonth($date, $range);
				break;
			case "year":
				$result =  $dao->getTotalMoneyOfYear($date, $range);
				break;
		}
		
		if(sizeof($result) == 0){
			return "";
		}
		$jsonArr = array();
		$ele = array();
		$data = array();
		foreach($result as $res){
			$ele['id'] = $res["MaMonAn"];
			$data[0] = $res["TenMonAn"];
			$data[1] = $res["TongDoanhThu"];
			$ele['data'] = $data;
			array_push($jsonArr, $ele);
		}
		return $jsonArr;
	}
	
	/*
	 * @author thanhtuan
	* @param $datime string
	* @return string $datetime after format.
	*/
	public function changeFormatDate($date)	{
		$result = new DateTime($date);
		$result =  $result->format('Y-m-d H:i:s');
		return $result;
	}
}

// get action form request params
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "";
switch ($action){
	case "report":
		$type = isset($_REQUEST['type'])? $_REQUEST['type']: "";
		$range = isset($_REQUEST['range'])? $_REQUEST['range']: "";
		$date = isset($_REQUEST['date'])? $_REQUEST['date']: "";
		$ctl = new ModuleRestaurantReportingController();
		$result = $ctl->makeReport($type, $range, $date);
		$ctrl = new ModuleRestaurantReportingController();
		$result = $ctrl->makeReport($type, $range, $date);
		$json = json_encode($result);
// 		str
		break;
}

?>