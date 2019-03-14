<?php
	//This function will unset all the value of session variable incase the customer doesn't continue to buy the 
	//product on his/her current cart
	function unset_transaction()
	{
		include("connection.php");
		session_start();
		$orderNumber = $_SESSION['orderNumber'];
		$querySelect = "Select transaction_number 
						from tbl_t_shop_header
						where transaction_number = '$orderNumber'";
		$resultSelect = $connection->query($querySelect);
		
		list($value) = $resultSelect->fetch_row();
		
		if(empty($value))
		{
			$queryDelete = "delete from tbl_t_shop_detail where transaction_number = '$orderNumber'";
			$resultDelete = $connection->query($queryDelete);					
		}
		
		unset($_SESSION['orderNumber']);
		unset($_SESSION['totalSum']);
		unset($_SESSION['prodCode']);
		unset($_SESSION['updCartProdC']);
		unset($_SESSION['delCartProdC']);
		unset($_SESSION['order']);
	}
?>