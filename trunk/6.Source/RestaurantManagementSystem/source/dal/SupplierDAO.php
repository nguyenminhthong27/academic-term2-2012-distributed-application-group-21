<?php
require_once 'mongodatabase.php';
class SupplierDAO implements IDatabaseConfig{
	/**
	 * get supplier info by contract detail id
	 * @param unknown_type $conDetailID
	 * @return Ambigous <$arr, NULL, multitype:unknown >
	 */
	public function getSupplierByContractDetailID($conDetailID){
		$contractDetail = MongoDatabase::getOneDataFrom("ChiTietHopDong", "MaCTHD=" . $conDetailID);
		$contract = MongoDatabase::getOneDataFrom("HopDong", "MaHopDong=" . $contractDetail["MaHopDong"]);

		return MongoDatabase::getOneDataFrom("NhaCungCap", "MaNCC=" . $contract["MaNCC"]);
	}

	/**
	 * add debt info to supplier
	 * @param int $debt
	 */
	public function addDebtInfo($conDetailID, $debt){
		$supplier = $this->getSupplierByContractDetailID($conDetailID);
		
		try {
			$connection = new Mongo(IDatabaseConfig::Host);
			$db = $connection->selectDB(IDatabaseConfig::DbName);
			$collection = $db->NhaCungCap;
			
			$condition = array(
					'MaNCC' => $supplier["MaNCC"]
					);
			$set = array(
					'$inc' => array(
							'CongNo' => $debt
							)
					);
			$collection->update($condition, $set);
		} catch (MongoConnectionException $e) {
			die('Error connecting to MongoDB server');
		} catch (MongoException $e) {
			die('Error: ' . $e->getMessage());
		}
	}
}

// hard code to test
// $dao = new SupplierDAO();
// $data = $dao->addDebtInfo("CT001", 1);
// print_r($data);
?>