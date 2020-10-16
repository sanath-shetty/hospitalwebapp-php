<!DOCTYPE html>
<html>

<head>
	<title>Sanjivini Hospital-Index</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="font.css">
	<link rel="stylesheet" href="index.css">
</head>

<body>
	<div class="container">
		<?php include("cmn_file/topnav_default.php"); ?>
		<section class="slider_sec">
			<div class="transp">
				<div class="slide-one">
					<p class="slider_head">Sanjivini Hospital</p>
					<p class="slider_para">Your health is our wealth. <span class="span1">So stay sick fellas.</span></p>
					<div class="slider_btn">
						<a href="meetdoctor.php" class="btn_doc">Our Doctors</a>
						<a href="" class="btn_cont">Contact us</a>
					</div>
				</div>
				<div class="slide-two">
					<img src="image/logo1.png" class="img-right" alt="">
				</div>
			</div>
		</section>
		<section class="info">
			<div class="left_sec1">
				<h2 class="welcome">Welcome to <span class="welcome_span">Sanjivini</span></h2>
				<div class="services">
					<div class="service-left">
						<h3>Emergency Help</h3>
						<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eius eaque aperiam debitis ducimus quibusdam sit enim, amet provident corrupti? Natus?</p>
					</div>
					<div class="service-right">
						<h3>Qualified doctor</h3>
						<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eius eaque aperiam debitis ducimus quibusdam sit enim, amet provident corrupti? Natus?</p>
					</div>
				</div>
				<div class="services">
					<div class="service-left">
						<h3>Great serveice</h3>
						<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eius eaque aperiam debitis ducimus quibusdam sit enim, amet provident corrupti? Natus?</p>
					</div>
					<div class="service-right">
						<h3>Medical treatment</h3>
						<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eius eaque aperiam debitis ducimus quibusdam sit enim, amet provident corrupti? Natus?</p>
					</div>
				</div>
			</div>
			<div class="right_sec1">
				<h2>Book Appointments</h2>
				<form class="apntform">
					<div>
						<label for="name">Name</label><br>
						<input type="text" name="" id="">
					</div>
					<div>
						<label for="contact">Contact</label><br>
						<input type="text" name="" id="">
					</div>
					<div>
						<label for="doctor">Doctor</label><br>
						<select>
							<option value="">Choose doctor</option>
						</select>
					</div>
					<div>
						<label for="date">Date</label><br>
						<input type="date" name="" id="">
					</div>
					<div>
						<label for="time">Time</label><br>
						<input type="time" name="" id="">
					</div>
					<button type="submit">Book</button>
				</form>
			</div>
		</section>
		<section class="hosp_stat">
			<div class="stat_div">
				<p class="stat_head">500+</p>
				<p class="stat_para"><span class="span_stat">Lakh</span> lives touched</p>
			</div>
			<div class="stat_div">
				<p class="stat_head">70+</p>
				<p class="stat_para"><span class="span_stat">Years</span> of experience</p>
			</div>
			<div class="stat_div">
				<p class="stat_head">200+</p>
				<p class="stat_para"><span class="span_stat">Expert</span> doctors</p>
			</div>
		</section>
		<!-- <section class="video_sec">
			<div class="left_sec1">
				<p class="video_head">Video</p>
				<p class="video_para">Watch some of the most complicated surgeries performed in a 3D interpretation presented by our team for educational purpose only.</p>
				<div class="videos">
					<div class="box">
						<iframe width="560" height="315" style="width: 100%;
					height: inherit;" src="https://www.youtube.com/embed/3Nf6Q2skGOM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
					<div class="box">
						<iframe width="560" height="315" style="width: 100%;
					height: inherit;" src="https://www.youtube.com/embed/cKnw7HWzbGU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
				</div>
				<div align="center">
					<a href="" class="more_btn">View More</a>
				</div>
			</div>
			<hr class="hr3">
			</hr>
			<div class="right_sec1">
				<p class="blog_head">Blog</p>
				<div class="blog_box">
					<div class="blog_sec">
						<div>
							<img src="image/5-1.jpg" class="img_prop1">
						</div>
						<div class="name_sec">
							<p class="name_head">Dr. Bograppa</p>
							<p class="date_head">21 July 2020</p>
						</div>
					</div>
					<p class="blog_para">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					<a href="" class="more1">Read More</a>
				</div>
				<div align="center" style="margin-top: 15%;">
					<a href="" class="more_btn">View More</a>
				</div>
			</div>
		</section> -->
		<?php include("cmn_file/footer_default.php"); ?>
	</div>
</body>

</html>