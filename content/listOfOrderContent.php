<h3> Lists of Orders </h3>
<div id="divProduct">
	<table id="tblListOrder" border="1">
		<tr>
			<td>
				<b> ORDER NUMBER</b>
			</td>
		
			<td>
				<b> CUSTOMER NAME</b>
			</td>
		
			<td>
				<b> PRODUCT  DESCRIPTION</b>
			</td>
		
			<td>
				<b> QUANTITY</b>
			</td>
		
			<td>
				<b> SUBTOTAL</b>
			</td>
		
			<td>
				<b> DATE ORDERED</b>
			</td>
			
			<td>
				<b> SHIPPING ADDRESS</b>
			</td>
		</tr>
		
		<?php					
			$query = "Select det.transaction_number, 
						cx.customer_first_name,
						cx.customer_last_name,
						prod.product_description,
						det.quantity,
						det.subtotal,
						hed.shop_date,
						hed.shipping_address
					from tbl_s_product prod, 
						tbl_s_customer cx,
						tbl_t_shop_header hed,
						tbl_t_shop_detail det
					where prod.product_code = det.product_code and
							det.transaction_number = hed.transaction_number and
							cx.username = hed.username
					order by transaction_number desc"; //Query for displaying all the order that has been submitted by all 
					//the customer
						
			$result = $connection->query($query); //Executes the result of the query $query
			
			while($rows=$result->fetch_row()) //Get the value of fields specified on the query
			{
				
				$transNumber = $rows[0];
				$firstName = $rows[1];
				$lastName = $rows[2];
				$prodDesc = $rows[3];
				$quantity = $rows[4];
				$subtotal = $rows[5];
				$shopDate = $rows[6];
				$shipAddress = $rows[7];
			?>
			
				<!-- Display the result of the query $query formatted in table-->
				<tr>
					<td>
						<?=$transNumber?>
					</td>
					
					<td>
						<?=$firstName?> <?=$lastName?>
					</td>

					<td>
						<?=$prodDesc?>
					</td>
					
					<td>
						<?=$quantity?>
					</td>
					
					<td>
						<?=$subtotal?>
					</td>
					
					<td>
						<?=$shopDate?>
					</td>
					
					<td>
						<?=$shipAddress?>
					</td>
				</tr>			
				<!--End of displaying all valued in the current query -->
			<?
			}
		?>
	</table>
</div>
