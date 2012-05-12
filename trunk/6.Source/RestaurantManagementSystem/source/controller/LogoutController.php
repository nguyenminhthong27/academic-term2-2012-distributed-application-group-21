<?php
class LogoutController{
	
	/**
	 * logout
	 * @date May 12, 2012
	 * @author vantuanlee@gmail.com 
	 */
	public function logout(){
		// get user
		session_start();
		if ($_SESSION['is_login'] != true) {
			return false;
		}
		try {
			$username = $_SESSION['uname'];
			unset($_SESSION['uname']);
			unset($_SESSION['staff_type']);
			$_SESSION['is_login'] = false;
			return true;
		} catch (Exception $e) {
			return false;
		}	
	}
} 
?>

<?php
// get action
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
if ($action == 'logout') {
	$logoutCtrl = new LogoutController();
	echo $logoutCtrl->logout();
}
?>