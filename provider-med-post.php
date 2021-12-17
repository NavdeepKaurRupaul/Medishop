<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>MEDISHOP-PROVIDER-MED POST</title>
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
		/*ed and md cheching*/
		$(document).ready(function() {
			$("#ed").change(function() {
				var md = $("#md").val();
				var ed = $("#ed").val();
				var start = new Date(md);
				var end = new Date(ed);
				var diffDate = (end - start) / (1000 * 60 * 60 * 24);
				var days = Math.round(diffDate);
				if (days <= 0) {
					$("#date_err").html("Invalid Expiry Date");
					$("#date_err").css("color", "red");
				}
			})
		})

	</script>
	<script>
		/*show pic*/
		function showpicpreview(file, strId) {
			if (file.files && file.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$(strId).prop('src', e.target.result);
				}
				reader.readAsDataURL(file.files[0]);
			}
		}

		function showidpreview(file, strId) {
			if (file.files && file.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$(strId).prop('src', e.target.result);
				}
				reader.readAsDataURL(file.files[0]);
			}
		}

	</script>
</head>

<body style="background-image: url(pics/medibackground.png)">
	<div class="p-3 mb-2 fixed-top bg-danger text-white" style="font-size: 25px; color: white; font-weight: bold;text-transform: uppercase">
		<div class="row">
			<div class="col-md-11">
				<img src="pics/icon.png" alt="" width="35" height="35" class="d-inline-block align-top">
				MEDISHOP-Provider-upload med
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
		?>
	<!--session end-->
	<!---------------------------------------profile--------------------------------------------->
	<form style="margin-left: 65px; margin-top:50px" formaction="provider-med-post-process.php" method="post" enctype="multipart/form-data">
		<div class="container bg-white" style="border: 3px solid #dc3545;margin-top:80px; border-radius:20px">
			<div class="row">
				<div class="col-md-6 mt-2 mb-1 offset-3">
					<div class="input-group">
						<span class="input-group-text bg-danger text-white border-danger" id="inputGroup-sizing-default">User ID</span>
						<!--user id-->
						<input type="text" class="form-control border-danger" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="userid" id="userid" required autocomplete="off" value="<?php echo $_SESSION["user"];?>" readonly>
					</div>
				</div>
			</div>
			<div class="row mt-1">
				<div class="col-md-6 mt-1 border-1">
					<div class="input-group mb-3">
						<!--medicine name-->
						<span class="input-group-text bg-danger text-white border-danger" id="inputGroup-sizing-default">Medicine Name</span>
						<input type="text" class="form-control border-danger" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="mname" id="mname" required autocomplete="off">
					</div>
				</div>
				<div class="col-md-6 mt-1 border-1">
					<div class="input-group mb-3">
						<!--compaany name-->
						<span class="input-group-text bg-danger text-white border-danger" id="inputGroup-sizing-default">Company Name</span>
						<input type="text" class="form-control border-danger" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="cname" id="cname" required autocomplete="off">
					</div>
				</div>
			</div>
			<div class="row" style="margin-left:100px">
				<div class="col-md-5 mt-1 border-1">
					<div class="input-group mb-3">
						<!--manufacturing date-->
						<span class="input-group-text bg-danger text-white border-danger" id="inputGroup-sizing-default">Manufacturing date</span>
						<input type="date" class="form-control border-danger" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="md" id="md" required autocomplete="off">
					</div>
				</div>
				<div class="col-md-4 mt-1 border-1">
					<div class="input-group">
						<!--expiry date-->
						<span class="input-group-text bg-danger text-white border-danger" id="inputGroup-sizing-default">Expiry Date</span>
						<input type="date" class="form-control border-danger" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="ed" id="ed" required autocomplete="off">
					</div>
					<span id="date_err"></span>
				</div>
				<!--type of medicine-->
				<div class="col-md-3  mt-1 border-1">
					<select class="form-select bg-danger text-white text-center w-50" aria-label="Default select example" name="type" id="type" required>
						<option selected>Type</option>
						<option value="Tablets">Tablets</option>
						<option value="Capsule">Capsule</option>
						<option value="Tube">Tube</option>
						<option value="Liquid">Liquid</option>
						<option value="Gel">Gel</option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5 offset-1 mt-1 border-1">
					<div class="input-group mb-3">
						<!--potency-->
						<span class="input-group-text bg-danger text-white border-danger" id="inputGroup-sizing-default">Potency</span>
						<input type="text" class="form-control border-danger" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="potency" id="potency" required autocomplete="off" placeholder="microgram or miligram per tablet or power">
					</div>
				</div>
				<div class="col-md-5 ">
					<!--quantity-->
					<div class="input-group mb-3">
						<span class="input-group-text bg-danger text-white border-danger" id="inputGroup-sizing-default">Available Quantity</span>
						<input type="text" class="form-control border-danger" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="quantity" id="quantity" required autocomplete="off">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 text-center">
					<!--pic1-->
					<img src="pics/med-1.jpg" class="rounded " alt="..." width="200px" id="spic1" height="194px" style="border:2px solid #dc3545;margin-bottom:4px">
				</div>
				<div class="col-md-6 text-center">
					<!--pic2-->
					<img src="pics/med-2.jpg" class="rounded " alt="..." width="200px" id="spic2" height="194px" style="border:2px solid #dc3545;margin-bottom:4px">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3" style="margin-left:150px">
					<div class="input-group mb-3">
						<input type="file" class="form-control border-danger" id="inputGroupFile01" accept="image/jpeg, image/png, image/jpg" name="pic1" id="pic1" onchange="showpicpreview(this,spic1);">
					</div>
				</div>
				<div class="col-md-3" style="margin-left:270px">
					<div class="input-group mb-3 border-danger">
						<input type="file" class="form-control border-danger" id="inputGroupFile01" accept="image/jpeg, image/png, image/jpg" name="pic2" id="pic2" onchange="showidpreview(this,spic2);">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2 offset-4">
					<!--Upload-->
					<button style="margin-bottom:10px" class="btn btn-danger text-white w-100 offset-3" style="margin-left:220px; margin-top:px" formaction="provider-med-post-process.php" value="Save" name="btn">Upload</button>
				</div>
				<div class="col-md-2 offset-">
					<!--Upload-->
					<button style="margin-bottom:10px" class="btn btn-danger text-white w-100 offset-3" style="margin-left:220px; margin-top:px" formaction="provider-med-post-process.php" disabled>Update</button>
				</div>
			</div>
		</div>
		<br>
	</form>
</body>

</html>
