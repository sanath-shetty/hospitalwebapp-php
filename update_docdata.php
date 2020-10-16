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
	<link rel="stylesheet" href="font.css">
	<link rel="stylesheet" href="update_docdata.css">
</head>

<body>
	<div class="container">
		<?php include("cmn_file/login_topnav_doctor.php"); ?>
		<section class="doctor_sec">
			<form action="" method="POST" enctype="multipart/form-data">
				<p class="doctor_head">Update Info</p>

				<div style="margin-top: 1%;">
					<img src="uploads/<?php echo $cimg; ?>" width="160" height="140" class="img_sec">
					<div style="display: flex;">
						<label class="lab_cimg">Select new image</label><br>

						<input type="file" name="image" class="btn_img" value="<?php echo $cimg; ?>">
					</div>
				</div>

				<div style="margin-top: 1%">
					<input type="text" name="fname" placeholder="First Name" value="<?php echo $cfname; ?>" class="inp_fname">

					<input type="text" name="lname" placeholder="Last Name" value="<?php echo $clname; ?>" class="inp_lname">
				</div>

				<div style="margin-top: 1%">
					<label class="lab_dob">DOB</label>
					<input type="date" name="date" class="inp_date" value="<?php echo $cdob; ?>">

					<input type="number" name="age" placeholder="Age" class="inp_age" min="25" value="<?php echo $cage; ?>">

					<select class="sel_bg" name="blood">
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

				<div style="margin-top: 1%">
					<textarea class="txt_tempadd" name="tadd" placeholder="Temporary Address"><?php echo $ct_add; ?></textarea>

					<textarea class="txt_peradd" name="padd" placeholder="Permanent Address"><?php echo $cp_add; ?></textarea>
				</div>

				<div>
					<select class="sel_state" name="state">
						<option value="<?php echo $cst; ?>"><?php echo $cst_name; ?></option>
						<?php $sql = mysqli_query($con, "SELECT * FROM state ORDER by st_name ASC");
						while ($read = mysqli_fetch_array($sql)) {
						?>
							<option value="<?php echo $read['st_id']; ?>"><?php echo $read['st_name']; ?></option>
						<?php } ?>
					</select>

					<input type="text" name="d_city" placeholder="city" class="sel_city" value="<?php echo $ccity; ?>">

					<input type="number" name="pin" placeholder="Pin Code" class="inp_pin" value="<?php echo $cpin; ?>">

					<input type="number" name="cont" placeholder="Contact" class="inp_cont" value="<?php echo $ccontact; ?>">
				</div>
				<div style="margin-top: 1%">
					<select class="sel_quali" name="quali">
						<option value="<?php echo $cquali; ?>"><?php echo $cquali_name; ?></option>
						<?php
						$sql = mysqli_query($con, "SELECT * FROM d_qualific ORDER by q_name ASC");
						while ($read = mysqli_fetch_array($sql)) {
						?>
							<option value="<?php echo $read['q_id']; ?>"><?php echo $read['q_name']; ?></option>
						<?php } ?>
					</select>

					<select class="sel_spec" name="specl">
						<option value="<?php echo $cspecl; ?>"><?php echo $cspecl_name; ?></option>
						<?php
						$sql = mysqli_query($con, "SELECT * FROM d_specl ORDER by s_name ASC");
						while ($read = mysqli_fetch_array($sql)) {
						?>
							<option value="<?php echo $read['s_id']; ?>"><?php echo $read['s_name']; ?></option>
						<?php } ?>
					</select>
				</div>
				<div style="margin-top: 1%" align="center">
					<input type="submit" name="update_doc" value="Save" class="btn_adddoc">
				</div>
			</form>
			<?php echo $msg; ?>
		</section>
	</div>
</body>

</html>