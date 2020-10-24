<?php session_start();
include('connect.php');

$sql = "SELECT * FROM a_doctor where dadmin_id='" . $_SESSION["da_session"] . "'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) >= 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$user = $row["da_name"];
	}
}
mysqli_close($con);
?>
<?php
include('connect.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$failed = "";
$msg = "";
if (isset($_POST['submit'])) {

	$o_pswd = $_POST['old_pswd'];
	$n_pswd = $_POST['new_pswd'];
	$c_pswd = $_POST['conf_pswd'];

	$sql = "SELECT `pa_pswd` FROM a_patient WHERE `padmin_id` = $_SESSION[pa_session]";
	$result = mysqli_query($con, $sql);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			if ($row['pa_pswd'] == $o_pswd && $n_pswd == $c_pswd) {
				mysqli_query($con, "UPDATE `a_patient` SET `pa_pswd` = '$n_pswd' WHERE 
            			padmin_id = $_SESSION[pa_session]");
				$msg = "<p class='update_para'>Updated</p>";
			} else {
				$failed = "<p class='incorrect_para'>Incorrect Password/Password Does not match</p>";
			}
		}
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
			min-height: 100vh;
			background-position: center center;
			background-attachment: fixed;
		}
	</style>
</head>

<body>
	<?php include("cmn_file/login_topnav_doctor.php"); ?>

	<!-- laptop -->

	<div class="laptop">
		<div class="route my-3">
			<div class="container">
				<div class="row">
					<h7>Home</h7>
					<i class="fas fa-arrow-right"></i>
					<h7>Change password</h7>
				</div>
			</div>
		</div>
		<section class="pswd_sec container">
			<div class="row top-row">
				<div class="col-md-8 m-auto">
					<form method="POST">
						<div class="form-group">
							<label for="old">Old password</label>
							<input type="text" name="old_pswd" class="form-control">
						</div>
						<div class="form-group">
							<label for="new">New password</label>
							<input type="password" name="new_pswd" class="form-control">
						</div>
						<div class="form-group">
							<label for="conf">Confirm passowrd</label>
							<input type="password" name="conf_pswd" class="form-control">
						</div>
						<input type="submit" name="submit" value="Update" class="btn_submit mt-3">
						<div>
							<?php echo $failed; ?>
							<?php echo $msg; ?>
						</div>
					</form>
				</div>
			</div>
		</section>
	</div>

	<!-- tab -->

	<div class="tab">
		<div class="route my-3">
			<div class="container">
				<div class="row">
					<a href="">
						<h7>Home</h7>
					</a>
					<i class="fas fa-arrow-right"></i>
					<a href="">
						<h7>Change password</h7>
					</a>
				</div>
			</div>
		</div>
		<section class="pswd_sec container">
			<div class="row top-row">
				<div class="col-md-8 m-auto">
					<form method="POST">
						<div class="form-group">
							<label for="old">Old password</label>
							<input type="text" name="old_pswd" class="form-control">
						</div>
						<div class="form-group">
							<label for="new">New password</label>
							<input type="password" name="new_pswd" class="form-control">
						</div>
						<div class="form-group">
							<label for="conf">Confirm passowrd</label>
							<input type="password" name="conf_pswd" class="form-control">
						</div>
						<input type="submit" name="submit" value="Update" class="btn_submit mt-3">
						<div>
							<?php echo $failed; ?>
							<?php echo $msg; ?>
						</div>
					</form>
				</div>
			</div>
		</section>
	</div>

	<!-- mobile -->

	<div class="mobile">
		<div class="route my-3">
			<div class="container">
				<div class="row">
					<a href="">
						<h7>Home</h7>
					</a>
					<i class="fas fa-arrow-right"></i>
					<a href="">
						<h7>Change password</h7>
					</a>
				</div>
			</div>
		</div>
		<section class="pswd_sec container">
			<div class="row">
				<div class="col-md-8 m-auto">
					<form method="POST">
						<div class="form-group">
							<label for="old">Old password</label>
							<input type="text" name="old_pswd" class="form-control">
						</div>
						<div class="form-group">
							<label for="new">New password</label>
							<input type="password" name="new_pswd" class="form-control">
						</div>
						<div class="form-group">
							<label for="conf">Confirm passowrd</label>
							<input type="password" name="conf_pswd" class="form-control">
						</div>
						<input type="submit" name="submit" value="Update" class="btn_submit mt-3">
						<div>
							<?php echo $failed; ?>
							<?php echo $msg; ?>
						</div>
					</form>
				</div>
			</div>
		</section>
	</div>
</body>

</html>