<?php
	include_once("php_mysql_conn.php");
	$userid=$_GET["userid"];
	$query="select * from pro_med_post where userid='$userid'";
	$table=mysqli_query($dbcon,$query);//1 or 0 possibility
	$ary=array();//creation of empty array
	while($row=mysqli_fetch_array($table)){
		$ary[]=$row;//storing row in array
	}
	echo json_encode($ary);//gives us JSON format
?>
