<?php session_start();
    include ('connect.php');
   
        $sql = "SELECT * FROM a_patient where padmin_id='" . $_SESSION["pa_session"] ."'";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
            $user=$row["pa_name"];
            }
        }else{
            header('location: login.php');
        }
 ?>
<?php
include('connect.php');
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
$msg="";
$i_health="";
$dateOfBirth="";

if (isset($_POST["save_patient"])) {

$id = $_POST['ptn_id'];
$fname = $_POST['p_fname'];
$lname = $_POST['p_lname'];
$date = $_POST['p_dob'];
$age = $_POST['p_age'];
$blood = $_POST['p_bg'];
$contact = $_POST['p_cont'];
$address = $_POST['p_adrs'];
$state = $_POST['p_state'];
$city = $_POST['p_city'];
$pin = $_POST['p_pin'];
$job = $_POST['p_job'];
$email = $_POST['p_email'];
$height = $_POST['p_hei'];
$weight = $_POST['p_wei'];
$other = $_POST['p_oissue'];
if (isset($_POST['healthissue'])) {
	$health = $_POST['healthissue'];
    $i_health=implode(',',$health);
}
if (isset($date)) {
}
$sql="INSERT INTO `patient_data`(`p_id`, `f_name`, `l_name`, `date`, `age`, `blood_group`, `contact`, `address`, `st_id`, `city`, `pin`, `job`, `email`, `height`, `weight`, `health_issue`, `others_issue`) VALUES ('$id','$fname','$lname','$date','$age','$blood','$contact','$address','$state','$city','$pin',
    '$job','$email','$height','$weight','$i_health','$other')";

if (mysqli_query($con, $sql)) {
    $msg="<p class='msg_head'>State Added</p>";
}else{
	$msg="<p class='msg_head'>Error Occured</p>";
}

mysqli_close($con);

}

?>

<?php 

if (isset($_POST['calc_age'])) {
	$dateOfBirth = $_POST['p_dob'];
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sanjivini Hospital-MeetDoctor</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="font.css">
	<link rel="stylesheet" href="patientdata_form.css">
</head>
<body>
<div class="container">
	<?php include("cmn_file/login_topnav_patient.php"); ?>
	<section class="data_sec">
		<p class="data_head">Patient Data</p>
		<form action="" method="POST">
			<div align="right">
			<?php 
			include ('connect.php');
			$sq ="SELECT `p_id` FROM `patient_data` ORDER BY `p_id` desc LIMIT 1";
			    $ctn = mysqli_query($con,$sq);
			    if (mysqli_num_rows($ctn) > 0) {
            while($row = mysqli_fetch_assoc($ctn)) {
            	$p_id_code=$row['p_id'];
            	$pid=++$p_id_code;
            }
         } else {
            $pid='P01';
         }
            ?>
			<input type="text" name="ptn_id" class="inp_id" 
			value="<?php echo $pid; ?>">
			</div>
			<input type="text" name="p_fname" placeholder="First Name" 
			class="inp_fname">
			<input type="text" name="p_lname" placeholder="Last Name" 
			class="inp_lname">
			<div style="display: flex; margin-top: 1%;">
				<input type="date" name="p_dob" class="inp_date">
				<input type="submit" name="calc_age" value="Calculate Age">
				<?php
                    $today = date("Y-m-d");
                    $diff = date_diff(date_create($dateOfBirth), date_create($today));
				?>
			    <input type="number" name="p_age" value="<?php echo $diff->format('%y'); ?>" class="inp_age">
			    <select class="bgroup" name="p_bg">
			    	<option>Select Group</option>
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
			    class="inp_cont">
			</div>
			<div style="display: flex; margin-top: 1%;">
				<textarea class="txt_address" name="p_adrs" 
				placeholder="Address Here"></textarea>
				<select class="sstate" name="p_state">
					<option>Select State</option>
					<?php $sql=mysqli_query($con,"SELECT * FROM state ORDER by st_name ASC"); 
                        while($read=mysqli_fetch_array($sql)){
                    ?>
					<option value="<?php echo $read['st_id']; ?>"><?php echo $read['st_name']; ?></option>
				<?php } ?>
				</select>
				<input type="text" name="p_city" placeholder="city" 
				class="inp_city">
				<input type="number" name="p_pin" placeholder="Pin Code"
				class="inp_pin">
			</div>
			<div style="display: flex; margin-top: 1%;">
				<textarea class="txt_occupation" name="p_job" 
				placeholder="occupation"></textarea>
				<input type="email" name="p_email" placeholder="email"
				class="inp_email">
			</div>
			<div style="display: flex; margin-top: 1%;">
				<input type="number" name="p_hei" placeholder="height" 
				class="inp_hgt">
				<input type="number" name="p_wei" placeholder="weight" 
				class="inp_wgt">
			</div>
			<div>
				<p class="health_issue">Any previous health issues?</p>

				<div style="display: flex;">
					<input type="checkbox" name="healthissue[]" value="diabeties">
					<p class="hlt_head">Diabeties</p>
					<input type="checkbox" name="healthissue[]" value="bloodpressure">
					<p class="hlt_head">Blood Pressure</p>
					<input type="checkbox" name="healthissue[]" value="stroke">
					<p class="hlt_head">Stroke</p>
					<input type="checkbox" name="healthissue[]" value="skinallergies">
					<p class="hlt_head">Skin Allergies</p>
				</div>
				<p class="other_issues">Any Other</p>
				<textarea class="txt_other" name="p_oissue"></textarea>
			</div>
			<div align="center">
				<input type="submit" name="save_patient" value="Save" 
			    class="btn_submit">
			</div>
		</form>
	</section>
</div>
</body>
</html>