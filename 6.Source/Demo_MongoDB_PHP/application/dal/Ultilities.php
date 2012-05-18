<?php
/**
 * 
 * */
require_once("configure.php");
require_once("MySqlDatabase.php");

class Ultilities{
	public static function convertMySqlDB2MongoDB($mysqldb_name, $mongodb_name){
		// connect to mysql database
		$tables = MySqlDatabase::getAllTableFrom($mysqldb_name);
		
		// connect to mongo
		$mongo_connection = new Mongo();
		// create database
		$mongo_database  = $mongo_connection->{$mongodb_name};
		
		foreach ($tables as $index => $name){
			// create collection in MongoDB
			$collection = $mongo_database->{$name};
			
			$table_data = MySqlDatabase::getAllDataFrom($name);
			foreach ($table_data as $row_id => $row){
				// insert document
				$collection->save($row);
			}
		}
	}	
}

?>