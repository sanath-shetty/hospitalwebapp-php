<?php session_start();
    include ('connect.php');
   
        $sql = "SELECT * FROM a_patient where padmin_id='". $_SESSION["pa_session"] ."'";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
            $user=$row["pa_name"];
            }
        }else{
            header('location: login.php');
        }
        mysqli_close($con);
?>

<?php 
    include('connect.php');
    ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
    $msg="";
    $editid=$_GET["edit"];

    $sql = "SELECT * FROM patient_data INNER JOIN state WHERE patient_data.st_id=state.st_id && patient_data.p_id='$editid' LIMIT 1";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row=mysqli_fetch_assoc($result)) {
               $pid=$row['p_id'];
               $fname=$row['f_name'];
               $lname=$row['l_name'];
               $dob=$row['date'];
               $age=$row['age'];
               $bg=$row['blood_group'];
               $cont=$row['contact'];
               $adrs=$row['address'];
               $state=$row['st_id'];
               $statename=$row['st_name'];
               $city=$row['city'];
               $pin=$row['pin'];
               $job=$row['job'];
               $email=$row['email'];
               $height=$row['height'];
               $weight=$row['weight'];
               $a_check=$row['health_issue'];
               $b_check=explode(',', $a_check);
               $other=$row['others_issue'];
            }
        }
        else {
            $msg="<p class='msg_head'>Invalid</p>";
         }
?>

<?php
    $d_check="";
    $msg="";
    if (isset($_POST['update'])) {
    	
    	$pid=$_POST['ptn_id'];
    	$fname=$_POST['p_fname'];
    	$lname=$_POST['p_lname'];
    	$dob=$_POST['p_dob'];
    	$age=$_POST['p_age'];
    	$blood=$_POST['p_bg'];
    	$cont=$_POST['p_cont'];
    	$adrs=$_POST['p_adrs'];
    	$state=$_POST['p_state'];
    	$city=$_POST['p_city'];
    	$pin=$_POST['p_pin'];
    	$job=$_POST['p_job'];
    	$email=$_POST['p_email'];
    	$height=$_POST['p_hei'];
    	$weight=$_POST['p_wei'];
    	$other=$_POST['p_oissue'];

    	if (isset($_POST['healthissue'])) {
    		$c_check=$_POST['healthissue'];
    		$d_check=implode(",",$c_check);
    	}
    	$update = "UPDATE `patient_data` SET `f_name`='$fname',`l_name`='$lname',`date`='$dob',
    	    `age`='$age',`blood_group`='$blood',`contact`='$cont',`address`='$adrs',`st_id`='$state',
    	    `city`='$city',`pin`='$pin',`job`='$job',`email`='$email',`height`='$height',
    	    `weight`='$weight',`health_issue`='$d_check',`others_issue`='$other' WHERE `p_id`='$editid'";
   
        if (mysqli_query($con, $update)) {
            echo "";
            $msg="<p class='msg_head'>Record updated successfully</p>";
            
        } else {
            echo "Error updating record: " . mysqli_error($con);
            $msg="<p class='msg_head'>Error Occured</p>";
        }
        mysqli_close($con);
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sanjivini Hospital-MeetDoctor</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="font.css">
	<link rel="stylesheet" href="update_patdata.css">
</head>
<body>
<div class="container">
	<?php include("cmn_file/login_topnav_default.php"); ?>
	<section class="data_sec">
		<p class="data_head">Update Patient Data</p>
		<form action="" method="POST">

	    <div style="margin-top: 1%;" align="right">
	    	<input type="text" name="ptn_id" class="inp_id" 
	    	value="<?php echo $pid;?>">
	    </div>

		<div style="display: flex; margin-top: 1%;">
			<input type="text" name="p_fname" placeholder="First Name" 
			class="inp_fname" value="<?php echo $fname;?>">

			<input type="text" name="p_lname" placeholder="Last Name" 
			class="inp_lname" value="<?php echo $lname;?>">
		</div>

		<div style="display: flex; margin-top: 1%;">
			<input type="date" name="p_dob" class="inp_date" 
			value="<?php echo $dob?>">

			<input type="number" name="p_age" placeholder="age" class="inp_age" 
			value="<?php echo $age;?>">

			<select class="bgroup" name="p_bg">
			    <option><?php echo $bg;?></option>
			    <option value="A+ve">A+ve</option>
			    <option value="A-ve">A-ve</option>
			    <option value="B+ve">B+ve</option>
			    <option value="B-ve">B-ve</option>
			    <option value="O+ve">O+ve</option>
			    <option value="O-ve">O-ve</option>
			    <option value="Ab+ve">Ab+ve</option>
			    <option value="AB-ve">AB-ve</option>			    	
			</select>

			<input type="number" name="p_cont" placeholder="contact" 
			class="inp_cont" value="<?php echo $cont;?>">
			</div>

			<div style="display: flex; margin-top: 1%;">
			<textarea class="txt_address" name="p_adrs" 
			placeholder="Address Here"><?php echo $adrs;?></textarea>

			<select class="sstate" name="p_state">
				<option value="<?php echo $state;?>"><?php echo $statename;?></option>
				<?php $sql=mysqli_query($con,"SELECT * FROM state ORDER by st_name ASC"); 
                       while($read=mysqli_fetch_array($sql)){
                   ?>
				<option value="<?php echo $state; ?>"><?php echo $read['st_name']; ?></option>
			<?php } ?>
			</select>

			<input type="text" name="p_city" placeholder="city" 
			class="inp_city" value="<?php echo $city;?>">

			<input type="number" name="p_pin" placeholder="Pin Code"
			class="inp_pin" value="<?php echo $pin;?>">
			</div>

			<div style="display: flex; margin-top: 1%;">
				<textarea class="txt_occupation" name="p_job" 
				placeholder="occupation"><?php echo $job;?></textarea>

				<input type="email" name="p_email" placeholder="email"
				class="inp_email" value="<?php echo $email;?>">
			</div>

			<div style="display: flex; margin-top: 1%;">
				<input type="number" name="p_hei" placeholder="height" 
				class="inp_hgt" value="<?php echo $height;?>">

				<input type="number" name="p_wei" placeholder="weight" 
				class="inp_wgt" value="<?php echo $weight;?>">
			</div>
			<div>
				<p class="health_issue">Any previous health issues?</p>
				<div style="display: flex;">
					<input type="checkbox" name="healthissue[]" value="diabeties"
					<?php 
					    if (in_array('diabeties', $b_check)) {
					    	echo "checked";
					    }
				    ?>
					>
					<p class="hlt_head">Diabeties</p>
					<input type="checkbox" name="healthissue[]" value="bloodpressure"
					<?php 
					    if (in_array('bloodpressure', $b_check)) {
					    	echo "checked";
					    }
				    ?>
					>
					<p class="hlt_head">Blood Pressure</p>
					<input type="checkbox" name="healthissue[]" value="stroke"
					<?php 
					    if (in_array('stroke', $b_check)) {
					    	echo "checked";
					    }
				    ?>
					>
					<p class="hlt_head">Stroke</p>
					<input type="checkbox" name="healthissue[]" value="skinallergies"
					<?php 
					    if (in_array('skinallergies', $b_check)) {
					    	echo "checked";
					    }
				    ?>
					>
					<p class="hlt_head">Skin Allergies</p>
				</div>
				<p class="other_issues">Any Other</p>
				<textarea class="txt_other" name="p_oissue"><?php echo $other;?></textarea>
			</div>
			<div align="center">
				<input type="submit" name="update" value="Update" 
			    class="btn_submit">
			</div>
			<div>
				<?php echo $msg; ?>
			</div>
		</form>
	</section>
</div>
</body>
</html>