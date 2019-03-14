
<h3 style="text-align: left">
<input type="submit" value="ADD TO CART" name="addCart" id="btn2" />
<br />
<br />
THESE ARE THE PRODUCTS: 

</h3>

<div id="divProduct">	
	<table border="1">
		
			<tr>										
				<td>
					<b>PRODUCT NAME </b>
				</td>				
															
				<td>
					<b> QUANTITY</b>
				</td>
				
				<td>
					<b> PRICE </b>
				</td>
								
			</tr>
		
		<?php
			
			$connection = new mysqli("127.0.0.1", "root", "", "dbshop");
			
			$query = "SELECT prod.product_code, prod.product_description,
						prod.quantity,
						prod.price,
						prod.image	
					 from tbl_s_product prod";
					
											
			$result = $connection->query($query);
			
			while ($rows = $result->fetch_row()) 
			{
				$productCode = $rows[0];
				$productDesc = $rows[1];
				$quantity = $rows[2];
				$price = $rows[3];
				$image = $rows[4];
			?>
			<tr>
				<td style="text-align: left;">
					<input type="radio" value="<?=$productCode?>" name="prodCode[]">
					<?=$productDesc?>
				</td>			
				
				<td>
					<?=$quantity?> Available
				</td>
				
				<td style="text-align: right;">
					<?=$price?>
				</td>
								
			</tr>
		<?
			}
		
		?>
			
	</table>
</div>
<h3 style="text-align: left">
<input type="submit" value="ADD TO CART" name="addCart" id="btn2" />
</h3>