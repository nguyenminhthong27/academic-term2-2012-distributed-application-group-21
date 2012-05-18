<?php
require_once '../dal/TableDAO.php'; // suppose
class DetailBookingController{
	
	/**
	 * all methods that're relatives to Search booking object
	 * @author thanhtuan
	 *
	 */
	/**
	 * main detail_Booking method
	 * @param $ID string
	 * @return gui information about detail booking of table food
	 * */
public function detail_Booking($ID_Table)
{
	
 
	$dao = new TableDAO() ;//supose
	$array = $dao->getDetail($ID_Table);
	$data = "";
	$data = $data." <table>
	<tr>
	<th>Khách Hàng</th>
	<th>Từ</th>
	<th>Đến</th>
	<th>Giá</th>
	</tr>
	<tr>  " ;
	foreach ($array as $value)
	
	{
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
}
// get action form request params
 $id = isset($_REQUEST["ID"]) ? $_REQUEST["ID"] : "";


try {
	// do login
	$detail_booking = new DetailBookingController();
	$Result = $search->detail_Booking($id);
	echo $Result;

} catch (Exception $e) {
	echo "Not Connect to database! ";
}


?>