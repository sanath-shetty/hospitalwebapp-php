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
    width: 26%;
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
    margin-right: 8%;
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
					<a href="dashboard_patientadmin.php" class="chng_clr">Home</a>
				</li>
				<li>
					<a href="#" class="chng_clr">Patient</a>
				</li>
				<li>
					<a href="#" class="chng_clr">Doctor</a>
				</li>
				<li>
					<a href="logout.php" class="chng_clr">Logout</a>
				</li>
			</ul>
		</div>
	</section>
</body>