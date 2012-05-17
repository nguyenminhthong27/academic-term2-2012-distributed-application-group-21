<?php
/**
 * login handle
 * @author vantuanlee@gmail.com
 * */
class LoginController{
    
	 public $type = "MaLoaiNV";//temporary staff_type
	 
	
	/**
	 *
	 * */
	public function validateLoginForm($username){
		

	}

	/**
	 * @author thanhtuan
	 * main login method
	 * @param $username user name
	 * @param $password pass word
	 * @return login result
	 * */
	public function login($username, $password) {
		
		$result_suc = "Chào Mừng , " ;
		$reusult_fail = "Login Failed";
	     $acount  = new AccountDAO(); 
		 $loginResult = $acount->validateLonginInfo($username,$password);
		 if(isset($loginResult))
		 {
		 	session_start();
		 	$_SESSION['is_login'] = true;
		 	$_SESSION['staff_type'] = $loginResult[$type];
		 	$_SESSION['uname'] = $username;
		 	$result_suc = $result_suc. $username.'<a href="javascript:logout()">Logout';
		 	 return $result_suc;
		 }
		 else
		 {
		 	return $reusult_fail;
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
			    echo $loginResult;
				
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