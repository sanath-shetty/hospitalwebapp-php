<?php
include('connect.php');
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
$msg="";

if (isset($_POST["submit"])) {

$type=$_POST["s_type"];
$uname=$_POST["new_sa"];
$uemail=$_POST["new_email"];
$upassword=$_POST["new_pswd"];

if ($type=='patient') {
	$sql="INSERT INTO `a_patient`(`pa_name`, `pa_email`, `pa_pswd`, `pa_status`) VALUES ('$uname','$uemail','$upassword','1')";

    if (mysqli_query($con, $sql)) {
        $msg="<p class='success_head'>New Account created successfully.</p>";
    } 
    else{
	    $msg="<p class='failed_head'>No New Account Created.</p>";
    }
}else{
    $msg="<p class='failed_head'>Select admin.</p>";
}

if ($type=='doctor') {
	$sql="INSERT INTO `a_doctor`(`da_name`, `da_email`, `da_pswd`) VALUES ('$uname','$uemail','$upassword')";

    if (mysqli_query($con, $sql)) {
        $msg="<p class='success_head'>New Account created successfully.</p>";
    } 
    else{
	    $msg="<p class='failed_head'>No New Account Created.</p>";
    }
}else{
    $msg="<p class='failed_head'>Select admin.</p>";
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
	<link rel="stylesheet" href="font.css">
	<link rel="stylesheet" href="addadmin.css">
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
					<a href="dashboard.php" class="chng_clr">Home</a>
				</li>
				<li>
					<a href="logout.php" class="chng_clr">Logout</a>
				</li>
			</ul>
		</div>
	</section>
	<section class="addadmin_sec">
		<p class="addadmin_head">Add Admin</p>
		<form action="" method="POST">
			<div align="center" style="margin-top: 1%">
				<label class="utype_head">User Type</label>
			    <select class="sel_utype" name="s_type">
				    <option>Select Type</option>
				    <option value="patient">Patient</option>
				    <option value="doctor">Doctor</option>
				    <option value="appointments">Appointments</option>
				    <option value="ward">Ward</option>
			    </select>
			</div>
			<div align="center" style="margin-top: 1%">
				<label class="lab_username">Username</label>
			    <input type="text" name="new_sa" class="inp_uname">
			</div>
			<div align="center" style="margin-top: 1%">
				<label class="lab_username">Email</label>
			    <input type="email" name="new_email" class="inp_uemail">
			</div>
			<div align="center" style="margin-top: 1%">
				<label class="lab_pswd">Password</label>
			    <input type="password" name="new_pswd" class="inp_pswd">
			</div>
			<div align="center" style="margin-top: 1%">
				<input type="submit" name="submit" value="Create User"
				class="btn_cu">
			</div>
		</form>
		<?php echo $msg; ?>
	</section>
</div>
</body>
</html>