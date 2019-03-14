<?php

	if(isset($_POST['register'])) //Confirms if the register button is clicked
	{		
		session_start(); //Defines the session_start();
		include("operations/connection.php");	//import the connection string
		
		//Get html object value and declare as a php local variable
		$lastname = $_POST['txtLname']; 
		$firstname = $_POST['txtFname'];
		$username = $_POST['txtUsername'];
		$password = $_POST['txtPass'];
		$confirmPassword = $_POST['txtConfirmPass'];
		$address = $_POST['txtAddress'];
		$country = $_POST['country'];
		$phone = $_POST['txtPhone'];
		$mobile = $_POST['txtMobile'];
		$email = $_POST['txtEmail'];
		//end of getting the value
				
		//Evaluate if required fiels is empty
		if(empty($_POST['txtLname']) || empty($_POST['txtFname']) || empty($_POST['txtUsername']) || empty($_POST['txtPass']) || empty($_POST['txtConfirmPass'])  || empty($_POST['txtAddress']) || empty($_POST['txtPhone']) || empty($_POST['txtMobile']) || empty($_POST['txtEmail']))
		{
			$error = "ERROR: ";
			$errorMessage = "All fields that has (*) are required.";
			
			echo session($firstname, $lastname, $username, $address, $phone, $mobile, $email);							
			require("register.php");										
		}//End of evaluating empty fields
		
		//Evaluate if all required field had been filled up
		else if(!empty($_POST['txtLname']) || !empty($_POST['txtFname']) || !empty($_POST['txtUsername']) || !empty($_POST['txtPass']) || !empty($_POST['txtConfirmPass'])  || !empty($_POST['txtAddress']) || !empty($_POST['txtPhone']) || !empty($_POST['txtMobile']) || !empty($_POST['txtEmail']))
		{	
			
			//evalutes if email address is valid
			$regexp = "^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+)(\.[a-z0-9-]+)*(\.[a-z]{2,6})$";
			
			//validation for numeric characters
			$numRegExp = "([0-9])";
			
			//validation of alphabet characters
			$strRegExp = "([A-Z])";
			
			//Query for validating username
			$queryUsername = "Select username from tbl_s_systemuser where username = '$username'";
			$resultUsername = $connection->query($queryUsername);
			//End of query for username
			
			//Query for getting the country code of a particular country
			$queryCountry = "Select country_code from tbl_u_country where country_name = '$country'";
			$resultCountry = $connection->query($queryCountry);
			//End of query for country
			
			//Query for validating email address
			$queryEmail = "Select email_address from tbl_s_customer where email_address = '$email'";
			$resultEmail = $connection->query($queryEmail);
			//End of query for email address
			
			//Display the result of the above queries
			list($tempUsername)=$resultUsername->fetch_row();
			list($tempEmail)=$resultEmail->fetch_row();
			list($tempCountry)=$resultCountry->fetch_row();								
			//end of getting the result
			
			if(eregi($numRegExp, $lastname)) //Evaluate last name if it is pure alphabet
			{
				$error = "ERROR:";
 				$errorMessage = "Invalid Last Name.";
				
				echo session($firstname, $lastname, $username, $address, $phone, $mobile, $email);
				require("register.php");												
			}
			
			else if(eregi($numRegExp, $firstname)) //Evaluate first name it is pure alphabet
			{
				$error = "ERROR:";
 				$errorMessage = "Invalid First Name.";
				
				echo session($firstname, $lastname, $username, $address, $phone, $mobile, $email);
				require("register.php");								
			}
			
			else if($password != $confirmPassword) //Evaluate if the password and confirm password match
			{
				$error = "ERROR:";
 				$errorMessage = "Make sure that the password match.";	
				
				echo session($firstname, $lastname, $username, $address, $phone, $mobile, $email);
				require("register.php");								
			}	
									
			else if(eregi($strRegExp, $phone)) //Evaluate if the phone number is pure numeric
			{
				$error = "ERROR:";
 				$errorMessage = "Invalid Phone Number.";
				
				echo session($firstname, $lastname, $username, $address, $phone, $mobile, $email);
				require("register.php");								
			}
			
			else if(eregi($strRegExp, $mobile)) //Evaluate if the mobile number is pure numeric
			{
				$error = "ERROR:";
 				$errorMessage = "Invalid Mobile Number.";	
				
				echo session($firstname, $lastname, $username, $address, $phone, $mobile, $email);
				require("register.php");																			
			}
			
			else if(strlen($phone) < 7) //Evaluate if the phone must not be less that 7 digit
			{
				$error = "ERROR:";
 				$errorMessage = "Phone Number must be 7 digit or above.";	
				
				echo session($firstname, $lastname, $username, $address, $phone, $mobile, $email);
				require("register.php");																			
			}		
			
			else if(strlen($mobile) < 11) //Evaluate if the mobile number must not be less the 11 digit
			{
				$error = "ERROR:";
 				$errorMessage = "Mobile Number must be 11 digit.";	
				
				echo session($firstname, $lastname, $username, $address, $phone, $mobile, $email);
				require("register.php");																			
			}
			
			else if(eregi($regexp, $email) == false) //Evaluate if the email address is in correct format
			{
				$error = "ERROR:";
 				$errorMessage = "Invalid Email-Address.";	
				
				echo session($firstname, $lastname, $username, $address, $phone, $mobile, $email);
				require("register.php");						
			}											
									
			else if($username == $tempUsername) //Evaluate if the username already exists
			{
				$error = "ERROR:";
 				$errorMessage = "Username already exist. Try a new one.";	
				
				session($firstname, $lastname, $username, $address, $phone, $mobile, $email);
				require("register.php");																			
			}
						
			
			else if($email == $tempEmail) //Evaluate if the email address already exists
			{
				$error = "ERROR:";
 				$errorMessage = "Email Address already exist. Try a new one.";	
				
				session($firstname, $lastname, $username, $address, $phone, $mobile, $email);
				require("register.php");											
			}
				
			
			else
			{				
				//perform insertion if the all the fields filled are valied							
				$insertUser = "Insert into tbl_s_systemuser  values('$username', '$password', 'LT')";
				$insertCustomer = "Insert into tbl_s_customer values('$username', '$lastname', '$firstname', '$address', '$tempCountry', '$mobile', '$phone', '$email')";
				$resultInsertUser =  $connection->query($insertUser);
				$resultInsertCustomer = $connection->query($insertCustomer);			
				
				require("registrationResult.php");
	
			}
																					
		}		
	}

?>

<?
	function session($firstname, $lastname, $username, $address, $phone, $mobile, $email)
	{
			session_start();
			
			$_SESSION['firstname'] = $firstname;						
			$_SESSION['lastname'] = $lastname;
			$_SESSION['username'] = $username;
			$_SESSION['address'] = $address;
			$_SESSION['phone'] = $phone;											
			$_SESSION['mobile'] = $mobile;
			$_SESSION['email'] = $email;	
	}
?>