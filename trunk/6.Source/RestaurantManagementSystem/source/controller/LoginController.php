<?php
require_once '../dal/AccountDAO.php';
/**
 * login handle
 * @author vantuanlee@gmail.com
 * */
class LoginController{

	public $type = "MaLoaiNV";//temporary staff_type

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
				$_SESSION['uname'] = $username;
				return true;
			}
		}
		// if login unsuccessful
		return false;
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
			$loginCtrl = new LoginController();
			$loginResult = $loginCtrl->login($username, $password);
			echo $loginResult;

		} catch (Exception $e) {
			echo "Login Failed";
		}
	} else {
		echo "Login Failed";
	}
}
?>