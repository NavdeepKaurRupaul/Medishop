<?php
	include_once("php_mysql_conn.php");
	$mail=$_GET["email"];
	$query="update usersprofile set status=0 where id='$mail'";
	mysqli_query($dbcon,$query);//1 or 0 possibility
	$row=mysqli_affected_rows($dbcon);
	if($row==0){
		echo "invalid id";
	}
else{
	echo "Blocked!!";//gives us JSON format
}
?>
