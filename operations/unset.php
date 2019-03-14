<?php
	//This function will unset all the session variable used in registration if the customer leave
	//the registration page.
	function unset_registration()
	{
		session_start();
				
		unset($_SESSION['lastname']);
		unset($_SESSION['firstname']);
		unset($_SESSION['username']);
		unset($_SESSION['address']);
		unset($_SESSION['mobile']);
		unset($_SESSION['phone']);
		unset($_SESSION['email']);
	}
		
?>