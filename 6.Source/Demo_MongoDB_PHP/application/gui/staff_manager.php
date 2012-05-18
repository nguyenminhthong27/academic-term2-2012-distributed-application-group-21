<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<?php 
	require_once 'support.php';
	echo Support::$css;
	echo Support::$js;
?>
<title>Staff Manager</title>
</head>
<body>
	<?php
	echo Support::$menu;
	?>
	
	<form method="get" name="frm" action="javascript:addStaff()">
            <div>
                <div class="left">
                    <table>
                        <tr>
                            <td>MaNV</td>
                            <td><input type="text" id="txtMaNV" name="txtMaNV"/><br/></td>
                        
                            <td>HoTen</td>
                            <td><input type="text" id="txtHoTen" name="txtHoTen"/><br/></td>
                        
                            <td>NgaySinh</td>
                            <td><input type="text" id="txtNgaySinh" name="txtNgaySinh"/><br/></td>
                        
                            <td>DiaChi</td>
                            <td><input type="text" id="txtDiaChi" name="txtDiaChi"/><br/></td>
                        </tr>
                        <tr>
                            <td>Phai</td>
                            <td><input type="text" id="txtPhai" name="txtPhai"/><br/></td>
                        
                            <td>Luong</td>
                            <td><input type="text" id="txtLuong" name="txtLuong"/><br/></td>
                        
                            <td>Ma Phong</td>
                            <td><input type="text" id="txtMaPhong" name="txtMaPhong"/><br/></td>
                            <td></td>
                            <td><input class="submit_button" type="submit" name="add" value="Add Staff"/></td>
                        </tr>
                    </table>
                    
                </div>            
            </div>
        </form>            
   <br/>
    
	<?php		
	require_once '../controller/staff_controller.php';
	require_once '../controller/Ultilities.php';
	
	echo '<div id="data">';
	
	$ctrl = new StaffController();
	$array = $ctrl->getAllStaff();
	Ultilites::html_show_staffs($array);
	
	echo '</div>';
	 
	?>
</body>
</html>