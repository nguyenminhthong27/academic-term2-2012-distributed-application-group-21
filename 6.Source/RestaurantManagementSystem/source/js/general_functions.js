/**
 * all general functions for project, example createHttpRequest...
 * @author vantuanlee@gmail.com
 */

/**
 * create XMLHpptRequest object for Ajax
 * 
 * @param null
 * @return XMLHttpRequest object
 * @author vantuanlee@gmail.com
 */
function createXMLHttpRequest() {
	var xmlhttp;
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	return xmlhttp;
}

/**
 * include JS file from another js file
 * @param jsPath
 * @author vantuanlee@gmail.com
 */
function includeJS(jsPath) {
	var script = document.createElement("script");
	script.setAttribute("type", "text/javascript");
	script.setAttribute("src", jsPath);
	document.getElementsByTagName("head")[0].appendChild(script);
}