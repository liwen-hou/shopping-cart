<?php
	
	$title = "SHOPPING CART: REGISTER";	
	$content = "content/registerContent.php";
	$handler = "registerHandler.php";
	
	include("operations/display_result.php");
	
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
	

?>