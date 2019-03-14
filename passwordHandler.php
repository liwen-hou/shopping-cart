<?php

	session_start();
		
	if(isset($_POST['cancel']))
	{
		if($_SESSION['userLevel'] == "AD")
		{
			require("viewUser.php");
		}
		
		else
		{
			require("viewAccount.php");
		}
	}
	
	if(isset($_POST['save']))
	{
		include("operations\connection.php");
		
		
		$user = $_SESSION['user'];
		
		$currentPass = $_POST['txtCurrentPass'];
		$newPass = $_POST['txtNewPass'];
		$confirmPass = $_POST['txtConfirmPass'];
		
		$queryPassword = "Select password 
							from tbl_s_systemuser
							where username = '$user'";
							
		$resultPassword = $connection->query($queryPassword);
		
		list($password) = $resultPassword->fetch_row();
		
		if($password != $currentPass)
		{
			$error = "ERROR:";
			$errorMessage = "Make sure your current password is correct.";
			
			require("password.php");
		}
		
		else
		{	
			if(empty($newPass))
			{
				$error = "ERROR: ";
				$errorMessage = "Password is required for the security of your account.";
				
				require("password.php");
			}
			
			else if($newPass != $confirmPass)
			{
				$error = "ERROR: ";
				$errorMessage = "Make sure that the password are match.";
				
				require("password.php");
			}
			
			
			else
			{
				$error = "INFORMATION: ";
				$errorMessage = "Change password is successful.";
				
				$queryUpdate = "Update tbl_s_systemuser set password = '$newPass'
									where username = '$user'";
									
				$resultUpdate = $connection->query($queryUpdate);
				
				if($_SESSION['userLevel'] == "AD")
				{
					require("viewUser.php");
				}
		
				else
				{
					require("viewAccount.php");
				}
			}
		
		}
		
		
	}

?>