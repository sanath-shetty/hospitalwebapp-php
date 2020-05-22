<!DOCTYPE html>
<html>
<head>
	<title>Sanjivini Hospital-MeetDoctor</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="font.css">
	<link rel="stylesheet" href="addblogger.css">
</head>
<body>
<div class="container">
	<?php include("cmn_file/login_topnav_default.php"); ?>
	<div class="addblogger">
		<p class="blogger_head">Add Bloggers</p>
		<form action="" method="POST">
			<div style="margin-top: 1%" align="center">
				<input type="text" name="" placeholder="First Name"
				class="inp_fname">
				<input type="text" name="" placeholder="Last Name"
				class="inp_lname">
			</div>
			<div style="margin-top: 1%" align="center">
				<input type="number" name="" placeholder="Contact"
				class="inp_cont">
				<input type="email" name="" placeholder="Email"
				class="inp_email">
			</div>
			<div style="margin-top: 1%" align="center">
				<input type="password" name="" 
				placeholder="Password(8-16 characters)" class="inp_pswd">
			</div>
			<div style="margin-top: 1%" align="center">
				<input type="submit" name="" value="submit"
				class="btn_submit">
			</div>
		</form>
	</div>
</body>
</html>