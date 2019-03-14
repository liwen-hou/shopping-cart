<?php
	
			
	function countries()
	{
		include("connection.php");	
		

		$query = "Select country_name from tbl_u_country order by country_name asc";
		$result = $connection->query($query);
						
		while(list($country_name) = $result->fetch_row())
		{
			echo "<option> $country_name </option>";
		}
	}
	
	
	
	function authenticate($username, $password)
	{
		include("connection.php");
		
		$query = "Select password, user_level from tbl_s_systemuser where username = '$username'";
		$result = $connection->query($query);
				
		while($rows = $result->fetch_row())
		{
			$tempPassword = $rows[0];
			$tempUserLevel = $rows[1];
		}
		
		
		if($password == $tempPassword)
		{
			
			session_start();
			$_SESSION['user'] = $username;	
			$_SESSION['userLevel'] = $tempUserLevel;
					
			require("home.php");		
		}
		
		else if($password != $tempPassword)
		{
			$error = "ERROR:";
 			$errorMessage = "Not a valid user.";
			require("login.php");
		}				

	}		
	
?>
