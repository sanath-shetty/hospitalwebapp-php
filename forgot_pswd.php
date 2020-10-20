<?php
include('connect.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$success = "";
$failed = "";
$MESSAGE_BODY = "";

if (isset($_POST["submit_npswd"])) {

	$a_type = $_POST["s_type"];
	$a_email = $_POST["u_email"];

	if ($a_type == 'patient') {
		$sql = "SELECT pa_email FROM a_patient where pa_email='$a_email'";
		$result = mysqli_query($con, $sql);
		if (mysqli_num_rows($result) > 0) {
			$randNum = rand(0, 10000);
			$ToEmail = 'dummysanath@gmail.com';
			$EmailSubject = 'Site contact form';
			$mailheader = "From: " . $_POST['u_email'] . "\r\n";
			$mailheader .= "Reply-To: " . $_POST['u_email'] . "\r\n";
			$mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n";
			$MESSAGE_BODY .= "Email: '$a_email'</n><br/><br/>";
			$MESSAGE_BODY .= "Password: '$randNum'</n><br/><br/>";
			$mail = mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader);

			if ($mail) {
				$msg = "<p>Password has been sent to your email account.</p>";
				$sql = "UPDATE `a_patient` SET `pa_pswd`= '$randNum' WHERE pa_email = '$a_email'";
				$result = mysqli_query($con, $sql);
				if ($result) {
					header('Location:login.php?success');
				} else {
					echo "Password not updated";
				}
			} else {
				echo '<script>alert("Error occured. Please retry.")</script>';
			}
		} else {
			echo "Ninna Gurta Ijji...Yerya E???";
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
</head>

<body>
	<?php include("cmn_file/login_navbar.php"); ?>
	<div class="route my-3">
		<div class="container">
			<div class="row">
				<h7>Home</h7>
				<i class="fas fa-arrow-right"></i>
				<h7>Login</h7>
				<i class="fas fa-arrow-right"></i>
				<h7>Forgot Passowrd</h7>
			</div>
		</div>
	</div>
	<section class="login_sec">
		<div class="row">
			<div class="col-md-4 m-auto">
				<h3 class="my-3">Forgot Password</h3>

				<form method="POST">
					<div class="form-group">
						<label for="usertype">User Type</label>
						<select class="form-control" name="s_type">
							<option>Select Type</option>
							<option value="admin">Main Admin</option>
							<option value="patient">Patient</option>
							<option value="doctor">Doctor</option>
						</select>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" name="u_email" placeholder="Email" class="form-control">
					</div>
					<input type="submit" name="submit_npswd" value="Send" class="btn btn-primary">

				</form>
			</div>
		</div>
	</section>
</body>

</html>