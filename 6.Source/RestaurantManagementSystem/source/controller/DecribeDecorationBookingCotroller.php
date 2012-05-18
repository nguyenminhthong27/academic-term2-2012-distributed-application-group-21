<?php
require_once '../dal/TableDAO.php'; // suppose
class DecribeDecoration{
	
	/**
	 * all methods that're relatives to Search booking object
	 * @author thanhtuan
	 *
	 */
	/**
	 * main  decribe_Decoration method
	 * @param $id string
	 
	 * @return gui information about decribe Decoration for area.
	 * */	
public function decribe_Decoration($id)
{
	
	$dao = new TableDAO() ;//supose
	$result = $dao->getDecribe($ID_Table);	
	$data =  "<p>Mô tả trang trí</p>";
	$data = $data."<p>$result</p>";
	return $data;

}
}
 $id = isset($_REQUEST["ID"]) ? $_REQUEST["ID"] : "";


try {
	// do login
	$decribe = new DecribeDecoration();
	$Result = $decribe->decribe_Decoration($id);
	echo $Result;

} catch (Exception $e) {
	echo "Not Connect to database";
}

?>