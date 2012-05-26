<?php
// require a class DAO
class ModuleIngredientManagement{
	
	/*
	 * @author thanhtuan
	 * method getAllMeterial() get all material of restaurant 
	 * format return DAO is array 2 dimmention which a array contain 0: MaNL,1: tenNL,2:tenLoaiNL,3:soLuong,4:soLuongMin,5:soLuongMax
	 * @param no
	 * @return string 
	 */
	public function getAllMaterial(){
		
		$strjson = "{rows:[";
		$dao = new IngredientManagementDAO();
		$arr = $dao->getAllMaterialDAO();
		if($arr != null){
			$n = count($arr);
		
		}
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
		
			
		$strjson = $strjson." ]}";
		
		return $strjson;
	}
	
}

?>