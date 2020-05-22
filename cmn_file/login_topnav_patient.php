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
.ul_nav_sec div a {
    font-size: 20px;
    font-weight: bold;
    color: white;
    text-decoration: none;
}
.ul_nav_sec div {
    margin-right: 8%;
}
#hover_here{
    position: relative;
}
.sub_list {
    position: absolute;
    list-style: none;
    padding: 10px;
    width: 125px;
    background: #31d2de;
    right: -50px;
    text-align: center;
    display: none;
}
.sub_list a{
    display: block;
    margin-top: 9%;
}
#hover_here:hover .sub_list{
    display: block;
}
.list_hr{
    width: 90%;
    border: none;
    height: 1px;
    background: white;
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
			<div class="ul_nav_sec">
				<div>
					<a href="dashboard_patientadmin.php" class="chng_clr">Dashboard</a>
				</div>
				<div id="hover_here">
					<a href="#" class="chng_clr">Patient</a>
					<div class="sub_list">
						<a href="patientdata_form.php">Add Patient</a>
                        <hr class="list_hr">
						<a href="vpatientdetail.php">View Patient</a>
                        <hr class="list_hr">
                        <a href="vwardasgn.php">View Ward Assigned</a>
					</div>
				</div>
				<div>
					<a href="logout.php" class="chng_clr">Logout</a>
				</div>
			</div>
		</div>
	</section>
</body>