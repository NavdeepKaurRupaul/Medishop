<?php
	include_once("php_mysql_conn.php");
	$mail=$_GET["userid"];
	$newpwd=$_GET["newpwd"];
	$query="update users set pwd='$newpwd' where email='$mail'";
	mysqli_query($dbcon,$query);	
	$msg=mysqli_error($dbcon);
	if($msg==""){
		echo "Your password has been updated &#128513;";
	}
	else
		echo $msg;
?>