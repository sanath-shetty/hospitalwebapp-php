<!DOCTYPE html>
<html>
<head>
	<title>Sanjivini Hospital-MeetDoctor</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="font.css">
	<link rel="stylesheet" href="meetdoctor.css">
</head>
<body>
<div class="container">
	<?php include("cmn_file/topnav_default.php"); ?>
	<section class="slider_sec">
		<p class="slider_head">Meet our Doctors</p>
		<div class="quick_link">
			<p class="quick_link_head">Quick links</p>
			<hr class="hr1">
			<div style="display: flex;">
				<p class="quick_head">Contact us</p>
				<hr style="margin: 12px;">
				<p class="quick_head" style="padding-left: 0;">Make an appointment</p>
			</div>
		</div>
	</section>
	<section class="searchdoc_sec">
		<p class="searchdoc_head">Search Doctors</p>
		<form method="POST" action="">
		<div class="search_op">
			<select class="op_list" name="drop_spec">
				<option>All</option>
				<?php 
				    include 'connect.php';

				    $sql = "SELECT * FROM d_specl";
				    $result = mysqli_query($con,$sql);

				    if (mysqli_num_rows($result) > 0) {
				    	while ($rows = mysqli_fetch_array($result)) { ?>
				    		<option value="<?php echo $rows['s_id']; ?>"><?php echo $rows['s_name']; ?></option>
				<?php   }
				    }
				?>
			</select>
			<p class="op_or">OR</p>
			<input type="text" name="inp_name" class="input1">
		</div>
		<button class="btn_search" name="btn_search">Search</button>
	    </form>
	</section>
	<hr class="hr2">
	<section class="doc_list">
		<div class="row">
			<?php 
                include 'connect.php';
                ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
                $f_name = "";
                $l_name = "";

                if (isset($_POST['btn_search'])) {
    	
    	            if (!empty($_POST['drop_spec'])) {
    		            $drop_spec = $_POST['drop_spec'];

    		            $sql = "SELECT * FROM doctor_data a, d_specl b, d_qualific c WHERE a.s_id = b.s_id && a.q_id = c.q_id && a.s_id = '$drop_spec'";
    		            $result = mysqli_query($con,$sql);

    		            if (mysqli_num_rows($result) > 0) {
    		            	while ($rows = mysqli_fetch_array($result)) { 
    		            		$f_name = $rows['f_name'];
    		            		$l_name = $rows['l_name'];
    		            		$specl = $rows['s_name'];
    		            		$qualific = $rows['q_name'];
    		            		?>
    		            		<div class="box">
			                        <img src="uploads/<?php echo $rows['doc_img']; ?>" class="img_prop1">
				                    <div class="overlap">
					                    <div class="inner_cont">
					                    		<p class="doc_name"><?php echo $f_name.' '.$l_name; ?></p>
						                    <p class="doc_qualific"><?php echo $specl; ?></p>
						                    <p class="doc_spec"><?php echo $qualific; ?></p>
					                    </div>
				                    </div>
				                    <!-- <div class="overlap1">
					                    <i class="fas fa-user-md"></i><br>
					                    <a href="" class="a_bookapp">Book Appointment</a>
				                    </div> -->
			                    </div>
    		<?php           }
    		            }
    	            }

    	            if(!empty($_POST['inp_name'])){
    	            	$inp_name = $_POST['inp_name'];

    	            	$sql = "SELECT * FROM doctor_data a, d_specl b, d_qualific c WHERE a.s_id = b.s_id && a.q_id = c.q_id && a.f_name LIKE '$inp_name%'";
    	            	$result = mysqli_query($con,$sql);

    		            if (mysqli_num_rows($result) > 0) {
    		            	while ($rows = mysqli_fetch_array($result)) { 
    		            		$f_name = $rows['f_name'];
    		            		$l_name = $rows['l_name'];
    		            		$specl = $rows['s_name'];
    		            		$qualific = $rows['q_name'];
    		            		?>
    		            		<div class="box">
			                        <img src="uploads/<?php echo $rows['doc_img']; ?>" class="img_prop1">
				                    <div class="overlap">
					                    <div class="inner_cont">
					                    		<p class="doc_name"><?php echo $f_name.' '.$l_name; ?></p>
						                    <p class="doc_qualific"><?php echo $specl; ?></p>
						                    <p class="doc_spec"><?php echo $qualific; ?></p>
					                    </div>
				                    </div>
				                    <!-- <div class="overlap1">
					                    <i class="fas fa-user-md"></i><br>
					                    <a href="" class="a_bookapp">Book Appointment</a>
				                    </div> -->
			                    </div>
    		<?php           }
    		            }
    	            }
                }else{
                	$sql = "SELECT * FROM doctor_data a, d_specl b, d_qualific c WHERE a.s_id = b.s_id && a.q_id = c.q_id";
    		        $result = mysqli_query($con,$sql);

    		        if (mysqli_num_rows($result) > 0) {
    		            while ($rows = mysqli_fetch_array($result)) { 
    		                $f_name = $rows['f_name'];
    		                $l_name = $rows['l_name'];
    		                $specl = $rows['s_name'];
    		                $qualific = $rows['q_name'];
    		                ?>
    		        <div class="box">
			            <img src="uploads/<?php echo $rows['doc_img']; ?>" class="img_prop1">
				        <div class="overlap">
					        <div class="inner_cont">
					            <p class="doc_name"><?php echo $f_name.' '.$l_name; ?></p>
						        <p class="doc_qualific"><?php echo $specl; ?></p>
						        <p class="doc_spec"><?php echo $qualific; ?></p>
					        </div>
				        </div>
				        <!-- <div class="overlap1">
					        <i class="fas fa-user-md"></i><br>
					        <a href="" class="a_bookapp">Book Appointment</a>
				        </div> -->
			        </div>
    		<?php       }
    		        }
                }         
            ?>
			
		</div>
	</section>
	<?php include("cmn_file/footer_default.php"); ?>
</div>
</body>
</html>