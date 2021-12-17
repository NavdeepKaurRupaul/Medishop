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
	<!--jquery-->
	<script src="js/jquery-1.8.2.min.js"></script>
	<script>
		$(document).ready(function() {
			/************************************update******************************************/
			$("#save").click(function() {
				if ($("#userid").val() == "") {
					$("#result").html("Enter user email!!");
					$("#result").css("color", "red");
					return;
				} else if ($("#oldpwd").val() == "") {
					$("#result").html("Enter old password!!");
					$("#result").css("color", "red");
					return;
				} else if ($("#newpwd").val() == "") {
					$("#result").html("Enter old password!!");
					$("#result").css("color", "red");
					return;
				}
				var qstring = $("#updateform").serialize();
				var url = "ajax-update-password.php?" + qstring;
				$.get(url, function(responsex) {
					if (responsex == "Your password has been updated &#128513;") {
						$("#result").html(responsex + "!!");
						$("#result").css("color", "green");
					} else {
						$("#result").html(responsex);
						$("#result").css("color", "red");
					}
				});
			})
			/*************************************email checking*********************************/
			$("#userid").blur(function() {
				var uid = $("#userid").val();
				var url = "ajax-update-userid.php?uidy=" + uid;
				$.get(url, function(responsex) {
					if (responsex == "Invalid mail &#10060;") {
						$("#displayemail").html(responsex);
						$("#displayemail").css("color", "red");
					} else if (responsex == "Needy") {
						$("#displayemail").html("Wrong users(Your category is Needy)");
						$("#displayemail").css("color", "red");
					}
				});
			});
			$("#userid").keydown(function() {
				$("#displayemail").html("");
			})
			/**********************************old password check********************************/
			$("#oldpwd").keypress(function() {
				var id = $("#userid").val();
				var url = "ajax-update-oldpwd-check.php?uidy=" + id;
				$.get(url, function(responsex) {
					if (responsex != $("#oldpwd").val()) {
						$("#oldpwderr").html("wrong password &#10060;");
						$("#oldpwderr").css("color", "red");
					} else {
						$("#oldpwderr").html("");
					}
				});
			})
			/**********************************new password check********************************/
			$("#newpwd").blur(function() {
				var id = $("#userid").val();
				var url = "ajax-update-newpwd-check.php?uidy=" + id;
				$.get(url, function(responsex) {
					if (responsex == $("#newpwd").val()) {
						$("#newpwderr").html("You are using same old password &#10060;");
						$("#newpwderr").css("color", "red");
					} else {
						$("#newpwderr").html("Good&#128516;!!");
						$("#newpwderr").css("color", "green");
					}
				});
			})
			$("#newpwd").keydown(function() {
				$("#newpwderr").html("");
			})
		})

	</script>
</head>

<body style="background-image: url(pics/medibackground.png)">
	<div class="p-3 mb-2 fixed-top bg-danger text-white" style="font-size: 25px; color: white; font-weight: bold;text-transform: uppercase">
		<div class="row">
			<div class="col-md-11">
				<img src="pics/icon.png" alt="" width="35" height="35" class="d-inline-block align-top">
				MEDISHOP-Provider
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
	<div class="container-fluid" style="margin-top:100px">
		<!--session-->
		<?php
			session_start();//session array is created
			echo "<center><h2 style='background-color:#cbaaf8;box-shadow:0px 0px 10px black'>Welcome to MediShop-Provider Dashboard: "."<span style='font-size:35px;font-weight:bold;text-transform: uppercase;'>".$_SESSION["user"]."</h2>";
		?>
		<!--session end-->
		<div class="row">
			<!------------------------------------profile---------------------------------------->
			<div class="col-md-2 mt-3" style="margin-left:40px">
				<div class="card text-center bg-danger" style="width: 15rem;">
					<img src="pics/user-icon.png" style="border-radius:50%" class="card-img-top bg-white" alt="user_pic">
					<div class="card-body bg-white">
						<h5 class="card-title">Provider</h5>
						<p class="card-text">Dear MediShop provider, <br>Uploads your details in your profile.</p>
						<a href="provider-profile.php" class="btn btn-danger" title="click me to go to update password!!">Profile</a>
					</div>
				</div>
			</div>
			<!--------------------------------Update--------------------------------------------->
			<div class="col-md-2 offset-1 mt-3">
				<form id="updateform">
					<div class="card text-center bg-danger" style="width: 15rem;">
						<img src="pics/setting.jpg" style="border-radius:70%;" class="card-img-top bg-white" alt="setting pic">
						<div class="card-body bg-white">
							<h5 class="card-title">Provider</h5>
							<p class="card-text">Dear MediShop provider, <br>You can reset your password here.</p>
							<button type="button" title="Click me to change your password" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
								<!--Update-->
							</button>
							<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header bg-danger text-white ">
											<h5 class="modal-title offset-3" id="exampleModalLabel">Provider-Reset Password</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											userid
											<div class="input-group ">
												<span class="input-group-text bg-danger text-white border-danger" id="inputGroup-sizing-default">User id</span>
												<input type="text" readonly value="<?php echo $_SESSION["user"];?>" class="form-control border-danger" aria-label="Sizing example input" id="userid" aria-describedby="inputGroup-sizing-default" name="userid" autocomplete="off">
											</div>
											<span id="displayemail" style="font-weight: bold"> </span>
											<!--old password-->
											<div class="input-group  mt-3">
												<span class="input-group-text bg-danger text-white border-danger" id="inputGroup-sizing-default">Old Password</span>
												<input type="password" class="form-control border-danger" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="oldpwd">
											</div>
											<span id="oldpwderr" style="font-weight: bold"></span>
											<!--new password-->
											<div class="input-group  mt-3">
												<span class="input-group-text bg-danger text-white border-danger" id="inputGroup-sizing-default">New Password</span>
												<input type="password" class="form-control border-danger" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="newpwd" name="newpwd">
											</div>
											<span id='newpwderr' style="font-weight: bold"></span>
										</div>
										<div class="modal-footer mb-3">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
											<!--save-->
											<button type="button" class="btn btn-danger" formaction="ajax-update-password.php" id="save">Save changes</button>
										</div>
										<span id="result" style="font-weight: bold"></span>
										<br><br>
									</div>
								</div>
							</div>
						</div>
					</div>
			</div>
			<!---------------------------------Med Post------------------------------------------>
			<div class="col-md-2 offset-1 mt-3">
				<div class="card text-center bg-danger" style="width: 15rem;">
					<img src="pics/medicine.jpg" style="border-radius:50%" class="card-img-top bg-white" alt="user_pic">
					<div class="card-body bg-white">
						<h5 class="card-title">Provider</h5>
						<p class="card-text">Dear MediShop provider,<br>Uploads the details of medicine here.</p>
						<a href="provider-med-post.php" class="btn btn-danger" title="click me to post medcinie!!">Post Med</a>
					</div>
				</div>
			</div>
			<!----------------------------------Med Manager---------------------------------->
			<div class="col-md-2 offset-1 mt-3">
				<div class="card text-center bg-danger" style="width: 15rem;">
					<img src="pics/med-mang.png" style="border-radius:50%" class="card-img-top bg-white" alt="user_pic">
					<div class="card-body bg-white">
						<h5 class="card-title">Provider</h5>
						<p class="card-text">Dear MediShop provider,<br>You can manage your medicine here.</p>
						<a href="angular-provider-med-mang.php" class="btn btn-danger" title="click me to manage medcinie!!">Manage Med</a>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>

</body>

</html>
