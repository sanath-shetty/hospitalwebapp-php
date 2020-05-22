<?php
include('connect.php');
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
$msg="";
if (isset($_POST["save_specl"])) {

if (empty($_POST["specl_name"])) {
	$msg="<p class='msg_head'>Field cannot be empty</p>";
}else{
    $specl=$_POST["specl_name"];

    $sql="INSERT INTO `d_specl`(`s_name`) VALUES ('$specl')";

    if (mysqli_query($con, $sql)) {
        $msg="<p class='msg_head'>Specialization Added</p>";
    }
    else{
	    $msg="<p class='msg_head'>Error Occured</p>";
}

$con->close();

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
	<link rel="stylesheet" href="addspecl.css">
</head>
<body>
<div class="container">
	<?php include("cmn_file/login_topnav_default.php"); ?>
	<div class="state_sec">
		<p class="state_head">Add Specialization</p>
		<form action="" method="POST" align="center">
			<input type="text" name="specl_name" placeholder="Specialization"
		    class="inp_state"><br>
		    <div style="margin-bottom: 2%">
		    	<input type="submit" name="save_specl" value="Save"
		        class="btn_state">
		    </div>
		    <?php echo $msg; ?>
		</form>
	</div>
</div>
</body>
</html>