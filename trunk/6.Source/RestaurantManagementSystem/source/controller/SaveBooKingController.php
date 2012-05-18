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
	 * @param 
	
	 * @return return true
	 * */
public function save_Booking()
{
	
 
	
	
}
}
// get action form request params

try {
	// do login
	$save = new SaveBookingController();
	$Result = $save->save_Booking();
	echo $Result;

} catch (Exception $e) {
	echo "Not Connect to database";
}


?>