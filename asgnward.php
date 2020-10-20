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
?>

<?php
include('connect.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$asgnWard = $_GET['asg'];

$sql = "SELECT * FROM patient_data WHERE p_id = '$asgnWard'";
$result = mysqli_query($con, $sql);

while ($rows = mysqli_fetch_assoc($result)) {
	$pid = $rows['p_id'];
	$fname = $rows['f_name'];
	$lname = $rows['l_name'];
	$age = $rows['age'];
	$cont = $rows['contact'];
}
?>

<?php
include('connect.php');
$msg = "";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['save_apnt'])) {

	$bld = $_POST['bld_id'];

	if (isset($_POST['w_id'])) {

		$ward = $_POST['w_id'];

		$sql = "UPDATE `ward` SET `status`='1' WHERE `w_id` = '$ward'";
		$result = mysqli_query($con, $sql);

		if ($result) {
		} else {
			$msg = "<p class='error_msg'>Error Occured</p>";
		}
	}
	$sql = "INSERT INTO `ward_asgn`(`p_id`, `bld_id`, `w_id`) VALUES ('$asgnWard','$bld','$ward')";
	$result = mysqli_query($con, $sql);

	if ($result) {
		$msg = "<p class='error_msg'>Ward Assigned</p>";
	} else {
		$msg = "<p class='error_msg'>Error Occured</p>";
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
	<div class="asgn_sec">
		<div class="container">
			<div class="row top-row">
				<div class="col-md-10 m-auto">
					<form action="" method="POST">
						<div class="row">
							<div class="form-group col-md-2">
								<label for="patientid">Patient id</label>
								<input type="text" name="pid" class="form-control" value="<?php echo $pid; ?>" disabled="disabled">
							</div>
							<div class="form-group col-md-5">
								<label for="fname">First name</label>
								<input type="text" name="fname" class="form-control" value="<?php echo $fname; ?>" disabled="disabled">
							</div>
							<div class="form-group col-md-5">
								<label for="lname">Last name</label>
								<input type="text" name="lname" placeholder="Last Name" class="form-control" value="<?php echo $lname; ?>" disabled="disabled">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-2">
								<label for="age">Age</label>
								<input type="number" name="age" class="form-control" value="<?php echo $age; ?>" disabled="disabled">
							</div>
							<div class="form-group col-md-5">
								<label for="date">Date</label>
								<input type="text" name="cont" class="form-control" value="<?php echo $cont; ?>" disabled="disabled">
							</div>

						</div>
						<div class="row">
							<div class="form-group col-md-5">
								<label for="buliding">Buliding</label>
								<select name="bld_id" id="bld_id" class="form-control">
									<option>Select</option>
									<?php
									include 'connect.php';
									$sql = "SELECT * FROM building";

									if ($stmt = $con->query($sql)) {
										echo "No of records : " . $stmt->num_rows . "<br>";

										while ($row = $stmt->fetch_assoc()) { ?>
											<option value="<?php echo $row['bld_id'] ?>"><?php echo $row['bld_name'] ?></option>
									<?php	}
									} else {
										echo $con->error;
									}
									?>
								</select> </div>
							<div class=" form-group col-md-5">
								<label for="ward">Ward</label>
								<select name='w_id' id='w_id' class='form-control'></select>
							</div>
						</div>
						<input type="submit" name="save_apnt" value="Assign Room" class="asgnwardbtn">
					</form>
				</div>
			</div>
		</div>

		<?php echo $msg; ?>
	</div>

	<script src="js/jquery-1.8.1.min.js"></script>
	<script>
		$(document).ready(function() {

			$('#bld_id').change(function() {

				var bld_id = $('#bld_id').val();

				$('#w_id').empty();

				$.get('builddataAjax.php', {
					'bld_id': bld_id
				}, function(return_data) {
					if (return_data.data.length > 0) {
						$.each(return_data.data, function(key, value) {
							$("#w_id").append("<option value='" + value.w_id + "'>" + value.w_num + "</option>");
						});
					} else {
						$('#msg').html('No records found');
					}
				}, "json");

			});

		});
	</script>
</body>

</html>