<?php
	include_once("php_mysql_conn.php");
	$mail=$_GET["uidy"];
	$query="select * from Users where email='$mail'";
	$queryres=mysqli_query($dbcon,$query);//1 or 0 possibility
	$count=mysqli_num_rows($queryres);
	$category_query="select pwd from USERS where email='$mail'";
	$cat_query_res=mysqli_query($dbcon,$query);//1 or 0 possibility
	$row=mysqli_fetch_array($cat_query_res);
	if($count==0)
		echo "Invalid mail &#10060;";
	else
		echo $row['pwd'];
?>