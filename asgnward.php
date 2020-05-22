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
?>

<?php 
    include ('connect.php');
    ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
    $asgnWard = $_GET['asg'];

    $sql = "SELECT * FROM patient_data WHERE p_id = '$asgnWard'";
    $result = mysqli_query($con,$sql);

    	while ($rows = mysqli_fetch_assoc($result)) {
    		$pid = $rows['p_id'];
    		$fname = $rows['f_name'];
    		$lname = $rows['l_name'];
    		$age = $rows['age'];
    		$cont = $rows['contact'];
    	}
?>

<?php 
    include ('connect.php');
    $msg= "";
    ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

    if (isset($_POST['save_apnt'])) {

    	$bld = $_POST['bld_id'];

        if (isset($_POST['w_id'])) {

    	   $ward = $_POST['w_id'];

           $sql = "UPDATE `ward` SET `status`='1' WHERE `w_id` = '$ward'";
            $result = mysqli_query($con,$sql);

                if ($result) {
                    
                }else{
                    $msg = "<p class='error_msg'>Error Occured</p>";
                }
        }
    	$sql = "INSERT INTO `ward_asgn`(`p_id`, `bld_id`, `w_id`) VALUES ('$asgnWard','$bld','$ward')";
    	$result = mysqli_query($con,$sql);

    	if ($result) {
    		$msg = "<p class='error_msg'>Ward Assigned</p>";
    	}else{
    		$msg = "<p class='error_msg'>Error Occured</p>";
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
	<link rel="stylesheet" href="asgnward.css">
</head>
<body>
<div class="container">
	<?php include("cmn_file/login_topnav_patient.php"); ?>
	<div class="asgn_sec">
		<p class="asgn_head">Assign Ward</p>
		<form action="" method="POST">
			<div style="margin-top: 1%">
				<input type="text" name="pid" placeholder="Patient Id" class="inp_pid" value="<?php echo $pid; ?>" disabled="disabled">
			</div>
			<div style="margin-top: 1%">
				<input type="text" name="fname" placeholder="First Name" class="inp_fname" value="<?php echo $fname; ?>" disabled="disabled">

				<input type="text" name="lname" placeholder="Last Name" class="inp_lname" value="<?php echo $lname; ?>" disabled="disabled">
			</div>
			<div style="margin-top: 1%">
				<label class="lab_date"></label>

				<input type="number" name="age" placeholder="Age" class="inp_age" value="<?php echo $age; ?>" disabled="disabled">

				<input type="text" name="cont" placeholder="Contact" class="inp_date" value="<?php echo $cont; ?>" disabled="disabled">

				<select name="bld_id" id="bld_id" class="sel_building">
                    <option>Select</option>
                    <?php
                    include 'connect.php';
                    $sql="SELECT * FROM building";

                    if($stmt = $con->query($sql)){
                        echo "No of records : ".$stmt->num_rows."<br>";

                        while ($row = $stmt->fetch_assoc()) {
                            echo "<option value=".$row['bld_id'].">".$row['bld_name']."</option>";
                        }
                    }else{
                        echo $con->error;
                    }

                echo "</select><select name='w_id' id='w_id' class='sel_room'></select>";

                ?>

			</div>
			<div style="margin-top: 1%" align="center">
				<input type="submit" name="save_apnt" value="Assign Room" class="btn_asgnroom">
			</div>
		</form>
        <?php echo $msg; ?>
	</div>
</div>

<script src="js/jquery-1.8.1.min.js"></script>
<script>
$(document).ready(function() {

$('#bld_id').change(function(){

var bld_id=$('#bld_id').val();

$('#w_id').empty();

$.get('builddataAjax.php',{'bld_id':bld_id},function(return_data){
	if(return_data.data.length > 0){
        $.each(return_data.data, function(key,value){
		$("#w_id").append("<option value='"+value.w_id+"'>"+value.w_num+"</option>");
	});
	}else{
	$('#msg').html('No records found');
}
}, "json");

});

});
</script>
</body>
</html>