<?php

	include("operations\connection.php");
	
	session_start();
 	$tempProdCode =  $_SESSION['updCartProdC'];
	$orNumber = $_SESSION['orderNumber'];
	
	$ordQuantity = $_POST['txtOrdQnty'];
	
	echo getPriceQuantity($tempProdCode);	
	$price = $GLOBALS["price"];
	$quantity = $GLOBALS["quantity"];
	
	$subtotal = $price * $ordQuantity;
	$newQuantity = $quantity - $ordQuantity;

	
	if(empty($ordQuantity))
	{
		$error = "ERROR:";
 		$errorMessage = "Sorry, you need to enter quantity.";
		require("updateViewCart.php");
	}
		
	else
	{
		$numRegExp = "([0-9])";
		$puncRegExp = "([:punct:])";
		if(eregi($numRegExp, $ordQuantity)==false)
		{
			
			$error = "ERROR:";
	 		$errorMessage = "Quantity must be in correct format.";
			require("updateViewCart.php");			
		}
		
		else if($ordQuantity > $quantity)
		{
			$error = "ERROR:";
	 		$errorMessage = "The quantity you entered is greater than the product available.";
			require("updateViewCart.php");				
		}
								
		else
		{
			
				$error = "INFORMATION:";
		 		$errorMessage = "Successfully update the cart. <a href=\"viewCart.php\"> Click Here</a> to go back to cart.";
																																		
				$queryUpdateDet = "Update tbl_t_shop_detail set quantity = '$ordQuantity', subtotal = '$subtotal' 
									where product_code = '$tempProdCode' and 
									transaction_number = '$orNumber'";
				$resultUpdateDet = $connection->query($queryUpdateDet);
																															
				require("updateViewCart.php");							
		}
	}

?>


<?
	function getPriceQuantity($prodCode)
	{
		include("operations\connection.php");
		
		$queryPrice = "Select quantity, price from tbl_s_product where product_code = '$prodCode'";
		$resultPrice = $connection->query($queryPrice);
		
		while($rows = $resultPrice->fetch_row())
		{					
			$GLOBALS["quantity"] = $rows[0];			
			$GLOBALS["price"] = $rows[1];
		}
				
	}
?>
