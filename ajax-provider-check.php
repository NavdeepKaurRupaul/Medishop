<?php
include_once("php_mysql_conn.php");
	$id=$_GET["uid"];
	$query="select * from usersprofile where id='$id'";
	$queryres=mysqli_query($dbcon,$query);//1 or 0 possibility
	$count=mysqli_num_rows($queryres);
	if($count==0)
		echo "Id doesn't exit in our database&#10060;";
?>