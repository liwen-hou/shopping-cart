<?php

	if(isset($_POST['save']))
	{
		include("operations\connection.php");
		session_start();
						
		if(empty($_POST['txtLname']) || empty($_POST['txtFname']) || empty($_POST['txtUsername']) || empty($_POST['txtAddress']) || empty($_POST['txtPhone']) || empty($_POST['txtMobile']) || empty($_POST['txtEmail']))
		{
			$error = "ERROR: ";
			$errorMessage = "Fill up all fields.";								
			require("viewAccount.php");										
		}
		
		else
		{	
								
			$lastname = $_POST['txtLname'];
			$firstname = $_POST['txtFname'];
			$username = $_POST['txtUsername'];		
			$address = $_POST['txtAddress'];
			$country = $_POST['country'];
			$phone = $_POST['txtPhone'];
			$mobile = $_POST['txtMobile'];
			$email = $_POST['txtEmail'];
			
			$user = $_SESSION['user'];
			
			$regexp = "^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+)(\.[a-z0-9-]+)*(\.[a-z]{2,6})$";	
			$numRegExp = "([0-9])";
			$strRegExp = "([A-Z])";
						
			$queryCountry = "Select country_code from tbl_u_country where country_name = '$country'";
			$resultCountry = $connection->query($queryCountry);
			
			$queryEmail = "Select email_address from tbl_s_customer where email_address = '$email' and username != '$user'";
			$resultEmail = $connection->query($queryEmail);
			
			
			list($tempEmail)=$resultEmail->fetch_row();
			list($tempCountry)=$resultCountry->fetch_row();
			
			
			
			if(eregi($numRegExp, $lastname))
			{
				$error = "ERROR:";
 				$errorMessage = "Invalid Last Name.";
				require("viewAccount.php");												
			}
			
			else if(eregi($numRegExp, $firstname))
			{
				$error = "ERROR:";
 				$errorMessage = "Invalid First Name.";
				require("viewAccount.php");								
			}					
			
			else if(eregi($strRegExp, $phone))
			{
				$error = "ERROR:";
 				$errorMessage = "Invalid Phone Number.";
				require("viewAccount.php");								
			}
			
			else if(eregi($strRegExp, $mobile))
			{
				$error = "ERROR:";
 				$errorMessage = "Invalid Mobile Number.";	
				require("viewAccount.php");																			
			}		
			
			else if(strlen($phone) < 7)
			{
				$error = "ERROR:";
 				$errorMessage = "Phone Number must be 7 digit or above.";	
				require("register.php");																			
			}		
			
			else if(strlen($mobile) < 11)
			{
				$error = "ERROR:";
 				$errorMessage = "Mobile Number must be 11 or 13 digit.";	
				require("register.php");																			
			}					
			
			else if(eregi($regexp, $email) == false)
			{
				$error = "ERROR:";
 				$errorMessage = "Invalid Email-Address.";	
				require("viewAccount.php");						
			}											
												
			else if($email == $tempEmail)
			{
				$error = "ERROR:";
 				$errorMessage = "Email Address already exist. Try a new one.";	
				require("viewAccount.php");											
			}
				
			
			else
			{
				$error = "INFORMATION: ";
				$errorMessage = "Save successful.";
								
				$queryUpdate = "Update tbl_s_customer set customer_last_name = '$lastname', customer_first_name = '$firstname',
								customer_address = '$address', country_code = '$tempCountry', 
								mobile_number = '$mobile', phone_number = '$phone', email_address = '$email'
								where username = '$user'";
								
				$resultUpdate = $connection->query($queryUpdate);
																			
				require("viewAccount.php");
	
			}														
		}		
	}

?>