<?php
require '../dal/ReportDAO.php';
require_once '../configure/GeneralFunctions.php';

class ModuleRestaurantReportingController {
	
	public function makeReport($type, $range, $date){
		$dao = new ReportDAO();
		$result = array();
		$date = $this->changeFormatDate($date);
		$jsonStr = "";
		switch($type){
			case "food":
				$result = $dao->getFoodReport($date, $range);
				$jsonStr = $this->genrerateJSONForGrid($result, "MaMonAn", array("TenMonAn", "TongDoanhThu"));
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
		return $jsonStr;
	}
	
	public function genrerateJSONForGrid($dataArr, $idIndex, $dataIndexArr){		
		$result = "";
		
		foreach($dataArr as $data){
			$dataStr = "";
			foreach ($dataIndexArr as $index){				
				$dataStr = $dataStr . "'{$data[$index]}',";
			}
			$dataStr = substr($dataStr, 0, strlen($dataStr)-1);
			$result = $result . "{id:'{$data[$idIndex]}', data:['',{$dataStr}]},";			
		}
		$result = substr($result, 0, strlen($result) - 1);
		$result = "{rows:[{$result}]}";
		return $result;
	}
	
	public function generateJSONForChart($dataArr, $dataIndexArr){
		
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
		echo $result;
// 		str
		break;
}

?>