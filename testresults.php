<?php session_start();
include('connect.php');

$sql = "SELECT * FROM a_patient where padmin_id='" . $_SESSION["pa_session"] . "'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$user = $row["pa_name"];
	}
} else {
	header('location: login.php');
}
mysqli_close($con);
?>
<?php
include 'connect.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$id = $_GET['rep'];

$sql = "SELECT * FROM patient_data WHERE p_id = '$id'";
$result = mysqli_query($con, $sql);

while ($rows = mysqli_fetch_assoc($result)) {

	$fname = $rows['f_name'];
	$lname = $rows['l_name'];
	$age = $rows['age'];
}
?>

<?php

if (isset($_POST['btn_sub'])) {

	$inp_id = $_POST['inp_id'];
	$inp_fname = $_POST['inp_fname'];
	$inp_lname = $_POST['inp_lname'];
	$inp_age = $_POST['inp_age'];

	$img = $_FILES['pdf']['name'];
	$temp = $_FILES['pdf']['tmp_name'];
	$target_dir = "pdf/";
	$target_file = $target_dir . basename($img);

	move_uploaded_file($temp, $target_dir . $img);

	$sql = "INSERT INTO `reports`(`p_id`, `rFile`) VALUES ('$id','$img')";
	$result = mysqli_query($con, $sql);

	if ($result) {
		echo "data inserted";
	} else {
		echo "error occured";
	}
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
		}
	</style>
</head>

<body>
	<?php include("cmn_file/login_topnav_patient.php"); ?>
	<div class="route my-3">
		<div class="container">
			<div class="row">
				<h7>Home</h7>
				<i class="fas fa-arrow-right"></i>
				<h7>Patient admin</h7>
			</div>
		</div>
	</div>
	<section class="report_sec">
		<div class="container">
			<div class="row top-row">
				<div class="col-md-10 m-auto">
					<form method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="form-group col-md-2">
								<label for="patientid">Patient id</label>
								<input type="text" name="inp_id" class="form-control" value="<?php echo $id; ?>">
							</div>
							<div class="form-group col-md-5">
								<label for="fname">First name</label>
								<input type="text" name="inp_fname" class="form-control" value="<?php echo $fname; ?>">
							</div>
							<div class="form-group col-md-5">
								<label for="lname">Last name</label>
								<input type="text" name="inp_lname" class="form-control" value="<?php echo $lname; ?>">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-2">
								<label for="age">Age</label>
								<input type="text" name="inp_age" class="form-control" value="<?php echo $age; ?>">
							</div>
							<div class="form-group col-md-6">
								<label for="file">File</label><br>
								<input type="file" name="pdf" class="inp_file" accept=".pdf">
							</div>
						</div>
						<input type="submit" name="btn_sub" class="reststbtn" value="Save">
					</form>
				</div>
			</div>
		</div>

	</section>
</body>

</html>