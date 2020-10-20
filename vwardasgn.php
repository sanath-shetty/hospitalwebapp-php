<?php session_start();
include('connect.php');

$sql = "SELECT * FROM a_patient where padmin_id='" . $_SESSION["pa_session"] . "'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$user = $row["pa_name"];
	}
} else {
	header('location: login.php');
}
mysqli_close($con);
?>
<?php
if (isset($_POST['srcbox'])) {
	$pat_id = $_POST['srcbox'];
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
		}
	</style>
</head>

<body>
	<?php include("cmn_file/login_topnav_patient.php"); ?>
	<div class="route my-3">
		<div class="container">
			<div class="row">
				<h7>Home</h7>
				<i class="fas fa-arrow-right"></i>
				<h7>Patient admin</h7>
			</div>
		</div>
	</div>
	<section class="search_block container">
		<form action="" method="POST">
			<div class="form-group search row">
				<input type="type" name="srcbox" placeholder="Patient Id" class="form-control">
				<input type="submit" name="btn_src" value="Search" class="btn_search ml-2">
			</div>
		</form>
		<section class="vpdata_sec container mb-3">
			<div class="row">
				<div class="col-md-10 m-auto">
					<?php
					include('connect.php');
					$i = 1;

					if (!empty($pat_id)) {

						$sql = "SELECT * FROM ward_asgn a, patient_data b, building c, ward d WHERE a.p_id = b.p_id && a.bld_id = c.bld_id && a.w_id = d.w_id && b.p_id LIKE '$pat_id%'";
						$result = mysqli_query($con, $sql); ?>
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Sl. No</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Building Name</th>
									<th>Ward Number</th>
									<th>Operations</th>
								</tr>
							</thead>
							<tbody>
								<?php while ($rows = mysqli_fetch_array($result)) { ?>
									<tr>
										<td><?php echo $i++; ?></td>
										<td><?php echo $rows['f_name']; ?></td>
										<td><?php echo $rows['l_name']; ?></td>
										<td><?php echo $rows['bld_name']; ?></td>
										<td><?php echo $rows['w_num']; ?></td>
										<td>
											<div>
												<a href="doc_visited.php?docv=<?php echo $rows['wasgn_id']; ?>">
													Add Doctor Visit
												</a>
											</div>
											<div>
												<a href="discharge.php?discg=<?php echo $rows['wasgn_id']; ?>">
													Discharge
												</a>
											</div>
										</td>
									</tr>
							<?php
								}
							}
							?>
							</tbody>


						</table>
				</div>
			</div>
		</section>

	</section>
</body>

</html>