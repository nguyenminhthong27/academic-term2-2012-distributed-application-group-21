<?php
require_once '../dal/contractdao.php';
require_once 'cache.php';
require_once '../dal/ingredientdao.php';
require_once '../dal/supplierdao.php';

class ModuleIngredientImportingController {
	private $databaseMapKey = array("ingreName" => "TenNL",
			"minAmount" => "SOLUONGMIN",
			"maxAmount" => "SOLUONGMAX",
			"contractDetailId" =>"MaCTHD"
	);
	private $selectedIngredient = array();

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
			$html .= "<tr> <td><input value=\"" . $material["MaCTHD"] . "\"type='checkbox'></input></td>";
			$html .= "<td>" . $material["TenNL"] . "</td>";
			$html .= "<td>" . $material["SOLUONGMIN"] . "</td>";
			$html .= "<td>" . $material["SOLUONGMAX"] . "</td></tr>";
		}
		$html .= '</table>';
		return $html;
	}

	/**
	 * save ingredientImportingInfo array
	 * @param ingredientImportingInfo array
	 * @return boolean true when successful
	 */
	public function saveImporting($MaCTHDs, $unitPrices, $amounts){
		$idSize = count($MaCTHDs);
		$unitSize = count($unitPrices);
		$amountSize = count($amounts);
		if (($idSize != $unitSize) || ($idSize != $amountSize) || ($unitSize != $amountSize)) {
			return;
		}
		
		// saving importing info
		// 1. Get currently staff and restaurant
		session_start();
		$currentStaff = isset($_SESSION['staff_id']) ? $_SESSION['staff_id'] : null;
		$restaurant = isset($_SESSION['restaurant']) ? $_SESSION['restaurant'] : null;
		if ($currentStaff == null || $restaurant == null) {
			return;
		}
		
		// 2. get date
		$date = new DateTime();
		$date = new MongoDate(strtotime($date->format('Y-m-d H:i:s')));
		$temp = array();
		$debt = 0;
		$dao = new ContractDAO();
		for ($i = 0; $i < $idSize; $i++) {
			$temp["MaCTHD"] = $MaCTHDs[$i];
			$temp["NgayNhap"] = $date;
			$temp["DonGia"] = (int)$unitPrices[$i];
			$temp["SoLuong"] = (int)$amounts[$i] ;
			$temp["MaNH"] = $restaurant;
			$temp["MaNV"] = $currentStaff;
			
			$debt += $amounts[$i] * $unitPrices[$i];
			// 3. insert
			// if insert one of ingredient info failed
			if($dao->saveIngredientImportingInfo($temp) == false)
				return false;
		}
		
		$dao = new SupplierDAO();
		$dao->addDebtInfo($MaCTHDs[0], $debt);
		return true;
	}

	/**
	 * show table that's contain  ingredients selected
	 * @param $inIDs array ingredient IDs array
	 */
	public function htmlShowIngredientSelectedTable($MaCTHDs){
		$html = "<table>
		<tr>
		<th>Nguyên liệu</th>
		<th>Đơn giá</th>
		<th>Số lượng nhập vào</th>
		</tr>";

		$dao = new ContractDAO();

		// clear cache
		// 		$selectedIngredient = array();
		// 		$temp = array(); // using to backup data
		foreach ($MaCTHDs as $MaCTHD){
			$data = $dao->getMaterialByContractDetailID($MaCTHD);
				
			// backup data
			// 			$temp["MaNL"] = $data["MaNL"];
			// 			$temp["TenNL"] = $data["TenNL"];
			// 			$selectedIngredient []= $temp;
				
			// generate html
			$html .= "<tr><td>" . $data["TenNL"] . "</td>";
			$html .= '
			<td><input id="'  . $data["MaCTHD"] . '" type="text"></input></td>
			<td><input type="text"></input></td>
			</tr>
			';
		}
		$html .= '</table>';
		return $html;
	}

	/**
	 * show table confirm information of ingredient
	 * @param array $inIDs
	 * @param array $unitPrices
	 * @param array $amounts
	 * @return html code.
	 */
	public function htmlShowIngredientInfoConfirmTable($MaCTHDs, $unitPrices, $amounts){
		$idSize = count($MaCTHDs);
		$unitSize = count($unitPrices);
		$amountSize = count($amounts);
		if (($idSize != $unitSize) || ($idSize != $amountSize) || ($unitSize != $amountSize)) {
			return;
		}

		$dao = new ContractDAO();
		$result = array();
		$temp = array();
		for ($i = 0; $i < $idSize; $i++) {
			$data = $dao->getMaterialByContractDetailID($MaCTHDs[$i]);
			$temp["MaCTHD"] = $data["MaCTHD"];
			$temp["TenNL"] = $data["TenNL"];
			$temp["DonGia"] = $unitPrices[$i];
			$temp["SoLuong"] = $amounts[$i] ;
			$result []= $temp;
		}

		$html = '<p>Xin xác nhận lại thông tin đã nhập và nhấp "Lưu"</p>
		<table>
		<tr>
		<th>Nguyên liệu</th>
		<th>Đơn giá</th>
		<th>Số lượng nhập vào</th>
		</tr>';
		foreach($result as $ingredient){
			// generate html
			$html .= "<tr><td class='cell_import' value=\"" . $ingredient["MaCTHD"] . "\">" . $ingredient["TenNL"] . "</td>";
			$html .= '
			<td class="cell_import">' . $ingredient["DonGia"] . '</td>
			<td class="cell_import">' . $ingredient["SoLuong"] . '</td>
			</tr>
			';
		}
		$html .= '</table>';
		return $html;
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
	case 'selectIngredient':
		$valArr= isset($_REQUEST["MaCTHDs"]) ? $_REQUEST["MaCTHDs"]: "";
		if ($valArr == null) {
			continue;
		}
		$MaCTHDs = array();
		foreach($valArr as $val){
			$MaCTHDs []= $val;
		}

		try {
			$ctrl = new ModuleIngredientImportingController();
			$result = $ctrl->htmlShowIngredientSelectedTable($MaCTHDs);
			echo $result;
		}
		catch (Exception $e) {
			echo "Not Connect to database! ";
		}
		break;
	case 'inputIngredientInfo':
		// get IDs
		$valArr= isset($_REQUEST["MaCTHDs"]) ? $_REQUEST["MaCTHDs"]: "";
		if ($valArr == null) {
			continue;
		}
		$MaCTHDs = array();
		foreach($valArr as $val){
			$MaCTHDs []= $val;
		}

		// get unit prices
		$valArr= isset($_REQUEST["unitPrice"]) ? $_REQUEST["unitPrice"]: "";
		if ($valArr == null) {
			continue;
		}
		$unitPrices = array();
		foreach($valArr as $val){
			$unitPrices []= $val;
		}

		// get amounts
		$valArr= isset($_REQUEST["amount"]) ? $_REQUEST["amount"]: "";
		if ($valArr == null) {
			continue;
		}
		$amounts = array();
		foreach($valArr as $val){
			$amounts []= $val;
		}

		try {
			$ctrl = new ModuleIngredientImportingController();
			$result = $ctrl->htmlShowIngredientInfoConfirmTable($MaCTHDs, $unitPrices, $amounts);
			echo $result;
		}
		catch (Exception $e) {
			echo "Not Connect to database! ";
		}
		break;
	case 'saveImporting':
		// get IDs
		$valArr= isset($_REQUEST["MaCTHDs"]) ? $_REQUEST["MaCTHDs"]: "";
		if ($valArr == null) {
			continue;
		}
		$MaCTHDs = array();
		foreach($valArr as $val){
			$MaCTHDs []= $val;
		}
		
		// get unit prices
		$valArr= isset($_REQUEST["unitPrice"]) ? $_REQUEST["unitPrice"]: "";
		if ($valArr == null) {
			continue;
		}
		$unitPrices = array();
		foreach($valArr as $val){
			$unitPrices []= $val;
		}
		
		// get amounts
		$valArr= isset($_REQUEST["amount"]) ? $_REQUEST["amount"]: "";
		if ($valArr == null) {
			continue;
		}
		$amounts = array();
		foreach($valArr as $val){
			$amounts []= $val;
		}
		
		try {
			$ctrl = new ModuleIngredientImportingController();
			$result = $ctrl->saveImporting($MaCTHDs, $unitPrices, $amounts);
			if ($result == true) {
				echo "Nhập hàng thành công.";
			} else {
				echo "Nhập hàng không thành công.";
			}
		}
		catch (Exception $e) {
			echo "Not Connect to database! ";
		}
		break;
	default:
		break;
}
?>