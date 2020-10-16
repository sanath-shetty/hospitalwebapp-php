<?php session_start();
include('connect.php');

// $sql = "SELECT * FROM a_doctor where dadmin_id='" . $_SESSION["da_session"] ."'";
//     $result = mysqli_query($con, $sql);
//     if (mysqli_num_rows($result) > 0) {
//     while($row = mysqli_fetch_assoc($result)) {
//     $user=$row["da_name"];
//     }
// }else{
//     header('location: login.php');
// }
// mysqli_close($con);
?>

<?php

include 'connect.php';
$delmsg = "";
$delete = "";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['del'])) {
	$delete = $_GET['del'];

	$sql = "SELECT * FROM `appointment` WHERE `apnt_id` = '$delete'";
	$ctn = mysqli_query($con, $sql) or die(mysqli_error($con));
	$rows = mysqli_fetch_assoc($ctn);

	$delmsg = "<div>
    		<p class='conf_del'>Delete Document</p>
    		<form action='' method='POST'>
    		    <input type='text' value='" . $rows['apnt_id'] . "' class='inp_id' disabled='disabled'>
    		    <input type='text' value='" . $rows['p_name'] . "' class='inp_name' disabled='disabled'><br>
    		    <input type='submit' value='YES.' name='delbtn' class='btn_yes'>
    		    <input type='submit' value='NO.' name='cnclbtn' class='btn_no'>
    		</form>
    		</div>";
}

if (isset($_POST['delbtn'])) {

	$sql = "DELETE FROM `appointment` WHERE apnt_id='$delete' LIMIT 1";
	$result = mysqli_query($con, $sql);
	header('location: viewapnt.php?success');
} elseif (isset($_POST['cnclbtn'])) {

	header('location: viewapnt.php?cancelled');
}

?>

<?php
if (isset($_POST['date'])) {
	$date = $_POST['date'];
	$msg = "";
}

?>
<!DOCTYPE html>
<html>

<head>
	<title>Sanjivini Hospital-MeetDoctor</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="font.css">
	<link rel="stylesheet" href="viewapnt.css">
</head>

<body>
	<div class="container">
		<?php include("cmn_file/login_topnav_doctor.php"); ?>
		<?php echo $delmsg; ?>
		<section class="viewapnt_serach">
			<form action="" method="POST">
				<input type="date" name="date" class="inp_date">
				<label class="lab_sty">From</label>
				<input type="time" name="from_time" class="inp_time">
				<label class="lab_sty">To</label>
				<input type="time" name="to_time" class="inp_time">
				<input type="submit" name="btn_time" value="Search" class="btn_time">
			</form>
		</section>
		<section class="apnt_sec">
			<p class="apnt_head">View Appointments</p>
			<table class="tb_vapnt">
				<tr>
					<th>Sl.No.</th>
					<th>Patient Id</th>
					<th>Name</th>
					<th>Contact</th>
					<th>Specialization</th>
					<th>Doctor</th>
					<th>Date</th>
					<th>Time</th>
					<th>Operation</th>
				</tr>

				<?php
				include 'connect.php';
				ini_set('display_errors', 1);
				ini_set('display_startup_errors', 1);
				error_reporting(E_ALL);
				$i = 1;

				if (!empty($_POST['from_time']) && !empty($_POST['to_time']) && !empty($_POST['date'])) {

					$fromTime = $_POST['from_time'];
					$toTime = $_POST['to_time'];

					$sql = "SELECT * FROM appointment a, d_specl b, doctor_data c WHERE a.s_id = b.s_id && a.doc_id = c.doc_id && a.apnt_date = '$date' && a.apnt_time BETWEEN '$fromTime' AND '$toTime'";
					$ctn = mysqli_query($con, $sql);

					while ($rows = mysqli_fetch_assoc($ctn)) { ?>

						<tr>
							<td><?php echo $i++; ?></td>
							<td><?php echo $rows['apnt_id']; ?></td>
							<td><?php echo $rows['p_name']; ?></td>
							<td><?php echo $rows['contact']; ?></td>
							<td><?php echo $rows['s_name']; ?></td>
							<td><?php echo $rows['f_name'] ?></td>
							<td><?php echo $rows['apnt_date']; ?></td>
							<td><?php echo $rows['apnt_time']; ?></td>
							<td>
								<div class="btn_view_edit">
									<a href="" class="a_style">Postpone</a>
								</div>
								<div class="btn_delete">
									<a href="viewapnt.php?del=<?php echo $rows['apnt_id']; ?>" class="a_style">Delete</a>
								</div>
							</td>
						</tr>

					<?php	}
				} else {

					include('connect.php');
					$i = 1;
					$todayDate = date('Y-m-d');

					$sql = "SELECT * FROM appointment a, d_specl b, doctor_data c WHERE a.s_id = b.s_id && a.doc_id = c.doc_id && a.apnt_date = '$todayDate'";
					$ctn = mysqli_query($con, $sql);

					while ($rows = mysqli_fetch_array($ctn)) {
					?>

						<tr>
							<td><?php echo $i++; ?></td>
							<td><?php echo $rows['apnt_id']; ?></td>
							<td><?php echo $rows['p_name']; ?></td>
							<td><?php echo $rows['contact']; ?></td>
							<td><?php echo $rows['s_name']; ?></td>
							<td><?php echo $rows['f_name'] . ' ' . $rows['l_name'] ?></td>
							<td><?php echo $rows['apnt_date']; ?></td>
							<td><?php echo $rows['apnt_time']; ?></td>
							<td>
								<div class="btn_view_edit">
									<a href="" class="a_style">Postpone</a>
								</div>
								<div class="btn_delete">
									<a href="viewapnt.php?del=<?php echo $rows['apnt_id']; ?>" class="a_style">Delete</a>
								</div>
							</td>
						</tr>

				<?php	}
				}
				?>

			</table>
		</section>
	</div>
</body>

</html>