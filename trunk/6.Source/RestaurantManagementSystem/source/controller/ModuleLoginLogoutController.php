<?php
require_once '../dal/AccountDAO.php';
/**
 * login handle
 * @author vantuanlee@gmail.com
 * */
class ModuleLoginLogoutController{

	/**
	 * @param string $username
	 */
	public function validateLoginForm($username){


	}

	/**
	 * main login method
	 * @author thanhtuan
	 * @param $username user name
	 * @param $password pass word
	 * @return true if login successful and otherwise
	 * */
	public function login($username, $password) {
		$dao = new AccountDAO();
		$account = $dao->getInfo($username);

		// if account exists
		if ($account != null) {
			$psswd = $account["Password"];
			// if login successful
			if ($psswd === $password) {
				session_start();
				$_SESSION['is_login'] = true;
				$_SESSION['staff_type'] = $account["LoaiNV"];
				$_SESSION['staff_id'] = $account["MaNV"];
				$_SESSION['username'] = $account["TenNV"];
				$_SESSION['restaurant'] = $account["MaNH"];
				return true;
			}
		}
		// if login unsuccessful
		return false;
	}


	/**
	 * logout
	 * @date May 12, 2012
	 * @return boolean
	 * @author vantuanlee@gmail.com
	 */
	public function logout(){
		// get user
		session_start();
		if ($_SESSION['is_login'] != true) {
			return false;
		}
		try {
			//$username = $_SESSION['uname'];
			unset($_SESSION['uname']);
			unset($_SESSION['staff_type']);
			$_SESSION['is_login'] = false;
			return true;
		} catch (Exception $e) {
			return false;
		}
	}

	/**
	 *
	 * */
	public function getForgotPassword(){
	}


}

// get action form request params
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "";
if ($action == "login") {
	// check login
	$username = isset($_REQUEST["uname"]) ? $_REQUEST["uname"] : "";
	$password = isset($_REQUEST["psswd"]) ? $_REQUEST["psswd"] : "";

	if ($username != "" && $password != "") {
		try {
			// do login
			$loginCtrl = new ModuleLoginLogoutController();
			$loginResult = $loginCtrl->login($username, $password);
			echo $loginResult;

		} catch (Exception $e) {
			echo "Login Failed";
		}
	} else {
		echo "Login Failed";
	}
} else if ($action == "logout") {
	$logoutCtrl = new ModuleLoginLogoutController();
	echo $logoutCtrl->logout();
}
?>