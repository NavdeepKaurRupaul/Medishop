<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>MEDISHOP-ADMIN-USERS</title>
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
				var url = "json-admin-pro-users.php?";
				$http.get(url).then(fxOk, fxNotok);

				function fxOk(response) {
					$scope.xx = response.data;
				}

				function fxNotok(error) {
					alert(error.data);
				}
			}
			/************************Block**********************/
			$scope.doBlock = function(email) {
				var con=confirm("Are you sure to Block this user?");
				if(con){
					var url = "block-pro-users.php?email="+email;
					$http.get(url).then(fxOk, fxNotok);

					function fxOk(response) {
						alert(response.data);
						$scope.doFetchAll();
					}

					function fxNotok(error) {
						alert(error.data);
					}
				}
			}	
			/*****************************Unblock**************/
			$scope.doUnblock = function(email) {
				var con=confirm("Are you sure to Unblock this user?");
				if(con){
					var url = "unblock-pro-users.php?email="+email;
					$http.get(url).then(fxOk, fxNotok);

					function fxOk(response) {
						alert(response.data);
						$scope.doFetchAll();
					}

					function fxNotok(error) {
						alert(error.data);
					}
				}
			}
		});

	</script>
</head>

<body ng-app="mykuchbhi" ng-init="doFetchAll();" ng-controller="mycontroller" style="background-image: url(pics/medibackground.png)">
	<div class="p-3 mb-2 fixed-top bg-danger text-white" style="font-size: 25px; color: white; font-weight: bold;text-transform: uppercase">
		<img src="pics/icon.png" alt="" width="35" height="35" class="d-inline-block align-top">
		MEDISHOP-Admin-users-manager
	</div>

	<center>
		<div class="container-fluid" style="margin-top:150px">
			<div class="row text-center">
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
					<th>Block</th>
					<th>Unblock</th>
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
						<td>
							<!--block-->
							<img ng-if="x.status==1" src="pics/block.png" ng-click="doBlock(x.id);" width="50" height="50" title="Click here to delete!!">
						</td>
						<td>
							<!--unblock-->
							<img ng-if="x.status==0" src="pics/unblock.png" ng-click="doUnblock(x.id);" width="50" height="50" style="border-radius:50%" title="Click here to delete!!">
						</td>
					</tr>
				</table>
			</div>
		</div>
	</center>

</body>

</html>
