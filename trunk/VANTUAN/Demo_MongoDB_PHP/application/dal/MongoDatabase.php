<?php
class MongoDatabase {
	
	/**
	 * get all data from table $collection
	 * @param @collection  name
	 * @return Array studens
	 */
	public static function getAllDataFrom($collection_name, $condition = null) {
		try {
			$connection = new Mongo();
			$db = $connection->selectDB('nhanviendb');
			$collection = $db->{$collection_name};
			
			// get all from collection, except '_id'
			$cursor = $collection->find(array(), array('_id' => 0));
			
			$arr = array();
			$i = 0;
			// fetch cursor to arr
			foreach ($cursor as $document){
				$arr[$i] = array(
							"MaNV" => $document["MaNV"],
							"HoTen" => $document["HoTen"],
							"NgaySinh" => $document["NgaySinh"],
							"DiaChi" => $document["DiaChi"],
							"Phai" => $document["Phai"],
							"Luong" => $document["Luong"],
							"Phong" => $document["Phong"]);
				$i++;
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
	 * insert an array infomation of one student in to student table
	 * @param $table the name of table need insert into
	 * @param $data an array, contents the informations of one students
	 * @return result of function call 'mysql_query'
	 */
	public static function addDataTo($collection_name, $data) {
		try {			
			$connection = new Mongo();
			$db = $connection->selectDB('nhanviendb');
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
	 * remove an student from database
	 */
	public static function removeDataFrom($collection_name, $id, $id_value) {
		try {
			$connection = new Mongo();
			$db = $connection->selectDB('nhanviendb');
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
	 * modify the information of one student
	 */
	public static function modifyDataFrom($collection_name, $data, $id, $id_value) {
		try {
			$connection = new Mongo();
			$db = $connection->selectDB('nhanviendb');
			$collection = $db->{$collection_name};
			
			$collection->update(array($id => $id_value), 
					array('$set' => array(
							"MaNV" => $data["MaNV"],
							"HoTen" => $data["HoTen"],
							"NgaySinh" => $data["NgaySinh"],
							"DiaChi" => $data["DiaChi"],
							"Phai" => $data["Phai"],
							"Luong" => $data["Luong"],
							"Phong" => $data["Phong"]
							)));
			
			$connection->close();
		} catch (MongoConnectionException $e) {
			die('Error connecting to MongoDB server');
		} catch (MongoException $e){
			die('Error : ' . $e->getMessage());
		}
	}
}
?>