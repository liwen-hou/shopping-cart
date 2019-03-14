<?php
	
	if(isset($_POST['cancel']))
	{
		require("productView.php");
	}
	
	if(isset($_POST['save']))
	{
		include("operations\connection.php");
		session_start();
		$prodCode = $_SESSION['prodCode'];		
		$prodDesc = $_POST['txtProdDesc'];
		$quantity = $_POST['txtQuantity'];
		$price = $_POST['txtPrice'];
		$image = $_POST['image'];
		
		$prodDescUpper = strtoupper($prodDesc);
		
		if(empty($prodDesc) || empty($quantity) || empty($price))
		{
			$error = "ERROR: ";
			$errorMessage = "Fill up all fields.";
			
			require("productUpdate.php");
		}
		
		else
		{
			$numRegExp = "([0-9])";
			
			$queryProdDesc = "Select product_description from tbl_s_product where product_description = '$prodDescUpper'";
			$resultProdDesc = $connection->query($queryProdDesc);
			
			list($tempProdDesc) = $resultProdDesc->fetch_row();
			
			if(eregi($numRegExp, $quantity) == false)
			{
				$error = "ERROR: ";				
				$errorMessage = "Quantity must be in correct format.";
				
				require("productUpdate.php");
			}
			
			else if(eregi($numRegExp, $price) == false)
			{
				$error = "ERROR: ";
				$errorMessage = "Price must be in correct format. ";
				
				require("productUpdate.php");
			}
						
			else
			{
				$error = "INFORMATION: ";				
				$errorMessage = "Updating product is successful.";
				
				if(empty($image))
				{
					$queryUpdate = "Update tbl_s_product set product_description = '$prodDescUpper', quantity = 
								'$quantity', price = '$price'
								where product_code = '$prodCode'";
						
					$resultUpdate = $connection->query($queryUpdate);
			
				}
	
				else
				{
					$queryUpdate = "Update tbl_s_product set product_description = '$prodDescUpper', quantity = 
								'$quantity', price = '$price', image = '$image'
								where product_code = '$prodCode'";
						
					$resultUpdate = $connection->query($queryUpdate);
				}
				
				require("productView.php");

			}	
										
		}
	}
?>