<h3 style="text-align: left">
View Cart:
<input type="submit" value="CURRENT" name="currentCart" id="btn"/>
<input type="submit" value="RECENT" name="rescentCart" id="btn"/>
&nbsp; &nbsp; &nbsp; &nbsp;
<input type="submit" value="BUY" name="payCart" id="btn"/>
<input type="submit" value="UPDATE" name="updateCart" id="btn" />
<input type="submit" value="DELETE" name="deleteCart" id="btn"/>
<br />
These are the products in your cart.

</h3>

<div id="divProduct">
	<table id="tblViewCart" border="1">
	
		<tr>
			<td>
				<b> PRODUCT NAME </b>
			</td>
		
			<td>
				<b> QUANTITY </b>
			</td>
		
			<td>
				<b> SUBTOTAL </b>
			</td>
		</tr>
		
	<?php	
				
		session_start();		
		
		$orNumber = $_SESSION['orderNumber']; //Import the value session
			
		$queryCart = "SELECT det.transaction_number,
						prod.product_code, 
						prod.product_description,
						det.quantity,
						det.subtotal
					  from tbl_s_product prod,
					       tbl_t_shop_detail det
					  where prod.product_code = det.product_code and
							det.transaction_number = '$orNumber'"; //Query to display the list of the current cart
		
		$resultCart = $connection->query($queryCart); //Executes the query $queryCart
		
		$querySum = "SELECT sum( det.subtotal ) 
					FROM tbl_s_product prod, 
						tbl_t_shop_detail det
					WHERE prod.product_code = det.product_code and 
							det.transaction_number = '$orNumber'"; //Query to display the subtotal amount of the current cart
		
		$resultSum = $connection->query($querySum); //Executes the query $querySum
		
		list($totalSum) = $resultSum->fetch_row(); //Display the sum of the sutotal of the current cart
		$_SESSION['totalSum'] = $totalSum; //Declares a value for a session
		 
		while ($rows = $resultCart->fetch_row())  //Display the list of product in the current cart
		{			
			$transNumber = $rows[0];
			$prodCode = $rows[1];
			$prodDesc = $rows[2];
			$quantity = $rows[3];
			$subTotal = $rows[4];
		
		?>
		
		<!--Output the result of the query $queryCart in a table format-->
		<tr>
			<td style="text-align: left;">
				<input type="radio" value="<?=$prodCode?>" name="prodCode[]">
					<?=$prodDesc?>
				</td>
								
				<td>
					<?=$quantity?>
				</td>
				
				<td>
					Php<?=$subTotal?>
				</td>								
		</tr>
		
		<!--End of displaying the current cart-->
		<?
			
		}
				
	?>
		<tr>
			<td colspan="3">
			<br />
			</td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: right;">
				<b>TOTAL AMOUNT:</b>
			</td>
			
			<td>				
				Php<?=$totalSum?> <!-- Display the total sum of the current cart -->
			</td>
		</tr>
	</table>
</div>
<h3 style="text-align: left">	
View Cart:
<input type="submit" value="CURRENT" name="currentCart" id="btn"/>
<input type="submit" value="RECENT" name="rescentCart" id="btn"/>
&nbsp; &nbsp; &nbsp; &nbsp;
<input type="submit" value="BUY" name="payCart" id="btn"/>
<input type="submit" value="UPDATE" name="updateCart" id="btn" />
<input type="submit" value="DELETE" name="deleteCart" id="btn"/>
</h3>	


-