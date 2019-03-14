<a href="login.php">CLICK HERE</a> to avail products and begin your shopping with our website.
<h4> LIST OF PRODUCTS </h4>
<table id="tblList" border="1">						
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
					<img src="<?=$image?>" style="width:100px; height:100px;" />
					<br>
					<b><?=$prodNameLBL?> </b><?=$productDesc?>
					<br>
					<b><?=$quantityLBL?>: </b><?=$quantity?> Available
					<br>
					<b><?=$priceLBL?>: </b><?=$price?>Php
				</td>
			<tr>
		<?
			}
		
		?>
			
</table>