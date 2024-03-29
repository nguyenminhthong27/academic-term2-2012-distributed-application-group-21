<?php
require_once '../dal/CashierDAO.php';

class ModuleCashierController{

	/**
	 * @param date $from
	 * @param int $totalMoneyFrom
	 * @param int $totalMoneyTo
	 * @return string
	 * @author thanhtuan
	 */
	public function searchBill($fromText,$totalMoneyFrom,$totalMoneyTo){
		// make $to from $from
		$from = new DateTime($fromText);
		$to = new DateTime($fromText);
		$to->modify("+1 day");

		// search bill
		$dao = new CashierDAO();
		$array = $dao->searchBill($from->format('Y-m-d H:i:s'), $to->format('Y-m-d H:i:s'), $totalMoneyFrom,$totalMoneyTo);
		// $data for unpaid bills
		$data = "";
		$data = $data."<div>
		<fieldset>
		<legend>Hóa đơn chưa thanh toán</legend>
		<table class='unpaid-bill-table'>
		<tr>
		<th></th>
		<th></th>
		<th></th>
		<th>MÃ HÓA ĐƠN</th>
		<th>NGÀY LẬP</th>
		<th>TỔNG TIỀN</th>
		<th>MÃ PHIẾU ĐẶT CHỖ</th>
		</tr>";
		//// $data for paid bills
		$data1 = "";
		$data1 = $data1."<div>
		<fieldset>
		<legend>Hóa đơn đã thanh toán</legend>
		<table class='paid-bill-table'>
		<tr>
		<th></th>
		<th></th>
		<th></th>
		<th>MÃ HÓA ĐƠN</th>
		<th>NGÀY LẬP</th>
		<th>TỔNG TIỀN</th>
		<th>MÃ PHIẾU ĐẶT CHỖ</th>
		</tr>";

		// do add data into table
		foreach($array as $value){

			$TinhTrang =  isset($value["TinhTrang"]) ? $value["TinhTrang"] : "";

			$MaHD = isset($value["MaHD"]) ? $value["MaHD"] : "";
			$NgayLap = isset($value["NgayLap"]) ? $value["NgayLap"] : "";
			$TongTien = isset($value["TongTien"]) ? $value["TongTien"] : "";
			$MaPhieu = isset($value["MaPhieuDatCho"]) ? $value["MaPhieuDatCho"] : "";
			if($TinhTrang == 0)
			{
				$data = $data."<tr>";
				$data = $data."<td><a onclick='payForBill(\"" . $MaHD . "\")'title= 'Thanh toán'><img src='../css/images/calculatorIcon.png'/></a></td>";
				$data = $data."<td><a onclick='deleteConfirm(\"" . $MaHD . "\")' title='Xóa hóa đơn'><img src='../css/images/trashIcon.png'/></a></td>";
				$data = $data."<td><a onclick='viewBillDetail(\"" . $MaHD . "\")' title='Xem chi tiết'><img src='../css/images/infoIcon.png'/></a></td>";
				$data = $data."<td>$MaHD</td>";
				$data = $data."<td>$NgayLap</td>";
				$data = $data."<td>$TongTien</td>";
				$data = $data."<td><a onclick='viewBookingNoteDetail(\"" . $MaPhieu . "\")'>$MaPhieu</a></td>";
				$data = $data."</tr>";
			}
			else {
				$data1 = $data1."<tr>";
				$data1 = $data1."<td></td>";
				$data1 = $data1."<td><a onclick='deleteConfirm(\"" . $MaHD . "\")' title='Xóa hóa đơn'><img src='../css/images/trashIcon.png'/></a></td>";
				$data1 = $data1."<td><a onclick='viewBillDetail(\"" . $MaHD . "\")' title='Xem chi tiết'><img src='../css/images/infoIcon.png'/></a></td>";
				$data1 = $data1."<td>$MaHD</td>";
				$data1 = $data1."<td>$NgayLap</td>";
				$data1 = $data1."<td>$TongTien</td>";
				$data1 = $data1."<td><a onclick='viewBookingNoteDetail(\"" . $MaPhieu . "\")'>$MaPhieu</a></td>";
				$data1 = $data1."</tr>";
			}
		}
		$data = $data."</table>
		</fieldset>
		</div>";
		$data1 = $data1."</table>
		</fieldset>
		</div>";
		// then add $data and $data1 into $data
		$data = $data.$data1;
		return $data;
	}
	/*
	 * @author thanhtuan
	* method view detail bill details
	* @parram $id(of billing)
	* @return Gui contain information bout detail billing
	*/
	public function viewBillDetail($id){

		$dao = new CashierDAO() ;
		// get detail billing from  Dao
		$array = $dao->getBillDetail($id);
		$data = "";
		$data = $data."<table>
		<tr>
		<th>Món ăn</th>
		<th>Đơn giá(VND)</th>
		<th>Số lượng</th>
		<th>Thành tiền(VND)</th>
		</tr>";
		foreach($array as $value){
			$MonAn = isset($value["TenMonAn"]) ? $value["TenMonAn"] : "";
			$DonGia = isset($value["DonGia"]) ? $value["DonGia"] : "";
			$SoLuong = isset($value["SoLuong"]) ? $value["SoLuong"] : "";
			$ThanhTien = $DonGia * $SoLuong;

			$data = $data."<tr>";
			$data = $data."<td>$MonAn</td>";
			$data = $data."<td>$DonGia</td>";
			$data = $data."<td>$SoLuong</td>";
			$data = $data."<td>$ThanhTien</td>";
			$data = $data."</tr>";
		}
		$data = $data."</table>";

		return $data;

	}
	/*method delete a bill
	 * @author thanhtuan
	* @parram $id
	* @return result = true if success else result = false
	*/
	public function deleteBill($id){
		$dao = new billingDAO() ;
		$result = $dao->deleteBillDAO($id);
		return $result;
	}
	/*
	 * @author thanhtuan
	* method view bill info
	* @parram $id
	* @return Gui contains information about Paid Bill
	*/
	public function viewBill($id){
		$dao = new billingDAO() ;
		//// get detail billing from  Dao
		$detailbilling = $dao->getDetailBillingDAO($id);
		// get info area - table food
		$infoArea = $dao->getInfoAreaDAO($id);
		//get value totalMoney of billing
		$totalMoney = $dao->getTotalMoneyBilling($id);
		//total of area table food(example customerr can booking many table food)
		$totalArea = 0;
		//
		$data = "";
		$data = $data."<div class='pay-for-bill-info'>
		<p>Chi tiết hóa đơn</p>
		<table id='bill-detail-table'>
		<tr>
		<th>Món ăn</th>
		<th>Đơn giá(VND)</th>
		<th>Số lượng</th>
		<th>Thành tiền(VND)</th>
		</tr>
		<tr>";
		foreach($detailbilling as $value){
			$MonAn = isset($value["TenMonAn"]) ? $value["TenMonAn"] : "";
			$DonGia = isset($value["DonGia"]) ? $value["DonGia"] : "";
			$SoLuong = isset($value["SoLuong"]) ? $value["SoLuong"] : "";
			$ThanhTien = $SoLuong * $DonGia;

			$data = $data."<tr>";
			$data = $data."<td>$MonAn</td>";
			$data = $data."<td>$DonGia</td>";
			$data = $data."<td>$SoLuong</td>";
			$data = $data."<td>$ThanhTien</td>";
			$data = $data."</tr>";
		}
		$data = $data."<tr>
		<td></td>
		<td></td>
		<td>Tổng tiền</td>
		<td>$totalMoney</td>
		</tr>";
		$data = $data."</table>";
		$data = $data."<p>Chi tiết đặt chỗ</p>
		<table>
		<tr>
		<th>Mã bàn ăn</th>
		<th>Khu vực</th>
		<th>Giá thành(VND)</th>
		</tr>";
		foreach($infoArea as $value){
			$MaBanAn = isset($value["MaBanAn"]) ? $value["MaBanAn"] : "";
			$TenKV = isset($value["TenKV"]) ? $value["TenKV"] : "";
			$GiaThanh = isset($value["GiaThanh"]) ? $value["GiaThanh"] : "";
			// caculator for total area
			$totalArea = $totalArea + $GiaThanh;
			$data = $data."<tr>";
			$data = $data."<td>$MaBanAn</td>";
			$data = $data."<td>$TenKV</td>";
			$data = $data."<td>$GiaThanh</td>";
			$data = $data."</tr>";
		}
		$data = $data."<tr>;
		<td></td>
		<td>Tổng tiền</td>
		<td>$totalArea</td>
		</tr>";
		$data = $data."</table>
		<div>";
		//total paid contain total eat + total area;
		$totalMoney = $totalMoney + $totalArea;
		$data = $data."<p>Tổng tiền phải trả:<span>$totalMoney </span></p>
		</div>
		<div>
		<button id='cashBut' title='Nhấp để thanh toán'>Thanh toán</button>
		<button onclick='cancelPayForBillButClicked();'>Hủy bỏ</button>
		</div>
		</div>";
		return $data;
	}
	/*
	 * @author thanhtuan
	* method view  booking detail
	* @parram $id
	* @return GUI contain information about detail Booking
	*/
	public function viewBookingDetail($id){
		$dao = new CashierDAO();
		// get detail booking
		$array = $dao->getBookingInfo($id);
		$NgayLap = isset($array["NgayLap"]) ? $array["NgayLap"] : "";
		$HoTenKH = isset($array["HoTenKH"]) ? $array["HoTenKH"] : "";
		$CMND = isset($array["CMND"]) ? $array["CMND"] : "";
		$SDT = isset($array["SDT"]) ? $array["SDT"] : "";
		$NguoiLap = isset($array["TenNV"]) ? $array["TenNV"] : "";
		// get info area
		$array1 = $dao->getBookingDetail($id);
		// $data of detail booking and information about area
		$data = "";
		$data = $data."<table>";
		$data = $data."<tr>";
		$data = $data."<td>Ngày Lậpp</td>";
		$data = $data."<td>$NgayLap</td>";
		$data = $data."</tr>";
		$data = $data."<tr>";
		$data = $data."<td>Họ tên khách hàng:</td>";
		$data = $data."<td>$HoTenKH</td>";
		$data = $data."</tr>";
		$data = $data."<tr>";
		$data = $data."<td>Số CMND:</td>";
		$data = $data."<td>$CMND</td>";
		$data = $data."</tr>";
		$data = $data."<tr>";
		$data = $data."<td>Số điện thoại:</td>";
		$data = $data."<td>$SDT</td>";
		$data = $data."</tr>";
		$data = $data."<tr>";
		$data = $data."<td>Người lập:</td>";
		$data = $data."<td>$NguoiLap</td>";
		$data = $data."</tr>";
		$data = $data."</table>";
		$data = $data."<table>";
		$data = $data."<tr>";
		$data = $data."<th>Mã bàn ăn</th>";
		$data = $data."<th>Khu vực</th>";
		$data = $data."<th>Giá thành(VND)</th>";
		$data = $data."</tr>";
		foreach($array1 as $value){
			$MaBanAn = isset($value["MaBanAn"]) ? $value["MaBanAn"] : "";
			$TenKV = isset($value["TenKV"]) ? $value["TenKV"] : "";
			$GiaThanh = isset($value["GiaThanh"]) ? $value["GiaThanh"] : "";
			$data = $data."<tr>";
			$data = $data."<td>$MaBanAn</td>";
			$data = $data."<td>$TenKV</td>";
			$data = $data."<td>$GiaThanh</td>";
			$data = $data."</tr>";
		}
		$data = $data."</table>";

		return $data;
	}

	/*method execut  pay for bill...update status of billing is 1
	 * @author thanhtuan
	* @parram $id
	* @return result = true if success else result = false
	*/
	public function payment($id)
	{

		$dao = new billingDAO();
		$result = $dao->updateBillDAO($id);
		return $result;
	}
	/*method format date expple 2012-5-17 00:00:00
	 * @author thanhtuan
	* @parram $date
	* @return $date aftet format
	* */
	public function changeFormatDate($date){

		$result = new DateTime($date);
		$result =  $result->format('Y-m-d');//format YY-MM-DD
		$result1 = new DateTime($result);
		$result1 =  $result1->format('Y-m-d H:i:s');//format YY-MM-DD HH:mm:ss
		return $result1;
	}
}
// get action parram from form
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "";
switch ($action) {
	case "search":
		$totalMoneyFrom = isset($_REQUEST["fromValue"]) ? $_REQUEST["fromValue"] : "";
		$totalMoneyTo = isset($_REQUEST["toValue"]) ? $_REQUEST["toValue"] : "";
		$date = isset($_REQUEST["time"]) ? $_REQUEST["time"] : "";

		//change format date : 2012-05-17 00:00:00
		if($date != ""){
			$format = new ModuleCashierController();
			$date_format = $format->changeFormatDate($date);
		} else {
			echo "Bạn phải chọn thời gian tìm kiếm.";
			continue;
		}

		try {
			// do search
			$search = new ModuleCashierController();
			$SearchResult = $search->searchBill($date_format,$totalMoneyFrom,$totalMoneyTo);
			echo $SearchResult;
		} catch (Exception $e) {
			echo "Not Connect to database";
		}
		break;
		// cái này là xóa đi hóa đơn đó
	case "delete":
		$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : "";
			

		try {
			// do delete
			$delete = new ModuleCashierController();
			$result = $delete->deleteBill($id);
			echo $SearchResult;
		} catch (Exception $e) {
			echo "Not Connect to database";
		}
		break;
		// cái này là xem hóa đơn rùi mới thanh toán
	case "viewBilling":
		$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : "";

		try {
			// do view billing to  paid
			$viewBill = new ModuleCashierController();
			$Result = $viewBill->viewBill($id);
			echo $Result;
		} catch (Exception $e) {
			echo "Not Connect to database! ";
		}
		break;


		// cái này là xem chit tiết hóa đơn
	case "detailBill":
		$id = isset($_REQUEST["billID"]) ? $_REQUEST["billID"] : "";

		try {
			// do view detail bill
			$detailBill = new ModuleCashierController();
			$Result = $detailBill->viewBillDetail($id);
			echo $Result;
		} catch (Exception $e) {
			echo "Not Connect to database! ";
		}
		break;
		// thanh toán hóa đơn nhé nhóm trưởng :D
	case "excutePaid":
		$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : "";

		try {

			$excute = new ModuleCashierController();
			$Result = $excute->payment($id);
			echo $Result;

		} catch (Exception $e) {
			echo "Not Connect to database";
		};
		break;
		// cái này là xem chi tiết đặt chỗ
	case "detailBooking":
		$id = isset($_REQUEST["bookingID"]) ? $_REQUEST["bookingID"] : "";

		try {
			$detailBooking = new ModuleCashierController();
			$result = $detailBooking->viewBookingDetail($id);
			echo $result;

		} catch (Exception $e) {
			echo "Not Connect to database";
		};
		break;
			
	default:
		break;
}

?>
