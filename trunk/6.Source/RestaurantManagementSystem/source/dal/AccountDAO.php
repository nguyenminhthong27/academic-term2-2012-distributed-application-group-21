<?php
require_once 'MongoDatabase.php';
/**
 * all methods that are relative to account object.
 * @author vantuanlee@gmail.com
 * @created May 11 2012	
 * */
class AccountDAO {
			
	/**
	 * @param string $username
	 * @return NULL
	 */
	public function getInfo($staffId) {
		$condition = 'MaNV='. $staffId;
		return MongoDatabase::getOneDataFrom("NhanVien", $condition);		
	}
} 
?>