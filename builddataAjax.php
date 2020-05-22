<?php
error_reporting(0);// With this no error reporting will be there
@$bld_id=$_GET['bld_id'];

if(!is_numeric($bld_id)){
echo "Data Error";
exit;
}

include 'connect.php';
$result = array();
if($stmt = $con->prepare("SELECT w_id,w_num,bld_id FROM ward WHERE status = '0' && bld_id=?")){
    $stmt->bind_param('i',$bld_id);
    $stmt->execute();
    $stmt = $stmt->get_result();
    $no_of_records = $stmt->num_rows;
    while ($row = $stmt->fetch_assoc()) {
    $result[]=$row;
    }
}else{
  echo $con->error;
}

$main = array('data'=>$result,'no_of_records'=>$no_of_records);
echo json_encode($main);
?>
