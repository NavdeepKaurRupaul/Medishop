<?php
	include_once("php_mysql_conn.php");
	$mail=$_GET["uidy"];
	if($mail==""){
		echo "Mail id can't be empty &#128577;";
		return;
	}
	$query="select * from Users where email='$mail'";
	$queryres=mysqli_query($dbcon,$query);//1 or 0 possibility
	$count=mysqli_num_rows($queryres);
	if($count==0)
		echo "Available &#10004;";
	else
		echo "Occupied &#10060;";
?>