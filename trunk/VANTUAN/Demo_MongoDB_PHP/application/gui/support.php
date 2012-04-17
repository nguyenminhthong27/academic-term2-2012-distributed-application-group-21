<?php
class Support{
	public static $css = '
		<link rel="stylesheet" type="text/css" href="../css/general.css" />	
	';
	public static $js = '
		<script type="text/javascript" src="../javascript/function.js"></script>
	';
	public static $menu = '
		<div id="header">
            <div id="nav-main">
                <ul id="menubar">
                    <li id="nav-main-home" class="menu">
                        <a href="index.php" tabindex="0" aria-owns="nav-main-features-submenu" aria-haspopup="true">Home</a>
                    </li>
                    <li id="nav-main-staff"  class="menu">
                        <a href="staff_manager.php" tabindex="0" aria-owns="nav-main-features-submenu" aria-haspopup="true">Staff Manager</a>                    
                    </li>
                    <li id="nav-main-staff"  class="menu">
                        <a href="about.php" tabindex="0" aria-owns="nav-main-features-submenu" aria-haspopup="true">About</a>                    
                    </li>
                </ul>
            </div><br/><br/><br/> 
        </div>
	';
}
?>