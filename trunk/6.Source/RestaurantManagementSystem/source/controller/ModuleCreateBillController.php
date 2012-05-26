<?php

require_once '../dal/bookingdao.php';
require_once '../dal/fooddao.php';

class CreateBillController{
	/**
	 * method  getListDish() get all Dish of restaurants
	 * @param no
	 *  @return Gui html
	 * @author thanhtuan
	 */
	public function getListDish($date){
		// make $to from $from
		$from = new DateTime($date);
		$to = new DateTime($date);
		$to->modify("+1 day");
		
		$dao = new FoodDAO();
		$arr = $dao->getListFoodWithUnitPrice($from->format('Y-m-d H:i:s'), $to->format('Y-m-d H:i:s'));
		$data = "<p>Chọn món ăn nhập vào hóa đơn</p>";
		$data .= "<table>
		<tr>
		<th><input type='checkbox' id='checkAllCBox' onclick='checkAllCBoxClicked();'></input></th>
		<th>Món ăn</th>
		<th>Giá thành</th>
		</tr>";
		foreach ($arr as $value){
			$TenMonAn = isset($value["TenMonAn"]) ? $value["TenMonAn"] : "";
			$DonGia = isset($value["DonGia"]) ? $value["DonGia"] : "";
			$data = $data."<tr>";
			$data = $data."<td><input type='checkbox'></input></td>";
			$data = $data."<td>$TenMonAn</td>";
			$data = $data."<td>$DonGia</td>";
			$data = $data."</tr>";
		}
		$data = $data."</table>";
		
		$data .= '<button class="nextBut" id="addFoodAmountBut">Nhập số lượng</button>';
		return $data;
	}
	/**
	 * method  searchBooking by date, customer name, customer id, customner phone
	 * @param $date
	 * @param $customerName
	 * @param $id (CMND)
	 * @param $numberphone
	 *  @return Gui html
	 * @author thanhtuan
	 */
	public  function searchBooking($date,$customerName,$id,$numberphone){
		// make $to from $from
		$from = new DateTime($date);
		$to = new DateTime($date);
		$to->modify("+1 day");
		
		$dao = new BookingDAO();
		$arr = $dao->search($from->format('Y-m-d H:i:s'), $to->format('Y-m-d H:i:s'), $customerName, $id);
		$data = "";
		$data = $data."<table>
		<table>
		<tr>
		<th>Mã phiếu</th>
		<th>Ngày lập</th>
		<th>Họ tên khách hàng</th>
		<th>Số CMND</th>
		<th>Số điện thoại</th>
		<th>Người tiếp nhận</th>
		</tr>";
		foreach($arr as $value){
			$MaPhieu = isset($value["MaPhieu"]) ? $value["MaPhieu"] : "";
			$NgayLap = isset($value["NgayLap"]) ? $value["NgayLap"] : "";
			$HoTenKH = isset($value["HoTenKH"]) ? $value["HoTenKH"] : "";
			$CMND = isset($value["CMND"]) ? $value["CMND"] : "";
			$SDT = isset($value["SDT"]) ? $value["SDT"] : "";
			$NguoiTiepNhan = isset($value["NguoiTiepNhan"]) ? $value["NguoiTiepNhan"] : "";
			$data = $data."<tr>";
			$data = $data."<td><a href='javascript:selectBooking(\"" . $MaPhieu. "\")'>$MaPhieu</a></td>";
			$data = $data."<td>$NgayLap</td>";
			$data = $data."<td>$HoTenKH</td>";
			$data = $data."<td>$CMND</td>";
			$data = $data."<td>$SDT</td>";
			$data = $data."<td>$NguoiTiepNhan</td>";
			$data = $data."</tr>";
		}
		$data = $data."</table>";
		return $data;

	}
	/*
	 * @author: thanhtuan
	* method saveBill save a bill,billdetail and status of bill = 0(do DAO status(HoaDon) = 0)
	* @param: $idBill string
	* @param: $tatalMoney : float (sum money of all dishes)
	*  @param : $date (date of)
	* @param :restaurant_id string (ID of restaurant)
	* @param:cardBooking_id : string (ID of booking)
	* @param :$idCardBooking : string
	* return true if succes else return false
	*/
	public function saveBill($idBill,$Restaurant_id,$date,$idCardBooking,$totalMoney,$listDish){

		try {
				
				
			$dao = new CreateBillDAO();
			$bool = $dao->checkBooking($idCardBooking);//check exist of card booking,recive value = true if card booking exist else value = false
			if($bool== true)
			{
				return $dao->save($idBill,$Restaurant_id,$date,$idCardBooking,$totalMoney,$listDish);
			}
			else
				return false;

		}
		catch(Exception $e) {
			echo "Not Connect to database";
		}
		return false;
	}
	/*
	* @author thanhtuan
	* method change format of a date
	* @param $datime string
	* @return string $datetime after format.
	*/
	public function changeFormatDate($date)	{
		$result = new DateTime($date);
		$result =  $result->format('Y-m-d H:i:s');
		return $result;
	}
}
//get action form request params
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "";
switch ($action) {
	case "searchDish":
		$date = isset($_REQUEST["date"]) ? $_REQUEST["date"] : "";
		if($date != ""){
			$format = new CreateBillController();
			$date = $format->changeFormatDate($date);
		}
		try {
			// do search
			$search = new CreateBillController();
			$result = $search->getListDish($date);
			echo $result;
		} catch (Exception $e) {
			echo "Not Connect to database";
		}
		break;
	case "searchBooking":
		$date = isset($_REQUEST["date"]) ? $_REQUEST["date"] : "";
		$customerName= isset($_REQUEST["cus_name"]) ? $_REQUEST["cus_name"] : "";
		$customerID = isset($_REQUEST["cus_id"]) ? $_REQUEST["cus_id"] : "";
		$customerPhone= isset($_REQUEST["cus_phone"]) ? $_REQUEST["cus_phone"] : "";
		if($date != ""){
			$format = new CreateBillController();
			$date = $format->changeFormatDate($date);
		} else {
			echo "Bạn phải chọn thời gian tìm kiếm.";
			continue;
		}

		try {
			// do search
			$search = new CreateBillController();
			$result = $search->searchBooking($date, $customerName, $customerID, $customerPhone);
			echo $result;
		} catch (Exception $e) {
			echo "Not Connect to database";
		}
		break;
	case "saveBill":
		
		$date = isset($_REQUEST["date"]) ? $_REQUEST["date"] : "";
		$idCardBooking= isset($_REQUEST["cardBooking_id"]) ? $_REQUEST["cardBooking_id"] : "";
		// a array 2 dim contain dish name,price,quantity
		$listDish = isset($_REQUEST["listDish"]) ? $_REQUEST["listDish"] : "";
		$totalMoney  = 0;
		foreach($listDish as $value){
			$totalMoney = $totalMoney + ($value[1] *$value[2]); 
		}
		session_start();
		$Restaurant_id = $_SESSION["restaurant"];
		$staff_id = $_SESSION["staff_id"];
		$idBill = time();
		if($date != ""){
			$format = new CreateBillController();
			$date = $format->changeFormatDate($date);

		} else {
			echo "Bạn phải chọn thời gian nhập vào!";
			continue;
		}
		try {
			// do save
			$save = new CreateBillController();
			$result = $save->saveBill($idBill,$Restaurant_id,$date, $idCardBooking,$totalMoney,$listDish);
			echo $result;
		} catch (Exception $e) {
			echo "Not Connect to database";
		}
		break;
	default:
		break;
}
?>