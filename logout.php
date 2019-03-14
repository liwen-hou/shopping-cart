<?php
	
	include("operations/unset_transaction.php");
	
	session_start();
	echo unset_transaction();	
	session_destroy();
		
	unset($_SESSION['user']);
	unset($_SESSION['userLevel']);
	
			
	require("login.php");
	

?>

