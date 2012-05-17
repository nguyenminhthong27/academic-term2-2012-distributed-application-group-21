<?php
require_once 'MongoDatabase.php';
/**
 * all methods that are relative to account object.
 * @author vantuanlee@gmail.com
 * @created May 11 2012	
 * */
class AccountDAO {
	const CollectionName = "NhanVien";
	const CollectionID = "MaNV";
	/**
	 * get staff info by staff id
	 * @param string $username
	 * @return array Staff
	 */
	public function getInfo($staffId) {
		$condition = 'MaNV='. $staffId;
		return MongoDatabase::getOneDataFrom($this::CollectionName, $condition);
	}
	
	/**
	 * add staff to database
	 * @param array $data data of staff
	 * @return boolean true if success and vice versa.
	 */
	public function create($data){
		return MongoDatabase::addDataTo($this::CollectionName, $data);
	}
	
	/**
	 * modify staff info
	 * @param array $data
	 * @return boolean true if success
	 */
	public function modify($data){
		return MongoDatabase::modifyDataFrom($this::CollectionName, $data, $this::CollectionID, $data[$this::CollectionID]);
	}
}
?>