<!DOCTYPE html>
<html>
<head>
	<title>Sanjivini Hospital-MeetDoctor</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="font.css">
	<link rel="stylesheet" href="addreport.css">
</head>
<body>
<div class="container">
	<?php include("cmn_file/login_topnav_default.php"); ?>
	<section class="report_sec">
		<p class="report_head">Add Test Reports</p>
		<form action="" method="POST">
			<div align="center">
				<input type="text" name="" placeholder="Patient Id" 
				class="inp_pid">
				<input type="date" name="" class="inp_date">
			</div>
			<div align="center">
				<input type="file" name="" value="Choose File" 
				class="inp_cfile" accept=".PDF">
			</div>
			<div align="center">
				<input type="submit" name="" value="Save Report" 
			    class="btn_submit">
			</div>
		</form>
	</section>
</body>
</html>