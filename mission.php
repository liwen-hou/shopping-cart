<?php

	$title = "SHOPPING CART: MISSION";
	$content = "content/missionContent.php";
			
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
