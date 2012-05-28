<?php
// require a class DAO
require_once '../dal/ingredientTypeDAO.php';
class ModuleIngredientManagementController{
	
	/**
	 * @author thanhtuan
	 * method getAllMeterial() get all material of restaurant 
	 * format return DAO is array 2 dimmention which a array contain 0: MaNL,1: tenNL,2:tenLoaiNL,3:soLuong,4:soLuongMin,5:soLuongMax
	 * @param no
	 * @return string 
	 */
	public function getAllMaterial(){
		try{
	    $n = 0;
		$strjson = "{rows:[";
		$dao = new IngredientManagementDAO();
		$arr = $dao->getAllMaterialDAO();
		if($arr != null){
			$n = count($arr);
		
		}
		if($n > 0){
		for($i = 0;$i < ($n -1); $i++){
		 
			
		 $maNL = $arr[$i][0];
		 $tenNL = $arr[$i][1];
		 $tenLoaiNL = $arr[$i][2];
		 $soLuong = $arr[$i][3];
		 $soLuongMin = $arr[$i][4];
		 $soLuongMax = $arr[$i][5];
			$strjson = $strjson."{id:$maNL, data:['','$maNL','$tenNL','$tenLoaiNL','$soLuong','$soLuongMin','$soLuongMax']},";
		}
		$maNL = $arr[($n-1)][0];
		$tenNL = $arr[$n-1][1];
		$tenLoaiNL = $arr[$n-1][2];
		$soLuong = $arr[$n-1][3];
		$soLuongMin = $arr[$n-1][4];
		$soLuongMax = $arr[$n-1][5];
		$strjson = $strjson." {id:$maNL, data:['','$maNL','$tenNL','$tenLoaiNL','$soLuong','$soLuongMin','$soLuongMax']}";
		
		}	
		$strjson = $strjson." ]}";
		
		
		return $strjson;
		}
		catch (Exception $e) {
			echo "Not Connect to database! ";
		}
	}
	/**
	 * @athor thanhtuan
	 * method insertMaterial : insert  a new material into database
	 * @param $materialName: string
	 * @param $materialType: string
	 * @param $quantityMin: string
	 * @param $quantityMax : string
	 * return true if succed else return false
	 */
  public function insertMaterial($materialName,$materialType,$quantityMin,$quantityMax){
  	try{
  	$dao = new IngredientManagementDAO();  	
  	//CHECK HERE - hathao298
  	// MaNL => how to generate
  	$materialId = time();
  	$amount = 0;
  	//CHECK HERE
  	return $dao->insertMaterialDAO($materialId,$materialName,$materialType,$amount,$quantityMin,$quantityMax);
  	}
  	catch (Exception $e) {
  		echo "Not Connect to database! ";
  	}
  	
  }
  /**
   * @athor thanhtuan
  * method updateMaterial : update  available material in database
  * @param $id :string id of marterial
  * @param $materialName: string
  * @param $materialType: string
  * @param $quantity : string
  * @param $quantityMin: string
  * @param $quantityrMax : string
  * return true if succed else return false
  */
  public function updateMaterial($id,$materialName,$materialType,$quantity,$quantityMin,$quantityMax){
  	try {
      $dao = new IngredientManagementDAO();
      return $dao->updateMaterialDAO($id,$materialName,$materialType,$quantity,$quantityMin,$quantityMax);
  	}
  	catch (Exception $e) {
  		echo "Not Connect to database! ";
  	}
  }
  /**
   * @author thanhtuan
   * method getMaterial : get a material base on id of material that.
   * @param id : string
   * retun html if succed else return empty string;
   */
  public function getMaterial($id){
  	try{
  	   $dao = new IngredientManagementDAO();
  	   $arr = $dao->getMaterialDAO($id);
  	  
  	   $data = "";
  	   if($arr != null){
  	   	$tenNL = isset($arr["TenNL"]) ? $arr["TenNL"] : "";
  	   	$tenLoaiNL = isset($arr["TenLoaiNL"]) ? $arr["TenLoaiNL"] : "";
  	   	$soLuong = isset($arr["SoLuong"]) ? $arr["SoLuong"] : "";
  	   	$soLuongMin = isset($arr["SoLuongMin"]) ? $arr["SoLuongMin"] : "";
  	   	$soLuongMax = isset($arr["soLuongMax"]) ? $arr["SoLuongMax"] : "";
  	   
  	   $data = $data."<div class='edit-ingredient-info'>
  	   <p>Thay đổi thông tin và nhấp Lưu</p>
  	   <table>
  	   <tr>
  	   <td>Tên nguyên liệu</td>
  	   
  	   <td><input type='text' title='Tên nguyên liệu'>$tenNL</input></td>
  	   </tr>
  	   <tr>
  	   <td>Loại nguyên liệu</td>
  	   <td><select>
  	   <option>Thịt</option>
  	   <option>Rau</option>
  	   <option>Gạo</option>
  	   </select></td>
  	   </tr>
  	   <tr>
  	   <td>Số lượng</td>
  	   <td><input type='text'>$soLuong</input></td>
  	   </tr>
  	   <tr>
  	   <td>Số lượng tối thiểu</td>
  	   <td><input type='text'>$soLuongMin</input></td>
  	   </tr>
  	   <tr>
  	   <td>Số lượng tối đa</td>
  	   <td><input type='text'>$soLuongMax</input></td>
  	   </tr>
  	   </table>
  	   <button>Lưu</button>
  	   </div>";
  	   }
  	}
  	catch (Exception $e) {
  		echo "Not Connect to database! ";
  	}
  	return $data;
  }
  /**
   * author thanhtuan
   * method deleteMaterial. delete a or a array materials
   * @param $arrayid: array id of material
   * return true if delete succed else return false 
   */
  public function deleteMaterial($arrid){
  	try{
  	$dao = new IngredientManagementDAO();
  	return $dao->deleteMaterialDAO($arrid);
  	}
  	catch (Exception $e) {
  		echo "Not Connect to database! ";
  	}
  
  }
  
  /** get all ingredient type
   * @param null
   * @return ingredientType array
   * */
  public function getAllIngredientType(){
  	$dao = new IngredientTypeDAO();
  	$ingreTypeArr = $dao->getAllIngredientType();  	
  	$selectArr = array();  	
  	foreach($ingreTypeArr as $ingredient){
  		$item = array();
  		$item["value"] = $ingredient["MaLoaiNL"];
  		$item["option"] = $ingredient["TenLoaiNL"];
  		array_push($selectArr, $item);
  	}
  	return $this->generateViewForSelectBox($selectArr);  	
  }  
  
  /**
   * generate view for select box 
   * @param selectedoption string
   * @return string innerHTML of selectbox
   * @author hathao298@gmail.com
   */
  public function generateViewForSelectBox($dataArr, $selectedOption =null){
  	$result = "";
  	if($selectedIndex == null){
  		foreach($dataArr as $data){
  			$result = $result . "<option value='{$data["value"]}'>{$data["option"]}</option>";
  		}
  		return $result;
  	}
  	
  	foreach($dataArr as $data){
  		if(strcmp($data, $selectedOption))
  			$result = $result . "<option value='{$data["value"]}' selected>{$data["option"]}</option>";
  		else
  			$result = $result . "<option value='{$data["value"]}' >{$data["option"]}</option>";
  	}
  	return $result;
  }
  
}


//get action form request params
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "";
switch ($action) {
	case "getAllIngredient":
					
			$get = new ModuleIngredientManagementController();
			$result = $get->getAllMaterial();
			echo $result;
		
		break;
		//author hathao298@gmail.com
	case "getAllIngredientType":
		$ctl = new ModuleIngredientManagementController();
		$result = $ctl->getAllIngredientType();
		echo $result;
	case "insert":
		$materialName = isset($_REQUEST["materialname"]) ? $_REQUEST["materialname"] : "";
		$materialTypee= isset($_REQUEST["materialtype"]) ? $_REQUEST["materialtype"] : "";
		$quantityMin = isset($_REQUEST["minquantity"]) ? $_REQUEST["minquantity"] : "";
		$quantityMax= isset($_REQUEST["maxquantity"]) ? $_REQUEST["maxquantity"] : "";
		
	
			$insert = new ModuleIngredientManagementController();
			$result = $insert->insertMaterial($materialName, $materialType, $quantityMin, $quantityMax);
			echo $result;
		break;
		
	case "load": // get a row from database base on $MaNL

		$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : "";
	
			$load = new ModuleIngredientManagementController();
			$result = $load->getMaterial($id);
			echo $result;		
		break;
		//author hathao298@gmail.com
		//load data for editIngredientDialog on GUI
	case "loadEdit":
		break;
	case "update": // get a row from database base on $MaNL
		$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : "";
		$materialName = isset($_REQUEST["materialname"]) ? $_REQUEST["materialname"] : "";
		$materialTypee= isset($_REQUEST["materialtype"]) ? $_REQUEST["materialtype"] : "";
		$quantityMin = isset($_REQUEST["quantity"]) ? $_REQUEST["quantity"] : "";
		$quantityMin = isset($_REQUEST["minquantity"]) ? $_REQUEST["minquantity"] : "";
		$quantityMax= isset($_REQUEST["maxquantitymax"]) ? $_REQUEST["maxquantity"] : "";
		
		$update = new ModuleIngredientManagementController();
		$result = $update->updateMaterial($id, $materialName, $materialType, $quantity, $quantityMin, $quantityMax);
		echo $result;
		
		break;
	case "delete": // delete a or many materials base on array id(MaNL);
		
	    $arrid = isset($_REQUEST["arrid"]) ? $_REQUEST["arrid"] : "";
		
		$delete = new ModuleIngredientManagementController();
		$result = $delete->deleteMaterial($arrid);
		echo $result;		
		break;
	default:
		break;
}
?>