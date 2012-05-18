<?php
require_once 'MongoDatabase.php';

/**
 * all methods that're relatives to table object
 * @author vantuanlee@gmail.com
 *
 */
class TableDAO implements IDatabaseConfig {
	const CollectionName = "BanAn";
	
	/**
	 * get available table
	 * @param string $restaurant local restaurant or the other
	 * @param string $areaID area
	 * @param string $status table status
	 * @param datetime $from php datetime, formatted with standard ("2010-01-15 00:00:00")
	 * @param datetime $to php datetime, formatted with standard ("2010-01-15 00:00:00")
	 * @return array table + info
	 */
	public function getAvailableTable($restaurant, $areaID = null, $status = null, $from, $to){
		// if status = null => status = not booked.
		$status = $status == null? 0 : $status;
		
		// this is mongodate example
		// $start = new MongoDate(strtotime("2010-01-15 00:00:00"));
		// $end = new MongoDate(strtotime("2010-01-30 00:00:00"));
		$start = new MongoDate(strtotime($from));
		$end = new Mongodate(strtotime($to));
		
		try {			
			// create connection
			$connection = new Mongo(TableDAO::Host);
			$db = $connection->selectDB(TableDAO::DbName);
			
			// step 1 : get tables which's booked between (from, to)
			$collection = $db->ChiTietPhieuDatCho;
			$result = $collection->find(
					array("TuThoiGian" => array('$lte' => $start),
							"DenThoiGian" => array('$gte' => $end)),
					array("MaBanAn" => 1,
							"_id" => 0));
			$bookedTables = array();
			
			foreach ($result as $idx => $document){
				foreach ($document as $key => $value){
					$bookedTables[$idx] = $value;
				}
			}
			 
			// step 2 : get all tables
			$collection = $db->BanAn;
			$result = $collection->find(
					array(),
					array("MaBanAn" => 1,
							"_id" => 0));
			
			$tables = array();
			foreach ($result as $idx => $document){
				foreach ($document as $key => $value){
					$tables[$idx] = $value;
				}
			}
			
			// step 3 : except and get result
			$availTable = array_diff($tables, $bookedTables);
			
			// step 4 : get detail info of free-table
			$$availTableDetails = array();
			foreach ($availTable as $idx => $val){
				$$availTableDetails[$idx] = $this->getTableInfo($val);
			}
			
			return $availTableDetails;
		} catch (MongoConnectionException $e) {
			die('Error connecting to MongoDB server');
		} catch (MongoException $e) {
		  	die('Error: ' . $e->getMessage());
		}
	}
	
	
	/**
	 * get table informations
	 * @param string $tableID
	 */
	public function getTableInfo($tableID){
		$condition = 'MaBanAn='. $tableID;
		$array = MongoDatabase::getOneDataFrom($this::CollectionName, $condition);		
	}
} 
?>