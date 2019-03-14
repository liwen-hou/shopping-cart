<?php
	
	$orderQuantity = $_POST['txtOrdQnty'];
	session_start();
	$_SESSION['order'] = "0";
	$prodCode = $_SESSION['prodCode'];	
	$user = $_SESSION['user'];
	
	include("operations\connection.php");
	
	echo setOrderNumber();
	echo getPriceQuantity($prodCode);	
	$orderNumber = $GLOBALS["orderNumber"];				
	$price = $GLOBALS["price"];
	$quantity = $GLOBALS["quantity"];
	
	echo evaluateCart($orderNumber, $prodCode);
	
	$_SESSION['orderNumber'] = $orderNumber;
	
	$dateOrdered = date("Y-n-d");	
	
	$subtotal = $price * $orderQuantity;
	$newQuantity = $quantity - $orderQuantity;
		
	if(empty($orderQuantity))
	{
		$error = "ERROR:";
 		$errorMessage = "Sorry, you need to enter quantity.";
		require("newCart.php");
	}
		
	else
	{
		$numRegExp = "([0-9])";
		$puncRegExp = "([:punct:])";
		if(eregi($numRegExp, $orderQuantity)==false)
		{
			
			$error = "ERROR:";
	 		$errorMessage = "Quantity must be in correct format.";
			require("newCart.php");			
		}
		
		else if($orderQuantity > $quantity)
		{
			$error = "ERROR:";
	 		$errorMessage = "The quantity you entered is greater than the product available.";
			require("newCart.php");				
		}
								
		else
		{
			if($GLOBALS["ordered"] == "1")
			{
				$error = "ERROR: ";
				$errorMessage = "You have already ordered this product. If you want to update this, <a href=\"viewCart.php\">Click here. </a>";
				
				require("newCart.php");	
			}
			
			else
			{
				$error = "INFORMATION:";
		 		$errorMessage = "Successfully add to cart. <a href=\"viewCart.php\"> CLICK HERE </a> to view the current cart.";
																																		
				$queryInsert = "Insert into tbl_t_shop_detail values('$orderNumber', '$prodCode', '$orderQuantity', '$subtotal')";																																
				$resultInsert = $connection->query($queryInsert);
													
				require("product.php");					
			}
		}
	}

?>


<?
	function setOrderNumber()
	{
		include("operations\connection.php");
		
		$queryOR = "Select transaction_number from tbl_t_shop_header order by transaction_number desc";	
		$resultOR = $connection->query($queryOR);		
		
		//$queryORnew = "Select transaction_number from tbl_t_shop_detail order by transaction_number desc";
		//$resultORnew = $connection->query($queryORnew);
		
		list($newOR)= $resultOR->fetch_row();	
		
		if(empty($newOR))
		{
			$GLOBALS["orderNumber"] = 'ORN1000001';
		}			
		
		else
		{
			$tempNewOR = str_replace("ORN","0",$newOR);
			$tempOrderNumber = $tempNewOR+1;
			$GLOBALS["orderNumber"] = str_replace(substr($newOR, 3), $tempOrderNumber, $newOR);						
		}
	}
	
	
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
	
	function evaluateCart($ORNumber, $prodCode)
	{
		include("operations\connection.php");
		
		$queryEvaluate = "Select transaction_number, product_code from tbl_t_shop_detail 
						where transaction_number = '$ORNumber' and product_code = '$prodCode'";
		
		$resultEvaluate = $connection->query($queryEvaluate);
		
		while($rows = $resultEvaluate->fetch_row())
		{
			$tempOR = $rows[0];
			$tempPC = $rows[1];
		}		
		
		if(!empty($tempOR) && !empty($tempPC))
		{
			
			$GLOBALS["ordered"] = "1";
		}
		
		else
		{
			$GLOBALS["ordered"] = "0";
		}
		
	}
	
?>
