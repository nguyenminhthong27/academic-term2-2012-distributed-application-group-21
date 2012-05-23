<?php
// add require CreateBillDAO

class CreateBillController{
	
	
	
	/**
	 * method  getListDish() get all Dish of restaurants
	 * @param no
	 *  @return Gui html
	 * @author thanhtuan
	 */
	public function getListDish(){
		$dao = new CreateBillDAO();
		$arr = $dao->getListDishDAO();
		$data = "";
		$data = "table>
         <tr>
         <th><input type='checkbox' id='checkAllCBox' onclick='checkAllCBoxClicked();'></input></th>
         <th>Món ăn</th>
         <th>Giá thành</th>
          </tr>";
		foreach ($arr as $value){
		
		$TenMoAn = isset($value["TenMonAn"]) ? $value["TenMonAn"] : "";
		$DonGia = isset($value["DonGia"]) ? $value["DonGia"] : "";
		$data = $data."<tr>";
		$data = $data."<td><input type='checkbox'></input></td>";
		$data = $data."<td>$TenMonAn</td>";
		$data = $data."<td>$DonGia</td>";
		$data = $data."</tr>";
		}
		$data = $data."</table>";
		return $data;
		
	}
	/**
	 * method  searchBooking
	 * @param $date
	 * @param $customerName
	 * @param $id (CMND)
	 * @param $numberphone
	 *  @return Gui html
	 * @author thanhtuan
	 */
	public  function searchBooking($date,$customerName,$id,$numberphone){
		$dao = new CreateBillDAO();
		$arr = $dao->geBookingDAO($date,$customerName,$id,$numberphone);
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
		$NguoiTiepNhan = isset($value["TenNV"]) ? $value["TenNV"] : "";
        $data = $data."<tr>";
        $data = $data."<td>$MaPhieu</td>";
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
	 * method saveBill save a bill with status = 0(do DAO status = 0)
	 * @param: $maHD string
	 * @param: $tongTien : float (sum money of all bills)
	 *  @param : $ngaLap date (date of) 
	 * @param :maNH string (ID of restaurant) 
	 * @param:maPhieuDatCho : string (ID of booking) 
	 * @param: $tenMonAn string
	 * $param: $soLuong integer
	 * return true if succes else return false
	 */
	public function saveBill($maHD,$tongTien,$ngayLap,$nguoiLap,$maNH,$maPhieuDatCho,$tenMonAn,$soLuong){
		
		try {
			
			
		$dao = new CreateBillDAO();
		$bool = $dao->checkBooking($maPhieuDatCho);//check exist of card booking,recive value = true if card booking exist else value = false
		if($bool== true)
		{
		return $dao->save($maHD,$tongTien,$ngayLap,$nguoiLap,$maNH,$maPhieuDatCho,$tenMonAn,$soLuong);
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
	case "searchListDish":
		
		
		try {
			// do search
			$search = new CreateBillController();
			$SearchResult = $search->getListDish();
			echo $SearchResult;
		} catch (Exception $e) {
			echo "Not Connect to database";
		}
		break;

	case "searchBooking":
		$date = isset($_REQUEST["date"]) ? $_REQUEST["date"] : "";
		$customerName= isset($_REQUEST["cus"]) ? $_REQUEST["cus"] : "";
		$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : "";
		$numberphone= isset($_REQUEST["num"]) ? $_REQUEST["num"] : "";
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
			$result = $search->searchBooking($date, $customerName, $id, $numberphone);
			echo $SearchResult;
		} catch (Exception $e) {
			echo "Not Connect to database";
		}
		break;
		case "saveBill":
			$tongTien = isset($_REQUEST["sumMoney"]) ? $_REQUEST["sumMoney"] : "";
			$date = isset($_REQUEST["date"]) ? $_REQUEST["date"] : "";
			$maPhieuDatCho= isset($_REQUEST["idCardBooking"]) ? $_REQUEST["idCardBooking"] : "";
			$tenMonAn = isset($_REQUEST["dish"]) ? $_REQUEST["dish"] : "";
			$soLuong= isset($_REQUEST["number"]) ? $_REQUEST["number"] : "";
			$maNH = $_SESSION["restaurant"];
			$nguoiLap = $_SESSION["staff_id"];
			$maHD = time();
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
				$result = $save->saveBill($maHD, $tongTien, $ngayLap, $nguoiLap, $maNH, $maPhieuDatCho, $tenMonAn, $soLuong);
				echo $result;
			} catch (Exception $e) {
				echo "Not Connect to database";
			}
			break;
		default:
			break;
}
?>