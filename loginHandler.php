<?php

	if(isset($_POST['btnLogin']))
	{										
		include("operations/display_result.php");
			
		if(empty($_POST['txtUser']) || empty($_POST['txtPass']))
		{
			$error = "ERROR: ";
			$errorMessage = "Fill up all fields.";
			require("login.php");
		}
		
		else if(!empty($_POST['txtUser']) || !empty($_POST['txtPass']))
		{							
			include("operations/unset_transaction.php");			
			echo unset_transaction();				
			echo authenticate($_POST['txtUser'], $_POST['txtPass']);
						
		}	
												
	}

?>