<?php
include('connect.php');
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
$msg="";
if (isset($_POST["save_state"])) {

$state=$_POST["state_name"];

$sql="INSERT INTO `state`(`st_name`) VALUES ('$state')";

if (mysqli_query($con, $sql)) {
    $msg="<p class='msg_head'>State Added</p>";
}else{
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
	<link rel="stylesheet" href="addstate.css">
</head>
<body>
<div class="container">
	<?php include("cmn_file/login_topnav_default.php"); ?>
	<div class="state_sec">
		<p class="state_head">Add States</p>
		<form action="" method="POST" align="center">
			<input type="text" name="state_name" placeholder="State Name"
		    class="inp_state"><br>
		    <input type="submit" name="save_state" value="Save"
		    class="btn_state">
		    <?php echo $msg; ?>
		</form>
	</div>
</div>
</body>
</html>