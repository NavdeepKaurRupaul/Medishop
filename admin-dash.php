<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>MEDISHOP-ADMIN</title>
	<!--Important links-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--Title icon-->
	<link rel="shortcut icon" href="pics/icon.png">
	<!--css bootstrap link-->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!--js bootstrap link-->
	<script src="js/bootstrap.bundle.min.js"></script>
	<!--jquery-->
	<script src="js/jquery-1.8.2.min.js"></script>
	<!--font awesome-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!--css-->
	<style>
		.placeholdercolor::placeholder {
			color: #dbd6d6;
		}

	</style>
	<!--jquery-->
	<script>
		$(document).ready(function() {
			/****************************************signup*********************************************/
			$(document).ajaxStart(function() {
				$("#loadding").css("display", "inline");
			});
			$(document).ajaxStop(function() {
				$("#loadding").css("display", "none");
			});
			//email blur 
			$("#email").blur(function() {
				var uid = $("#email").val();
				var url = "ajax-check-signup.php?uidy=" + uid;
				$.get(url, function(responsex) {
					if (responsex == "Available &#10004;") {
						$("#displayemail").html(responsex);
						$("#displayemail").css("color", "green");
					} else {
						$("#displayemail").html(responsex);
						$("#displayemail").css("color", "red");
					}
				});
			});
			$("#signupbtn").click(function() {
				var qstring = $("#frmsignup").serialize(); ///this makes a query string for all values
				//var qstring="email="+email; //query string for specific values
				var url = "ajax-signup.php?" + qstring;
				$.get(url, function(responsex) {
					if (responsex == "Your account has been created &#128513;") {
						$("#signupmsg").html(responsex + "!!");
						$("#signupmsg").css("color", "green");
					} else {
						$("#signupmsg").html(responsex);
						$("#signupmsg").css("color", "red");
					}
				});
			})
			/*****************************************login*********************************************/
			//mail chechking
			$("#loginmail").blur(function() {
				var uid = $("#loginmail").val();
				var url = "ajax-check-login.php?uidy=" + uid;
				$.get(url, function(responsex) {
					if (responsex == "Invalid mail &#10060;") {
						$("#loginmsg").html(responsex);
						$("#loginmsg").css("color", "red");
					} else {
						var category = responsex;
						if (category == "Provider") {
							$("#loginpro").css("display", "inline");
						} else {
							$("#loginneed").css("display", "inline");
						}
					}
				});
			});
			$("#loginmail").keydown(function() {
				$("#loginmsg").html("");
			})
			//password checking
			$("#passwordlogin").keypress(function() {
				var mail = $("#loginmail").val();
				var url = "ajax-loginpassword.php?uidy=" + mail;
				$.get(url, function(responsex) {
					if (responsex != $("#passwordlogin").val()) {
						$("#passworderr").html("wrong password &#10060;");
						$("#passworderr").css("color", "red");
					} else {
						$("#passworderr").html("");
					}
				});
			})
			//login button click
			$("#login").click(function() {
				var email = $("#loginmail").val();
				var password = $("#passwordlogin").val();
				var qstring = "email=" + email + "&password=" + password;
				var url = "ajax-login.php?" + qstring;
				$.get(url, function(responsex) {
					if (responsex.trim() == "Invalid") {
						$("#loginmsg").html("Invalid mail or password &#10060;");
						$("#loginmsg").css("color", "red");
					} else if (responsex.trim() == "Provider") {
						window.open("provider-dash.php");
					} else if (responsex.trim() == "Needy") {
						window.open("needy-dash.php");
					}
				});
			});
		});

	</script>
</head>

<body style="background-image: url(pics/medibackground.png)">
	<div class="p-3 mb-2 fixed-top bg-danger text-white" style="font-size: 25px; color: white; font-weight: bold;text-transform: uppercase">
		<img src="pics/icon.png" alt="" width="35" height="35" class="d-inline-block align-top">
		MEDISHOP-Admin
	</div>
	<div class="container-fluid text-center" style="margin-top:120px;">
		<div class="row">
			<div class="col-md-3" style="margin-left:70px">
				<div class="card mt-2 bg-danger text-center" style="width: 18rem;">
					<img src="pics/admin-s.PNG" style="border-radius:50%" height="280px" class="card-img-top" alt="...">
					<div class="card-body bg-white">
					<!--user manager-->
						<h5 class="card-title">Manage Users</h5>
						<a href="angular-admin-users.php" class="btn btn-danger text-white mt-4">Manage</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 offset-1">
				<div class="card mt-2 bg-danger text-center" style="width: 18rem;">
					<img src="pics/med-mang-admin.jpg" style="border-radius:50%" height="280px" class="card-img-top" alt="...">
					<div class="card-body bg-white">
					<!--med manager-->
						<h5 class="card-title">Medicine manager</h5>
						<a href="angular-admin-med.php" class="btn btn-danger text-white mt-4">Manage</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 offset-1">
				<div class="card mt-2 bg-danger text-center" style="width: 18rem;">
					<img src="pics/pro-admin.jpg" style="border-radius:50%" height="280px" class="card-img-top" alt="...">
					<div class="card-body bg-white">
						<h5 class="card-title">All Users Details</h5>
						<a href="angular-admin-allusers.php" class="btn btn-danger text-white mt-4">Deatils</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
