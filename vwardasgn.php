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
	<link rel="stylesheet" href="font.css">
	<link rel="stylesheet" href="vwardasgn.css">
</head>
<body>
	<div class="container">
	<?php include("cmn_file/login_topnav_patient.php"); ?>
	<section class="data_sec">
		<p class="data_head">View Ward Assigned</p>
	<form action="" method="POST" align="center">
		<input type="type" name="srcbox" placeholder="Patient Id" class="inp_id">

		<input type="submit" name="btn_src" value="Search" class="btn_src">
	</form>
	<table class="tbl_ward">
		<tr>
			<th>Sl. No</th>
			<th>Ward Assign Id</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Building Name</th>
			<th>Ward Number</th>
			<th>Operations</th>
		</tr>

		<?php 
		    include('connect.php');
			$i=1;

			if (!empty($pat_id)) {
				
				$sql = "SELECT * FROM ward_asgn a, patient_data b, building c, ward d WHERE a.p_id = b.p_id && a.bld_id = c.bld_id && a.w_id = d.w_id && b.p_id LIKE '$pat_id%'";
				$result = mysqli_query($con,$sql);
					
				while ($rows = mysqli_fetch_array($result)) { ?>
                    <tr>
			            <td><?php echo $i++; ?></td>
			            <td><?php echo $rows['wasgn_id']; ?></td>
			            <td><?php echo $rows['f_name']; ?></td>
			            <td><?php echo $rows['l_name']; ?></td>
			            <td><?php echo $rows['bld_name']; ?></td>
			            <td><?php echo $rows['w_num']; ?></td>
			            <td>
			            	<div>
			            		<a href="doc_visited.php?docv=<?php echo $rows['wasgn_id']; ?>" class="a_adddoc"><p>Add Doctor Visit</p></a>
			            		<a href="discharge.php?discg=<?php echo $rows['wasgn_id']; ?>" class="a_dscg"><p>Discharge</p></a>
			            	</div>
			            </td>
		            </tr>

		<?php 
		        }
			}
		?>
		
	</table>
</section>
</div>
</body>
</html>