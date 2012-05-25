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
	 * get contract detail by contract id
	 * @param contractId string
	 * @return contractDetailInfo array
	 */
	public function getContractDetail($contractID){
		$dao  = new ContractDAO();
		$data = $dao->getContractDetail($contractID);
		return $this->htmlShowIngredientTable($data);
	}
	
	private function htmlShowIngredientTable($data){
		$html = '
		<p>Chọn nguyên liệu cần nhập vào kho hàng</p>
		<table>
			<tr>
			<th><input type="checkbox" id="checkAllCBox"
			onclick="checkAllCBoxClicked();"></input></th>
			<th>Nguyên liệu</th>
			<th>Số lượng tối thiểu</th>
			<th>Số lượng tối đa</th>
			</tr>
		';
		foreach($data as $material){
			$html .= "<tr> <td><input value=\"" . $material["MaNL"] . "\"type='checkbox'></input></td>";
			$html .= "<td>" . $material["TenNL"] . "</td>";
			$html .= "<td>" . $material["SOLUONGMIN"] . "</td>";
			$html .= "<td>" . $material["SOLUONGMAX"] . "</td></tr>";
		}
		$html .= '</table>';
		return $html;
		
// 		<!--                                         <tr> -->
// 		<!--                                             <td><input type="checkbox"></input></td> -->
// 		<!--                                             <td>Thịt gà(kg)</td> -->
// 		<!--                                             <td>3</td> -->
// 		<!--                                             <td>10</td> -->
// 		<!--                                         </tr> -->
// 		<!--                                         <tr> -->
// 		<!--                                             <td><input type="checkbox"></input></td> -->
// 		<!--                                             <td>Pepsi(thùng)</td> -->
// 		<!--                                             <td>10</td> -->
// 		<!--                                             <td>50</td> -->
// 		<!--                                         </tr>   -->
// 		</table>
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
	case 'searchContractDetail':
		$contract = isset($_REQUEST["contract"]) ? $_REQUEST["contract"] : "";
		try {
			$ctrl = new ModuleIngredientImportingController();
			$result = $ctrl->getContractDetail($contract);
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