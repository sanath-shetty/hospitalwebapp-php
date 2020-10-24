<!DOCTYPE html>
<html>

<head>
	<title>Sanjivini Hospital-MeetDoctor</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="cmn_file/nav-style.css">
</head>

<body>
	<?php include("cmn_file/topnav_default.php"); ?>

	<!-- laptop -->

	<div class="laptop">
		<section class="top-section">
			<div class="index-background">
				<h1 class="ml-5 pt-5">Welcome To Sanjivini</h1>
				<p class="ml-5 pt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia maiores porro tenetur perferendis sapiente natus odit quam totam necessitatibus ipsa!</p>
				<div class="ml-5 mt-5"><a href="btn">Contact us</a></div>
			</div>
		</section>
		<div class="route my-3">
			<div class="container">
				<div class="row">
					<a href="index.php">
						<h7>Home</h7>
					</a>
					<i class="fas fa-arrow-right"></i>
					<a href="#">
						<h7>Doctors</h7>
					</a>
				</div>
			</div>
		</div>
		<section class="doctors my-5">
			<div class="container">
				<div class="row">
					<?php
					include 'connect.php';
					ini_set('display_errors', 1);
					ini_set('display_startup_errors', 1);
					error_reporting(E_ALL);
					$f_name = "";
					$l_name = "";

					$sql = "SELECT * FROM doctor_data a, d_specl b, d_qualific c WHERE a.s_id = b.s_id && a.q_id = c.q_id";
					$result = mysqli_query($con, $sql);

					if (mysqli_num_rows($result) > 0) {
						while ($rows = mysqli_fetch_array($result)) {
							$f_name = $rows['f_name'];
							$l_name = $rows['l_name'];
							$specl = $rows['s_name'];
							$qualific = $rows['q_name'];
					?>
							<div class="col-md-3 m-auto">
								<div class="card">
									<div class="card-body">
										<img src="uploads/<?php echo $rows['doc_img']; ?>" class="img_prop1">
										<div class="overlap">
											<div class="inner_cont">
												<h5 class="doc_name my-2"><?php echo $f_name . ' ' . $l_name; ?></h5>
												<div class="card-footer">
													<p class="doc_qualific"><?php echo $specl; ?></p>
													<p class="doc_spec"><?php echo $qualific; ?></p>
												</div>

											</div>
										</div>
									</div>
								</div>
							</div>
					<?php       }
					}
					?>
				</div>
			</div>
		</section>
	</div>

	<!-- tab -->

	<div class="tab">
		<section class="top-section">
			<div class="index-background">
				<h1 class="ml-5 pt-5">Welcome To Sanjivini</h1>
				<p class="ml-5 pt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia maiores porro tenetur perferendis sapiente natus odit quam totam necessitatibus ipsa!</p>
				<div class="ml-5 mt-5"><a href="btn">Contact us</a></div>
			</div>
		</section>
		<div class="route my-3">
			<div class="container">
				<div class="row">
					<a href="index.php">
						<h7>Home</h7>
					</a>
					<i class="fas fa-arrow-right"></i>
					<a href="#">
						<h7>Doctors</h7>
					</a>
				</div>
			</div>
		</div>
		<section class="doctors my-5">
			<div class="container">
				<div class="row">
					<?php
					include 'connect.php';
					ini_set('display_errors', 1);
					ini_set('display_startup_errors', 1);
					error_reporting(E_ALL);
					$f_name = "";
					$l_name = "";

					$sql = "SELECT * FROM doctor_data a, d_specl b, d_qualific c WHERE a.s_id = b.s_id && a.q_id = c.q_id";
					$result = mysqli_query($con, $sql);

					if (mysqli_num_rows($result) > 0) {
						while ($rows = mysqli_fetch_array($result)) {
							$f_name = $rows['f_name'];
							$l_name = $rows['l_name'];
							$specl = $rows['s_name'];
							$qualific = $rows['q_name'];
					?>
							<div class="col-md-4 m-auto">
								<div class="card">
									<div class="card-body">
										<img src="uploads/<?php echo $rows['doc_img']; ?>" class="img_prop1">
										<div class="overlap">
											<div class="inner_cont">
												<h5 class="doc_name my-2"><?php echo $f_name . ' ' . $l_name; ?></h5>
												<div class="card-footer">
													<p class="doc_qualific"><?php echo $specl; ?></p>
													<p class="doc_spec"><?php echo $qualific; ?></p>
												</div>

											</div>
										</div>
									</div>
								</div>
							</div>
					<?php       }
					}
					?>
				</div>
			</div>
		</section>
	</div>

	<!-- mobile -->

	<div class="mobile">
		<section class="top-section">
			<div class="index-background">
				<h1 class="text-center pt-5">Welcome To Sanjivini</h1>
				<p class="m-auto pt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia maiores porro tenetur perferendis sapiente natus odit quam totam necessitatibus ipsa!</p>
				<div class="mt-3 btn"><a href="index.php#contact">Contact us</a></div>
			</div>
		</section>
		<div class="route my-3 mx-3">
			<div class="container">
				<div class="row">
					<a href="index.php">
						<h7>Home</h7>
					</a>
					<i class="fas fa-arrow-right"></i>
					<a href="#">
						<h7>Doctors</h7>
					</a>
				</div>
			</div>
		</div>
		<section class="doctors my-3">
			<div class="container">
				<div class="row">
					<?php
					include 'connect.php';
					ini_set('display_errors', 1);
					ini_set('display_startup_errors', 1);
					error_reporting(E_ALL);
					$f_name = "";
					$l_name = "";

					$sql = "SELECT * FROM doctor_data a, d_specl b, d_qualific c WHERE a.s_id = b.s_id && a.q_id = c.q_id";
					$result = mysqli_query($con, $sql);

					if (mysqli_num_rows($result) > 0) {
						while ($rows = mysqli_fetch_array($result)) {
							$f_name = $rows['f_name'];
							$l_name = $rows['l_name'];
							$specl = $rows['s_name'];
							$qualific = $rows['q_name'];
					?>
							<div class="col-md-3 my-2">
								<div class="card">
									<div class="card-body">
										<img src="uploads/<?php echo $rows['doc_img']; ?>" class="img_prop1">
										<div class="overlap">
											<div class="inner_cont">
												<h5 class="doc_name my-2"><?php echo $f_name . ' ' . $l_name; ?></h5>
												<div class="card-footer">
													<p class="doc_qualific"><?php echo $specl; ?></p>
													<p class="doc_spec"><?php echo $qualific; ?></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
					<?php       }
					}
					?>
				</div>
			</div>
		</section>
	</div>

	<?php include("cmn_file/footer_default.php"); ?>
</body>

</html>