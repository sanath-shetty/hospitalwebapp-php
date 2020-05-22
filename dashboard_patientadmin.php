<?php session_start();
    include ('connect.php');
   
        $sql = "SELECT * FROM a_patient where padmin_id='" . $_SESSION["pa_session"] ."'";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
            $user=$row["pa_name"];
            }
        }else{
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
	<link rel="stylesheet" href="dashboard_patientadmin.css">
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
					<a href="change_pswd.php" class="chng_clr">Change Password</a>
				</li>
				<li>
					<a href="logout.php"><?php echo $user; ?></a>
					<a href="logout.php" class="chng_clr">- Logout</a>
				</li>
			</ul>
		</div>
	</section>
		<section class="menu_sec">
		<p class="dashboard_head">Patient Admin Interface </p>
		<div class="row">
			<div class="box">
				<p class="list_head">Patient</p>
				<ul class="list_ul">
					<li><a href="patientdata_form.php">Add Patient Data</a></li>
					<li><a href="vpatientdetail.php">View Patient Data</a></li>
					<li><a href="vwardasgn.php">View Ward Assigned</a></li>
					<li><a href="testresults.php">Test Results</a></li>
					<li><a href="vdischargebill.php">Patient Bill</a></li>
				</ul>
			</div>
		</div>
	</section>
</div>
</body>
</html>