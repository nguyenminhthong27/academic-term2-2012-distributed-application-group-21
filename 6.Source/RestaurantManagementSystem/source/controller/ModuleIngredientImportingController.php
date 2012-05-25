<?php
require_once '../dal/contractdao.php';

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
	 * search for contract with supplier ID
	 * @param string $supplierID
	 * @return html code of select box option.
	 */
	public function getContract($supplierID){
		$dao = new ContractDAO();
		$data = $dao->getContract($supplierID);
		$contractIDs = array();
		foreach($data as $contract){
			$contractIDs[] = $contract["MaHopDong"];
		}
		
		// html show  contract id select box
		return $this->htmlShowContractIDSelect($contractIDs);
	}
	
	private function htmlShowContractIDSelect($contractIDs){
		$html = '<option value="-1">' . "Chọn hợp đồng" . '</option>';
		foreach($contractIDs as $contract){
			$html .= '<option value="'. $contract . '">' . $contract . '</option>';
		}
		return $html;
	}

	/**
	 * get supplier name
	 * @param null
	 * @return supplierName array
	 */
	public static function getSupplierName(){

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

// check action and handle
// get action form request params
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "";
switch ($action){
	case 'searchContract':
		$supplier = isset($_REQUEST["ncc"]) ? $_REQUEST["ncc"] : "";
		try {
			$ctrl = new ModuleIngredientImportingController();
			$result = $ctrl->getContract($supplier);
			echo $result;
		}
		catch (Exception $e) {
			echo "Not Connect to database! ";
		}
		break;
	default:
		break;
}
?>