<?php 

    if (isset($_POST['-'])) {
    	
    	require 'connect.php';

    	$userid = $_POST['--'];
    	$password = $_POST['--'];

    	if (empty($userid) || empty($password)) {
    		header("location:index.php?error=emptyFields");
    		exit();
    	}
    	else {
    		
    	}
    }
    else {
    	header("location:/include/index.php");
    	exit();
    }



 ?>