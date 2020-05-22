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
        mysqli_close($con);
?>

<?php 

    if (isset($_POST['bld_name'])) {

        include ('connect.php');
        $bld_name = "";

        ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
        $bld_name = $_POST['bld_name'];

        $sql = "INSERT INTO `building`(`bld_name`) VALUES ('$bld_name')";
        $ctn = mysqli_query($con,$sql);

        if ($ctn) {
        	echo "data inserted";
        }else{
        	echo "Error Connecting Database";
        }
    }

?>

<?php 

    

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

      <div class="container">
      	<form method="POST" action="">
      		<input type="text" name="bld_name" class="inp_name" placeholder="Building Name">
      		<input type="submit" name="btn_save" class="btn_savebld">
      	</form>
      </div>

</body>
</html>