<?php
/**
 * login handle
 * @author vantuanlee@gmail.com
 * */
class LoginController{

	/**
	 *
	 * */
	public function validateLoginForm($username){

	}

	/**
	 * main login method
	 * @param $username user name
	 * @param $password pass word
	 * @return login result
	 * */
	public function login($username, $password) {
		
	}

	/**
	 *
	 * */
	public function getForgotPassword(){

	}
}

// get action form request params
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "";
switch ($action) {
	case "login":
		// check login
		$username = isset($_REQUEST["uname"]) ? $_REQUEST["uname"] : "";
		$password = isset($_REQUEST["psswd"]) ? $_REQUEST["psswd"] : "";
		
		if ($username != "" && $password != "") {
			try {
				// do login
				$loginCtrl = new LoginController();
				$loginResult = $loginCtrl->login($username, $password);
				// if login successful
				session_start();
				$_SESSION['is_login'] = true;
				$_SESSION['staff_type'] = "null";
				$_SESSION['uname'] = $username;
				
				echo $_SESSION['is_login'];
				
				echo "Successful";
			} catch (Exception $e) {
				echo "Login Failed";		
			}
		} else {
			echo "Login Failed";
		}
		break;
	
	default:
	break;
}

?>