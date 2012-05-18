<?php
class MySqlDatabase {
	/**
	 * @
	 * connect to database with username and password
	 * return
	 */
	private static function connect() {
		require_once 'configure.php';
		$link = mysql_connect(Configuration::$_hostname, Configuration::$_username, Configuration::$_password);
		if (!$link) {
			die("Could not connect : " . mysql_error());
		}
		mysql_select_db(Configuration::$_database);
	}
	
	/**
	 * get all table from database
	 * @param $database database name
	 * @return array
	 * */
	public static function getAllTableFrom($database){
		// connect
		MySqlDatabase::connect();
		$query = "SHOW TABLES FROM $database";
		$result = mysql_query($query);
		
		if (!$result) {
			echo "DB error, could not list tables\n";
			echo "MySQL error : " . mysql_errno();
			exit;
		}
		
		$array = array();
		$i = 0;
		while ($row = mysql_fetch_row($result)) {
			$array[$i] = $row[0];
			$i++;
		}
		
		mysql_free_result($result);
		return $array;
	}
	
	/**
	 * get all data from database
	 * @param $table table name
	 * @param $condition condition for querying
	 * @return Array
	 */
	public static function getAllDataFrom($table, $condition = null) {
		MySqlDatabase::connect();
	
		$sql = "select * from $table ";
		if ($condition != null) {
			$sql .= $condition;
		}
	
		$result = mysql_query($sql) or die(mysql_error());
	
		$table_result = array();
		$r = 0;
		while ($row = mysql_fetch_assoc($result)) {
			$arr_row = array();
			$c = 0;
			while ($c < mysql_num_fields($result)) {
				$col = mysql_fetch_field($result, $c);
				$arr_row[$col->name] = $row[$col->name];
				$c++;
			}
			$table_result[$r] = $arr_row;
			$r++;
		}
		return $table_result;
	}	
}
?>