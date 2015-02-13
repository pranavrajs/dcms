<?php
	require 'core.inc.php';
	if(loggedin()) {	
		unset($_SESSION['username']);
		unset($_SESSION['adm_level']);
		session_destroy();
		echo "You are logged out";
	}
		header('Location:index.php');	
?>