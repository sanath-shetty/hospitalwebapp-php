<?php session_start();
include('connect.php');

$sql = "SELECT * FROM admin where a_id='" . $_SESSION["aid_session"] . "'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$user = $row["a_name"];
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
	<link rel="stylesheet" href="font.css">
	<link rel="stylesheet" href="dashboard.css">
</head>

<body>
	<div class="container">
		<section class="navbar">
			<div class="logo_sec" align="center">
				<div>
					<img src="image/logo.png" class="navbar_img">
				</div>
			</div>
			<div class="nav_sec" align="right">
				<ul class="ul_nav_sec">
					<li>
						<a href="#" class="chng_clr">Home</a>
					</li>
					<li>
						<a href="addadmin.php" class="chng_clr">Add Admin</a>
					</li>
					<li><a href=""><?php echo $user; ?></a>
						<a href="logout.php" class="chng_clr">Logout</a>
					</li>
				</ul>
			</div>
		</section>
		<section class="menu_sec">
			<div class="inner-div">
				<p class="dashboard_head">Admin Interface </p>
				<div class="row">
					<div class="box">
						<p class="list_head">Patient</p>
						<ul class="list_ul">
							<li><a href="vpatientdetail.php">Patient data</a></li>
							<li><a href="vwardasgn.php">Ward assigned</a></li>
							<li><a href="bills.php">Bill list</a></li>
						</ul>
					</div>
					<hr class="list_hr">
					<div class="box">
						<p class="list_head">Doctor</p>
						<ul class="list_ul">
							<li><a href="vdoctordetail.php">View Doctor Data</a></li>
							<li><a href="viewapnt.php">Check Appointment</a></li>
						</ul>
					</div>
				</div>
			</div>
			<img src="image/logo1.png" class="img-back">
		</section>
	</div>
</body>

</html>