<?php
	include_once("php_mysql_conn.php");
	$query="select distinct med_name from pro_med_post";
	$table=mysqli_query($dbcon,$query);
	$ary=array();
	while($row=mysqli_fetch_array($table)){
		$ary[]=$row;
	}
	echo json_encode($ary);
?>
