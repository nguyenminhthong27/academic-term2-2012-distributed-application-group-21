<?php

require_once 'IDatabaseConfig.php';

/**
 * MongoDatabase manipulation methods
 * @author vantuanlee@gmail.com
 *
 */
class MongoDatabase implements IDatabaseConfig {
	
	/**
	 * get all data from collection $collection_name
	 * @param @collection_name  name of collection
	 * @return Array
	 */
	public static function getAllDataFrom($collection_name, $condition = null) {
		try {
			$connection = new Mongo(IDatabaseConfig::Host);
			$db = $connection->selectDB(IDatabaseConfig::DbName);
			$collection = $db->{$collection_name};
			
			// get all from collection, except '_id'
			$cursor = $collection->find(array($condition), array('_id' => 0));
			
			$arr = array();
			// fetch cursor to arr
			foreach ($cursor as $idx => $document){
				foreach ($document as $key => $value){
					$arr[$idx][$key] = $value;
				}
			}
			// close connection
			$connection->close();
			
			return $arr;
		} catch (MongoConnectionException $e) {
			die('Error connecting to MongoDB server');
		} catch (MongoException $e) {
		  	die('Error: ' . $e->getMessage());
		}		
	}
	
	/**
	 * @param string $collection_name
	 * @param string $codition
	 * @return $arr data
	 */
	public static function getOneDataFrom($collection_name, $condition = null){
		try {
			$connection = new Mongo(IDatabaseConfig::Host);
			$db = $connection->selectDB(IDatabaseConfig::DbName);
			$collection = $db->{$collection_name};
				
			// get all from collection, except '_id'
			$arrCondition = array();
			parse_str($condition, $arrCondition);
			$cursor = $collection->findOne($arrCondition, array('_id' => 0));
				
			if ($cursor == null) {				
				// close connection
				$connection->close();
				return null;
			}
			
			$arr = array();
			// fetch cursor to arr
			foreach ($cursor as $key => $value){
				$arr[$key] = $value;
			}
			
			// close connection
			$connection->close();
			// return
			return $arr;
		} catch (MongoConnectionException $e) {
			die('Error connecting to MongoDB server');
		} catch (MongoException $e) {
			die('Error: ' . $e->getMessage());
		}
	}
	
	/**
	 * insert a document $data to collection $collection_name
	 * @param string $collection_name the name of collection need insert into
	 * @param array $data an array, contents the informations of an object
	 */
	public static function addDataTo($collection_name, $data) {
		try {	
			$connection = new Mongo(IDatabaseConfig::Host);
			$db = $connection->selectDB(IDatabaseConfig::DbName);
			$collection = $db->{$collection_name};
			
			$collection->save($data);
			// close connection
			$connection->close();
		} catch (MongoConnectionException $e) {
		  	die('Error connecting to MongoDB server');
		} catch (MongoException $e) {
		 	die('Error: ' . $e->getMessage());
		}
	}
	
	/**
	 * remove a document from database
	 * @param $collection_name
	 * @param $id
	 * @param $id_value
	 */
	public static function removeDataFrom($collection_name, $id, $id_value) {
		try {
			$connection = new Mongo(IDatabaseConfig::Host);
			$db = $connection->selectDB(IDatabaseConfig::DbName);
			$collection = $db->{$collection_name};
			
			$collection->remove(array($id => $id_value));

			$connection->close();
		} catch (MongoConnectionException $e) {
			die('Error connecting to MongoDB server');
		} catch (MongoException $e){
			die('Error : ' . $e->getMessage());
		}
	}
	
	/**
	 * modify the information of a document
	 */
	public static function modifyDataFrom($collection_name, $data, $id, $id_value) {
		try {
			$connection = new Mongo($this::Host);
			$db = $connection->selectDB($this::DbName);
			$collection = $db->{$collection_name};
			
			$collection->update(array($id => $id_value), 
					array('$set' => $data));
			
			$connection->close();
		} catch (MongoConnectionException $e) {
			die('Error connecting to MongoDB server');
		} catch (MongoException $e){
			die('Error : ' . $e->getMessage());
		}
	}
}
?>