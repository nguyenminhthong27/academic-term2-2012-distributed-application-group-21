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
	var nocache = Math.random();
	
	var http = createXMLHttpRequest();
	var serverURL = "../controller/ModuleLoginLogoutController.php?action=login&uname=" + username + "&psswd=" + password + "&nocache=" + nocache;
	http.open("POST", serverURL, true);
	http.onreadystatechange = function()
		{
			if(http.readyState==4 && http.status==200){
				var respone = http.responseText;
				if (respone == true) {
					// if login successful
					window.location = "../gui/home.php";
				} else {
					// if login success					
					document.getElementById("login_result").innerHTML = "Login Failed, please login again";
				}
			}
		}
	http.send();	
}

/**
 * logout
 * @param null
 * @author vantuanlee@gmail.com
 */
function logout(){
	// do logout
	var nocache = Math.random();
	var http = createXMLHttpRequest();
	var serverURL = "../controller/ModuleLoginLogoutController.php?action=logout&nocache=" + nocache;
	http.open("POST", serverURL, true);
	http.onreadystatechange = function()
		{
			if(http.readyState==4 && http.status==200){
				var respone = http.responseText;
				if (respone == "0") {
					// if login failed
					//document.getElementById("login_result").innerHTML = respone;
				} else {
					// if login success					
					window.location = "../gui/home.php";
				}
			}
		}
	http.send();
}