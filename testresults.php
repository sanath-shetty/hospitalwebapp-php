<?php 
    include 'connect.php';
    ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
    $id = $_GET['rep'];

    $sql = "SELECT * FROM patient_data WHERE p_id = '$id'";
    $result = mysqli_query($con,$sql);

    while ($rows = mysqli_fetch_assoc($result)) {
    	
    	$fname = $rows['f_name'];
    	$lname = $rows['l_name'];
    	$age = $rows['age'];

    }
?>

<?php 
    
    if (isset($_POST['btn_sub'])) {

    	$inp_id = $_POST['inp_id'];
    	$inp_fname = $_POST['inp_fname'];
    	$inp_lname = $_POST['inp_lname'];
    	$inp_age = $_POST['inp_age'];

    	$img = $_FILES['pdf']['name'];
	    $temp = $_FILES['pdf']['tmp_name'];
        $target_dir = "pdf/";
        $target_file = $target_dir . basename($img);

        move_uploaded_file($temp,$target_dir.$img);

        $sql = "INSERT INTO `reports`(`p_id`, `rFile`) VALUES ('$id','$img')";
        $result = mysqli_query($con,$sql);

        if ($result) {
        	echo "data inserted";
        }
        else{
        	echo "error occured";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="font.css">
	<link rel="stylesheet" href="testresults.css">
</head>
<body>
	<div class="container">
		<?php include("cmn_file/login_topnav_patient.php"); ?>
		<section class="report_sec">
			<p class="report_head">Add test Reports</p>

			<form accept="" method="POST" enctype="multipart/form-data">
				<div style="display: flex; margin-top: 2%;">
					<input type="text" name="inp_id" class="inp_id" value="<?php echo $id; ?>">
				    <input type="text" name="inp_fname" class="inp_fname" value="<?php echo $fname; ?>">
				    <input type="text" name="inp_lname" class="inp_lname" value="<?php echo $lname; ?>">
				</div>
				<div style="display: flex; margin-top: 2%;">
					<input type="text" name="inp_age" class="inp_age" value="<?php echo $age; ?>">
				</div>
				<div style="display: flex; margin-top: 2%;">
					<input type="file" name="pdf" class="inp_file" accept=".pdf">
				</div>
				<div style="display: flex; margin-top: 2%;">
					<input type="submit" name="btn_sub" class="btn_sub" value="Save">
				</div>
			</form>
		</section>
	</div>
</body>
</html>