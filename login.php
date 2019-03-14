<?php

	include("operations\unset.php");

	$title = "SHOPPING CART: LOG-IN";
	$content = "content/loginContent.php";
	$handler = "loginHandler.php";
	
	
	
	session_start();	
	if(!empty($_SESSION['user']))
	{
		$user = $_SESSION['user'].", ";
		$message = "Welcome: ";
		$logout = "Log-out";
	}
	
	else if(empty($_SESSION['user']))
	{
		$message = "";
		$logout = "";
	}
	require("template.php");
	echo unset_registration();
	

?>