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
    include ('connect.php');
    ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

    if (isset($_POST['btn_save'])) {
        $bld_id = $_POST['sel_bld'];
        $ward_name = $_POST['num_ward'];

        $sql = "INSERT INTO `ward`(`bld_id`, `w_num`, `status`) VALUES ('$bld_id','$ward_name','0')";
        $ctn = mysqli_query($con,$sql);

        if ($ctn) {
            echo "data inserted";
        }else{
            echo "Error Connecting Database";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

      <div class="container">
      	<form method="POST" action="">
      		<select class="sel_bld" name="sel_bld">
            <option>Select Building</option>

            <?php
                include 'connect.php';
                ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

                $sql = "SELECT * FROM `building` ORDER BY `bld_name` ASC";
                $ctn = mysqli_query($con,$sql);
                    while ($rows = mysqli_fetch_array($ctn)) { ?>                        
                        <option value="<?php echo $rows['bld_id']; ?>"><?php echo $rows['bld_name']; ?></option>
                <?php } ?>

            </select>
            <input type="number" name="num_ward" class="num_ward" placeholder="Ward Number">
      		<input type="submit" name="btn_save" class="btn_savebld">
      	</form>
      </div>

</body>
</html>