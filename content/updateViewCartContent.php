<?php	
	session_start();
 	$tempProdCode =  $_SESSION['updCartProdC']; //Import the value of a session
	$orNumber = $_SESSION['orderNumber']; //Import the value of a session
	$query = "SELECT prod.product_description,
					 prod.quantity,
					 det.quantity,
			  	     prod.price,
				     prod.image	
			 from tbl_s_product prod,
					 tbl_t_shop_detail det					 
			 where 		det.product_code = prod.product_code and
						det.product_code = '$tempProdCode' and
						det.transaction_number = '$orNumber'"; //Query to display the information of particular product to update
						
	$result = $connection->query($query); //Execute the current query
	
	while($rows = $result->fetch_row())  //Get the value of the fields specified on the query
	{
		$prodDesc = $rows[0];
		$quantity = $rows[1];
		$quantityORD = $rows[2];
		$price = $rows[3];
		$image = $rows[4];
	}
	
?>

<!-- Display the result of the query -->
<table id="tblNewCart">
	<tr>
		<td>
			<br />
			<b>UPDATING PRODUCT CART</b>
			<br>
			<br>		</td>							
	</tr>
	
	<tr>
		<td>
			<img src="<?=$image?>" width="100px" height="100px" />		</td>		
	</tr>
	
	<tr>
		<td style="text-align: left">
			<b>PRODUCT NAME: </b>	<label style="margin-left: 68px;"><?=$prodDesc?></label>			
			</td>
	</tr>
		
	<tr>
		<td style="text-align: left;">
			<b> QUANTITY AVAILABLE: </b>
			<label style="margin-left: 30px;">			
			<?=$quantity?>
			</label>
		</td>
	</tr>
	
	<tr>
		<td style="text-align: left">
			<b>QUANTITY ORDERED</b>	 	   		
		<input type="text" maxlength="7" name="txtOrdQnty" value="<?=$quantityORD?>" style="margin-left: 43px; width: 50px; text-align: right" />
	</tr>
	
	<tr>
		<td style="text-align: left">
			<b>PRICE:</b>	 <label style="margin-left: 140px;"> Php.<?=$price?>	</label>		
		</td>
	</tr>
			
	<tr>
		<td>
			<br>
			<input type="submit" name="saveCart" value="SAVE" id="btn" />
		</td>
	</tr>
</table>

