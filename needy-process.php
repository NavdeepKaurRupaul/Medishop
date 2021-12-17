<?php
	include_once("php_mysql_conn.php");
	$userid=$_POST["userid"];
	$fname=$_POST["fname"];
	$lname=$_POST["lname"];
	$address=$_POST["address"];
	$city=$_POST["city"];
	$idtype=$_POST["idtype"];
	$idnum=$_POST["idnum"];
    $mob=$_POST["mob"];

	$pic_name=$_FILES["ppic"]["name"];	
	$pic_temp_name=$_FILES["ppic"]["tmp_name"];
	$pic_name=$fname."-".$pic_name;

	$idpic_name=$_FILES["idpic"]["name"];	
	$idpic_temp_name=$_FILES["idpic"]["tmp_name"];
	$idpic_name=$fname."-".$idpic_name;

	$fullname=$fname." ".$lname;
	$btn=$_POST["btn"];
/*for save*/
	if($btn=="Save"){
		$query="insert into needyprofile values('$userid','$fullname','$mob','$address','$city','$pic_name','$idpic_name','$idtype','$idnum')";
		mysqli_query($dbcon,$query);	
		move_uploaded_file($pic_temp_name,"uploads/".$pic_name);
		move_uploaded_file($idpic_temp_name,"uploads/".$idpic_name);
		$msg=mysqli_error($dbcon);
		if($msg=="")
			header("location:provider-response.php?userid=".$userid."&msg=Record Submitted Successfully!!");
		else
			echo $msg;
	}
/*for updation*/
	else if($btn=="Update"){
		$userid=$_POST["userid"];
		$fname=$_POST["fname"];
		$lname=$_POST["lname"];
		$address=$_POST["address"];
		$city=$_POST["city"];
		$idtype=$_POST["idtype"];
		$idnum=$_POST["idnum"];
		$mob=$_POST["mob"];
		$pic_name=$_FILES["ppic"]["name"];	
		$pic_temp_name=$_FILES["ppic"]["tmp_name"];
		$idpic_name=$_FILES["idpic"]["name"];
		$idpic_temp_name=$_FILES["idpic"]["tmp_name"];
		$fullname=$fname." ".$lname;
		$pichidden=$_POST["pichidden"];
		$idhidden=$_POST["idhidden"];
		
		if($pic_name==""){
			$pic_name=$pichidden;
		}
		else{
			$pic_name=$fname."-".$pic_name;
			move_uploaded_file($pic_temp_name,"uploads/".$pic_name);
		}
		if($idpic_name==""){
			$idpic_name=$idhidden;
		}
		else{
			$idpic_name=$fname."-".$idpic_name;
			move_uploaded_file($idpic_temp_name,"uploads/".$idpic_name);
		}
		$query="update needyprofile set id='$userid', name='$fullname', contact='$mob', address='$address', city='$city', picpath='$pic_name', idpath='$idpic_name',idtype='$idtype',idnumb='$idnum' where id='$userid'";
		mysqli_query($dbcon,$query);
		$msg=mysqli_error($dbcon);
		if($msg=="")
			header("location:needy-response.php?userid=".$userid."&msg=Record Updated Successfully!!");
		else
			echo $msg;
	}
?>
