<?php
	if(empty($_POST['prodCode']))
	{
		
		$error = "ERROR:";
 		$errorMessage = "Choose a product.";
		require("product.php");
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
		require("newCart.php");
		
		
	}
	

?>