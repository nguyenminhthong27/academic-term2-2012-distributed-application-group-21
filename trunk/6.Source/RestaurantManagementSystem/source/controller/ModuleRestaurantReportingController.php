<?php
require '../dal/ReportDAO.php';
require_once '../configure/GeneralFunctions.php';

class ModuleRestaurantReportingController {
	
	public function makeReport($type, $range, $date){
		$dao = new ReportDAO();
		$result = array();
		switch($type){
			case "food":
				$result = $dao->getFoodReport($date, $type);
				break;
			case "day":
				$result =  $dao->getTotalMoneyOfDay($date, $type);
				break;
			case "month":
				$result =  $dao->getTotalMoneyOfMonth($date, $type);
				break;
			case "year":
				$result =  $dao->getTotalMoneyOfYear($date, $type);
				break;
		}
		
		if(sizeof($result) == 0){
			return "";
		}
		$jsonArr = array();
		$ele = array();
		$data = array();
		foreach($result as $res){
			$ele['id'] = $res[0];
			$data[0] = $res[0];
			$data[1] = $res[1];
			$ele['data'] = $data;
			array_push($jsonArr, $ele);
		}
		return $jsonArr;
	}
}

// get action form request params
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "";
switch ($action){
	case "report":
		$type = isset($_REQUEST['type'])? $_REQUEST['type']: "";
		$range = isset($_REQUEST['range'])? $_REQUEST['range']: "";
		$date = isset($_REQUEST['date'])? $_REQUEST['date']: "";
		$result = makeReport($type, $range, $date);
		echo json_encode($result);
		break;
}

?>