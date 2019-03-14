<h3 style="text-align: left">
<input type="submit" value="ADD NEW" name="add" id="btn2" />
<input type="submit" value="UPDATE" name="update" id="btn2" />
<br />
<br />
THESE ARE THE PRODUCTS: 

</h3>

<div id="divProduct">	
	<table border="1">
		
			<tr>
				<td>
					<b>PRODUCT CODE </b>
				</td>
														
				<td>
					<b>PRODUCT NAME </b>
				</td>
								
				<td>
					<b> QUANTITY </b>
				</td>
				
				<td>
					<b> PRICE </b>
				</td>
								
			</tr>
		
		<?php
												
			$query = "SELECT prod.product_code, prod.product_description,
						prod.quantity,
						prod.price,
						prod.image	
					 from tbl_s_product prod"; // Query for displaying the information about the product.
											
			$result = $connection->query($query); //Executes the query 
			
			while ($rows = $result->fetch_row())  //Enumerate the fields in the query 
			{
				$productCode = $rows[0];
				$productDesc = $rows[1];
				$quantity = $rows[2];
				$price = $rows[3];
				$image = $rows[4];
			?>
		
			<!--This part display all the list regarding the variable $query -->
			<tr>
				<td style="text-align: left;">
					<input type="radio" value="<?=$productCode?>" name="prodCode[]">
					<?=$productCode?>
				</td>
				
				<td style="text-align: left;">					
					<?=$productDesc?>
				</td>
				
				<td>
					<?=$quantity?> Available
				</td>
				
				<td style="text-align: right;">
					<?=$price?>
				</td>
								
			</tr>
			
			<!--End of displaying all the query. -->
		<?
			}
		
		?>
			
	</table>
</div>
<h3 style="text-align: left">
<input type="submit" value="ADD NEW" name="add" id="btn2" />
<input type="submit" value="UPDATE" name="update" id="btn2" />
</h3>