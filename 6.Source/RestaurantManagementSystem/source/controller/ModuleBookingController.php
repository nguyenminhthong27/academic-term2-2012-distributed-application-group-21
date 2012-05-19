<?php
require_once '../dal/BookingDAO.php';
require_once '../dal/TableDAO.php';
require_once '../configure/GeneralFunctions.php';
class ModuleBookingController{
	/**
	 * @author thanhtuan
	 * main search_Booking method
	 * @param $restaurant string
	 * @param $area string
	 * @param $status bit
	 * @param $from date(example 18-5-2012 7:10:00 AM)
	 * @param $to date (example 18-5-2012 9:10:00 AM)
	 * @return gui information about booking
	 * */
	public function searchAvailableTable($restaurant,$area,$status,$from,$to){
		$dao = new TableDAO() ;
		$array = $dao->getAvailableTable($restaurant,$area,$status,$from, $to);
		$data = "";
		$data = $data." <table>
		<tr>
		<th>MÃ BÀN AN</th>
		<th>TÊN KHU V?C</th>
		<th>GIÁ THÀNH</th>
		<th>S? NGU?I</th>
		<th>TÌNH TR?NG</th>
		</tr>
		<tr>  " ;
		foreach ($array as $value){

			$TenKV = isset($value["TenKV"]) ? $value["TenKV"] : "";
			$MaBanAn = isset($value["MaBanAn"]) ? $value["MaBanAn"] : "";
			$GiaThanh = isset($value["GiaThanh"]) ? $value["GiaThanh"] : "";
			$SoNguoi = isset($value["SoLuong"]) ? $value["SoLuong"] : "";
			$TinhTrang =  isset($value["TinhTrang"]) ? $value["TinhTrang"] : "";
			$TinhTrang_change = "";


			$data = $data."<td>$MaBanAn</td>";
			$data = $data."<td><a onclick='regionInfoLinkClicked();' href='#'>$TenKV</td>";
			$data = $data."<td>$GiaThanh</td>";
			$data = $data. "<td>$SoNguoi</td>";
			if($TinhTrang == "0"){
					
				$TinhTrang_change = "Chua d?t";
				$data  = $data."<td>Chua d?t</td>";
			}
			else{
					
				$data  = $data."<td><a onclick='bookingDetailLinkClicked();' href='#'>Chi ti?t</a></td>";
			}
			$data = $data."</tr>";
		}

		$data = $data."</table>";

		$data = $data ."</div>";
		return $data;
	}


	/**
	 * @author thanhtuan
	 * main detail_Booking method
	 * @param $ID string
	 * @return gui information about detail booking of table food
	 * */
	public function detailBooking($ID_Table){
		$dao = new TableDAO() ;//supose
		$array = $dao->getDetail($ID_Table);
		$data = "";
		$data = $data." <table>
		<tr>
		<th>Khách Hàng</th>
		<th>T?</th>
		<th>Ð?n</th>
		<th>Giá</th>
		</tr>
		<tr>  " ;
		foreach ($array as $value){

			$KhachHang= isset($value[""]) ? $value["TenKV"] : "";
			$Tu($value["TuThoiGian"]) ? $value["TuThoiGian"] : "";
			$Den = isset($value["DenThoiGian"]) ? $value["DenThoiGian"] : "";
			$Gia = isset($value["GiaThanh"]) ? $value["GiaThanh"] : "";

			$data = $data."<td>$KhachHang</td>";
			$data = $data."<td>$Tu</td>";
			$data = $data."<td>$Den</td>";
			$data = $data. "<td>$Gia</td>";
			$data = $data."</tr>";
		}

		$data = $data."</table>";

		$data = $data ."</div>";
		return $data;
	}
	/**
	 * @author thanhtuan
	 * main  decribe_Decoration method
	 * @param $id string
	 * @return gui information about decribe Decoration for area.
	 * */
	public function decribeDecoration($id){
		$dao = new TableDAO() ;//supose
		$result = $dao->getDecribe($ID_Table);
		$data =  "<p>Mô t? trang trí</p>";
		$data = $data."<p>$result</p>";
		return $data;
	}

	/**
	 * main save_Booking method
	 * @param $cusInfo array customer info: customer name, id number, phone number
	 * @param $tableId array
	 * @param $fromDate array
	 * @param $toDate array
	 * @author hathao298@gmail.com, thanhtuan
	 * @return return true if success else  return false
	 *  * */
	public function saveBooking($table){
		try {
			// 			foreach ($array as $value){
			// 				$dao = new TableDAO() ;//suppose
			// 				$dao->addTableTo($value); //suppose method DAO is addTableTo();
			// 			}
			// 			return true;

			//check table id
			$dao = new TableDAO();
			foreach($tableId as $id){
				$table = $dao->getTableInfo($id);
				if($table == null)	{
					echo "invalid table id";
					return false;
				}
			}

			//save data

			//add customer info

			//add booking detail
			//echo true;
			return true;
		} catch (Exception $e) {
			echo "Not Connect to database";
		}

		return false;
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
switch ($action) {
	case "searchAvailTable":
		$restaurant = isset($_REQUEST["res"]) ? $_REQUEST["res"] : "";
		$area= isset($_REQUEST["area"]) ? $_REQUEST["area"] : "";
		$status = isset($_REQUEST["status"]) ? $_REQUEST["status"] : "";
		$from= isset($_REQUEST["from"]) ? $_REQUEST["from"] : "";
		$to= isset($_REQUEST["to"]) ? $_REQUEST["to"] : "";
	
		//change format date : 2012-05-17 18:19:20
		if($from != "" && $to != ""){
			$format = new ModuleBookingController();
			$date_from = $format->changeFormatDate($from);
			$date_to =  $format->changeFormatDate($to);
		} else {
			echo "Bạn phải chọn thời gian tìm kiếm.";
			continue;
		}
	
		try {
			// do search
			$search = new ModuleBookingController();
			$SearchResult = $search->searchAvailableTable($restaurant,$area,$status,$date_from, $date_to);
			echo $SearchResult;
		} catch (Exception $e) {
			echo "Not Connect to database";
		}
		break;
		
	case "save":
		$table = isset($_REQUEST["array"]) ? $_REQUEST["array"] : "";

		//get customer info
		$cusInfo = array();
		$tableId = array();
		$fromDate = array();
		$toDate= array();

		$cusInfoKey = array("cusName" =>"HoTenKH",
				"resId" =>"MaNH",
				"cusIdNumber" =>"CMND",
				"cusPhoneNumber" =>"SDT"
		);
		$tableBookingKey=array("tableId" => "MaBanAn",
				"fromDate" => "TuThoiGian",
				"toDate" => "DenThoiGian");

		foreach($cusInfoKey as $key => $value){
			$cusInfo[$value] = isset($_REQUEST[$key]) ? $_REQUEST[$key] : "";
		}

		foreach($tableBookingKey as $key=> $value){
			${$key} =  isset($_REQUEST[$key."[]"]) ? $_REQUEST[$key."[]"] : "";
		}

		//get MaNH, NguoiTiepNhan

		// do save
		$save = new ModuleBookingController();
		$result = $save->saveBooking($table);

		echo $result;
		break;
	
	case "detail":
		$id = isset($_REQUEST["ID"]) ? $_REQUEST["ID"] : "";

		try {
			// do view detail booking
			$detail_booking = new ModuleBookingController();
			$Result = $search->detailBooking($id);
			echo $Result;
		} catch (Exception $e) {
			echo "Not Connect to database! ";
		}
		break;
	case "decribe":
		$id = isset($_REQUEST["ID"]) ? $_REQUEST["ID"] : "";

		try {
			// do detail booking
			$decribe = new ModuleBookingController();
			$Result = $decribe->decribeDecoration($id);
			echo $Result;

		} catch (Exception $e) {
			echo "Not Connect to database";
		};
		break;
	default:
		break;
}

?>