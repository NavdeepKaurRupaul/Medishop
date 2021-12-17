<?php
	include_once("php_mysql_conn.php");
	$rid=$_GET["rid"];
	$query="delete from pro_med_post where rid='$rid'";
	$table=mysqli_query($dbcon,$query);//1 or 0 possibility
	echo "Deleted Successfully!";//gives us JSON format
?>
