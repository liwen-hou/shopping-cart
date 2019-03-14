<?php

	$title = "SHOPPING CART: VISION";
	$content = "content/visionContent.php";
			
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
