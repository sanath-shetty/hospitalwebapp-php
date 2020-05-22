<?php 
    if (!empty($_POST['email'])) {
		    	
		$ToEmail = 'dummysanath@gmail.com'; 
        $EmailSubject = 'Site contact form'; 
        $mailheader = "From: ".$_POST['email']."\r\n"; 
        $mailheader .= "Reply-To: ".$_POST['email']."\r\n"; 
        $mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
        $MESSAGE_BODY = "Name: ".$_POST['name']."";
        $MESSAGE_BODY = "Contact: ".$_POST['cont']."</n><br/><br/>";
        $MESSAGE_BODY .= "Email: ".$_POST['email']."</n><br/><br/>"; 
        $MESSAGE_BODY .= "Comment: ".nl2br($_POST['comment']).""; 
        $mail = mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader);

        if ($mail) {
        	echo '<script>alert("Email has been sent.")</script>';
        }else{
        	echo '<script>alert("Error occured. Please retry.")</script>';
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
	<link rel="stylesheet" href="contactus.css">
</head>
<body>
<div class="container">
	<?php include("cmn_file/topnav_default.php"); ?>
	<section class="slider_sec">
		<p class="slider_head">Contact Us</p>
		<div class="quick_link">
			<p class="quick_link_head">Quick links</p>
			<hr class="hr1">
			<div style="display: flex;">
				<p class="quick_head">Contact us</p>
				<hr style="margin: 12px;">
				<p class="quick_head" style="padding-left: 0;">Make an appointment</p>
			</div>
		</div>
	</section>
	<div class="maparea">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31115.070014455832!2d74.8395973383677!3d12.88302780401631!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba35a3ec4efbfc7%3A0xffff067b3ac979d4!2sKadri%2C%20Mangalore%2C%20Karnataka!5e0!3m2!1sen!2sin!4v1579757729043!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
	</div>
	<div class="twosection">
		<div class="form_sec">
			<form action="" method="POST" style="width: 90%; margin: 0 auto;">
			<input type="text" name="name" placeholder="Name" class="inp_name" pattern="[A-Za-z]+" title="accepts only capital or small letters.">
			<input type="text" name="cont" placeholder="Contact" class="inp_cont" pattern="^\d{10}$" title="10 numeric characters only">
			<input type="email" name="email" placeholder="Email" class="inp_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="xyz@something.com">
			<textarea class="txt_area" name="comment" placeholder="Query here"></textarea><br>
			<input type="submit" name="btn_submit" value="Submit" class="btn_submit">
			</form>
		</div>
		<hr class="hr2">
		<div class="adrs_sec">
			<p class="adrs_head">Address</p>
			<p class="adrs_para">5th floor, Sanu Palace, Near PVS Circle, Mangalore-575002</p>
			<p class="adrs_head">Contact</p>
			<p class="adrs_para">+91 95678 89443</p>
			<p class="adrs_para">+91 96674 89045</p>
		</div>
	</div>
	<?php include("cmn_file/footer_default.php"); ?>
</div>
</body>
</html>