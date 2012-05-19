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
	 * method  search Booking
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
	public function saveListDist(){
		
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
//get action form request params
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "";
switch ($action) {
	case "searchDish":
		
		
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
		default:
			break;
}
	

?>