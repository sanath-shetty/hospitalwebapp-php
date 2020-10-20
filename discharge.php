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
include 'connect.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$id = $_GET['discg'];

$sql = "SELECT * FROM ward_asgn a, patient_data b, building c, ward d WHERE a.p_id = b.p_id && a.bld_id = c.bld_id && a.w_id = d.w_id && a.wasgn_id = '$id'";
$result = mysqli_query($con, $sql);

while ($rows = mysqli_fetch_assoc($result)) {

	$p_id = $rows['p_id'];
	$fname = $rows['f_name'];
	$lname = $rows['l_name'];
	$bgroup = $rows['blood_group'];
	$age = $rows['age'];
	$building = $rows['bld_name'];
	$ward = $rows['w_num'];
	$wchrg = $rows['w_chrg'];
}
?>

<?php
include 'connect.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$sql = "SELECT * FROM floor_mgnt";
$result = mysqli_query($con, $sql);

while ($rows = mysqli_fetch_assoc($result)) {

	$fmchrg = $rows['fm_charge'];
}
?>

<?php
$dayCount = "0";
$dayChrg = "0";
$tot_dchrg = "";
$overall = "0";
if (isset($_POST['count'])) {
	$dayCount = $_POST['count'];
}

if (isset($_POST['chrg'])) {
	$dayChrg = $_POST['chrg'];
}
?>

<?php
if (isset($_POST['fname'])) {
	$docFname = $_POST['fname'];
}
?>

<?php
if (isset($_POST['grandTot'])) {
	$total = $_POST["grandTot"];
}
?>

<?php
include 'connect.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$date = date("Y-m-d");

if (isset($_POST['submit'])) {
	$sql = "INSERT INTO `bill`(`fname`, `lname`, `blood`, `age`, `date`, `total`) VALUES ('$fname','$lname','$bgroup','$age','$date','$total')";
	$res = mysqli_query($con, $sql);

	if ($res) {
		$sql1 = "DELETE FROM `ward_asgn` WHERE `wasgn_id` = '$id'";
		$res1 = mysqli_query($con, $sql1);

		if ($res1) {
			echo "deleted";
			header("location:dashboard_patientadmin.php");
		}
	}
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
	<section class="dis_sec container my-3">
		<div class="container">
			<div class="row top-row">
				<div class="col-md-10 m-auto">
					<form action="" method="POST">
						<div class="row my-3">
							<div class="form-group col-md-2 m-auto">
								<label for="patientid">Patient id</label>
								<input type="text" name="p_id" value="<?php echo $p_id; ?>" class="form-control" readonly="">
							</div>
							<div class="form-group col-md-5 m-auto">
								<label for="fname">First name</label>
								<input type="text" class="form-control" value="<?php echo $fname; ?>" readonly="">
							</div>
							<div class="form-group col-md-5 m-auto">
								<label for="lname">Last name</label>
								<input type="text" class="form-control" value="<?php echo $lname; ?>" readonly="">
							</div>
						</div>
						<div class="row my-3">
							<div class="form-group col-md-2 m-auto">
								<label for="blood">Blood group</label>
								<input type="text" class="form-control" value="<?php echo $bgroup; ?>" readonly="">
							</div>
							<div class="form-group col-md-2 m-auto">
								<label for="age">Age</label>
								<input type="number" class="form-control" value="<?php echo $age; ?>" readonly="">
							</div>
							<div class="form-group col-md-4 m-auto">
								<label for="building">Building</label>
								<input type="text" class="form-control" value="<?php echo $building; ?>" readonly="">
							</div>
							<div class="form-group col-md-4 m-auto">
								<label for="ward">Ward</label>
								<input type="text" class="form-control" value="<?php echo $ward; ?>" readonly="">
							</div>
						</div>
						<table class="table my-3">
							<thead>
								<tr>
									<th>Charges</th>
									<th>Number of days</th>
									<th>Charges/day</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Ward Charges</td>
									<?php
									$noday1 = "";
									$final_wc = "0";

									if (isset($_POST['noday1'])) {
										$noday1 = $_POST['noday1'];
										$wchrg = $_POST['wchrg'];

										$final_wc = $noday1 * $wchrg;
									}
									?>
									<td>
										<input type="number" name="noday1" class="form-control" value="<?php echo $noday1; ?>" required="">
									</td>
									<td>
										<input type="text" name="wchrg" class="form-control" value="<?php echo $wchrg; ?>" readonly="">
									</td>
									<td>
										<input type="text" name="" class="form-control" value="<?php echo $final_wc; ?>" readonly="">
									</td>
								</tr>
								<tr>
									<td>Floor Management</td>
									<?php
									$noday2 = "";
									$final_fmc = "0";

									if (isset($_POST['noday2'])) {
										$noday2 = $_POST['noday2'];
										$fmchrg = $_POST['fmchrg'];

										$final_fmc = $noday2 * $fmchrg;
									}
									?>
									<td>
										<input type="number" name="noday2" class="form-control" value="<?php echo $noday2; ?>" required="">
									</td>
									<td>
										<input type="text" name="fmchrg" class="form-control" value="<?php echo $fmchrg; ?>" readonly="">
									</td>
									<td>
										<input type="text" name="" class="form-control" value="<?php echo $final_fmc; ?>" readonly="">
									</td>
								</tr>
								<tr>
									<td>Doctors Charge</td>
								</tr>
								<?php
								include 'connect.php';
								ini_set('display_errors', 1);
								ini_set('display_startup_errors', 1);
								error_reporting(E_ALL);

								$sql = "SELECT a.vis_count, b.f_name,b.l_name, b.vis_chrg FROM visited a, doctor_data b WHERE a.doc_id = b.doc_id && a.wasgn_id = '$id'";
								$result = mysqli_query($con, $sql);

								if (($visit = mysqli_num_rows($result)) > 0) {
									while ($rows = mysqli_fetch_array($result)) {

										$fname = $rows['f_name'];
										$lname = $rows['l_name'];
										$count = $rows['vis_count'];
										$chrg = $rows['vis_chrg'];
										$tot_dchrg = $count * $chrg;
								?>
										<tr>
											<td>
												<input type="text" name="fname[]" class="form-control" value="<?php echo $fname . ' ' . $lname; ?>" readonly="">
											</td>
											<td class="td_right">
												<input type="text" name="count" class="form-control" value="<?php echo $count; ?>" readonly="">
											</td>
											<td>
												<input type="text" name="chrg" class="form-control" value="<?php echo $chrg; ?>" readonly="">
											</td>
											<?php $overall += $tot_dchrg; ?>
											<td>
												<input type="text" name="tot_dchrg" class="form-control" value="<?php echo $tot_dchrg; ?>" readonly="">
											</td>
										</tr>
								<?php
									}
								}
								?>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td>
										<input type="text" name="overall" class="form-control" value="<?php echo $overall ?>" readonly="">
									</td>
								</tr>
								<tr>
									<td>Total</td>
									<td></td>
									<?php
									$grandTot = "0";
									$grandTot = $final_wc + $final_fmc + $overall;
									?>
									<td>
										<input type="number" name="grandTot" class="form-control" value="<?php echo $grandTot; ?>" readonly="">

									</td>
									<td>
										<input type="submit" name="" class="btn_calc" value="Calculate">
									</td>
								</tr>
							</tbody>
						</table>
						<input type="submit" name="submit" value="Discharge" class="btn_submit mt-3">
					</form>
				</div>
			</div>
		</div>

	</section>
</body>

</html>