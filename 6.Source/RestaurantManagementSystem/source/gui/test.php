<?php
    $result = new DateTime("06/09/2012 04:00");
	$result =  $result->format('Y-m-d');//format YY-MM-DD
	$result1 = new DateTime($result);
	$result1 =  $result1->format('Y-m-d H:i:s');//format YY-MM-DD HH:mm:ss
echo $result;
echo "</br>";
echo $result1; 
?>