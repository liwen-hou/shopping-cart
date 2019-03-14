<?php

	session_start();	
	if(!empty($_SESSION['user']))
	{
		$user = $_SESSION['user'].", ";
		$message = "Welcome: ";
		$logout = "Log-out";
		
		$title = "SHOPPING CART: PRODUCT";
		$content = "content/updateViewCartContent.php";
		$handler = "updateViewCartHandler.php";
	}
	
	else if(empty($_SESSION['user']))
	{
		$message = "";
		$logout = "";
		
		$error = "ERROR: ";
		$errorMessage = "You are not authorized to view this page. Login your account first.";
		
		$title = "SHOPPING CART: LOG-IN";
		$content = "content/loginContent.php";
		$handler = "loginHandler.php";
	}
	require("template.php");

?>