<?php
	include_once("php_mysql_conn.php");
	$mail=$_GET["email"];
	$query="update usersprofile set status=1 where id='$mail'";
	mysqli_query($dbcon,$query);
	echo "Unblocked!!";
?>