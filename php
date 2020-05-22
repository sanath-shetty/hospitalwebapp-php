1.connect
<?php
$mysqli = new mysqli("127.0.0.1", "root", "", "book", 3308);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

?>

2.edit
<?php include('connect-db.php');


$editid=$_GET["edit"];

$sql = "SELECT * FROM application where ap_id='$editid' LIMIT 1";
         $result = mysqli_query($mysqli, $sql);
         if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
            	$title=$row['ap_title'];
            	$decription=$row['ap_decription'];

            }
         } else {
            echo "invalid";
         }
if (isset($_POST["updateapplication"])) {       
$aptitle=$_POST["titileforapplication"];
$apdecription=$_POST["decriptionforapplication"]; 

$update = "UPDATE application SET ap_title='".$aptitle."' , ap_decription='".$apdecription."' WHERE ap_id='".$editid."'";
   
   if (mysqli_query($mysqli, $update)) {
      echo "Record updated successfully";
      header('location: editapp.php?edit='.$editid.'');
   } else {
      echo "Error updating record: " . mysqli_error($mysqli);
   }
   mysqli_close($mysqli);
}


?>

3.Login
<?php
session_start();
 include('connect-db.php');
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
$failed="";

if (isset($_POST["login"])) {
$email=$_POST["email"];
$password=$_POST["password"];

$sql = "SELECT * FROM userregister where ur_email='$email' && ur_password='$password'";
         $result = mysqli_query($mysqli, $sql);
         if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
               $_SESSION["securpin"]=$row["ur_id"];
            header('location: index.php');
            }
         } 

if (mysqli_query($mysqli, $sql)) {
             $failed="<div class='warndiv'><p class='warnlogin'><i class='fas fa-skull-crossbones'></i>Invalid e-mail/password</p></div>";
            } 
            $mysqli->close();
}
?>

4.User Registartion
<?php 
include('connect-db.php');
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
$success="";
if (isset($_POST["submitregform"])) {

$urname=$_POST["fullname"];
$uremail=$_POST["emailad"];
$urphone=$_POST["phoneno"];
$urpassword=$_POST["passwordr"];

$sql="INSERT INTO `userregister`(`ur_name`, `ur_email`, `ur_phone`, `ur_password`, `ur_time`, `ur_status`) VALUES ('$urname','$uremail','$urphone','$urpassword',now(),'1')";

if (mysqli_query($mysqli, $sql)) {
             $success="<p class='accountsuccess'>New Account created successfully</p>";
            } 
            $mysqli->close();
}
?>

5. Delete 
<?php
include('connect-db.php');

$deleteid=$_GET["del"];

$query = "DELETE FROM application WHERE ap_id='$deleteid' LIMIT 1";
$result = mysqli_query($mysqli,$query) or die ( mysqli_error());
header("Location: applications.php"); 
?>

6.Logout 
<?php
session_start();

if (session_status() == PHP_SESSION_ACTIVE) { session_destroy();header('location: admin.php'); } 
else {
	echo "LOGOUT ERROR";
}


?>

6. Edit {with images}
<?php include('connect-db.php');
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

$editid=$_GET["edit"];

$sql = "SELECT * FROM books where b_id='$editid' LIMIT 1";
         $result = mysqli_query($mysqli, $sql);
         if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
            	$btitle=$row["b_title"];
               $bprice=$row["b_price"];
               $bquantity=$row["b_quantity"];
               $bdecription=$row["b_decription"];
               $bfront=$row['b_front'];
               $bback=$row['b_back'];
            }
         } else {
            echo "invalid";
         }
if (isset($_POST["submit"])) {       
$title=$_POST["title"];
$price=$_POST["price"]; 
$quantity=$_POST["quantity"];
$decription=$_POST["decription"];
if(empty($_FILES['uploadfrontcover']['name'])){ $front=$bfront;} else{$front=$_FILES['uploadfrontcover']['name'];}
if(empty($_FILES['uploadbackcover']['name'])){ $back=$bback;} else{$back=$_FILES['uploadbackcover']['name'];}
echo $title;
$dir="upload/";
$frontimage=$_FILES['uploadfrontcover']['name'];
$fronttmp_name=$_FILES['uploadfrontcover']['tmp_name'];
echo $frontimage;
if($frontimage!="")
   {
         if(file_exists($dir.$frontimage))
         {
            $frontimage= time(). '_'.$frontimage;
         }

         $fdir= $dir.$frontimage;
         move_uploaded_file($fronttmp_name, $fdir);
   }
$backimage=$_FILES['uploadbackcover']['name'];
$backtmp_name=$_FILES['uploadbackcover']['tmp_name'];

if($backimage!="")
   {
         if(file_exists($dir.$backimage))
         {
            $backimage= time(). '_'.$backimage;
         }

         $fdir= $dir.$backimage;
         move_uploaded_file($backtmp_name, $fdir);
   }
   
   
$update = "UPDATE books SET b_title='".$title."' , b_price='".$price."' , b_decription='".$decription."' , b_quantity='".$quantity."', b_front='".$front."' 
, b_back='".$back."' WHERE b_id='".$editid."'";
   
   if (mysqli_query($mysqli, $update)) {
      echo "Record updated successfully";
      header('location: editb.php?edit='.$editid.'');
   } else {
      echo "Error updating record: " . mysqli_error($mysqli);
   }
   mysqli_close($mysqli);
} 


?>

7.