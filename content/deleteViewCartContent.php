<?php	
	session_start(); //Define to start a session
		
 	$tempProdCode =  $_SESSION['delCartProdC'];  //Import the value of a session
	$orNumber = $_SESSION['orderNumber']; //Import the value of a session
	$query = "SELECT prod.product_description,				
					 det.quantity,
			  	     prod.price,
				     prod.image	
				 from tbl_s_product prod,				   	
					 tbl_t_shop_detail det					 
				 where  det.product_code = prod.product_code and
					det.product_code = '$tempProdCode' and
					det.transaction_number = '$orNumber'"; //Query to display the product information of a particular
					//product to delete
						
	$result = $connection->query($query); //Executes the query $query
	
	while($rows = $result->fetch_row())  //Get the value of fields specified on the query above
	{
			$prodDesc = $rows[0];	
			$quantityORD = $rows[1];
			$price = $rows[2];
			$image = $rows[3];
	}
	
?>

<!--Display the result of the above query-->
<table id="tblNewCart">
	<tr>
		<td>
			DELETE PRODUCT ON CART
			<br>
			<br>		</td>							
	</tr>
	
	<tr>
		<td>
			<img src="<?=$image?>" width="100px" height="100px" />		</td>		
	</tr>
	
	<tr>
		<td style="text-align: left">
			<b><?=$prodImageLBL?> </b>	<label style="margin-left: 75px;"><?=$prodDesc?></label>			</td>
	</tr>
		
	<tr>
		<td style="text-align: left">
			<b><?=$priceLBL?>:</b>	 <label style="margin-left: 148px;"> Php.<?=$price?>	</label>		
		</td>
	</tr>
		
	<tr>
		<td style="text-align: left;">
			<b>QUANTITY ORDERED</b>	 	   		
			<label style="margin-left: 53px;">
			<?=$quantityORD?>
	</tr>
	
	
			
	<tr>
		<td>
			<br>
			<h4> Are you sure you want to delete this product on your cart? </h4>
			<input type="submit" name="delYes" value="YES" id="btn"/>
			<input type="submit" name="delNo" value="NO" id="btn" />

		</td>
	</tr>
</table>
