<!DOCTYPE html>
<html>
<head>
	<title>Sanjivini Hospital-MeetDoctor</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="font.css">
	<link rel="stylesheet" href="addblog.css">
</head>
<body>
<div class="container">
	<?php include("cmn_file/topnav_default.php"); ?>
	<p class="back_btn">Go Back</p>
	<section class="add_blog_sec">
		<p class="blog_head">Add Blog</p>
		<form action="" method="POST" align="center">
			<input type="text" name="" class="inp_name" placeholder="Sanath Shetty">
			<input type="date" name="" class="inp_date"><br>
			<textarea class="txta_para"></textarea><br>
			<p class="add_para">Add Paragraph</p>
			<input type="submit" name="" value="Submit" class="btn_submit">
		</form>
	</section>
	<p class="back_btn">Go Back</p>
	<?php include("cmn_file/footer_default.php");?>
</div>
</body>
</html>