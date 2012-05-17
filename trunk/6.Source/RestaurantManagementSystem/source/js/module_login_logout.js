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
	var serverURL = "../controller/LoginController.php?action=login &uname=" + username + "&psswd=" + password + "&nocache=" + nocache;
	http.open("POST", serverURL, true);
	http.onreadystatechange = function()
		{
			if(http.readyState==4 && http.status==200){
				var respone = http.responseText;
				if (respone == "Login Failed") {
					// if login failed
					document.getElementById("login_result").innerHTML = respone;
				} else {
					// if login success					
					window.location = "../gui/home.php";
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
	var serverURL = "../controller/LogoutController.php?action=logout&nocache=" + nocache;
	http.open("POST", serverURL, true);
	http.onreadystatechange = function()
		{
			if(http.readyState==4 && http.status==200){
				var respone = http.responseText;
				alert(respone);
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