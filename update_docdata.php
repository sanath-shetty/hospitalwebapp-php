<?php session_start();
include('connect.php');

$sql = "SELECT * FROM a_doctor where dadmin_id='" . $_SESSION["da_session"] . "'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$user = $row["da_name"];
	}
} else {
	header('location: login.php');
}
?>

<?php
include('connect.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$msg = "";
$update_id = $_GET['edit'];

$sql = "SELECT * FROM `doctor_data` INNER JOIN `state` ON doctor_data.st_id = state.st_id INNER JOIN `d_qualific` ON doctor_data.q_id = d_qualific.q_id INNER JOIN `d_specl` ON doctor_data.s_id = d_specl.s_id && doctor_data.doc_id = '$update_id'";

$ctn = mysqli_query($con, $sql) or die(mysqli_error($con));

while ($rows = mysqli_fetch_assoc($ctn)) {

	$cimg = $rows['doc_img'];
	$cfname = $rows['f_name'];
	$clname = $rows['l_name'];
	$cdob = $rows['dob_date'];
	$cage = $rows['age'];
	$cbg = $rows['blood'];
	$ct_add = $rows['t_add'];
	$cp_add = $rows['p_add'];
	$cst = $rows['st_id'];
	$cst_name = $rows['st_name'];
	$ccity = $rows['city'];
	$cpin = $rows['pin'];
	$ccontact = $rows['contact'];
	$cquali = $rows['q_id'];
	$cquali_name = $rows['q_name'];
	$cspecl = $rows['s_id'];
	$cspecl_name = $rows['s_name'];
}
mysqli_close($con);

?>

<?php
include('connect.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$msg = "";

if (isset($_POST['update_doc'])) {

	if (isset($_FILES['image']['name'])) {

		$img = $_FILES['image']['name'];
		$temp = $_FILES['image']['tmp_name'];
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($img);

		if (move_uploaded_file($temp, $target_dir . $img)) {

			$ufname = $_POST['fname'];
			$ulname = $_POST['lname'];
			$udate = $_POST['date'];
			$uage = $_POST['age'];
			$ubg = $_POST['blood'];
			$ut_add = $_POST['tadd'];
			$up_add = $_POST['padd'];
			$ustate = $_POST['state'];
			$ucity = $_POST['d_city'];
			$upin = $_POST['pin'];
			$ucont = $_POST['cont'];
			$uquali = $_POST['quali'];
			$uspecl = $_POST['specl'];

			$sql = "UPDATE `doctor_data` SET `dadmin_id`='" . $_SESSION['da_session'] . "',`doc_img`='$img',`f_name`='$ufname',`l_name`='$ulname',`dob_date`='$udate',`age`='$uage',`blood`='$ubg',`t_add`='$ut_add',`p_add`='$up_add',`st_id`='$ustate',`city`='$ucity',`pin`='$upin',`contact`='$ucont',`q_id`='$uquali',`s_id`='$uspecl' WHERE `doc_id`='$update_id'";
			$ctn = mysqli_query($con, $sql);

			if ($ctn) {

				header('location:vdoctordetail.php?success');
			} else {
				echo "error occured";
			}
		} else {
			echo "error occured";
		}
	}
	$ufname = $_POST['fname'];
	$ulname = $_POST['lname'];
	$udate = $_POST['date'];
	$uage = $_POST['age'];
	$ubg = $_POST['blood'];
	$ut_add = $_POST['tadd'];
	$up_add = $_POST['padd'];
	$ustate = $_POST['state'];
	$ucity = $_POST['d_city'];
	$upin = $_POST['pin'];
	$ucont = $_POST['cont'];
	$uquali = $_POST['quali'];
	$uspecl = $_POST['specl'];

	$sql = "UPDATE `doctor_data` SET `dadmin_id`='" . $_SESSION['da_session'] . "',`f_name`='$ufname',`l_name`='$ulname',`dob_date`='$udate',`age`='$uage',`blood`='$ubg',`t_add`='$ut_add',`p_add`='$up_add',`st_id`='$ustate',`city`='$ucity',`pin`='$upin',`contact`='$ucont',`q_id`='$uquali',`s_id`='$uspecl' WHERE `doc_id`='$update_id'";
	$ctn = mysqli_query($con, $sql);

	if ($ctn) {

		header('location:vdoctordetail.php?success = Added Successfully');
	} else {
		echo "error occured";
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
	<section class="doctor_sec container mb-3">
		<div class="row top-row">
			<div class="col-md-10 m-auto">
				<form method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<img src="uploads/<?php echo $cimg; ?>" width="160" height="140" class="img_sec">

					</div>
					<div class="form-group">
						<label>Select new image</label><br>
						<input type="file" name="image" class="btn_img" value="<?php echo $cimg; ?>">
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label for="fname">First name</label>
							<input type="text" name="fname" class="form-control" value="<?php echo $cfname; ?>">
						</div>
						<div class="form-group col-md-6">
							<label for="lastname">Last name</label>
							<input type="text" name="lname" class="form-control" value="<?php echo $clname; ?>">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-4">
							<label for="date">Date</label>
							<input type="date" name="date" value="<?php echo $cdob; ?>" class="form-control">
						</div>
						<div class="form-group col-md-2">
							<label for="age">Age</label>
							<input type="number" class="form-control" name="age" min="25" value="<?php echo $cage; ?>">
						</div>
						<div class="form-group col-md-6">
							<label for="blood">Blood group</label>
							<select class="form-control" name="blood">
								<option><?php echo $cbg ?></option>
								<option value="A+ve">A+ve</option>
								<option value="A-ve">A-ve</option>
								<option value="B+ve">B+ve</option>
								<option value="B-ve">B-ve</option>
								<option value="O+ve">O+ve</option>
								<option value="O-ve">O-ve</option>
								<option value="Ab+ve">Ab+ve</option>
								<option value="AB-ve">AB-ve</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label for="temp">Temporary Address</label>
							<textarea class="form-control" name="tadd"><?php echo $ct_add; ?></textarea>
						</div>
						<div class="form-group col-md-6">
							<label for="perm">Permanent Address</label>
							<textarea class="form-control" name="padd"><?php echo $cp_add; ?></textarea>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label for="state">State</label>
							<select class="form-control" name="state">
								<option value="<?php echo $cst; ?>"><?php echo $cst_name; ?></option>
								<?php $sql = mysqli_query($con, "SELECT * FROM state ORDER by st_name ASC");
								while ($read = mysqli_fetch_array($sql)) {
								?>
									<option value="<?php echo $read['st_id']; ?>"><?php echo $read['st_name']; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group col-md-6">
							<label for="city">City</label>
							<input type="text" name="d_city" class="form-control" value="<?php echo $ccity; ?>">
						</div>
						<div class="form-group col-md-6">
							<label for="pin">Pin code</label>
							<input type="number" name="pin" class="form-control" value="<?php echo $cpin; ?>">
						</div>
						<div class="form-group col-md-6">
							<label for="conatct">Contact</label>
							<input type="number" name="cont" class="form-control" value="<?php echo $ccontact; ?>">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label for="quali">Qualification</label>
							<select class="form-control" name="quali">
								<option value="<?php echo $cquali; ?>"><?php echo $cquali_name; ?></option>
								<?php
								$sql = mysqli_query($con, "SELECT * FROM d_qualific ORDER by q_name ASC");
								while ($read = mysqli_fetch_array($sql)) {
								?>
									<option value="<?php echo $read['q_id']; ?>"><?php echo $read['q_name']; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group col-md-6">
							<label for="spec">Specialization</label>
							<select class="form-control" name="specl">
								<option value="<?php echo $cspecl; ?>"><?php echo $cspecl_name; ?></option>
								<?php
								$sql = mysqli_query($con, "SELECT * FROM d_specl ORDER by s_name ASC");
								while ($read = mysqli_fetch_array($sql)) {
								?>
									<option value="<?php echo $read['s_id']; ?>"><?php echo $read['s_name']; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<input type="submit" name="update_doc" value="Update" class="btn_adddoc">
				</form>
			</div>
		</div>
		<?php echo $msg; ?>
	</section>
</body>

</html>