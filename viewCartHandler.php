<?php
	session_start();
	$orNumber = $_SESSION['orderNumber'];
	
	if(isset($_POST['payCart']))
	{
		include("operations\connection.php");
		
		$query = "Select transaction_number from tbl_t_shop_detail where transaction_number = '$orNumber'";
		$result = $connection->query($query);
		
		list($valid) = $result->fetch_row();
		
		if(empty($valid))
		{
			$error = "ERROR:";
 			$errorMessage = "There is no product in this cart for you to buy.";
			require("viewCart.php");			
		}
		else
		{
			require("payViewCart.php");
		}
	}
	
	if(isset($_POST['currentCart']))
	{
		require("viewCart.php");
	}
	
	if(isset($_POST['rescentCart']))
	{
		require("viewAllCart.php");
	}
	if(isset($_POST['updateCart']))
	{
		if(empty($_POST['prodCode']))
		{	
			$error = "ERROR:";
 			$errorMessage = "Before you cand update, choose a product first.";
			require("viewCart.php");
			session_start();										
		}
		
		else
		{
			foreach($_POST['prodCode'] as $prodCode)
			{
				$prodCode = htmlentities($prodCode);
			
			}	
		
			$_SESSION['updCartProdC'] = $prodCode;
			require("updateViewCart.php");
		}
	
	}
	
	if(isset($_POST['deleteCart']))
	{
		if(empty($_POST['prodCode']))
		{	
			$error = "ERROR:";
 			$errorMessage = "Before you cand delete, choose a product first.";
			require("viewCart.php");
			session_start();					
					
		}
		
		else
		{
			foreach($_POST['prodCode'] as $prodCode)
			{
				$prodCode = htmlentities($prodCode);
				
			}	
		
			$_SESSION['delCartProdC'] = $prodCode;
			require("deleteViewCart.php");
		}
	}
	
?>