<style>
	.navbar {
		width: 100%;
		display: flex;
		background: #31D2DE;
	}

	.logo_sec {
		width: 10%;
	}

	.nav_sec {
		width: 90%;
		margin: auto 0;
		margin-right: 2%;
	}

	.ul_nav_sec {
		width: 55%;
		display: flex;
		padding: 0;
		list-style: none;
	}

	.ul_nav_sec li a {
		font-size: 20px;
		font-weight: bold;
		color: white;
		text-decoration: none;
	}

	.ul_nav_sec li {
		margin-right: 2%;
	}

	i.fas.fa-bars {
		color: white;
		margin-left: 12px;
	}

	.our_spec_out {
		position: absolute;
		top: 51px;
		background: #31d2de;
		padding: 14px 59px;
	}

	.our_spec {
		width: 24%;
		padding: 2%;
		left: 550px;
		top: 79px;
		position: absolute;
		background: white;
		z-index: 1;
		display: none;
		transition: all .5s ease-out;
	}

	p.our_spec_head {
		font-size: 18px;
		font-weight: bold;
		margin: 5px;
		text-align: center;
	}

	.row1 {
		display: flex;
		width: 100%;
		margin: 0 auto;
	}

	ul.ul_spec {
		width: 40%;
		list-style-type: none;
		font-size: 18px;
		padding: 0;
		text-align: center;
	}

	.ul_spec li a {
		font-size: 18px;
		color: black;
		text-decoration: none;
		font-weight: unset;
	}

	.ul_spec li a:hover {
		color: red;
	}

	ul li .chng_clr:hover {
		color: red;
	}

	ul li:hover div.os_com {
		display: block;
	}

	.our_loc {
		width: 15%;
		border: 1px solid lightgray;
		position: absolute;
		left: 738px;
		top: 78px;
		background: white;
		display: none;
	}

	p.our_loc_head {
		text-align: center;
		font-size: 20px;
		font-weight: bold;
		margin: 1%;
		margin-top: 10%;
	}

	ul.ul_loc {
		list-style-type: none;
		padding: 0;
		width: 80%;
		text-align: center;
		margin: 0 auto;
		font-size: 18px;
		margin-bottom: 10%;
	}

	.ul_loc li {
		margin-top: 2%;
	}

	.our_loc {
		width: 15%;
		border: 1px solid lightgray;
	}

	#sidebox {
		position: fixed;
		right: -16%;
		width: 16%;
		height: 100%;
		background: #31d2de;
	}

	ul.ul_sidebox {
		text-align: center;
		list-style-type: none;
		padding: 0;
		font-size: 20px;
		font-weight: bold;
		color: white;
	}

	.ul_sidebox li {
		margin-bottom: 8%;
	}

	hr.side_hr {
		background: white;
		border: none;
		height: 2px;
	}

	#sidebox.active {
		right: 0;
	}

	a.a_sidebar {
		text-decoration: none;
		color: white;
	}
</style>

<body>
	<section class="navbar">
		<div class="logo_sec" align="center">
			<div>
				<img src="image/logo.png" class="navbar_img">
			</div>
		</div>
		<div class="nav_sec" align="right">
			<ul class="ul_nav_sec">
				<li>
					<a href="#" class="chng_clr">Our Speciality</a>
					<div class="our_spec_out os_com"></div>
					<div class="our_spec os_com">
						<p class="our_spec_head">Our Speciality</p>
						<div class="row1">
							<ul class="ul_spec">
								<li><a href="cancercare.php">Cancer Care</a></li>
								<li>Neurology</li>
								<li>Spine Care</li>
								<li>Urology</li>
								<li>Physiotherapy</li>
							</ul>
							<hr style="margin: 20px 15%;">
							<ul class="ul_spec">
								<li>Cardiology</li>
								<li>Neurosurgery</li>
								<li>Joint Replacement</li>
								<li>Dental Care</li>
							</ul>
						</div>
						<p class="our_spec_head">Services</p>
						<div class="row1">
							<ul class="ul_spec">
								<li>24x7 Pharmacy</li>
								<li>Ambulance</li>
								<li>General Surgery</li>
							</ul>
							<hr style="margin: 14px 10%;">
							<ul class="ul_spec">
								<li>Blood Bank</li>
								<li>Home Care</li>
							</ul>
						</div>
					</div>
				</li>
				<li>
					<a href="" class="chng_clr">Location</a>
					<div class="our_spec_out os_com"></div>
					<div class="our_loc os_com">
						<p class="our_loc_head">Locations</p>
						<div class="row1">
							<ul class="ul_loc">
								<li>Mangalore</li>
								<li>Bangalore</li>
								<li>Hubli</li>
								<li>Pune</li>
								<li>Mysore</li>
							</ul>
						</div>
					</div>
				</li>
				<li><a href="">Accidents & Emengency</a></li>
				<li><a href="">+91 95674 67894</a></li>
				<div class="side_bar">
					<li><i class="fas fa-bars" onclick="hide_show()"></i></li>
				</div>
			</ul>
		</div>
	</section>
	<section class="sidebox" id="sidebox">
		<ul class="ul_sidebox">
			<hr class="side_hr">
			<li><a href="index.php" class="a_sidebar">Home</a></li>
			<hr class="side_hr">
			<li><a href="meetdoctor.php" class="a_sidebar">Doctors</a></li>
			<hr class="side_hr">
			<li><a href="contactus.php" class="a_sidebar"> Contact</a></li>
			<hr class="side_hr">
			<li><a href="login.php" class="a_sidebar">Login</a></li>
			<hr class="side_hr">
		</ul>
	</section>
</body>
<script>
	function hide_show() {
		document.getElementById("sidebox").classList.toggle('active');
	}
</script>