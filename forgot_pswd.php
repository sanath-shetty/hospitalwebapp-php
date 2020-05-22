<?php 
	include('connect.php');
    ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
    $success="";
    $failed="";
    $MESSAGE_BODY = "";

    if (isset($_POST["submit_npswd"])) {

        $a_type=$_POST["s_type"];
        $a_email=$_POST["u_email"];

        if ($a_type=='patient'){
        $sql = "SELECT pa_email FROM a_patient where pa_email='$a_email'";
        $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                	$randNum = rand(0,10000);
                	$ToEmail = 'dummysanath@gmail.com'; 
                    $EmailSubject = 'Site contact form';
                    $mailheader = "From: ".$_POST['u_email']."\r\n"; 
                    $mailheader .= "Reply-To: ".$_POST['u_email']."\r\n"; 
                    $mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n";
                    $MESSAGE_BODY .= "Email: '$a_email'</n><br/><br/>";
                    $MESSAGE_BODY .= "Password: '$randNum'</n><br/><br/>";
                    $mail = mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader);

                    if ($mail) {
        	            $msg = "<p>Password has been sent to your email account.</p>";
                        $sql = "UPDATE `a_patient` SET `pa_pswd`= '$randNum' WHERE pa_email = '$a_email'";
                        $result = mysqli_query($con,$sql);
                        if ($result) {
                            header('Location:login.php?success');
                        } 
                        else{
                        	echo "Password not updated";
                        }                 
                    }else{
        	            echo '<script>alert("Error occured. Please retry.")</script>';
                    }
            }else{
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
	<link rel="stylesheet" href="font.css">
	<link rel="stylesheet" href="forgot_pswd.css">
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
					<a href="addadmin.php" class="chng_clr">Add Admin</a>
				</li>
				<li>
					<a href="logout.php" class="chng_clr">Logout</a>
				</li>
			</ul>
		</div>
	</section>
	<section class="login_sec">
		<p class="login_head">Reset Password</p>
		
		<form action="" method="POST" align="center">
			<label class="utype_head">User Type</label>
			<select class="sel_utype" name="s_type">
				<option>Select Type</option>
				<option value="admin">Main Admin</option>
				<option value="patient">Patient</option>
				<option value="doctor">Doctor</option>
			</select><br>
			<input type="text" name="u_email" placeholder="Email" 
			class="inp_userid"><br>
			<input type="submit" name="submit_npswd" value="Send" 
			class="btn_submit_npswd">
		</form>
	</section>
</div>
</body>
</html>