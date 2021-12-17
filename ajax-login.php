<?php
	include_once("php_mysql_conn.php");
	$mail=$_GET["email"];
	$password=$_GET["password"];
	$query="select * from users where email='$mail' and pwd='$password'";
	$table=mysqli_query($dbcon,$query);//1 or 0 possibility
	$count=mysqli_num_rows($table);
	if($count==0)
		echo "Invalid";
	else
		while($row =mysqli_fetch_array($table)){
			echo $row["category"];
		}
?>