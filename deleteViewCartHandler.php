<?php

	include("operations\connection.php");
	
	session_start();
 	$tempProdCode =  $_SESSION['delCartProdC'];
	$orNumber = $_SESSION['orderNumber'];
	if(isset($_POST['delNo']))
	{
		require("viewCart.php");
	}
	
	if(isset($_POST['delYes']))	
	{
		$queryDelete = "Delete from tbl_t_shop_detail where transaction_number = '$orNumber' and product_code = '$tempProdCode'";
		$resultDelete = $connection->query($queryDelete);
					
		require("viewCart.php");		
	}
?>