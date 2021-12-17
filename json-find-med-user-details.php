<?php
	include_once("php_mysql_conn.php");
	$rid=$_GET["rid"];
	$query="select userid from pro_med_post where rid='$rid'";
	$table1=mysqli_query($dbcon,$query);
	while($row1=mysqli_fetch_array($table1)){
		$userid=$row1["userid"];
	}
	$q_user_details="select * from usersprofile where id='$userid'";
	$table2=mysqli_query($dbcon,$q_user_details);
	while($row2=mysqli_fetch_array($table2)){
		$contact=$row2["contact"];
	}
	echo $contact;
?>
