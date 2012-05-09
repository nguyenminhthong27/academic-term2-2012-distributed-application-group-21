/**
 * javascript functions for module login, logout
 * @author vantuanlee@gmail.com
 */

/**
 * login
 * @param null
 * @author vantuanlee@gmail.com
 * */
function login(){

	var username = document.getElementById('txtUsername').value;
	var password = document.getElementById('txtPassword').value;
	window.location = "../html/home.php";
	
}

/**
 * logout
 * @param null
 * @author vantuanlee@gmail.com
 */
function logout(){
	// do logout
	
	// redirect to login page
	window.location = "../gui/index.php";
}