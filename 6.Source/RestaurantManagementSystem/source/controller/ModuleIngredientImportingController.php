<?php
require_once '../dal/IngredientDAO.php';
class ModuleIngredientImportingController {

	private $databaseMapKey = array("ingreName" => "TenNL",
			"minAmount" => "SOLUONGMIN",
			"maxAmount" => "SOLUONGMAX",
			"contractDetailId" =>"MaCTHD"
	);

	/**
	 * @author hathao298@gmail.com
	 */

	/**
	 * generate view for supplier select box
	 * @param supplierName array
	 * @return echo view
	 */
	public static function createViewForSupplierSelectBox($supplierNamArr){
		$str = "";
		foreach($supplierNamArr as $supplierName){
			$str = $str."<option>{$supplierName}</option>";
		}
		return $str;
	}

	/**
	 * create view for contract id select box
	 * @param contractId array
	 * @return echo view
	 */
	public function creatViewForContractIDSelectBox($contractIdArr){
		$str = "";
		foreach($contractIdArr as $contractId){
			$str = $str . " <option>{$contractId}</option>";
		}
		return $str;
	}

	/**
	 * create view for
	 */
	public function createViewForIngredientDetail($ingredientDetailArr){
		$str = "";
		foreach($ingredientDetailArr as $ingredientDetail)
		{
			$str = $str . "<tr>
			<td><input type='checkbox' id='{$ingredientDetail[$this->databaseMapKey["contractDetailId"]]}'></input></td>
			<td>{$ingredientDetail[$this->databaseMapKey["ingreName"]]}</td>
			<td>{$ingredientDetail[$this->databaseMapKey["minAmount"]]}</td>
			<td>{$ingredientDetail[$this->databaseMapKey["maxAmount"]]}</td>
			</tr>";
		}
		return $str;
	}

	/**
	 * search for contract detail
	 * @param condition array
	 * @return contractDetail with foodname array
	 */
	public function searchForContractDetail(){

	}

	/**
	 * get supplier name
	 * @param null
	 * @return supplierName array
	 */
	public static function getSupplierName(){
		
	}


	/**
	 * get contract Id
	 * @param supplierName string
	 * @return contractID array
	 */
	public static function getContractId($supplierName=null){
		
	}


	/**
	 * get contract detail info
	 * @param contractId string
	 * @return contractDetailInfo array
	 */
	public function getContractDetailInfo(){

	}

	/**
	 * save ingredientImportingInfo array
	 * @param ingredientImportingInfo array
	 * @return boolean true when successful
	 */
	public function saveIngredientImportingInfo(){

	}
}
