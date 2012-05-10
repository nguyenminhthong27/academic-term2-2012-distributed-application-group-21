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


// check login
$username = isset($_REQUEST["uname"]) ? $_REQUEST["uname"] : "";
$password = isset($_REQUEST["psswd"]) ? $_REQUEST["psswd"] : "";

if ($username != "" && $password != "") {
	try {
		// do login
		$loginCtrl = new LoginController();
		$loginResult = $loginCtrl->login($username, $password);
	} catch (Exception $e) {
		echo "Login Failed";		
	}
} else {
	echo "Login Failed";
}

?>