<?php
session_start();
include "connect.php";
$sql = "SELECT * FROM a_patient where padmin_id='" . $_SESSION["pa_session"] . "'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$user = $row["pa_name"];
	}
}
?>
<!-- ////// DELETE CODE /////

<?php
include('connect.php');
$delete = "";
$msg = "";
$delmsg = "";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_GET['del'])) {
	$delete = $_GET["del"];
	$delmsg = "<div class='msg'>
   	are you sure about that? legal action to be taken.
   	<form action='' method='POST'>
   	<input type='submit' value='YES!' name='delbtn'>
   	</form>
   	</div>";
}
if (isset($_POST['delbtn'])) {

	$sql = "DELETE FROM `patient_data` WHERE p_id='$delete' LIMIT 1";
	$result = mysqli_query($con, $sql);
	header('location: vpatientdetail.php');
}

?> -->

<?php
if (isset($_POST['id'])) {
	$fname = $_POST['id'];
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Sanjivini Hospital-MeetDoctor</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="cmn_file/nav-style.css">
	<style>
		body {
			background: url(image/dashboard_background.jpg);
			background-repeat: no-repeat;
			background-size: cover;
			min-height: 100%;
			background-position: center center;
			background-attachment: fixed;
		}
	</style>
	</style>
</head>

<body>
	<?php include("cmn_file/login_topnav_patient.php"); ?>

	<!-- laptop -->

	<div class="laptop">
		<div class="route my-3 mx-3">
			<div class="container">
				<div class="row">
					<a href="">
						<h7>Home</h7>
					</a>
					<i class="fas fa-arrow-right"></i>
					<a href="">
						<h7>Patient admin</h7>
					</a>
					<i class="fas fa-arrow-right"></i>
					<a href="">
						<h7>Patient list</h7>
					</a>
				</div>
			</div>
		</div>
		<section class="search_block container">
			<form method="POST">
				<div class="form-group search row">
					<input type="text" name="id" placeholder="Patient Id or Name" class="form-control">
					<input type="submit" name="search" value="search" class="btn_search ml-2">
				</div>
			</form>
		</section>
		<section class="vpdata_sec container mb-3">
			<?php echo $delmsg; ?>
			<div class="row">
				<div class="col-md-10 m-auto">
					<form method="POST">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Sl.No.</th>
									<th>Patient Id</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>DOB</th>
									<th>Age</th>
									<th>Blood Group</th>
									<th>Contact</th>
									<th>Operations</th>
								</tr>
							</thead>
							<tbody>
								<?php
								include('connect.php');
								$i = 1;

								if (!empty($fname)) {

									$sql = mysqli_query($con, "SELECT * FROM patient_data WHERE `f_name` LIKE '%$fname%' || `p_id` LIKE '%$fname%'") or die(mysqli_error($con));

									while ($rows = mysqli_fetch_array($sql)) {
								?>
										<tr>
											<td><?php echo $i++; ?></td>
											<td><?php echo $rows['p_id'] ?></td>
											<td><?php echo $rows['f_name'] ?></td>
											<td><?php echo $rows['l_name'] ?></td>
											<td><?php echo $rows['date'] ?></td>
											<td><?php echo $rows['age'] ?></td>
											<td><?php echo $rows['blood_group'] ?></td>
											<td><?php echo $rows['contact'] ?></td>
											<td>
												<div>
													<a href="update_patdata.php?edit=<?php echo $rows['p_id'] ?>">View/Edit</a>
												</div>
												<div>
													<a href="testresults.php?rep=<?php echo $rows['p_id'] ?>" class="a_style">Add Report</a>
												</div>
												<div>
													<a href="asgnward.php?asg=<?php echo $rows['p_id'] ?>" class="a_style">Asign Ward</a>
												</div>
											</td>
										</tr>
									<?php	 }
								} else {
									$sql = mysqli_query($con, "SELECT * FROM patient_data") or die(mysqli_error($con));

									while ($rows = mysqli_fetch_array($sql)) {
									?>
										<tr>
											<td><?php echo $i++; ?></td>
											<td><?php echo $rows['p_id'] ?></td>
											<td><?php echo $rows['f_name'] ?></td>
											<td><?php echo $rows['l_name'] ?></td>
											<td><?php echo $rows['date'] ?></td>
											<td><?php echo $rows['age'] ?></td>
											<td><?php echo $rows['blood_group'] ?></td>
											<td><?php echo $rows['contact'] ?></td>
											<td>
												<div>
													<a href="update_patdata.php?edit=<?php echo $rows['p_id'] ?>" class="a_style">View/Edit</a>
												</div>
												<div>
													<a href="testresults.php?rep=<?php echo $rows['p_id'] ?>" class="a_style">Add Report</a>
												</div>
												<div>
													<a href="asgnward.php?asg=<?php echo $rows['p_id'] ?>" class="a_style">Asign Ward</a>
												</div>
											</td>
										</tr>
								<?php
									}
								}

								?>
							</tbody>
						</table>
					</form>
				</div>
			</div>

		</section>
	</div>

	<!-- tab -->

	<div class="tab">
		<div class="route my-3 mx-3">
			<div class="container">
				<div class="row">
					<a href="">
						<h7>Home</h7>
					</a>
					<i class="fas fa-arrow-right"></i>
					<a href="">
						<h7>Patient admin</h7>
					</a>
					<i class="fas fa-arrow-right"></i>
					<a href="">
						<h7>Patient list</h7>
					</a>
				</div>
			</div>
		</div>
		<section class="search_block container">
			<form method="POST">
				<div class="form-group search row">
					<input type="text" name="id" placeholder="Patient Id or Name" class="form-control">
					<input type="submit" name="search" value="search" class="btn_search ml-2">
				</div>
			</form>
		</section>
		<section class="vpdata_sec container mb-3">
			<?php echo $delmsg; ?>
			<div class="row">
				<div class="col-md-12 m-auto">
					<form method="POST">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Sl.No.</th>
									<th>Id</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>DOB</th>
									<th>Age</th>
									<th>BG</th>
									<th>Contact</th>
									<th>Operations</th>
								</tr>
							</thead>
							<tbody>
								<?php
								include('connect.php');
								$i = 1;

								if (!empty($fname)) {

									$sql = mysqli_query($con, "SELECT * FROM patient_data WHERE `f_name` LIKE '%$fname%' || `p_id` LIKE '%$fname%'") or die(mysqli_error($con));

									while ($rows = mysqli_fetch_array($sql)) {
								?>
										<tr>
											<td><?php echo $i++; ?></td>
											<td><?php echo $rows['p_id'] ?></td>
											<td><?php echo $rows['f_name'] ?></td>
											<td><?php echo $rows['l_name'] ?></td>
											<td><?php echo $rows['date'] ?></td>
											<td><?php echo $rows['age'] ?></td>
											<td><?php echo $rows['blood_group'] ?></td>
											<td><?php echo $rows['contact'] ?></td>
											<td>
												<div>
													<a href="update_patdata.php?edit=<?php echo $rows['p_id'] ?>">View/Edit</a>
												</div>
												<div>
													<a href="testresults.php?rep=<?php echo $rows['p_id'] ?>" class="a_style">Add Report</a>
												</div>
												<div>
													<a href="asgnward.php?asg=<?php echo $rows['p_id'] ?>" class="a_style">Asign Ward</a>
												</div>
											</td>
										</tr>
									<?php	 }
								} else {
									$sql = mysqli_query($con, "SELECT * FROM patient_data") or die(mysqli_error($con));

									while ($rows = mysqli_fetch_array($sql)) {
									?>
										<tr>
											<td><?php echo $i++; ?></td>
											<td><?php echo $rows['p_id'] ?></td>
											<td><?php echo $rows['f_name'] ?></td>
											<td><?php echo $rows['l_name'] ?></td>
											<td><?php echo $rows['date'] ?></td>
											<td><?php echo $rows['age'] ?></td>
											<td><?php echo $rows['blood_group'] ?></td>
											<td><?php echo $rows['contact'] ?></td>
											<td>
												<div>
													<a href="update_patdata.php?edit=<?php echo $rows['p_id'] ?>" class="a_style">View/Edit</a>
												</div>
												<div>
													<a href="testresults.php?rep=<?php echo $rows['p_id'] ?>" class="a_style">Add Report</a>
												</div>
												<div>
													<a href="asgnward.php?asg=<?php echo $rows['p_id'] ?>" class="a_style">Asign Ward</a>
												</div>
											</td>
										</tr>
								<?php
									}
								}

								?>
							</tbody>
						</table>
					</form>
				</div>
			</div>

		</section>
	</div>

</body>

</html>