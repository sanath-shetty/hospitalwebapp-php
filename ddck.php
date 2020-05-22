<?php
error_reporting(0);// With this no error reporting will be there
@$s_id=$_GET['s_id'];

/// Preventing injection attack //// 
if(!is_numeric($s_id)){
echo "Data Error";
exit;
}

/// end of checking injection attack ////
include 'connect.php';
$result = array();
if($stmt = $con->prepare("select doc_id,f_name,l_name from doctor_data where s_id=?")){
    $stmt->bind_param('i',$s_id);
    $stmt->execute();
    $stmt = $stmt->get_result();
    $no_of_records=$stmt->num_rows;
    while ($row = $stmt->fetch_assoc()) {
    $result[]=$row;
    }
}else{
  echo $con->error;
}

$main = array('data'=>$result,'no_of_records'=>$no_of_records);
echo json_encode($main);
?>
