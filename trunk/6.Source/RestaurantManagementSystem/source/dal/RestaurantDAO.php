<?php
require_once 'MongoDatabase.php';

/**
 * all methods that're relatives to restaurant object
 * @author vantuanlee@gmail.com
 *
 */
class RestaurantDAO {
	const CollectionName = "NhaHang";
	
	/**
	 * get all restaurant in system.
	 * @return array
	 */
	public function getAllRestaurant(){
		return MongoDatabase::getAllDataFrom($this::CollectionName);
	}
	
} 
?>