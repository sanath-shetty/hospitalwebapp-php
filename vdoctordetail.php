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
$delete = "";
$msg = "";
$delmsg = "";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['del'])) {
	$delete = $_GET['del'];

	$sql = "SELECT * FROM `doctor_data` WHERE `doc_id`='$delete'";
	$cnt = mysqli_query($con, $sql) or die(mysqli_error($con));
	if ($rows = mysqli_fetch_assoc($cnt)) {
		$delmsg = "<div class='msg'>
   	    <p class='delete_msg'>Delete the data?</p>
   	        <form action='' method='POST'>
   	            <input type='text' value='" . $rows['doc_id'] . "' class='inp_id' disabled='disabled'>
   	            <input type='text' value='" . $rows['f_name'] . "' class='inp_name' disabled='disabled'><br>
   	            <input type='submit' value='YES.' name='delbtn' class='btn_yes'>
   	            <input type='submit' value='NO.' name='cnclbtn' class='btn_no'>
   	        </form>
   	    </div>";
	}
}
if (isset($_POST['delbtn'])) {

	$sql = "DELETE FROM `doctor_data` WHERE doc_id='$delete' LIMIT 1";
	$result = mysqli_query($con, $sql);
	header('location: vdoctordetail.php');
} elseif (isset($_POST['cnclbtn'])) {
	header('location: vdoctordetail.php');
}

?>

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
				<input type="text" name="id" placeholder="Doctor Id or Name" class="form-control">
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
								<th>Image</th>
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

								$sql = mysqli_query($con, "SELECT * FROM `doctor_data` WHERE `f_name` LIKE '$fname%' || `doc_id` LIKE '$fname%'") or die(mysqli_error($con));

								while ($rows = mysqli_fetch_array($sql)) {

							?>
									<tr>
										<td><?php echo $i++; ?></td>
										<td><img src=" uploads/<?php echo $rows['doc_img']; ?>" width="160" height="140">
										</td>
										<td><?php echo $rows['f_name'] ?></td>
										<td><?php echo $rows['l_name'] ?></td>
										<td><?php echo $rows['dob_date'] ?></td>
										<td><?php echo $rows['age'] ?></td>
										<td><?php echo $rows['blood'] ?></td>
										<td><?php echo $rows['contact'] ?></td>
										<td>
											<div style="padding: 5px; background: #5f3ce3; margin: 5px 0;">
												<a href="update_docdata.php?edit=<?php echo $rows['doc_id'] ?>" class="a_style">View/Edit</a>
											</div>
											<div style="padding: 5px; background: red; margin: 5px 0;">
												<a href="vdoctordetail.php?del=<?php echo $rows['doc_id'] ?>" class="a_style">Delete</a>
											</div>
											<div style="padding: 5px; background: #31d2de; margin: 5px 0;">
												<a href="" class="a_style">View Appointment</a>
											</div>
										</td>
									</tr>
								<?php

								}
							} else {
								$sql = mysqli_query($con, "SELECT * FROM doctor_data") or die(mysqli_error($con));

								while ($rows = mysqli_fetch_array($sql)) {
								?>
									<tr>
										<td><?php echo $i++; ?></td>
										<td><img src="uploads/<?php echo $rows['doc_img']; ?>" width="160" height="140"></td>
										<td><?php echo $rows['f_name'] ?></td>
										<td><?php echo $rows['l_name'] ?></td>
										<td><?php echo $rows['dob_date'] ?></td>
										<td><?php echo $rows['age'] ?></td>
										<td><?php echo $rows['blood'] ?></td>
										<td><?php echo $rows['contact'] ?></td>
										<td>
											<div>
												<a href="update_docdata.php?edit=<?php echo $rows['doc_id'] ?>" class="a_style">View/Edit</a>
											</div>
											<div>
												<a href="vdoctordetail.php?del=<?php echo $rows['doc_id'] ?>" class="a_style">Delete</a>
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
</body>

</html>