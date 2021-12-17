<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>MEDISHOP-ADMIN-MED MANAGER</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--Title icon-->
	<link rel="shortcut icon" href="pics/icon.png">
	<!--css bootstrap link-->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!--js bootstrap link-->
	<script src="js/bootstrap.bundle.min.js"></script>
	<!--jquery-->
	<script src="js/jquery-1.8.2.min.js"></script>
	<!--angular-->
	<script src="js/angular.min.js">
	</script>
	<script>
		var mymodule = angular.module("mykuchbhi", []);
		mymodule.controller("mycontroller", function($http, $scope) {
			$scope.jsonArray = [];
			/*******************FetchAll*********************/
			$scope.doFetchAll = function() {
				var userid = $("#userid").val();
				if (userid == "") {
					alert("Enter UserID!");
				}
				var url = "json-medicine.php?userid=" + userid;
				$http.get(url).then(fxOk, fxNotok);

				function fxOk(response) {
					$scope.xx = response.data;
				}

				function fxNotok(error) {
					alert(error.data);
				}
			}
			/********************Delete***********************/
			$scope.doDelete = function(rid) {
				var con = confirm("Are you sure to delete?");
				if (con == true) {
					var url = "json-med-delete.php?rid=" + rid;
					$http.get(url).then(fxOk, fxNotok);

					function fxOk(response) {
						$scope.xx = response.data;
						$scope.doFetchAll();
					}

					function fxNotok(error) {
						alert(error.data);
					}
				} else {
					return;
				}
			}
			/**********************Fill*********************/
			$scope.fill = function(med_name, quantity, rid) {
				$scope.med_name = med_name;
				$scope.quantity = quantity;
				$scope.rid = rid;
			}
			/**********************Update*********************/
			$scope.doUpdate = function(rid) {
				var updated_qnt = $("#quantity").val();
				alert(updated_qnt);
				var url = "ajax-med-update.php?rid=" + rid + "&quantity=" + updated_qnt;
				alert(url);
				$http.get(url).then(fxOk, fxNotok);

				function fxOk(response) {
					$("#updatemsg").html(response.data);
					$scope.doFetchAll();
				}

				function fxNotok(error) {
					alert(error.data);
				}
			}
		});

	</script>
</head>

<body ng-app="mykuchbhi" ng-controller="mycontroller" style="background-image: url(pics/medibackground.png)">
	<div class="p-3 mb-2 fixed-top bg-danger text-white" style="font-size: 25px; color: white; font-weight: bold;text-transform: uppercase">
		<div class="row">
			<div class="col-md-11">
				<img src="pics/icon.png" alt="" width="35" height="35" class="d-inline-block align-top">
				MEDISHOP-provider-med-manager
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
	<center>
		<div class="container-fluid" style="margin-top:150px">
			<div class="row">
				<div class="col-5 offset-3">
					<div class="input-group mb-3">
						<span class="input-group-text bg-danger text-white border-danger" id="inputGroup-sizing-default">UserId</span>
						<input type="text" value="<?php echo $_SESSION["user"]; ?>" class="form-control border-danger" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" autocomplete="off" readonly id="userid">
					</div>
				</div>
				<div class="col-2">
					<button type="button" class="btn btn-danger" ng-click="doFetchAll();">Show Med</button>
				</div>
			</div>
			<div class="row text-center">
				<table class="table table-striped table-danger">
					<th>Sr.No.</th>
					<th>UserId</th>
					<th>Medicine Name</th>
					<th>Company Name</th>
					<th>Manufacturing Date</th>
					<th>Expiry Date</th>
					<th>Type</th>
					<th>Potency</th>
					<th>Quantity</th>
					<th>Pic1</th>
					<th>Pic2</th>
					<th>Delete</th>
					<th>Update</th>
					<tr ng-repeat="x in xx">
						<td>{{$index+1}}</td>
						<td>{{x.userid}}</td>
						<td>{{x.med_name}}</td>
						<td>{{x.comp_name}}</td>
						<td>{{x.manu_date}}</td>
						<td>{{x.exp_date}}</td>
						<td>{{x.type}}</td>
						<td>{{x.potency}}</td>
						<td>{{x.quantity}}</td>
						<td>
							<img src="uploads/{{x.pic1_path}}" alt="" width="40" height="40" style="border-radius:50%">
						</td>
						<td>
							<img src="uploads/{{x.pic2_path}}" alt="" width="40" height="40" style="border-radius:50%">
						</td>
						<td>
							<!--delete-->
							<img src="pics/delete.png" ng-click="doDelete(x.rid);" width="40" height="40" style="border-radius:50%" title="Click here to delete!!">
						</td>
						<td>
							<!-- update -->
							<button type="button" class="btn p-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
								<img src="pics/update.png" ng-click="fill(x.med_name,x.quantity,x.rid);" width="40" height="40" style="border-radius:50%" title="Click here to update!!">
							</button>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</center>
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content  border-danger">
				<div class="modal-header bg-danger text-white border-danger">
					<h5 class="modal-title" id="exampleModalLabel">Update Details</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="input-group mb-3">
						<!--rid-->
						<span class="input-group-text bg-danger text-white border-danger">RID</span>
						<input type="text" class="form-control border-danger" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" autocomplete="off" ng-model="rid" id="rid" name="rid" readonly>
					</div>
					<div class="input-group mb-3">
						<!--med_name-->
						<span class="input-group-text bg-danger text-white border-danger">Medicine Name</span>
						<input type="text" class="form-control border-danger" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" autocomplete="off" ng-model="med_name" id="med_name" name="med_name" readonly>
					</div>
					<div class="input-group mb-3">
						<!--quantity-->
						<span class="input-group-text bg-danger text-white border-danger">Quantity</span>
						<input type="text" class="form-control border-danger" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" autocomplete="off" ng-model="quantity" name="quantity" id="quantity">
					</div>
				</div>
				<div class="modal-footer border-danger">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="button" ng-click="doUpdate(x.rid)" class="btn btn-danger">Update</button>
				</div>
				<center>
					<span id="updatemsg" style="font-weight:bold;"></span>
					<br>
				</center>
			</div>
		</div>
	</div>
</body>

</html>
