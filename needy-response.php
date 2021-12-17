<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>MEDISHOP-PROVIDER</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--Title icon-->
	<link rel="shortcut icon" href="pics/icon.png">
	<!--css bootstrap link-->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!--js bootstrap link-->
	<script src="js/bootstrap.bundle.min.js"></script>
	<link rel="shortcut icon" href="pics/icon.png">
	<!--css style-->
	<script src="js/bootstrap.bundle.min.js"></script>
	<style>
		h2 {
			background-image: linear-gradient(to right, #fc6666 0%, #ffbf49 25%, #f7f76e 50%, #7cff7c 75%, #4f4fff 100%);
			box-shadow:  0px 0px 20px black;
		}

		h3 {
			background-image: linear-gradient(to right, #fc6666 0%, #ffbf49 25%, #f7f76e 50%, #7cff7c 75%, #4f4fff 100%);
			box-shadow:  0px 0px 20px black;
			margin-top: 50px;
			padding: 10px
		}

	</style>
</head>

<body style="background-image: url(pics/medibackground.png)">
	<div class="p-3 mb-2 fixed-top bg-danger text-white" style="font-size: 25px; color: white; font-weight: bold;text-transform: uppercase">
		<img src="pics/icon.png" alt="" width="35" height="35" class="d-inline-block align-top">
		MEDISHOP-NEEDY-Profile-saved!!
	</div>
	<center style="margin-top:200px">
		<h2 style="box-shadow:0px 0px 20px black">
			Welcome:
			<?php
			echo $_GET["userid"]; 
		?>	
		</h2>
		<h3>
			<?php echo $_GET["msg"];?>
		</h3>
		<a href="index.html"> 
		<button type="button" class="btn btn-danger w-25 mt-3" style="box-shadow:  0px 0px 20px black;">Go Back To Home Page!!</button>
		</a>
	</center>
</body>

</html>
