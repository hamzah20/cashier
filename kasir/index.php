<?php 
	session_start();
	if(empty($_SESSION['user_id'])){
  		header('location:login.php');
	}
	else{
		header('location:dashboard_new.php');
	}

?>