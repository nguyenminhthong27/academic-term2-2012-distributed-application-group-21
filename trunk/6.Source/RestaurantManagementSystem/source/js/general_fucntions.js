/**
 * all general functions for project, example createHttpRequest...
 * @author vantuanlee@gmail.com
 */

/**
 * create XMLHpptRequest object for Ajax
 * @param null
 * @return XMLHttpRequest object
 * @author vantuanlee@gmail.com
 * */
function createXMLHttpRequest()
{
	var xmlhttp;	
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	return xmlhttp;
}