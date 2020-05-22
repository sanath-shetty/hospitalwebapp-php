<?php session_start();
    include ('connect.php');
   
        $sql = "SELECT * FROM a_doctor where dadmin_id='" . $_SESSION["da_session"] ."'";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
            $user=$row["da_name"];
            }
        }else{
            header('location: login.php');
        }
?>

<?php
    include('connect.php');
    ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
    $msg="";

    if(isset($_POST["submit_doc"])){

        $f_name=$_POST["fname"];
		$l_name=$_POST["lname"];
		$dob=$_POST["date"];
		$age=$_POST["age"];
		$bg=$_POST["blood"];
		$t_add=$_POST["tadd"];
		$p_add=$_POST["padd"];
		$st=$_POST["state"];
		$city=$_POST["d_city"];
		$pin=$_POST["pin"];
		$contact=$_POST["cont"];
		$quali=$_POST["quali"];
		$specl=$_POST["specl"];

	    $img = $_FILES['image']['name'];
	    $temp = $_FILES['image']['tmp_name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($img);

        move_uploaded_file($temp,$target_dir.$img);

        $sq = "INSERT INTO `doctor_data`(`doc_img`,`dadmin_id`,`f_name`, `l_name`, `dob_date`, `age`, `blood`, `t_add`, `p_add`, `st_id`, `city`, `pin`, `contact`, `q_id`, `s_id`,`status`,`vis_chrg`) VALUES ('$img','".$_SESSION["da_session"]."','$f_name','$l_name','$dob','$age','$bg','$t_add','$p_add','$st','$city','$pin','$contact','$quali','$specl','1','500')";

		if (mysqli_query($con, $sq)) {
			$msg="<p class='msg_head'>Doctor Added</p>";
		}
		else{
			$msg="<p class='msg_head'>Error Occured</p>";
		}

		$con->close();
		
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sanjivini Hospital-MeetDoctor</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="font.css">
	<link rel="stylesheet" href="doctordata_form.css">
</head>
<body>
<div class="container">
	<?php include("cmn_file/login_topnav_doctor.php"); ?>
	<section class="doctor_sec">
		<form action="" method="POST" enctype="multipart/form-data">
		<p class="doctor_head">Add Doctor</p>
		<div>
			<label class="lab_cimg">Choose Image</label><br>

			<input type="file" name="image" class="btn_img" accept=".JPG,.JPEG,.PNG">
		</div>

		<div style="margin-top: 1%">
			<input type="text" name="fname" placeholder="First Name"
			class="inp_fname">

			<input type="text" name="lname" placeholder="Last Name"
			class="inp_lname">
		</div>

		<div style="margin-top: 1%">
			<label class="lab_dob">DOB</label>
			<input type="date" name="date" class="inp_date">

			<input type="number" name="age" placeholder="Age" class="inp_age" min="25">

			<select class="sel_bg" name="blood">
				<option>Choose Group</option>
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
			<textarea class="txt_tempadd" name="tadd" placeholder="Temporary Address"></textarea>

			<textarea class="txt_peradd" name="padd" placeholder="Permanent Address"></textarea>
		</div>

		<div>
			<select class="sel_state" name="state">
				<option>Select State</option>
				<?php $sql=mysqli_query($con,"SELECT * FROM state ORDER by st_name ASC"); 
                        while($read=mysqli_fetch_array($sql)){
                    ?>
					<option value="<?php echo $read['st_id']; ?>"><?php echo $read['st_name']; ?></option>
				<?php } ?>
			</select>

			<input type="text" name="d_city" placeholder="city" class="sel_city">

			<input type="number" name="pin" placeholder="Pin Code" class="inp_pin">

			<input type="number" name="cont" placeholder="Contact" class="inp_cont">
		</div>
		<div style="margin-top: 1%">
			<select class="sel_quali" name="quali">
				<option>Choose Qualification</option>
				<?php 
				$sql=mysqli_query($con,"SELECT * FROM d_qualific ORDER by q_name ASC"); 
                    while($read=mysqli_fetch_array($sql)){
                ?>
					<option value="<?php echo $read['q_id']; ?>"><?php echo $read['q_name']; ?></option>
				<?php } ?>
			</select>

			<select class="sel_spec" name="specl">
				<option>Choose Specialization</option>
				<?php 
				$sql=mysqli_query($con,"SELECT * FROM d_specl ORDER by s_name ASC"); 
                    while($read=mysqli_fetch_array($sql)){
                ?>
					<option value="<?php echo $read['s_id']; ?>"><?php echo $read['s_name']; ?></option>
				<?php } ?>
			</select>
			</div>
		<div style="margin-top: 1%" align="center">
			<input type="submit" name="submit_doc" value="Add Doctor" class="btn_adddoc">
		</div>
	    </form>
	<?php echo $msg; ?>
	</section>
</div>
</body>
</html>