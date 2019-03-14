<?php
	
	if(isset($_POST['save']))
	{
		include("operations\connection.php");
		
		$prodDesc = $_POST['txtProdDesc'];
		$quantity = $_POST['txtQuantity'];
		$price = $_POST['txtPrice'];
		$image = $_POST['image'];
		
		$prodDescUpper = strtoupper($prodDesc);
		
		echo setProductCode();
		$productCode = $GLOBALS["productCode"];

		if(empty($prodDesc) || empty($quantity) || empty($price))
		{
			$error = "ERROR: ";
			$errorMessage = "Fill up all input fields.".$image;
			
			require("productAdd.php");
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
				
				require("productAdd.php");
			}
			
			else if(eregi($numRegExp, $price) == false)
			{
				$error = "ERROR: ";
				$errorMessage = "Price must be in correct format. ";
				
				require("productAdd.php");
			}
			
			else if($quantity < 0 || $price < 0)
			{
				$error = "ERROR: ";
				$errorMessage = "Quantity or price must not be negative in value.";
				
				require("productAdd.php");				
			}
			
			else if($prodDescUpper == $tempProdDesc)
			{
				$error = "ERROR: ";
				$errorMessage = "Product Description already exist. Try a new one.";
				
				require("productAdd.php");	
			}
			
			else
			{
				$error = "INFORMATION: ";
				$errorMessage = "Adding product product is successful.";
				
				$queryInsert = "Insert into tbl_s_product values('$productCode', '$prodDescUpper', '$quantity', '$price', '$image')";
				$resultInsert = $connection->query($queryInsert);
				
				require("productView.php");								
			}
						
		}
		
	}
	
	if(isset($_POST['cancel']))
	{
		require("productView.php");
	}
	
?>

<?
	function setProductCode()
	{
		include("operations\connection.php");
		
		$queryPC = "Select product_code from tbl_s_product order by product_code desc";
		
		$resultPC = $connection->query($queryPC);		
		
		list($newPC)= $resultPC->fetch_row();	
		
		if(empty($newPC))
		{
			$GLOBALS["productCode"] = 'PRD1000001';
		}			
		
		else
		{
			$tempNewPC = str_replace("PRD","0",$newPC);
			$tempProductCode = $tempNewPC+1;
			$GLOBALS["productCode"] = str_replace(substr($newPC, 3), $tempProductCode, $newPC);			
		}
	}	
?>