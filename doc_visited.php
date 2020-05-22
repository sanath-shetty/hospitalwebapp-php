<?php 
    include 'connect.php';
    ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
    $id = $_GET['docv'];

    $sql = "SELECT * FROM ward_asgn a, patient_data b, building c, ward d WHERE a.p_id = b.p_id && a.bld_id = c.bld_id && a.w_id = d.w_id && a.wasgn_id = '$id'";
    $result = mysqli_query($con,$sql);

    while ($rows = mysqli_fetch_assoc($result)) {
        
        $pid = $rows['p_id'];
        $fname = $rows['f_name'];
        $lname = $rows['l_name'];
        $bldName = $rows['bld_name'];
        $wNum = $rows['w_num'];

    }

    if (isset($_POST['btn_save'])) {
        $docName = $_POST['docName'];

        $sql = "SELECT * FROM visited a, doctor_data b WHERE a.doc_id = b.doc_id && a.doc_id = '$docName' && a.wasgn_id = '$id'";
        $result = mysqli_query($con,$sql);

        if (mysqli_num_rows($result) > 0) {
            echo "Error from here";
            while ($rows = mysqli_fetch_assoc($result)) {
                
                $dfName = $rows['f_name'];
                $dlName = $rows['l_name'];
                $count = $rows['vis_count'];
                $inc_count = ++$count;

                echo "This If Works Fine";
                $sq = "UPDATE visited a SET `vis_count` = '$inc_count' WHERE doc_id = '$docName'";
                $ctn = mysqli_query($con,$sq);

                if ($ctn) {
                    echo "Count Updated Successfully";
                }else{
                    echo "Count Not Updated";
                }
                
            }
        }else{
            
            $sql = "INSERT INTO `visited`(`wasgn_id`, `doc_id`, `vis_count`) VALUES ('$id','$docName','1')";
            $result = mysqli_query($con,$sql);

            if ($result) {
                echo "data inserted";
            }else{
                echo "error occured";
            }
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="font.css">
	<link rel="stylesheet" href="doc_visited.css">
</head>
<body>

    <div class="container">
    	<?php include("cmn_file/login_topnav_patient.php"); ?>
    <section class="doc_vsec">
    	<p class="doc_vhead">Doctor Visited</p>
    	<form method="POST" action="">

    		<div style="width: 65%; margin: 2% auto;">
    			<input type="text" name="pg_id" placeholder="Patient Id" class="pg_id" value="<?php echo $pid; ?>" readonly>

    		    <input type="text" name="pg_fname" placeholder="Patient first name" class="pg_fname" value="<?php echo $fname; ?>" readonly>

    		    <input type="text" name="pg_lname" placeholder="Patient last name" class="pg_lname" value="<?php echo $lname; ?>" readonly><br>

    		    <input type="text" name="pg_building" placeholder="Building name" class="pg_building" value="<?php echo $bldName; ?>" readonly>

    		    <input type="text" name="pg_ward" placeholder="Ward number" class="pg_ward" value="<?php echo $wNum; ?>" readonly>
    		</div>
    		
    		<div>
    		<p class="cho_doc">Choose Doctor</p>
    		<select  class="sel_cdoc" name="spec" id="spec">
				<option></option>
				<?php
                include "connect.php";
                $sql= "SELECT * FROM d_specl ";
                $cnt = mysqli_query($con,$sql);

                if($cnt){

                    while ($row = mysqli_fetch_assoc($cnt)) {

                echo "<option value=".$row['s_id'].">".$row['s_name']."</option>";
                 }
                }else{
                echo $con->error;
                }

                echo "</select>

            <select name='docName' id='docName' class='sel_cdoc1'></select>"; ?><br><br>
            </div>
            <div align="center">
            	<input type="submit" name="btn_save" class="btn_save" value="Save"><br>
            </div>
            

    	</form>

    </section>
    </div>

    <script src="js/jquery-1.8.1.min.js"></script>
    <script>
        $(document).ready(function() {
        $('#spec').change(function(){

        var s_id=$('#spec').val();

        $('#docName').empty(); //remove all existing options
            
        $.get('ddck.php',{'s_id':s_id},function(return_data){
	        if(return_data.data.length>0){
		        $('#msg').html('');
                $.each(return_data.data, function(key,value){
		            $("#docName").append("<option value='"+ value.doc_id +"'>"+value.f_name+' '+value.l_name+"</option>");
	            });
	        }else{
	            $('#msg').html('Doctor Missing');
            }
        }, "json");

        });

        });
    </script>

</body>
</html>