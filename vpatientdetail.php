<?php session_start();
    include ('connect.php');
    ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
   
        $sql = "SELECT * FROM a_patient where padmin_id='". $_SESSION["pa_session"] ."'";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
            $user=$row["pa_name"];
            }
        }else{
            header('location: login.php');
        }
 ?>

<!-- ////// DELETE CODE /////

<?php 
   include ('connect.php');
   $delete="";
   $msg="";
   $delmsg="";
   ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
   if (isset($_GET['del'])) {
   	$delete=$_GET["del"];
   	$delmsg="<div class='msg'>
   	are you sure about that? legal action to be taken.
   	<form action='' method='POST'>
   	<input type='submit' value='YES!' name='delbtn'>
   	</form>
   	</div>";}
    if (isset($_POST['delbtn'])) {

   	$sql = "DELETE FROM `patient_data` WHERE p_id='$delete' LIMIT 1";
    $result = mysqli_query($con,$sql);
    header('location: vpatientdetail.php');
    
   	
   }
   
?> -->

<?php
if (isset($_POST['id'])) {
	$fname=$_POST['id'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sanjivini Hospital-MeetDoctor</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="font.css">
	<link rel="stylesheet" href="vpatientdetail.css">
</head>
<body>
<div class="container">
	<?php include("cmn_file/login_topnav_patient.php"); ?>
	<section class="search_block">
		<form action="" method="POST">
			<div class="search_sec">
				<input type="text" name="id" placeholder="Patient Id or Name" class="inp_search" value="">
				<input type="submit" name="search" value="search" class="btn_search">
			</div>
		</form>
	</section>
	<section class="vpdata_sec">
		<p class="vpdate_head">View Patient Data</p>
		<?php echo $delmsg; ?>
		<form action="" method="POST">
			<table class="tb_vpdata">
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
				<?php 
				    include('connect.php');
				    $i=1;
				    
				    if (!empty($fname)) {
				    
                    $sql=mysqli_query($con,"SELECT * FROM patient_data WHERE `f_name` LIKE '%$fname%' || `p_id` LIKE '%$fname%'") or die(mysqli_error($con));
                    
                    while($rows=mysqli_fetch_array($sql))
                   {
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
						<div style="padding: 5px; background: #5f3ce3; margin: 5px 0;">
							<a href="update_patdata.php?edit=$rows['p_id']" class="a_style">View/Edit</a>
						</div>
						<div style="padding: 5px; background: red; margin: 5px 0;">
							<a href="vpatientdetail.php?del=$rows['p_id']" class="a_style">Delete</a>
						</div>
						<div style="padding: 5px; background: #31d2de; margin: 5px 0;">
							<a href="" class="a_style">View Reports</a>
						</div>
					</td>
				</tr>
			<?php	 } 

			}
			else {
				$sql=mysqli_query($con,"SELECT * FROM patient_data") or die(mysqli_error($con));
                    
                    while($rows=mysqli_fetch_array($sql))
                   {
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
						<div style="padding: 5px; background: #5f3ce3; margin: 5px 0;">
							<a href="update_patdata.php?edit=<?php echo $rows['p_id'] ?>" class="a_style">View/Edit</a>
						</div>
						<!-- <div style="padding: 5px; background: red; margin: 5px 0;">
							<a href="vpatientdetail.php?del=<?php echo $rows['p_id'] ?>" class="a_style">Delete 
							</a>
						</div> -->
						<div style="padding: 5px; background: red; margin: 5px 0;">
							<a href="testresults.php?rep=<?php echo $rows['p_id'] ?>" class="a_style">Add Report</a>
						</div>
						<div style="padding: 5px; background: #31d2de; margin: 5px 0;">
							<a href="asgnward.php?asg=<?php echo $rows['p_id'] ?>" class="a_style">Asign Ward</a>
						</div>
					</td>
				</tr>
			<?php	 
		}	
	}
	
	 ?>

			</table>
		</form>
	</section>

	<p class="btn_viewmore">View More</p>
</div>
</body>
</html>