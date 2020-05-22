<!DOCTYPE html>
<html>
<head>
	<title>Sanjivini Hospital-MeetDoctor</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="font.css">
	<link rel="stylesheet" href="bloggerlogin.css">
</head>
<body>
<div class="container">
	<?php include("cmn_file/topnav_default.php"); ?>
	<section class="slider_sec">
		<p class="slider_head">Blogger Login</p>
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
	<section class="login_blogger">
		<p class="blogger_head">Blogger Login</p>
		<form action="" method="POST" align="center">
			<input type="text" name="" placeholder="Username"
			class="inp_uname"><br>
			<input type="password" name="" placeholder="Password"
			class="inp_password"><br>
			<input type="submit" name="" value="Submit" class="btn_submit">
		</form>
	</section>
	<?php include("cmn_file/footer_default.php"); ?>
</div>
</body>
</html>