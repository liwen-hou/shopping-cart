<?php

	if(isset($_POST['add']))
	{		
		require("productAdd.php");
	}
	
	if(isset($_POST['update']))
	{
		if(empty($_POST['prodCode']))
		{
			
			$error = "ERROR:";
 			$errorMessage = "Choose a product to update.";
			require("productView.php");
			session_start();							
		}
	
		else
		{
			foreach($_POST['prodCode'] as $productCode)
			{
				$productCode = htmlentities($productCode);
			
			}
	
			session_start();			
			$_SESSION['prodCode'] = $productCode;
			require("productUpdate.php");
		
		
	}
	}
?>