<?php
require_once '../controller/GUIGenerator.php';
require_once '../configure/IncludeGenerator.php'; 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>Restaurant Management System</title>
        <link rel="stylesheet" href="../css/login.css" type="text/css" media="all" />
        <script type="text/javascript" src="../js/module_login_logout.js"/>
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
                <div class="cols two-cols">
                    <div class="cl">&nbsp;</div>
                    <div class="col">
                        <img src="../css/images/userIcon.png" ></img>
                        <div class="text">
                            <form action="javascript:login()">
                                <table>
                                    <tr>
                                        <td>Username</td>
                                        <td>
                                            <input id="txtUsername" type="text"></input><br/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Password</td>
                                        <td>
                                            <input id="txtPassword" type="password"></input><br/>
                                        </td>
                                    </tr>
                                </table>                             

                                <input id="submit" type="submit" value="Đăng nhập"></input>
                            </form>
                        </div>
                    </div>
                    <div class="cl">&nbsp;</div>
                </div>                
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