<?php 
    include 'connect.php';
    ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
    $id = $_GET['discg'];

    $sql = "SELECT * FROM ward_asgn a, patient_data b, building c, ward d WHERE a.p_id = b.p_id && a.bld_id = c.bld_id && a.w_id = d.w_id && a.wasgn_id = '$id'";
    $result = mysqli_query($con,$sql);

    while ($rows = mysqli_fetch_assoc($result)) {
        
      $p_id = $rows['p_id'];
      $fname = $rows['f_name'];
      $lname = $rows['l_name'];
      $bgroup = $rows['blood_group'];
      $age = $rows['age'];
      $building = $rows['bld_name'];
      $ward = $rows['w_num'];
      $wchrg = $rows['w_chrg'];

    }
?>
<?php 
    $dayCount = "0";
    $dayChrg = "0";
    $tot_dchrg = "0";
    if (isset($_POST['count'])) {
          $dayCount = $_POST['count'];
    }

    if (isset($_POST['chrg'])) {
          $dayChrg = $_POST['chrg'];
    }

    ?>
    <?php
if (isset($_POST['fname'])) {
  $docFname = $_POST['fname'];

  // $array = array('sanath','mastru','doctor','haha');
  // echo $array;
  //  $docImp = implode(',',$docFname);

  foreach ($docFname as $key => $value)  {
    echo $key.'='.$value;
    }
} 

?>
<!DOCTYPE html>
<html>
<head>
<!-- <style> 
#myDIV {
  border: 1px solid black;
  background-color: lightblue;
  width: 270px;
  height: 100px;
  display: none;
}
</style>
</head>
<body>

<p>Mouse over the DIV element and it will change, both in color and size!</p>

<p>Click the "Try it" button and mouse over the DIV element again. The change will now happen gradually, like an animation:</p>

<a onmouseover="myFunction()" onmouseout="myFunction1()">Try it</a>

<div id="myDIV">
  <h1>myDIV</h1>
</div>









<script>
// function myFunction() {
//   document.getElementById("myDIV").style.transition = "all 2s";
// }
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display == "block") {
    x.style.display = "none";
  }else{
    x.style.display = "block";
  }
}
function myFunction1() {
  var x = document.getElementById("myDIV");
  if (x.style.display == "none") {
    x.style.display = "block";
  }else{
    x.style.display = "none";
  }
}
</script> -->

<?php 
        include 'connect.php';
                ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

                $sql = "SELECT a.vis_count, b.f_name,b.l_name, b.vis_chrg FROM visited a, doctor_data b WHERE a.doc_id = b.doc_id && a.wasgn_id = '$id'";
                $result = mysqli_query($con,$sql);

                
                  
                if (($visit = mysqli_num_rows($result)) > 0) {
                  
                  while ($rows = mysqli_fetch_array($result)) {
                    $fname = $rows['f_name'];
                    $lname = $rows['l_name'];
                    $count = $rows['vis_count'];
                    $chrg = $rows['vis_chrg'];

                    foreach ($docFname as $key => $value)  {
                        
                        while (list($key, $value) = @each($each_item)) {
                          
                          $counts = $each_item['count'];
                          echo $counts;
                        }
                        
                        }

                    
                    
                ?>
            <tr>
        <td class="td_left" align="center">
          
          <input type="text" name="fname[]" class="inp_docname" value="<?php echo $fname.' '.$lname; ?>" readonly="">
        </td>
        <td class="td_right">
          
          <input type="text" name="count" class="inp_docchrg" value="<?php echo $count; ?>" readonly="">
          <input type="text" name="chrg" class="inp_docchrg" value="<?php echo $chrg; ?>" readonly="">
          <?php 
          $tot_dchrg = $dayCount * $dayChrg;
          ?>
                    <input type="text" name="tot_dchrg" class="inp_docchrg" value="<?php echo $tot_dchrg; ?>" readonly="">
                    
                    
          </td>
          </tr>
      <?php 

            }
        }
                else{
                  echo "Error Occured";
                }
               ?>
<input type="submit" name="" value="submit">

<!-- <?php 
include 'connect.php';

$sql = "SELECT * FROM `appointment` WHERE `apnt_id` = 3";
$ctn = mysqli_query($con,$sql);
$rows = mysqli_fetch_assoc($ctn);

$str = $rows['apnt_time'];
$dt = $rows['apnt_date'];
echo date('d M ', strtotime($str));
echo date('d M Y', strtotime($dt));
echo date('g:i A', strtotime($str));

?>
<form method="POST">

<div id=msg> &nbsp;</div>
        <select name="bld_id" id="bld_id">
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

                echo "</select><select name='w_id' id='w_id'></select>";?>
</form>
<script src="../js/jquery-1.8.1.min.js"></script>
<script>
$(document).ready(function() {

$('#bld_id').change(function(){

var bldId = $('#bld_id').val();

$('#w_id').empty();

$.get('builddataAjax.php',{'bld_id':bldId},function(return_data){
  if(return_data.data.length > 0){
    $('#msg').html( return_data.data.length + 'Records found');
        $.each(return_data.data, function(key,value){
    $("#w_id").append("<option value='"+value.w_id+"'>"+value.w_num+"</option>");
  });
  }else{
  $('#msg').html('No records found');
}
}, "json");

});

});
</script> -->

</body>
</html>