<?php session_start();
include('connect.php');

$sql = "SELECT * FROM a_doctor where dadmin_id='" . $_SESSION["da_session"] . "'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$user = $row["da_name"];
	}
} else {
	header('location: login.php');
}
?>

<?php
include('connect.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$msg = "";

if (isset($_POST["submit_doc"])) {

	$f_name = $_POST["fname"];
	$l_name = $_POST["lname"];
	$dob = $_POST["date"];
	$age = $_POST["age"];
	$bg = $_POST["blood"];
	$t_add = $_POST["tadd"];
	$p_add = $_POST["padd"];
	$st = $_POST["state"];
	$city = $_POST["d_city"];
	$pin = $_POST["pin"];
	$contact = $_POST["cont"];
	$quali = $_POST["quali"];
	$specl = $_POST["specl"];

	$img = $_FILES['image']['name'];
	$temp = $_FILES['image']['tmp_name'];
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($img);

	move_uploaded_file($temp, $target_dir . $img);

	$sq = "INSERT INTO `doctor_data`(`doc_img`,`dadmin_id`,`f_name`, `l_name`, `dob_date`, `age`, `blood`, `t_add`, `p_add`, `st_id`, `city`, `pin`, `contact`, `q_id`, `s_id`,`status`,`vis_chrg`) VALUES ('$img','" . $_SESSION["da_session"] . "','$f_name','$l_name','$dob','$age','$bg','$t_add','$p_add','$st','$city','$pin','$contact','$quali','$specl','1','500')";

	if (mysqli_query($con, $sq)) {
		$msg = "<p class='msg_head'>Doctor Added</p>";
	} else {
		$msg = "<p class='msg_head'>Error Occured</p>";
	}

	$con->close();
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
	<section class="doctor_sec container mb-3">
		<div class="row top-row">
			<div class="col-md-8 m-auto">
				<form method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<label>Choose Image</label><br>
						<input type="file" name="image" class="btn_img" accept=".JPG,.JPEG,.PNG">
					</div>
					<div class="row">
						<div class="form-group col-md-6 m-auto">
							<label for="fname">First name</label>
							<input type="text" name="fname" class="form-control">
						</div>
						<div class="form-group col-md-6 m-auto">
							<label for="lname">Last name</label>
							<input type="text" name="lname" class="form-control">
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-4 m-auto">
							<label for="dob">DOB</label>
							<input type="date" name="date" class="form-control">
						</div>
						<div class="form-group col-md-2 m-auto">
							<label for="age">Age</label>
							<input type="number" name="age" class="form-control" min="25">
						</div>
						<div class="form-group col-md-6 m-auto">
							<label for="blood">Blood group</label>
							<select class="form-control" name="blood">
								<option>Choose Group</option>
								<option value="A+ve">A+ve</option>
								<option value="A-ve">A-ve</option>
								<option value="B+ve">B+ve</option>
								<option value="B-ve">B-ve</option>
								<option value="O+ve">O+ve</option>
								<option value="O-ve">O-ve</option>
								<option value="Ab+ve">Ab+ve</option>
								<option value="AB-ve">AB-ve</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6 m-auto">
							<label for="tempadd">Temporary Address</label>
							<textarea class="form-control" name="tadd"></textarea>
						</div>
						<div class="form-group col-md-6 m-auto">
							<label for="">Permanent Address</label>
							<textarea class="form-control" name="padd"></textarea>
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-4 m-auto">
							<label for="state">State</label>
							<select class="form-control" name="state">
								<option>Select State</option>
								<?php $sql = mysqli_query($con, "SELECT * FROM state ORDER by st_name ASC");
								while ($read = mysqli_fetch_array($sql)) {
								?>
									<option value="<?php echo $read['st_id']; ?>"><?php echo $read['st_name']; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group col-md-2 m-auto">
							<label for="city">City</label>
							<input type="text" name="d_city" class="form-control">
						</div>
						<div class="form-group col-md-2 m-auto">
							<label for="pin">Pin code</label>
							<input type="number" name="pin" class="form-control">
						</div>
						<div class="form-group col-md-4 m-auto">
							<label for="contact">Contact</label>
							<input type="number" name="cont" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6 m-auto">
							<label for="quali">Qualification</label>
							<select class="form-control" name="quali">
								<option>Choose Qualification</option>
								<?php
								$sql = mysqli_query($con, "SELECT * FROM d_qualific ORDER by q_name ASC");
								while ($read = mysqli_fetch_array($sql)) {
								?>
									<option value="<?php echo $read['q_id']; ?>"><?php echo $read['q_name']; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group col-md-6 m-auto">
							<label for="specialization">Specialization</label>
							<select class="form-control" name="specl">
								<option>Choose Specialization</option>
								<?php
								$sql = mysqli_query($con, "SELECT * FROM d_specl ORDER by s_name ASC");
								while ($read = mysqli_fetch_array($sql)) {
								?>
									<option value="<?php echo $read['s_id']; ?>"><?php echo $read['s_name']; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="mt-3">
						<input type="submit" name="submit_doc" value="Add Doctor" class="btn_adddoc">
					</div>

				</form>
			</div>
		</div>

		<?php echo $msg; ?>
	</section>
</body>

</html>