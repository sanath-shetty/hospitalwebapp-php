<?php 
	session_start();
	$aid=$_SESSION['a_id'];
	if(!(isset($aid)))
	{
		header('location:login.php');
	}else {
		header('location:dashbord.php');
	}
?>