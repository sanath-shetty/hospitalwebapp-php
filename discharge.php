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
	<link rel="stylesheet" href="font.css">
	<link rel="stylesheet" href="discharge.css">
</head>

<body>
	<div class="container">
		<?php include("cmn_file/login_topnav_patient.php"); ?>
		<section class="dis_sec">
			<form action="" method="POST">
				<p class="dis_head">Patient Discharge Bill</p>
				<div>
					<input type="text" name="p_id" value="<?php echo $p_id; ?>" placeholder="Patient Id" class="inp_pid" readonly="">
				</div>
				<div style="display: flex; margin-top: 1%;">
					<input type="text" name="" placeholder="First Name" class="inp_fname" value="<?php echo $fname; ?>" readonly="">

					<input type="text" name="" placeholder="Last Name" class="inp_lname" value="<?php echo $lname; ?>" readonly="">
				</div>
				<div style="display: flex; margin-top: 1%;">
					<input type="text" name="" class="sel_bg" value="<?php echo $bgroup; ?>" readonly="">

					<input type="number" name="" placeholder="age" class="inp_age" value="<?php echo $age; ?>" readonly="">

					<input type="text" name="" class="sel_buildingg" value="<?php echo $building; ?>" readonly="">

					<input type="text" name="" placeholder="Ward Number" class="inp_ward" value="<?php echo $ward; ?>" readonly="">
				</div>
				<table class="tab_data">
					<tr>
						<td class="td_left" style="padding-left: 5%;">Service Charges</td>
						<td>
							<div>
								<label class="noofdays">Number of days</label>
								<label class="chrgpday">Charges/day</label>
								<label class="totchrg">Total</label>
							</div>
						</td>
					</tr>
					<tr>
						<td class="td_left" style="padding-left: 5%;">Ward Charges</td>
						<td class="td_right">
							<?php
							$noday1 = "";
							$final_wc = "0";

							if (isset($_POST['noday1'])) {
								$noday1 = $_POST['noday1'];
								$wchrg = $_POST['wchrg'];

								$final_wc = $noday1 * $wchrg;
							}
							?>
							<input type="number" name="noday1" class="inp_wcharge" value="<?php echo $noday1; ?>" required="">
							<input type="text" name="wchrg" class="inp_wcharge" value="<?php echo $wchrg; ?>" readonly="">
							<input type="text" name="" class="inp_wcharge" value="<?php echo $final_wc; ?>" readonly="">
						</td>
					</tr>
					<tr>
						<td class="td_left" style="padding-left: 5%;">Floor Management Charges</td>
						<td class="td_right">
							<?php
							$noday2 = "";
							$final_fmc = "0";

							if (isset($_POST['noday2'])) {
								$noday2 = $_POST['noday2'];
								$fmchrg = $_POST['fmchrg'];

								$final_fmc = $noday2 * $fmchrg;
							}
							?>
							<input type="number" name="noday2" class="inp_fmcharge" value="<?php echo $noday2; ?>" required="">
							<input type="text" name="fmchrg" class="inp_fmcharge" value="<?php echo $fmchrg; ?>" readonly="">
							<input type="text" name="" class="inp_fmcharge" value="<?php echo $final_fmc; ?>" readonly="">
						</td>
					</tr>
					<tr>
						<td class="td_left" colspan="2" style="padding-left: 5%;">Doctors Charge</td>
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
								<td class="td_left" align="center">
									<input type="text" name="fname[]" class="inp_docname" value="<?php echo $fname . ' ' . $lname; ?>" readonly="">
								</td>
								<td class="td_right">
									<input type="text" name="count" class="inp_docchrg" value="<?php echo $count; ?>" readonly="">
									<input type="text" name="chrg" class="inp_docchrg" value="<?php echo $chrg; ?>" readonly="">
									<?php $overall += $tot_dchrg;
									?>
									<input type="text" name="tot_dchrg" class="inp_docchrg" value="<?php echo $tot_dchrg; ?>" readonly="">
								</td>
							</tr>
					<?php
						}
					} else {
						echo "Error Occured";
					}
					?>
					<tr>
						<td colspan="2" align="right">
							<input type="text" name="overall" class="inp_docchrg1" value="<?php echo $overall ?>" readonly="">
						</td>
					</tr>
					<tr>
						<td class="td_left" style="padding-left: 5%;">Total</td>
						<td class="td_right">
							<?php
							$grandTot = "0";
							$grandTot = $final_wc + $final_fmc + $overall;
							?>
							<input type="number" name="grandTot" class="inp_tot" value="<?php echo $grandTot; ?>" readonly="">
							<input type="submit" name="" class="btn_calc" value="Calculate">
						</td>
					</tr>
				</table>
				<div align="center">
					<input type="submit" name="submit" value="Submit" class="btn_submit">
				</div>
			</form>
		</section>
</body>

</html>