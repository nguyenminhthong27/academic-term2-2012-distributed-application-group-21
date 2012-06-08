<?php
require_once '../dal/billdao.php';
require_once '../dal/bookingdao.php';
require_once '../dal/fooddao.php';

class ModuleCreateBillController{
	/**
	 * method  getListDish() get all Dish of restaurants
	 * @param no
	 * @return Gui html
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
			$data = $data."<td><input type='checkbox' value=\"" . $value["MaChiTietThucDon_MonAn"]. "\"></input></td>";
			$data = $data."<td>$TenMonAn</td>";
			$data = $data."<td>$DonGia</td>";
			$data = $data."</tr>";
		}
		$data = $data."</table>";
		return $data;
	}

	/**
	 * method  searchBooking by date, customer name, customer id, customner phone
	 * @param $date
	 * @param $customerName
	 * @param $id (CMND)
	 * @param $numberphone
	 * @return Gui html
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

	/**
	 * save bill
	 * @param unknown_type $MaCTThucDon_MonAns
	 * @param unknown_type $amounts
	 * @param unknown_type $totalValue
	 * @author vantuanlee@gmail.com
	 */
	public function saveBill($bookingID, $MaCTThucDon_MonAns, $amounts, $totalValue){
		$idSize = count($MaCTThucDon_MonAns);
		$amountSize = count($amounts);
		if ($idSize != $amountSize) {
			return;
		}

		// saving importing info
		// 1. Get currently staff and restaurant
		session_start();
		$currentStaff = isset($_SESSION['staff_id']) ? $_SESSION['staff_id'] : null;
		$restaurant = isset($_SESSION['restaurant']) ? $_SESSION['restaurant'] : null;
		
		if ($currentStaff == null || $restaurant == null) {
			return;
		}

		// 2. get date
		$date = new MongoDate(strtotime(date('Y-m-d H:i:s')));
		$billID = "HD" . date('YmdHis');
		$billInfo = array(
				'MaHD' => $billID,
				'MaNH' => $restaurant,
				'MaPhieuDatCho' => $bookingID,
				'NgayLap' => $date,
				'NguoiLap' => $currentStaff,
				'TinhTrang' => 0,
				'TongTien' => $totalValue
				);
		
		// 3. insert bill info
		$dao = new BillDAO();
		if ($dao->saveBill($billInfo) == false) {
			return false;
		}
		
		// 4. insert bill detail info
		$temp = array(
				'MaHD' => $billID,
				'MaNH' => $restaurant
				);
		for ($i = 0; $i < $idSize; $i++) {
			$temp["MaCTTD_MA"] = $MaCTThucDon_MonAns[$i];
			$temp["SoLuong"] = $amounts[$i];
			if ($dao->saveBillDetail($temp) == false) {
				return false;
			}
		}
		return true;
	}

	/**
	 * method change format of a date
	 * @author thanhtuan
	 * @param $datime string
	 * @return string $datetime after format.
	 */
	public function changeFormatDate($date)	{
		$result = new DateTime($date);
		$result =  $result->format('Y-m-d H:i:s');
		return $result;
	}

	/**
	 * show html table for selected food.
	 * @param unknown_type $MaCTThucDon_MonAns
	 */
	public function htmlShowFoodSelectedTable($MaCTThucDon_MonAns){
		$html = "<table>
		<tr>
		<th>Món ăn</th>
		<th>Giá thành</th>
		<th>Số lượng</th>
		</tr>";

		$dao = new FoodDAO();

		foreach ($MaCTThucDon_MonAns as $MaCTThucDon_MonAn){
			$data = $dao->getFoodByMenuFoodDetailID($MaCTThucDon_MonAn);
			// generate html
			$html .= "<tr><td>" . $data["TenMonAn"] . "</td>";
			$html .= "<td>" . $data["DonGia"] . "</td>";
			$html .= '
			<td><input id="'  . $data["MaChiTietThucDon_MonAn"] . '" type="text"></input></td>
			</tr>
			';
		}
		$html .= '</table>';
		return $html;
	}

	/**
	 * show table html food info confirmation.
	 * @param unknown_type $MaCTThucDon_MonAns
	 * @param unknown_type $amounts
	 */
	public function htmlShowFoodInfoConfirmTable($MaCTThucDon_MonAns, $amounts, $bookingID){
		$idSize = count($MaCTThucDon_MonAns);
		$amountSize = count($amounts);
		if ($idSize != $amountSize) {
			return;
		}

		$html = '<table>
		<tr>
		<th>Món ăn</th>
		<th>Đơn giá</th>
		<th>Số lượng</th>
		<th>Thành tiền</th>
		</tr>';

		$total = 0;
		$dao = new FoodDAO();
		for ($i = 0; $i < $idSize; $i++) {
			$data = $dao->getFoodByMenuFoodDetailID($MaCTThucDon_MonAns[$i]);
			$value = $amounts[$i] * $data["DonGia"];
			$total += $value;
			// generate html
			$html .= "<tr><td class='cell_import' value=\"" . $data["MaChiTietThucDon_MonAn"] . "\">" . $data["TenMonAn"] . "</td>";
			$html .= '
			<td class="cell_import">' . $data["DonGia"] . '</td>
			<td class="cell_import">' . $amounts[$i] . '</td>
			<td class="cell_import">' . $value . '</td>
			</tr>
			';
		}
		$html .= '</table>';

		$overview = '<p>Xin xác nhận lại thông tin đã nhập và nhấp "Lưu"</p>';
		$overview .= '<table>
		<tr>
		<td>Ngày lập</td>
		<td>' . date("Y-m-d H:i:s");
		$overview .= '</td>
		</tr>
		<tr>
		<td>Mã phiếu đặt chỗ</td>
		<td>' . $bookingID;

		$overview .= '</td>
		</tr>
		<tr>
		<td>Tổng tiền</td>
		<td id="total">' . $total;

		$overview .= '</td>
		</tr>
		</table>';

		return $overview . $html;
	}
}


//get action form request params
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "";
switch ($action) {
	case "searchDish":
		$date = isset($_REQUEST["date"]) ? $_REQUEST["date"] : "";
		$ctrl = new ModuleCreateBillController();
		if($date != ""){
			$date = $ctrl->changeFormatDate($date);
		}
		try {
			// do search
			$result = $ctrl->getListDish($date);
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

		$ctrl = new ModuleCreateBillController();
		if($date != ""){
			$date = $ctrl->changeFormatDate($date);
		} else {
			echo "Bạn phải chọn thời gian tìm kiếm.";
			continue;
		}

		try {
			// do search
			$result = $ctrl->searchBooking($date, $customerName, $customerID, $customerPhone);
			echo $result;
		} catch (Exception $e) {
			echo "Not Connect to database";
		}
		break;
	case 'selectFood':
		$valArr= isset($_REQUEST["MaCTThucDon_MonAns"]) ? $_REQUEST["MaCTThucDon_MonAns"]: "";
		if ($valArr == null) {
			continue;
		}
		$MaCTThucDon_MonAns = array();
		foreach($valArr as $val){
			$MaCTThucDon_MonAns []= $val;
		}

		try {
			$ctrl = new ModuleCreateBillController();
			$result = $ctrl->htmlShowFoodSelectedTable($MaCTThucDon_MonAns);
			echo $result;
		}
		catch (Exception $e) {
			echo "Not Connect to database! ";
		}
		break;
	case 'inputFoodAmount':
		// get IDs
		$valArr= isset($_REQUEST["MaCTThucDon_MonAns"]) ? $_REQUEST["MaCTThucDon_MonAns"]: "";
		if ($valArr == null) {
			continue;
		}
		$MaCTThucDon_MonAns = array();
		foreach($valArr as $val){
			$MaCTThucDon_MonAns []= $val;
		}

		// get amounts
		$valArr= isset($_REQUEST["amount"]) ? $_REQUEST["amount"]: "";
		if ($valArr == null) {
			continue;
		}
		$amounts = array();
		foreach($valArr as $val){
			$amounts []= $val;
		}

		// get booking ID
		$bookingID = isset($_REQUEST["bookingID"]) ? $_REQUEST["bookingID"] : null;
		
		try {
			$ctrl = new ModuleCreateBillController();
			$result = $ctrl->htmlShowFoodInfoConfirmTable($MaCTThucDon_MonAns, $amounts, $bookingID);
			echo $result;
		}
		catch (Exception $e) {
			echo "Not Connect to database! ";
		}
		break;
	case "saveBill":
		// get IDs
		$valArr= isset($_REQUEST["MaCTThucDon_MonAns"]) ? $_REQUEST["MaCTThucDon_MonAns"]: "";
		if ($valArr == null) {
			continue;
		}
		$MaCTThucDon_MonAns = array();
		foreach($valArr as $val){
			$MaCTThucDon_MonAns []= $val;
		}

		// get amounts
		$valArr= isset($_REQUEST["amount"]) ? $_REQUEST["amount"]: "";
		if ($valArr == null) {
			continue;
		}
		$amounts = array();
		foreach($valArr as $val){
			$amounts []= $val;
		}

		// get total value
		$totalValue = isset($_REQUEST["total"]) ? $_REQUEST["total"] : null;
		
		// get booking ID
		$bookingID = isset($_REQUEST["bookingID"]) ? $_REQUEST["bookingID"] : null;

		try {
			$ctrl = new ModuleCreateBillController();
			$result = $ctrl->saveBill($bookingID, $MaCTThucDon_MonAns, $amounts, (int)$totalValue);
			if ($result == true) {
				echo "Thêm hóa đơn thành công.";
			} else {
				echo "Thêm hóa đơn không thành công.";
			}
		}
		catch (Exception $e) {
			echo "Not Connect to database! ";
		}
		break;
	default:
		break;
}
?>