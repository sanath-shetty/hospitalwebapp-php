<?php 
        session_start();
        include('connect.php');
        ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
        $failed="";
        $msg="";
	    if (isset($_POST['submit'])) {

	    	$o_pswd = $_POST['old_pswd'];
	    	$n_pswd = $_POST['new_pswd'];
	    	$c_pswd = $_POST['conf_pswd'];

	    	$sql = "SELECT `pa_pswd` FROM a_patient WHERE `padmin_id` = $_SESSION[pa_session]";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
            	if ($row['pa_pswd'] == $o_pswd && $n_pswd == $c_pswd) {
            		mysqli_query($con, "UPDATE `a_patient` SET `pa_pswd` = '$n_pswd' WHERE 
            			padmin_id = $_SESSION[pa_session]");
            		$msg = "<p class='update_para'>Updated</p>";
            	}else{
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
	<link rel="stylesheet" href="font.css">
	<link rel="stylesheet" href="change_pswd.css">
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
	<section class="pswd_sec">
		<p class="pswd_head">Change Password</p>
		<form action="" method="POST" align="center">
			<input type="text" name="old_pswd" placeholder="Enter old password"
			class="inp_oldpswd"><br>
			<input type="password" name="new_pswd" placeholder="Enter new password"
			class="inp_newpswd"><br>
			<input type="password" name="conf_pswd" placeholder="Confirm password"
			class="inp_confpswd"><br>
			<input type="submit" name="submit" value="Save Changes"
			class="btn_submit">
			<div>
				<?php echo $failed; ?>
				<?php echo $msg; ?>
			</div>
		</form>
	</section>
</div>
</body>
</html>