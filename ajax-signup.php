<?php
	include_once("php_mysql_conn.php");
	$mail=$_GET["email"];
	$password=$_GET["password"];
	$mobnum=$_GET["mobnum"];
	$category=$_GET["category"];
	if($category=="pro"){
		$category="Provider";
	}
	else{
		$category="Needy";
	}
	$query="insert into USERS (email,pwd,mobile,category,date_of_signup) values('$mail','$password','$mobnum','$category', current_date())";
		mysqli_query($dbcon,$query);	
		$msg=mysqli_error($dbcon);
		if($msg==""){
			echo "Your account has been created &#128513;";
		}
		else
			echo $msg;
?>