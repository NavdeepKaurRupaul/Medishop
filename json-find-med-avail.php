<?php
	include_once("php_mysql_conn.php");
	$med=$_GET["med"];
	$city=$_GET["city"];
	$query="select * from pro_med_post where med_name='$med' and city='$city'";
	$table=mysqli_query($dbcon,$query);//1 or 0 possibility
	$ary=array();//creation of empty array
	while($row=mysqli_fetch_array($table)){
		$ary[]=$row;//storing row in array
	}
	echo json_encode($ary);//gives us JSON format
?>
