<?php
//check is_login
session_start();
$is_login = isset($_SESSION['is_login']) ? $_SESSION['is_login'] : false;
$uname = isset($_SESSION['uname']) ? $_SESSION['uname'] : "";
if ($is_login == false) {
	require_once '../configure/GeneralFunctions.php';
	echo GeneralFunctions::Alert("Bạn chưa đăng nhập.");	
	header("Location: index.php");
}

require_once '../configure/IncludeGenerator.php'; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>T4V RESTAURANT</title>
        <link rel="stylesheet" href="../css/index.css" type="text/css" media="all" />
        <script type="text/javascript" src="../js/module_login_logout.js"></script>
        <script type="text/javascript" src="../js/module_booking.js"></script>
        <?php 
        echo IncludeGenerator::CSSGenerate();
        echo IncludeGenerator::JSGenerate();
        ?>
    </head>
    <body>
        <div id="page" class="shell">
            <!-- Logo + Search + Navigation -->
            <?php
            echo IncludeGenerator::LogoGenerate();
            echo IncludeGenerator::LogoutLinkGenerate($uname); 
            ?>
            
            <!-- END Logo + Search + Navigation -->
            <!-- Header -->
            <div id="header">
                <!-- Slider -->
                <?php
                echo IncludeGenerator::SliderGenerate(); 
                ?>
                <!-- END Slider -->	
            </div>
            <!-- END Header -->
            <!-- Main -->
            <div id="main">		
                <?php
                echo IncludeGenerator::MainFunctionsGenerate(); 
                ?>
            </div>
            <!-- END Main -->
            <!-- Footer -->
            <?php 
            echo IncludeGenerator::FooterGenerate();
            ?>
            <!-- END Footer -->
            <br />
        </div>
    </body>
</html>