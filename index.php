<!DOCTYPE html>
<html>

<head>
	<title>Sanjivini Hospital-Index</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="cmn_file/nav-style.css">
	<link rel="stylesheet" href="cmn_file/media.css">
</head>

<body>
	<?php include("cmn_file/topnav_default.php"); ?>
	<!-- laptop -->
	<div class="laptop">
		<section class="top-section">
			<div class="index-background">
				<h1 class="ml-5 pt-5">Welcome To Sanjivini</h1>
				<p class="ml-5 pt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia maiores porro tenetur perferendis sapiente natus odit quam totam necessitatibus ipsa!</p>
				<div class="ml-5 mt-5"><a href="index.php#contact">Contact us</a></div>
			</div>
		</section>
		<section class="count-upto my-3">
			<div class="container mb-3">
				<div class="row">
					<div class="col-md-3 m-auto">
						<p class="val-p" id="val1">0</p>
						<h5><span>Lakh</span> lives touched</h5>
					</div>
					<div class="col-md-3 m-auto">
						<p class="val-p" id="val2">0</p>
						<h5><span>Years</span> of experience</h5>
					</div>
					<div class="col-md-3 m-auto">
						<p class="val-p" id="val3">0</p>
						<h5><span>Expert</span> doctors</h5>
					</div>
				</div>
			</div>
		</section>
		<section class="apointment-sec py-3">
			<div class="container mx-3">
				<div class="row">
					<div class="col-md-6 m-auto">
						<h3>Book Appointment</h3>
						<form method="POST" class="mt-3">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name="name" class="form-control">
							</div>
							<div class="form-group">
								<label for="contact">Contact</label>
								<input type="text" name="contact" class="form-control">
							</div>
							<div class="form-group">
								<label for="department">Department</label>
								<select name="spec" id="spec" class="form-control">
									<option></option>
									<?php
									include "connect.php";
									$sql = "SELECT * FROM d_specl ";
									$cnt = mysqli_query($con, $sql);

									if ($cnt) {
										while ($row = mysqli_fetch_assoc($cnt)) {
											$id = $row["s_id"];
											$name = $row["s_name"];
									?>
											<option value="<?php echo $id ?>"><?php echo $name ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="doctor">Doctor</label>
								<select name="docName" id="docName" class="form-control"></select>
							</div>
							<div class="form-group">
								<label for="date">Date</label>
								<input type="date" name="date" class="form-control">
							</div>
							<div class="form-group">
								<label for="time">Time</label>
								<input type="time" name="time" class="form-control">
							</div>
							<button type="submit" class="book" name="book">Book</button>
						</form>
					</div>
				</div>
			</div>
		</section>
	</div>

	<!-- tab view -->

	<div class="tab">
		<section class="top-section">
			<div class="index-background">
				<h1 class="ml-5 pt-5">Welcome To Sanjivini</h1>
				<p class="ml-5 pt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia maiores porro tenetur perferendis sapiente natus odit quam totam necessitatibus ipsa!</p>
				<div class="ml-5 mt-5"><a href="index.php#contact2">Contact us</a></div>
			</div>
		</section>
		<section class="count-upto my-3">
			<div class="container mb-3">
				<div class="row">
					<div class="col-md-3 m-auto">
						<p class="val-p" id="val1">0</p>
						<h5><span>Lakh</span> lives touched</h5>
					</div>
					<div class="col-md-3 m-auto">
						<p class="val-p" id="val2">0</p>
						<h5><span>Years</span> of experience</h5>
					</div>
					<div class="col-md-3 m-auto">
						<p class="val-p" id="val3">0</p>
						<h5><span>Expert</span> doctors</h5>
					</div>
				</div>
			</div>
		</section>
		<section class="apointment-sec py-3">
			<div class="container mx-3">
				<div class="row">
					<div class="col-md-10 m-auto">
						<h3>Book Appointment</h3>
						<form method="POST" class="mt-3">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name="name" class="form-control">
							</div>
							<div class="form-group">
								<label for="contact">Contact</label>
								<input type="text" name="contact" class="form-control">
							</div>
							<div class="form-group">
								<label for="department">Department</label>
								<select name="spec" id="spec" class="form-control">
									<option></option>
									<?php
									include "connect.php";
									$sql = "SELECT * FROM d_specl ";
									$cnt = mysqli_query($con, $sql);

									if ($cnt) {
										while ($row = mysqli_fetch_assoc($cnt)) {
											$id = $row["s_id"];
											$name = $row["s_name"];
									?>
											<option value="<?php echo $id ?>"><?php echo $name ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="doctor">Doctor</label>
								<select name="docName" id="docName" class="form-control"></select>
							</div>
							<div class="form-group">
								<label for="date">Date</label>
								<input type="date" name="date" class="form-control">
							</div>
							<div class="form-group">
								<label for="time">Time</label>
								<input type="time" name="time" class="form-control">
							</div>
							<button type="submit" class="book" name="book">Book</button>
						</form>
					</div>
				</div>
			</div>
		</section>
	</div>

	<!-- mobile view -->

	<div class="mobile">
		<section class="top-section">
			<div class="index-background">
				<h1 class="text-center pt-5">Welcome To Sanjivini</h1>
				<p class="m-auto pt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia maiores porro tenetur perferendis sapiente natus odit quam totam necessitatibus ipsa!</p>
				<div class="mt-3 text-center"><a href="index.php#contact">Contact us</a></div>
			</div>
		</section>
		<section class="count-upto my-3">
			<div class="container mb-3">
				<div class="row">
					<div class="col-md-3 m-auto">
						<p class="val-p" id="val1">0</p>
						<h5><span>Lakh</span> lives touched</h5>
					</div>
					<div class="col-md-3 m-auto">
						<p class="val-p" id="val2">0</p>
						<h5><span>Years</span> of experience</h5>
					</div>
					<div class="col-md-3 m-auto">
						<p class="val-p" id="val3">0</p>
						<h5><span>Expert</span> doctors</h5>
					</div>
				</div>
			</div>
		</section>
		<section class="apointment-sec py-3">
			<div class="container mx-3">
				<div class="row">
					<div class="col-md-10 m-auto">
						<h3>Book Appointment</h3>
						<form method="POST" class="mt-3">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name="name" class="form-control">
							</div>
							<div class="form-group">
								<label for="contact">Contact</label>
								<input type="text" name="contact" class="form-control">
							</div>
							<div class="form-group">
								<label for="department">Department</label>
								<select name="spec" id="spec" class="form-control">
									<option></option>
									<?php
									include "connect.php";
									$sql = "SELECT * FROM d_specl ";
									$cnt = mysqli_query($con, $sql);

									if ($cnt) {
										while ($row = mysqli_fetch_assoc($cnt)) {
											$id = $row["s_id"];
											$name = $row["s_name"];
									?>
											<option value="<?php echo $id ?>"><?php echo $name ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="doctor">Doctor</label>
								<select name="docName" id="docName" class="form-control"></select>
							</div>
							<div class="form-group">
								<label for="date">Date</label>
								<input type="date" name="date" class="form-control">
							</div>
							<div class="form-group">
								<label for="time">Time</label>
								<input type="time" name="time" class="form-control">
							</div>
							<button type="submit" class="book" name="book">Book</button>
						</form>
					</div>
				</div>
			</div>
		</section>
	</div>


	<?php include("cmn_file/footer_default.php"); ?>

	<script src="js/jquery-1.8.1.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#spec').change(function() {

				var s_id = $('#spec').val();

				$('#docName').empty(); //remove all existing options

				$.get('ddck.php', {
					's_id': s_id
				}, function(return_data) {
					if (return_data.data.length > 0) {
						$.each(return_data.data, function(key, value) {
							$("#docName").append("<option value='" + value.doc_id + "'>" + value.f_name + ' ' + value.l_name + "</option>");
						});
					}
				}, "json");
			});
		});

		document.addEventListener("DOMContentLoaded", function() {
			function animateValue(id1, id2, id3) {
				var obj1 = document.getElementById(id1);
				var current1 = parseInt(obj1.innerHTML);

				var obj2 = document.getElementById(id2);
				var current2 = parseInt(obj2.innerHTML);

				var obj3 = document.getElementById(id3);
				var current3 = parseInt(obj3.innerHTML);

				setInterval(function() {
					obj1.innerHTML = current1++;
					if (obj1.innerHTML > 200) {
						obj1.innerHTML = 200 + "+";
					}

					obj2.innerHTML = current2++;
					if (obj2.innerHTML > 70) {
						obj2.innerHTML = 70 + "+";
					}

					obj3.innerHTML = current3++;
					if (obj3.innerHTML > 80) {
						obj3.innerHTML = 80 + "+";
					}
				}, 10);
			}

			// animateValue('val1', 'val2', 'val3');
		});
	</script>
</body>


</html>