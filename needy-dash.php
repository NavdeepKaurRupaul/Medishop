<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>MEDISHOP-NEEDY</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--Title icon-->
	<link rel="shortcut icon" href="pics/icon.png">
	<!--css bootstrap link-->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!--js bootstrap link-->
	<script src="js/bootstrap.bundle.min.js"></script>
	<link rel="shortcut icon" href="pics/icon.png">
</head>

<body style="background-image: url(pics/medibackground.png)">
	<div class="p-3 mb-2 fixed-top bg-danger text-white" style="font-size: 25px; color: white; font-weight: bold;text-transform: uppercase">
		<div class="row">
			<div class="col-md-11">
				<img src="pics/icon.png" alt="" width="35" height="35" class="d-inline-block align-top">
				MEDISHOP-NEEDY
			</div>
			<div class="col-md-1">
				<a href="logout.php">
					<button class="btn btn-outline-danger bg-warning text-white" type="submit">
						LogOut
					</button>
				</a>
			</div>
		</div>
	</div>
	<!--session-->
	<?php
		session_start();//session array is created
		echo "<center><h2 style='background-color:#cbaaf8;box-shadow:0px 0px 10px black;margin-top:80px'>Welcome to MediShop-Needy Dashboard: "."<span style='font-size:35px;font-weight:bold;text-transform: uppercase;'>".$_SESSION["user"]."</h2>";
	?>
	<!--session end-->
	<!--card-->
	<br>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="card text-center bg-danger" style="width: 17rem;">
					<img src="pics/user-icon.png" style="border-radius:50%" class="card-img-top bg-white" alt="user_pic">
					<div class="card-body bg-white">
						<h5 class="card-title">Needy</h5>
						<p class="card-text">Dear MediShop needy, <br>Uploads your details here.</p>
						<a href="needy-profile.php" class="btn btn-danger" title="click me to go to your profile!!">Profile</a>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card text-center bg-danger" style="width: 17rem;">
					<img src="pics/find.png" style="border-radius:50%" class="card-img-top bg-white" alt="user_pic">
					<div class="card-body bg-white">
						<h5 class="card-title">FindMed</h5>
						<p class="card-text">Dear MediShop needy, <br>Find medicine here</p>
						<a href="find-med.php" class="btn btn-danger" title="click me to find medicine!!">Find</a>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>
