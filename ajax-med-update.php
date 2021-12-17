<?php
	include_once("php_mysql_conn.php");
	$rid=$_GET["rid"];
	$quantity=$_GET["quantity"];
//echo $quantity;
	$query="update pro_med_post set quantity='$quantity' where rid='$rid'";
	$table=mysqli_query($dbcon,$query);//1 or 0 possibilit
	$msg=mysqli_error($dbcon);
	if($msg==""){
		echo "<font color='green'>Updated&#128522;!!</font>";
	}
	else{
		echo "<font color='red'>Error&#128533;!!</font>";
	}
?>
