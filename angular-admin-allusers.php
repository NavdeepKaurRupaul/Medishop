<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>MEDISHOP-ADMIN-ALL USERS</title>
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
			$scope.doFetchAllPro = function() {
				var url = "json-admin-pro-users.php?";
				$http.get(url).then(fxOk, fxNotok);

				function fxOk(response) {
					$scope.xx = response.data;
				}

				function fxNotok(error) {
					alert(error.data);
				}
			}

			$scope.doFetchAllNeedy = function() {
				var url = "json-admin-needy-users.php?";
				$http.get(url).then(fxOk, fxNotok);

				function fxOk(response) {
					$scope.yy = response.data;
				}

				function fxNotok(error) {
					alert(error.data);
				}
			}
		});

	</script>
</head>

<body ng-app="mykuchbhi" ng-init="doFetchAllPro();doFetchAllNeedy(); " ng-controller="mycontroller" style="background-image: url(pics/medibackground.png)">
	<div class="p-3 mb-2 fixed-top bg-danger text-white" style="font-size: 25px; color: white; font-weight: bold;text-transform: uppercase">
		<img src="pics/icon.png" alt="" width="35" height="35" class="d-inline-block align-top">
		MEDISHOP-Admin-providers
	</div>

	<center>
		<div class="container-fluid" style="margin-top:100px">
			<div class="row text-center">
				<h3>Providers</h3>
				<table class="table table-striped table-danger">
					<th>Sr.No.</th>
					<th>Email</th>
					<th>Name</th>
					<th>Mobile</th>
					<th>Address</th>
					<th>City</th>
					<th>Id Type</th>
					<th>Id Number</th>
					<th>Id Pic</th>
					<th>User Pic</th>
					<tr ng-repeat="x in xx">
						<td>{{$index+1}}</td>
						<td>{{x.id}}</td>
						<td>{{x.name}}</td>
						<td>{{x.contact}}</td>
						<td>{{x.address}}</td>
						<td>{{x.city}}</td>
						<td>{{x.idtype}}</td>
						<td>{{x.idnumb}}</td>
						<td>
							<img src="uploads/{{x.idpath}}" alt="" width="40" height="40" alt="1" style="border-radius:50%">
						</td>
						<td>
							<img src="uploads/{{x.picpath}}" alt="" width="40" height="40" alt="2" style="border-radius:50%">
						</td>
					</tr>
				</table>
			</div>
			<hr style="height:10px">
			<div class="row text-center">
				<h3>Needy</h3>
				<table class="table table-striped table-danger">
					<th>Sr.No.</th>
					<th>Email</th>
					<th>Name</th>
					<th>Mobile</th>
					<th>Address</th>
					<th>City</th>
					<th>Id Type</th>
					<th>Id Number</th>
					<th>Id Pic</th>
					<th>User Pic</th>
					<tr ng-repeat="y in yy">
						<td>{{$index+1}}</td>
						<td>{{y.id}}</td>
						<td>{{y.name}}</td>
						<td>{{y.contact}}</td>
						<td>{{y.address}}</td>
						<td>{{y.city}}</td>
						<td>{{y.idtype}}</td>
						<td>{{y.idnumb}}</td>
						<td>
							<img src="uploads/{{y.idpath}}" alt="" width="40" height="40" style="border-radius:50%">
						</td>
						<td>
							<img src="uploads/{{y.picpath}}" alt="" width="40" height="40" style="border-radius:50%">
						</td>
					</tr>
				</table>
			</div>
		</div>

	</center>

</body>

</html>
