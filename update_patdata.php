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
include('connect.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$msg = "";
$editid = $_GET["edit"];

$sql = "SELECT * FROM patient_data INNER JOIN state WHERE patient_data.st_id=state.st_id && patient_data.p_id='$editid' LIMIT 1";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$pid = $row['p_id'];
		$fname = $row['f_name'];
		$lname = $row['l_name'];
		$dob = $row['date'];
		$age = $row['age'];
		$bg = $row['blood_group'];
		$cont = $row['contact'];
		$adrs = $row['address'];
		$state = $row['st_id'];
		$statename = $row['st_name'];
		$city = $row['city'];
		$pin = $row['pin'];
		$job = $row['job'];
		$email = $row['email'];
		$height = $row['height'];
		$weight = $row['weight'];
		$a_check = $row['health_issue'];
		$b_check = explode(',', $a_check);
		$other = $row['others_issue'];
	}
} else {
	$msg = "<p class='msg_head'>Invalid</p>";
}
?>

<?php
$d_check = "";
$msg = "";
if (isset($_POST['update'])) {

	$fname = $_POST['p_fname'];
	$lname = $_POST['p_lname'];
	$dob = $_POST['p_dob'];
	$age = $_POST['p_age'];
	$blood = $_POST['p_bg'];
	$cont = $_POST['p_cont'];
	$adrs = $_POST['p_adrs'];
	$state = $_POST['p_state'];
	$city = $_POST['p_city'];
	$pin = $_POST['p_pin'];
	$job = $_POST['p_job'];
	$email = $_POST['p_email'];
	$height = $_POST['p_hei'];
	$weight = $_POST['p_wei'];
	$other = $_POST['p_oissue'];

	if (isset($_POST['healthissue'])) {
		$c_check = $_POST['healthissue'];
		$d_check = implode(",", $c_check);
	}
	$update = "UPDATE `patient_data` SET `f_name`='$fname',`l_name`='$lname',`date`='$dob',
    	    `age`='$age',`blood_group`='$blood',`contact`='$cont',`address`='$adrs',`st_id`='$state',
    	    `city`='$city',`pin`='$pin',`job`='$job',`email`='$email',`height`='$height',
    	    `weight`='$weight',`health_issue`='$d_check',`others_issue`='$other' WHERE `p_id`='$editid'";

	if (mysqli_query($con, $update)) {
		echo "";
		$msg = "<p class='msg_head'>Record updated successfully</p>";
	} else {
		echo "Error updating record: " . mysqli_error($con);
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
	<section class="data_sec">
		<div class="container">
			<div class="row top-row">
				<div class="col-md-10 m-auto">
					<form method="POST">
						<div class="row">
							<div class="form-group col-md-6">
								<label for="firstname">First name</label>
								<input type="text" name="p_fname" placeholder="First Name" class="form-control" value="<?php echo $fname; ?>">
							</div>
							<div class="form-group col-md-6">
								<label for="lastname">Last name</label>
								<input type="text" name="p_lname" placeholder="Last Name" class="form-control" value="<?php echo $lname; ?>">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-6">
								<label for="date">Date</label>
								<input type="date" name="p_dob" class="form-control" value="<?php echo $dob ?>">
							</div>
							<div class="form-group col-md-6">
								<label for="age">Age</label>
								<input type="number" name="p_age" placeholder="age" class="form-control" value="<?php echo $age; ?>">
							</div>
						</div>
						<div class="form-group">
							<div class="form-group col-md-6">
								<label for="bloodgroup">Blood group</label>
								<select class="form-control" name="p_bg">
									<option><?php echo $bg; ?></option>
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
							<div class="form-group col-md-6">
								<label for="contact">Contact</label>
								<input type="number" name="p_cont" class="form-control" value="<?php echo $cont; ?>">
							</div>
						</div>

						<div class="form-group">
							<label for="address">Address</label>
							<textarea class="form-control" name="p_adrs"><?php echo $adrs; ?></textarea>
						</div>

						<div class="form-group">
							<label for="state">State</label>
							<select class="form-control" name="p_state">
								<option value="<?php echo $state; ?>"><?php echo $statename; ?></option>
								<?php $sql = mysqli_query($con, "SELECT * FROM state ORDER by st_name ASC");
								while ($read = mysqli_fetch_array($sql)) {
								?>
									<option value="<?php echo $state; ?>"><?php echo $read['st_name']; ?></option>
								<?php } ?>
							</select>
						</div>

						<div class="row">
							<div class="form-group col-md-6">
								<label for="city">City</label>
								<input type="text" name="p_city" placeholder="city" class="form-control" value="<?php echo $city; ?>">
							</div>
							<div class="form-group col-md-6">
								<label for="pincode">
									Pincode
								</label>
								<input type="number" name="p_pin" placeholder="Pin Code" class="form-control" value="<?php echo $pin; ?>">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-6">
								<label for="occupation">Occupation</label>
								<textarea class="form-control" name="p_job"><?php echo $job; ?></textarea>
							</div>
							<div class="form-group col-md-6">
								<label for="email">Email</label>
								<input type="email" name="p_email" class="form-control" value="<?php echo $email; ?>">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-6">
								<label for="height">Height</label>
								<input type="number" name="p_hei" class="form-control" value="<?php echo $height; ?>">
							</div>
							<div class="form-group col-md-6">
								<label for="weight">Weight</label>
								<input type="number" name="p_wei" class="form-control" value="<?php echo $weight; ?>">
							</div>
						</div>
						<div class="form-group">
							<p class="health_issue">Any previous health issues?</p>
							<div style="display: flex;">
								<input type="checkbox" name="healthissue[]" value="diabeties" <?php
																								if (in_array('diabeties', $b_check)) {
																									echo "checked";
																								}																			?>>
								<p class="hlt_head">Diabeties</p>
								<input type="checkbox" name="healthissue[]" value="bloodpressure" <?php
																									if (in_array('bloodpressure', $b_check)) {
																										echo "checked";
																									}
																									?>>
								<p class="hlt_head">Blood Pressure</p>
								<input type="checkbox" name="healthissue[]" value="stroke" <?php
																							if (in_array('stroke', $b_check)) {
																								echo "checked";
																							}
																							?>>
								<p class="hlt_head">Stroke</p>
								<input type="checkbox" name="healthissue[]" value="skinallergies" <?php
																									if (in_array('skinallergies', $b_check)) {
																										echo "checked";
																									}
																									?>>
								<p class="hlt_head">Skin Allergies</p>
							</div>
							<div class="form-group">
								<label for="other">Any other</label>
								<textarea class="form-control" name="p_oissue"><?php echo $other; ?></textarea>
							</div>

						</div>
						<input type="submit" name="update" value="Update" class="uppatbtn">
						<div>
							<?php echo $msg; ?>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</body>

</html>