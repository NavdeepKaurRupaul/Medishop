<?php
include_once("php_mysql_conn.php");
	$userid=$_POST["userid"];
	$mname=$_POST["mname"];
	$cname=$_POST["cname"];
	$md=$_POST["md"];
	$ed=$_POST["ed"];
	$type=$_POST["type"];
	$potency=$_POST["potency"];
    $quantity=$_POST["quantity"];

	$pic1_name=$_FILES["pic1"]["name"];	
	$pic1_temp_name=$_FILES["pic1"]["tmp_name"];
	$pic1_name=$userid."-".$pic1_name;

	$pic2_name=$_FILES["pic2"]["name"];	
	$pic2_temp_name=$_FILES["pic2"]["tmp_name"];
	$pic2_name=$userid."-".$pic2_name;
    //city
    $q_city="select city from usersprofile where id='$userid'";
	$table=mysqli_query($dbcon,$q_city);
	while($row=mysqli_fetch_array($table)){
		$cityy=$row['city'];
	}
    //
	$query="insert into pro_med_post (userid,med_name,comp_name,manu_date,exp_date,type,potency,quantity,pic1_path,pic2_path,city) values('$userid','$mname','$cname','$md','$ed','$type','$potency','$quantity','$pic1_name','$pic2_name','$cityy')";
	mysqli_query($dbcon,$query);	
	move_uploaded_file($pic1_temp_name,"uploads/".$pic1_name);
	move_uploaded_file($pic2_temp_name,"uploads/".$pic2_name);
	$msg=mysqli_error($dbcon);
	if($msg=="")
		header("location:provider-response.php?userid=".$userid."&msg=Medicine Uploaded Successfully!!");
	else
		echo $msg;
?>