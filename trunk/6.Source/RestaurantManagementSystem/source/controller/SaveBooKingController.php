<?php
require_once '../dal/TableDAO.php'; // suppose
class SaveBookingController{
	
	/**
	 * all methods that're relatives to Search booking object
	 * @author thanhtuan
	 *
	 */
	/**
	 * main save_Booking method
	 * @param $table array
	 
	 * @return return true if success else  return false
	 *  * */
public function save_Booking($table)
{
	try {
	   foreach ($array as $value)
      	{
      		//do add table for PhieuDatCho and  ChiTietDatCho
        	$dao = new TableDAO() ;//suppose
	        $dao->addTableTo($value); //suppose method DAO is addTableTo();
     	}
     	return true;
     } catch (Exception $e) {
     		echo "Not Connect to database";
     	}
     	
	return false;
}
}
// get action form request params
 $table = isset($_REQUEST["array"]) ? $_REQUEST["array"] : "";

	// do login
	$save = new SaveBookingController();
	$reusult = $save->save_Booking();
    echo $reusult;


?>