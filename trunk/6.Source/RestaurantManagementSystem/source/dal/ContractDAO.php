<?php
require_once 'MongoDatabase.php';
class  ContractDAO{
	/**
	 * get contract by supplier ID
	 * @param string $supplierID
	 */
	public function getContract($supplierID){
		$condition = array(
				'MaNCC' => $supplierID
		);
		return MongoDatabase::getAllDataFrom("HopDong", $condition);
	}

	/**
	 * get contract detail by contract id
	 * @param unknown_type $contractID
	 */
	public function getContractDetail($contractID){
		$condition = array(
				'MaHopDong' => $contractID
		);
		$keys = array(
				'_id' => 0,
				'MNL' => 1,
				'SOLUONGMAX' => 1,
				'SOLUONGMIN' => 1
		);
		$contractDetails = MongoDatabase::getAllDataFrom("ChiTietHopDong", $condition);
		$result = array();
		$temp = array();
		foreach($contractDetails as $contractDetail){
			$temp["MaCTHD"] =  $contractDetail["MaCTHD"];
			$temp["MaNL"] = $contractDetail["MNL"];
			$temp["SOLUONGMAX"] = $contractDetail["SOLUONGMAX"];
			$temp["SOLUONGMIN"] = $contractDetail["SOLUONGMIN"];
			$temp["TenNL"] = $this->getMaterialName($contractDetail["MNL"]);
			$result[] = $temp;
		}
		return $result;
	}

	/**
	 * get material name from id
	 * @param string $materialID
	 */
	private function getMaterialName($materialID){
		$data = MongoDatabase::getOneDataFrom("NguyenLieu", "MaNL=" . $materialID);
		return $data["TenNL"];
	}

	/**
	 * get material info by contract detail id
	 * @param unknown_type $MaCTHD
	 */
	public function getMaterialByContractDetailID($MaCTHD){
		$contractDetail = MongoDatabase::getOneDataFrom("ChiTietHopDong", "MaCTHD=" . $MaCTHD);
		
		$result = array();
		$result["MaCTHD"] =  $contractDetail["MaCTHD"];
		$result["TenNL"] = $this->getMaterialName($contractDetail["MNL"]);
		
		return $result;
	}
	
	public function saveIngredientImportingInfo($data){
		return MongoDatabase::addDataTo("PhieuNhapHang", $data);
	}
}

// hard code to test
// $dao = new ContractDAO();
// $data = $dao->getMaterialByContractDetailID("CT001");
// print_r($data);
?>