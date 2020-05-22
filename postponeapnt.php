<?php 
    include 'connect.php';
    $msg = "";

    if (isset($_POST['post_date']) && isset($_POST['ftime']) && isset($_POST['ttime'])) {
    	
    	$dt_date = $_POST['post_date'];
    	$ftime = $_POST['ftime'];
    	$ttime = $_POST['ttime'];
    	$dt_ndate = $_POST['new_date'];

    	$sql = "SELECT `apnt_date`,`apnt_time` FROM `appointment` WHERE `apnt_date` = '$dt_date' && `apnt_time` BETWEEN '$ftime' AND '$ttime'";
    	$result = mysqli_query($con,$sql);

    	if (mysqli_num_rows($result) > 0) {
    		
    		$sql = "UPDATE `appointment` SET `apnt_date`= '$dt_ndate' WHERE `apnt_date` = '$dt_date'";
    		$result = mysqli_query($con,$sql);

    		if ($result) {
    			echo "date updated";
    		}
    		else{
    			echo "date not updated...error occured";
    		}
    	}else{
    		$msg = "<p>No appointments on this date or time.</p>";
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
	<link rel="stylesheet" href="postponeapnt.css">
</head>
<body>

    <div class="container">
    <?php include("cmn_file/login_topnav_doctor.php"); ?>

    <section class="postpone_sec">

		<form action="" method="POST" enctype="multipart/form-data">
		<p class="post_head">Add Doctor</p>

		<div class="check_sec">
			<label class="lab_date">Date</label>
    	    <input type="date" name="post_date" class="inp_date" required="">

            <label class="lab_ft">From Time</label>
    	    <input type="time" name="ftime" class="inp_time">

    	    <label class="lab_tt">To Time</label>
    	    <input type="time" name="ttime" class="inp_time">

    	    <?php echo $msg; ?>
		</div>

		<div class="new_sec" align="center">
			<label class="lab_ndate">New Date</label><br>
    	    <input type="date" name="new_date" class="new_date"><br>

    	    <input type="submit" name="btn_post" class="btn_post">
		</div>
        
    	</form>

    </section>

    </div>

</body>
</html>