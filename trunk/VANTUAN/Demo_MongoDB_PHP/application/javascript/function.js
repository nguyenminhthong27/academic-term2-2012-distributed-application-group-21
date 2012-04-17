function confirmLink(a, b)
{
    var c = confirm("Do you want really :\n" + b);
    if(c)
        if(typeof a.href != "undefined")
            a.href += b + "&is_js_confirmed=1";
        else if(typeof a.form != "undefined")
            a.form.action += "?is_js_confirmed=1";
    return c;
}

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

function addStaff(){
	var c = confirm("Do you want to add this staff?");
	if(c){
		confirm("fas");
		var maNV = encodeURI(document.getElementById("txtMaNV").value);
		var hoTen = encodeURI(document.getElementById("txtHoTen").value);
		var ngaySinh = encodeURI(document.getElementById("txtNgaySinh").value);
		var diaChi = encodeURI(document.getElementById("txtDiaChi").value);
		var phai = encodeURI(document.getElementById("txtPhai").value);
		var luong = encodeURI(document.getElementById("txtLuong").value);
		var maPhong = encodeURI(document.getElementById("txtMaPhong").value);
		// set the random number to add to URL request
		var nocache = Math.random();
		// Pass the login variables like URL variable
		
		var http = createXMLHttpRequest();
		var serverURL = "../controller/add_staff.php?id=" + maNV + "&name=" + hoTen +
			"&birth=" + ngaySinh + "&addr=" + diaChi + "&sex=" + phai + 
			"&salary=" + luong + "&dept=" + maPhong + "&nocache=" + nocache;
		
		confirm(serverURL);
		
		http.open('get', serverURL, true);
		http.onreadystatechange = function()
			{
				if(http.readyState==4 && http.status==200){
					document.getElementById("data").innerHTML = http.responseText;
				}
			}
		http.send();
	}
}

function removeStaff(id)
{
    var c = confirm("Do you want really :\n" + id);
    if(c){
    	var nocache = Math.random();
    	var http = createXMLHttpRequest();
		var serverURL = "../controller/remove_staff.php?id=" + id + "&nocache=" + nocache;
		http.open('get', serverURL, true);
		http.onreadystatechange = function()
			{
				if(http.readyState==4 && http.status==200){
					document.getElementById("data").innerHTML = http.responseText;
				}
			}
		http.send();
    }
}

function getValueFrom(control){
    return (control.value != null ? control.value : null);
}


function setValueTo(control, text) {
    document.getElementsByName(control)[0].value = text;
}

function setTextTo(id, text) {
    document.getElementById(id).Text = text;
}

function selectOnChange(selectObj){
	var str = selectObj.options[selectObj.selectedIndex].value;
	
	var nocache = Math.random();
	var http = createXMLHttpRequest();
	var serverURL = "../controller/get_rss.php?xml=" + str + "&nocache=" + nocache;
	http.open('get', serverURL, true);
	http.onreadystatechange = function()
		{
			if(http.readyState==4 && http.status==200){
				document.getElementById("rss_output").innerHTML = http.responseText;
			}
		}
	http.send();
}


function selectAll(){
    var list = document.getElementsByName("rowid[]");
    var v = document.getElementById("idSelectAll").checked;
    for(var i = 0; i < list.length; i++)
    {
        list[i].checked  = v;
    }
}