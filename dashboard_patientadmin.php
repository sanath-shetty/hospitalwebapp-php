<?php
session_start();
include('connect.php');

$sql = "SELECT * FROM a_patient where padmin_id='" . $_SESSION["pa_session"] . "'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) >= 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$user = $row["pa_name"];
	}
} else {
	header('location: login.php');
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Sanjivini Hospital-MeetDoctor</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="cmn_file/nav-style.css">
	<style>
		body {
			background: url(image/dashboard_background.jpg);
			background-repeat: no-repeat;
			background-size: cover;
			min-height: 100vh;
			background-position: center center;
			background-attachment: fixed;
		}
	</style>
</head>

<body>
	<?php include("cmn_file/login_topnav_patient.php"); ?>

	<!-- laptop -->

	<div class="laptop">
		<div class="route py-3">
			<div class="container">
				<div class="row">
					<h7>Home</h7>
					<i class="fas fa-arrow-right"></i>
					<h7>Patient admin</h7>
				</div>
			</div>
		</div>
		<div class="container links">
			<h3 class="dashboard_head">Patient Admin Interface </h3>
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#overview">Overview</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#adminoperation">Admin operation</a>
				</li>
			</ul>
			<div id="myTabContent" class="tab-content">
				<div class="tab-pane fade active show" id="overview">
					<?php include "overview.php" ?>
				</div>
				<div class="tab-pane fade" id="adminoperation">
					<?php include "patientadmin_operation.php" ?>
				</div>
			</div>
		</div>
	</div>

	<!-- tab -->

	<div class="tab">
		<div class="route py-3">
			<div class="container">
				<div class="row">
					<a href="">
						<h7>Home</h7>
					</a>
					<i class="fas fa-arrow-right"></i>
					<a href="">
						<h7>Patient admin</h7>
					</a>
				</div>
			</div>
		</div>
		<div class="container links">
			<h3 class="dashboard_head">Patient Admin Interface </h3>
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#overview2">Overview</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#adminoperation2">Admin operation</a>
				</li>
			</ul>
			<div id="myTabContent" class="tab-content">
				<div class="tab-pane fade active show" id="overview2">
					<?php include "overview.php" ?>
				</div>
				<div class="tab-pane fade" id="adminoperation2">
					<?php include "patientadmin_operation.php" ?>
				</div>
			</div>
		</div>
	</div>

	<!-- mobile -->

	<section class="mobile">
		<div class="route py-3 mx-3">
			<div class="container">
				<div class="row">
					<a href="">
						<h7>Home</h7>
					</a>
					<i class="fas fa-arrow-right"></i>
					<a href="">
						<h7>Patient admin</h7>
					</a>
				</div>
			</div>
		</div>
		<div class="container links">
			<h3 class="dashboard_head">Patient Admin Interface </h3>
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#overview1">Overview</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#adminoperation1">Admin operation</a>
				</li>
			</ul>
			<div id="myTabContent" class="tab-content">
				<div class="tab-pane fade active show" id="overview1">
					<?php include "overview.php" ?>
				</div>
				<div class="tab-pane fade" id="adminoperation1">
					<?php include "patientadmin_operation.php" ?>
				</div>
			</div>
		</div>
	</section>
</body>

</html>