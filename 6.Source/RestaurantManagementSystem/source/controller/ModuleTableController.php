<?php

require_once 'BookingDAO.php';
require_once 'TableDAO.php';
class ModuleTableController{
/**
 * @author thanhtuan
 * main detail_Booking method
 * @param No
 * @return gui information about detail booking of table food of all restaurant.
 * */
public function getListAllTablRestaurant()
{
	$dao = new TableDAO() ;
	$array = $dao->getAvailableTableAllRestaurants();
	$data = "";
	$data = $data." <table>
	<tr>
	<th>MÃ BÀN ĂN</th>
	<th>TÊN KHU VỰC</th>
	<th>GIÁ THÀNH</th>
	<th>SỐ NGƯỜI</th>
	<th>TÌNH TRẠNG</th>
	<th>NHÀ HÀNG</th>
	</tr>
	<tr>  " ;
	foreach ($array as $value){
	
		$TenKV = isset($value["TenKV"]) ? $value["TenKV"] : "";
		$MaBanAn = isset($value["MaBanAn"]) ? $value["MaBanAn"] : "";
		$GiaThanh = isset($value["GiaThanh"]) ? $value["GiaThanh"] : "";
		$SoNguoi = isset($value["SoLuong"]) ? $value["SoLuong"] : "";
		$TinhTrang =  isset($value["TinhTrang"]) ? $value["TinhTrang"] : "";
		$NhaHang =  isset($value["TenNH"]) ? $value["TenNH"] : "";
		
	
	
		$data = $data."<td>$MaBanAn</td>";
		$data = $data."<td><a onclick='regionInfoLinkClicked();' href='#'>$TenKV</td>";
		$data = $data."<td>$GiaThanh</td>";
		$data = $data. "<td>$SoNguoi</td>";
		if($TinhTrang == "0"){
	
			
			$data  = $data."<td>Chưa đặt</td>";
		}
		else{
	
			$data  = $data."<td><a onclick='bookingDetailLinkClicked();' href='#'>Chi tiết</a></td>";
		}
		$data = $data."<td>$NhaHang</td>";
		$data = $data."</tr>";
	}
	
	$data = $data."</table>";
	
	$data = $data ."</div>";
	return $data;
	
}

}

// get action form request params
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "";
if ($action == "getAll"){
	
	// do get list all food table of restaurants...
	try {
	$getData= new ModuleTableController();
	$reusult = $getData->getListAllTableRestaurants();
     
	echo $reusult;
	}
     catch (Exception $e) {
      		echo "Not Connect to database! ";
      }

}

?>