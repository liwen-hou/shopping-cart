<?php
	include("operations\connection.php");
	
	session_start();	
	if(isset($_POST['cnclCart']))
	{
		require("ViewCart.php");
	}

	if(isset($_POST['payCart']))
	{
		
		$cardNumber = $_POST['txtCardNumber'];
		$cardCode = $_POST['txtCode'];
		$shipAddress = $_POST['txtShipAddress'];
		
		$numRegExp = "([0-9])";
		$date = date("Y-n-d");
		
		$orderNumber = $_SESSION['orderNumber'];
		$totalAmount = $_SESSION['totalSum'];
		$user = $_SESSION['user'];
		
		if(empty($cardNumber) || empty($cardCode) || empty($shipAddress))
		{
			$error = "ERROR: ";
			$errorMessage = "Fill up all input fields.";
			
			require("payViewCart.php");
		}
		
		if($_POST['card'] == "VISA")
		{
			
						
			if(eregi($numRegExp, $cardNumber) == false)
			{
				$error = "ERROR: ";
				$errorMessage = "Invalid visa card number format.";				
				
				require("payViewCart.php");
			}
			
			else if(eregi($numRegExp, $cardCode) == false)
			{
				$error = "ERROR: ";
				$errorMessage = "Invalid visa card code format.";				
				
				require("payViewCart.php");
			}
			
			else if(strlen($cardNumber) < 16)
			{
				$error = "ERROR: ";
				$errorMessage = "Visa card number must be 16 digit.";	
				
				require("payViewCart.php");											
			}
			
			else if(strlen($cardCode) < 3)
			{
				$error = "ERROR: ";
				$errorMessage = "Visa card authorization code must be 3 digit.";
				
				require("payViewCart.php");	
			}
			
			else
			{
				echo update($orderNumber);
				
				$queryInsert = "Insert into tbl_t_shop_header values('$orderNumber', 
																'$date', '$user', 
																'$shipAddress', '$totalAmount', 
																'$cardNumber')";
				$resultInsert = $connection->query($queryInsert);
				
				require("resultPayment.php");
			}
			
			
		}
				
		else if($_POST['card'] == "MASTER")
		{
			if(eregi($numRegExp, $cardNumber) == false)
			{
				$error = "ERROR: ";
				$errorMessage = "Invalid master card number format.";				
				
				require("payViewCart.php");
				
			}
			
			else if(eregi($numRegExp, $cardCode) == false)
			{
				$error = "ERROR: ";
				$errorMessage = "Invalid master card code format.";				
				
				require("payViewCart.php");
			}
			
			else if(strlen($cardNumber) < 16)
			{
				$error = "ERROR: ";
				$errorMessage = "Visa card number must be 16 digit.";	
				
				require("payViewCart.php");											
			}
			
			else if(strlen($cardCode) < 4)
			{
				$error = "ERROR: ";
				$errorMessage = "Master card authorization code must be 4 digit.";
				
				require("payViewCart.php");	
			}
			
			else
			{	
				echo update($orderNumber);
				
				$queryInsert = "Insert into tbl_t_shop_header values('$orderNumber', 
																'$date', '$user', 
																'$shipAddress', '$totalAmount', 
																'$cardNumber')";
				$resultInsert = $connection->query($queryInsert);

											
				require("resultPayment.php");
			}
											
		}
		
		
		else
		{
			$error = "ERROR: ";
			$errorMessage = "Choose the type of card you will going to use for payment.";
			
			require("payViewCart.php");
		}
	}
	
?>

<?
	function update($transNumber)
	{
		include("operations\connection.php");
		
		$querySelect = "Select product_code, quantity
						from tbl_t_shop_detail
						where transaction_number = '$transNumber'";
		
		$resultSelect = $connection->query($querySelect);
		while($rows=$resultSelect->fetch_row())
		{
			echo getQuantity($rows[0]);
			$newQuantity = $GLOBALS["quantity"] - $rows[1];
												
			$queryUpdate = "Update tbl_s_product set quantity = '$newQuantity' where product_code = '$rows[0]'";
			$resultUpdate = $connection->query($queryUpdate);
		}
	}
	
	function getQuantity($prodCode)
	{
		include("operations\connection.php");
		
		$queryQuantity = "Select quantity from tbl_s_product where product_code = '$prodCode'";
		$resultQuantity = $connection->query($queryQuantity);
		
		while($rows = $resultQuantity->fetch_row())
		{					
			$GLOBALS["quantity"] = $rows[0];						
		}
				
	}
?>