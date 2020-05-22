<!DOCTYPE html>
<html>
<head>
	<title>Sanjivini Hospital-MeetDoctor</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="font.css">
	<link rel="stylesheet" href="viewbills.css">
</head>
<body>
<div class="container">
	<?php include("cmn_file/login_topnav_default.php"); ?>
	    <section class="bill_search">
	    	<form action="" method="POST" style="display: flex;">
	    		<input type="date" name="" class="inp_date">
	    	    <input type="text" name="" placeholder="Patient Id/Name"
	    	    class="inp_name">
	    	    <p class="btn_search">Search</p>
	    	</form>
	    </section>
	    <section class="vb_sec">
	    	<p class="vb_head">View Bills</p>
	    	<table class="tb_vbill">
	    		<tr>
	    			<th>Date</th>
	    			<th>Patient Id</th>
	    			<th>Operation</th>
	    		</tr>
	    		<tr>
	    			<td></td>
	    			<td></td>
	    			<td>
	    				<div class="btn_view_edit">
	    					<a href="" class="a_style">Edit/View</a>
	    				</div>
	    				<div class="btn_delete">
	    					<a href="" class="a_style">Delete</a>
	    				</div>
	    			</td>
	    		</tr>
	    	</table>
	    </section>
</div>
</body>
</html>