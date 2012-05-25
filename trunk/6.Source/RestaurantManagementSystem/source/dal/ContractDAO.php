<?php
require_once 'MongoDatabase.php';
class  ContractDAO{
	/**
	 * get contract by supplier ID
	 * @param unknown_type $supplierID
	 */
	public function getContract($supplierID){
		$condition = array(
				'MaNCC' => $supplierID
				);
		return MongoDatabase::getAllDataFrom("HopDong", $condition);		
	}
} 

// hard code to test
// $dao = new ContractDAO();
// $data = $dao->getContract("NCC01");
// print_r($data);
?>