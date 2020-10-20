<?php
session_start();
include "connect.php";
$sql = "SELECT * FROM a_patient where padmin_id='" . $_SESSION["pa_session"] . "'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$user = $row["pa_name"];
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
$i_health = "";
$dateOfBirth = "";

if (isset($_POST["save_patient"])) {

	$id = $pid;
	$fname = $_POST['p_fname'];
	$lname = $_POST['p_lname'];
	$date = $_POST['p_dob'];
	$age = $_POST['p_age'];
	$blood = $_POST['p_bg'];
	$contact = $_POST['p_cont'];
	$address = $_POST['p_adrs'];
	$state = $_POST['p_state'];
	$city = $_POST['p_city'];
	$pin = $_POST['p_pin'];
	$job = $_POST['p_job'];
	$email = $_POST['p_email'];
	$height = $_POST['p_hei'];
	$weight = $_POST['p_wei'];
	$other = $_POST['p_oissue'];
	if (isset($_POST['healthissue'])) {
		$health = $_POST['healthissue'];
		$i_health = implode(',', $health);
	}
	if (isset($date)) {
	}
	$sql = "INSERT INTO `patient_data`(`p_id`, `f_name`, `l_name`, `date`, `age`, `blood_group`, `contact`, `address`, `st_id`, `city`, `pin`, `job`, `email`, `height`, `weight`, `health_issue`, `others_issue`) VALUES ('$id','$fname','$lname','$date','$age','$blood','$contact','$address','$state','$city','$pin',
    '$job','$email','$height','$weight','$i_health','$other')";

	if (mysqli_query($con, $sql)) {
		$msg = "<p class='msg_head'>State Added</p>";
	} else {
		$msg = "<p class='msg_head'>Error Occured</p>";
	}

	mysqli_close($con);
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
	<section class="form-sec container">
		<div class="row">
			<div class="col-md-8 m-auto">
				<form class="patient" method="POST">
					<?php
					include('connect.php');
					$pid = "";
					$sq = "SELECT `p_id` FROM `patient_data` ORDER BY `p_id` desc LIMIT 1";
					$ctn = mysqli_query($con, $sq);
					if (mysqli_num_rows($ctn) > 0) {
						while ($row = mysqli_fetch_assoc($ctn)) {
							$p_id_code = $row['p_id'];
							$pid = ++$p_id_code;
						}
					} else {
						$pid = 'P01';
					}
					?>
					<div class="form-group">
						<label for="fname">First name</label>
						<input type="text" name="p_fname" class="form-control">
					</div>
					<div class="form-group">
						<label for="lname">Last name</label>
						<input type="text" name="p_lname" class="form-control">
					</div>
					<div class="row">
						<div class="form-group col-md-6 m-auto">
							<label for="date">Date</label>
							<input type="date" name="p_dob" id="date" class="form-control">
						</div>
						<div class="form-group col-md-6 m-auto">
							<label for="age">Age</label>
							<input type="number" name="p_age" value="" id="age" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6 m-auto">
							<label for="blood">Blood Group</label>
							<select class="form-control" name="p_bg">
								<option>Select Group</option>
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
						<div class="form-group col-md-6 m-auto">
							<label for="contact">Contact</label>
							<input type="number" name="p_cont" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="address">Address</label>
						<textarea class="form-control" name="p_adrs" placeholder="Address Here"></textarea>
					</div>
					<div class="form-group">
						<label for="state">State</label>
						<select class="form-control" name="p_state">
							<option>Select State</option>
							<?php $sql = mysqli_query($con, "SELECT * FROM state ORDER by st_name ASC");
							while ($read = mysqli_fetch_array($sql)) {
							?>
								<option value="<?php echo $read['st_id']; ?>"><?php echo $read['st_name']; ?></option>
							<?php } ?>
						</select>
					</div>

					<div class="row">
						<div class="form-group col-md-6 m-auto">
							<label for="city">City</label>
							<input type="text" name="p_city" placeholder="city" class="form-control">
						</div>
						<div class="form-group col-md-6 m-auto">
							<label for="pincode">Pin code</label>
							<input type="number" name="p_pin" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label for="occupation">Occupation</label>
						<textarea class="form-control" name="p_job"></textarea>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" name="p_email" class="form-control">
					</div>
					<div class="row">
						<div class="from-group col-md-6 m-auto">
							<label for="height">Height</label>
							<input type="number" name="p_hei" class="form-control">
						</div>
						<div class="form-group col-md-6 m-auto">
							<label for="width">Width</label>
							<input type="number" name="p_wei" class="form-control">
						</div>
					</div>

					<label for="other">Any previous health issues?</label>
					<div class="form-group row check">
						<input type="checkbox" name="healthissue[]" value="diabeties">
						<p class="hlt_head">Diabeties</p>
						<input type="checkbox" name="healthissue[]" value="bloodpressure">
						<p class="hlt_head">Blood Pressure</p>
						<input type="checkbox" name="healthissue[]" value="stroke">
						<p class="hlt_head">Stroke</p>
						<input type="checkbox" name="healthissue[]" value="skinallergies">
						<p class="hlt_head">Skin Allergies</p>
					</div>
					<div class="from-group">
						<label for="otr">Any Other</label>
						<textarea class="form-control" name="p_oissue"></textarea>
					</div>
					<input type="submit" name="save_patient" value="Add" class="btn btn-primary mt-3">
				</form>
			</div>
		</div>

	</section>
</body>
<script>
	document.getElementById("age").addEventListener("click", function() {
		var date, dateSplit, year, month, day, cur_year, cur_month, cur_day, age;
		date = document.getElementById("date").value;

		dateSplit = date.split("-");

		year = dateSplit[0];
		month = dateSplit[1];
		day = dateSplit[2];

		cur_year = new Date().getFullYear();
		cur_month = new Date().getMonth();
		cur_day = new Date().getDay();

		if (cur_day >= day) {
			console.log("cur_day is greater");
			if (cur_month >= month) {
				console.log("cur_month is greater");
				age = parseInt(cur_year) - parseInt(year);
			} else if (cur_month < month) {
				console.log("cur_month is less");
				age = (parseInt(cur_year) - parseInt(year)) - 1;
			}
		} else if (cur_day < day) {
			console.log("cur_day is less");
			if (cur_month <= month) {
				console.log("cur_month is less");
				age = (parseInt(cur_year) - parseInt(year)) - 1;
			} else if (cur_month > month) {
				console.log("cur_month is greater");
				age = parseInt(cur_year) - parseInt(year);
			}
		}
		console.log(age);
		document.getElementById("age").value = age;
	})
</script>

</html>