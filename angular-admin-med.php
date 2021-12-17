<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>MEDISHOP-ADMIN-ALL MED</title>
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
				var url = "json-admin-allmed.php?userid=" + userid;
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
					var url = "json-admin-med-delete.php?rid="+rid;
					$http.get(url).then(fxOk, fxNotok);

					function fxOk(response) {
						alert(response.data);
						$scope.xx = response.data;
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
		MEDISHOP-Admin-all medicine manager
	</div>

	<center>
		<div class="container-fluid" style="margin-top:100px">
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
					</tr>
				</table>
			</div>
		</div>

	</center>

</body>

</html>
