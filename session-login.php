<?php
	session_start();//session array is created	
	$uid=$_GET["uid"];
	$_SESSION["user"]=$uid;
	echo "<h2>Welcome: ".$_SESSION["user"]."<h2>";
?>
