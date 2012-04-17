<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?php
        require_once 'support.php';
        echo Support::$css;
        echo Support::$js; 
        ?>
        <title></title>
    </head>
    <body>        
        <?php
            if (isset($_REQUEST['action'])) {
                $action = $_REQUEST['action'];
                switch ($action) {
                    case 'edit_staff':
                        if (!isset($_REQUEST['MaNV'])) {
                            return;
                        }
                        $maNV = $_REQUEST['MaNV'];
                        echo Support::$menu;
                        $html = '<div>
                                    <form method="get" action = "../controller/modify_staff.php" name="frm">
                                        <div>
                                            <div class="left">
                                                <table>
                                                    <tr>
                                                        <td>MaNV</td>
                                                        <td><input type="text" name="txtMaNV"/><br/></td>
                                                    </tr>
                                                    <tr>
                                                        <td>HoTen</td>
                                                        <td><input type="text" name="txtHoTen"/><br/></td>
                                                    </tr>
                                                    <tr>
                                                        <td>NgaySinh</td>
                                                        <td><input type="text" name="txtNgaySinh"/><br/></td>
                                                    </tr>
                                                    <tr>
                                                        <td>DiaChi</td>
                                                        <td><input type="text" name="txtDiaChi"/><br/></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Phai</td>
                                                        <td><input type="text" name="txtPhai"/><br/></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Luong</td>
                                                        <td><input type="text" name="txtLuong"/><br/></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ma Phong</td>
                                                        <td><input type="text" name="txtMaPhong"/><br/></td>
                                                    </tr>
                                                </table>
                                                <input class="submit_button" type="submit" name="modify" value="Modify"/>
                                            </div>            
                                        </div>
                                    </form>            
                                </div> <br/>';
                        echo $html;
                        
                        $hoTen = isset($_REQUEST['HoTen']) ? $_GET['HoTen'] : null;
                        $ngaySinh = isset($_REQUEST['NgaySinh']) ? $_GET['NgaySinh'] : null;
                        $diaChi = isset($_REQUEST['DiaChi']) ? $_GET['DiaChi'] : null;
                        $phai = isset($_REQUEST['Phai']) ? $_GET['Phai'] : null;
                        $luong = isset($_REQUEST['Luong']) ? $_GET['Luong'] : null;
                        $phong = isset($_REQUEST['Phong']) ? $_GET['Phong'] : null;
                        
                        $script =   '<script type="text/javascript" >
				                        setValueTo("txtMaNV", "' . $maNV . '");
				                        setValueTo("txtHoTen", "' . $hoTen . '");
				                        setValueTo("txtNgaySinh", "' . $ngaySinh . '");
				                        setValueTo("txtDiaChi", "' . $diaChi . '");
				                        setValueTo("txtPhai", "' . $phai . '");
				                        setValueTo("txtLuong", "' . $luong . '");
				                        setValueTo("txtMaPhong", "' . $phong . '");
			                        </script>';
				                        
                        echo $script;
                        break;
                    default:
                        break;
                }
            }

        ?>
        
        <script>
            function getValueFrom(control){
                return (control.value != null ? control.value : null);
            }
        </script>
    </body>
</html>