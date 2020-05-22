<!DOCTYPE html>
<html>
<head>
	<title>Sanjivini Hospital-MeetDoctor</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="font.css">
	<link rel="stylesheet" href="blogpage.css">
</head>
<body>
<div class="container">
	<?php include("cmn_file/topnav_default.php"); ?>
	<section class="slider_sec">
		<p class="slider_head">Blog</p>
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
	<section class="mid_sec">
		<form action="" method="POST">
			<div class="topsearch_sec">
				<input type="text" name="" class="inp_search">
				<input type="submit" name="" value="Search" class="btn_search">
		    </div>
		</form>
	</section>
	<section class="blog_sec">
		<div class="box">
			<div class="img_name_date">
				<img src="image/6-1.jpg" class="img_prop1">
				<div class="name_date">
					<p class="name_head">Timmappa</p>
					<p class="date_head">30 July 2109</p>
				</div>
			</div>
			<p class="blog_para">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>

			<a href="" class="btn_readmore">Read More</a>
		</div>
	</section>
	<div class="loadmore_sec">
		<a href="" class="btn_loadmore">Load More</a>
	</div>
	<?php include("cmn_file/footer_default.php"); ?>
</div>
</body>
</html>