<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>MEDISHOP-FIND MED</title>
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
	<script src="js/angular.min.js">
	</script>
	<script>
		var mymodule = angular.module("mykuchbhi", []);
		mymodule.controller("mycontroller", function($http, $scope) {
			$scope.jsonArray = [];
			/*******************FetchAll*********************/
			$scope.doFetchAll = function() {
				var url = "json-find-med.php?";
				$http.get(url).then(fxOk, fxNotok);

				function fxOk(response) {
					$scope.xx = response.data;
				}

				function fxNotok(error) {
					alert(error.data);
				}
			}
			/********************City***********************/
			$scope.doFetchCity = function() {
				var medname = $("#medd").val();
				var url = "json-find-med-city.php?med=" + medname;
				$http.get(url).then(fxOk, fxNotok);

				function fxOk(response) {
					$scope.yy = response.data;
				}

				function fxNotok(error) {
					alert(error.data);
				}
			}
			/*******************medicine show**************/
			$scope.showmed = function() {
				var medname = $("#medd").val();
				var city = $("#cityy").val();
				var url = "json-find-med-avail.php?med=" + medname + "&city=" + city;
				$http.get(url).then(fxOk, fxNotok);

				function fxOk(response) {
					$scope.zz = response.data;
				}

				function fxNotok(error) {
					alert(error.data);
				}
			}
			/***********************Provider details**********************/
			$scope.doFill = function(rid, userid) {
				$scope.pro_name = userid;
				var url = "json-find-med-user-details.php?rid=" + rid;
				$http.get(url).then(fxOk, fxNotok);

				function fxOk(response) {
					$scope.pro_contact = response.data;
				}

				function fxNotok(error) {
					alert(error.data);
				}
			}
		});

	</script>
</head>

<body style="background-image: url(pics/medibackground.png)" ng-app="mykuchbhi" ng-controller="mycontroller" ng-init="doFetchAll();">
	<div class="p-3 mb-2 fixed-top bg-danger text-white" style="font-size: 25px; color: white; font-weight: bold;text-transform: uppercase">
		<div class="row">
			<div class="col-md-11">
				<img src="pics/icon.png" alt="" width="35" height="35" class="d-inline-block align-top">
				MEDISHOP-NEEDY-FIND MED
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
	<div class="container-fluid">
		<div class="row">
			<div class="col">
				<center>
					<h3 style="margin-top:100px; box-shadow:inset 0px 0px 5px black" class=" border-top border-bottom bg-warning">All Medicine Available</h3>
				</center>
			</div>
		</div>
		<div class="row mt-4">
			<!--medicine-->
			<div class="col-md-4 offset-1">
				<div class="input-group mb-3 ">
					<span class="input-group-text bg-danger text-white border-danger" id="inputGroup-sizing-default">Medicine Name</span>
					<input type="list" list="med" class="form-select form-select-sm" aria-label=".form-select-sm example" id="medd" ng-blur="doFetchCity()">
					<!--medicine datalist-->
					<datalist id="med" ng-model="city">
						<option value="{{obj.med_name}}" ng-repeat="obj in xx">{{obj.med_name}}</option>
					</datalist>
				</div>
			</div>
			<!--city-->
			<div class="col-md-4">
				<div class="input-group mb-3">
					<span class="input-group-text bg-danger text-white border-danger" id="inputGroup-sizing-default">City Name</span>
					<!--city select-->
					<select class="form-select form-select-sm" id="cityy" aria-label=".form-select-sm example" ng-blur="showmed(obj.city);">
						<option selected disabled> Select City </option>
						<option value="{{obj.city}}" ng-repeat="obj in yy">{{obj.city}}</option>
					</select>
				</div>
			</div>
			<div class="col-md-2">
				<button type="button" class="btn btn-danger">Find Provider</button>
			</div>
		</div>
		<!--cards-->
		<div class="row text-center mt-2">
			<div class="col-md-2 offset-1" ng-repeat="obj in zz">
				<div class="card border-danger" style="width: 15rem;">
					<h5 class="card-title text-center bg-danger text-white">Medicine Details</h5>
					<img src="uploads/{{obj.pic1_path}}" style="border-radius:50%; width:80px;height:80px; margin-left:80px" class="card-img-top">
					<div class="card-body bg-white text-center">
						<p class="card-text"><b>Medicine Name:</b> {{obj.med_name}}</p>
						<p class="card-text"><b>Company: </b>{{obj.comp_name}}</p>
						<p class="card-text"><b>Expiry Date: </b>{{obj.exp_date}}</p>
						<p class="card-text"><b>Quantity: </b>{{obj.quantity}}</p>
						<p class="card-text"><b>Ptency: </b>{{obj.potency}}</p>
						<p class="card-text"><b>Type: </b>{{obj.type}}</p>
						<button type="button" ng-click="doFill(obj.rid,obj.userid)" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
							Details
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content border-danger">
				<div class="modal-header bg-danger text-white border-danger">
					<h5 class="modal-title" id="exampleModalLabel">Provider Details</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<!--provider name-->
					<div class="input-group mb-3">
						<span class="input-group-text bg-danger text-white border-danger" id="inputGroup-sizing-default">Name</span>
						<input type="text" class="form-control border-danger" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" ng-model="pro_name" id="pro_name" name="pro_name" readonly>
					</div>
					<!--provider contact-->
					<div class="input-group mb-3">
						<span class="input-group-text bg-danger text-white border-danger" id="inputGroup-sizing-default">Contact</span>
						<input type="text" class="form-control border-danger" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" ng-model="pro_contact" id="pro_contact" name="pro_contact" readonly>
					</div>
				</div>
				<div class="modal-footer border-danger">
					<!--close button-->
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

</body>

</html>
