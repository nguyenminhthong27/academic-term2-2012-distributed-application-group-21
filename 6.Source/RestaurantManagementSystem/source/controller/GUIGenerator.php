<?php
require_once '../dal/RestaurantDAO.php';
/**
 * user interface generator
 * generate view
 * */
class GUIGenerator {
	
	/**
	 * show select box restaurants
	 * @author vantuanlee@gmail.com
	 * 
	 */
	public static function htmlShowRestaurantSelect(){
		$currentRes = $_SESSION["restaurant"];
		
		$dao = new RestaurantDAO();
		$restaurants = $dao->getAllRestaurant();
		
		$html = '
		<select id="selectRestaurant">
			<option value="'. $currentRes .'" selected>Nội bộ</option>
			<option value="-1">Tất cả</option>';
		
		foreach ($restaurants as $rest){
			$html .= '<option value="'. $rest["MaNH"] . '">' . $rest["TenNH"] . '</option>';
		}
		
		$html .= '</select>';
		
		return $html;
	}
	
	/**
	 * show select box area 
	 * @author vantuanlee@gmail.com
	 */
	public static function htmlShowAreaSelect(){
		$areas = MongoDatabase::getAllDataFrom("KhuVuc");
		$html = '
		<select id="selectArea">
			<option value="-1" selected>Tất cả</option>';
		
		foreach ($areas as $area){
			$html .= '<option value="'. $area["MaKV"] . '">' . $area["TenKV"] . '</option>';
		}
		$html .= '</select>';
		
		return $html;
	}
	
	public static function htmlShowSupplierSelect(){
		$suppliers = MongoDatabase::getAllDataFrom("NhaCungCap");
		$html = '<select id="selectSupplier" onchange="javascript:supplierSelectOnChange(this)">';
		
		foreach ($suppliers as $supplier){
			$html .= '<option value"' . $supplier["MaNCC"] . '">' . $supplier["TenNCC"] . '</option>';
		}
		$html .= '</select>';
		
		return $html;
	}
} 
?>