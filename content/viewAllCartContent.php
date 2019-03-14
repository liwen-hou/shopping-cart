<h3 style="text-align: left">
View Cart:
<input type="submit" value="CURRENT" name="currentCart" id="btn"/>
<input type="submit" value="RESCENT" name="rescentCart" id="btn"/>

<br />
<br />
These are the products that you submitted

</h3>

<div id="divProduct">
	<table id="tblViewCart" border="1">
	
		<tr>
			<td>
				<b> ORDER NUMBER </b>
			</td>

			<td>
				<b> DATE ORDERED </b>
			</td>
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
						
		session_start();	//Defines to start the session	
		
		$orNumber = $_SESSION['orderNumber']; //Import the value of session 
		$user = $_SESSION['user']; //Import the value of session
			
		$queryCart = "SELECT  hed.transaction_number, 
						hed.shop_date,
						prod.product_code, 
						prod.product_description,
						det.quantity,
						det.subtotal
					  from tbl_s_product prod,
					       tbl_t_shop_detail det,
						   tbl_t_shop_header hed
					  where prod.product_code = det.product_code and
							det.transaction_number = hed.transaction_number and
							hed.username = '$user'
					  order by hed.transaction_number desc"; //Query for displaying the all product that has been submitted 
					  //by a particular customer
		
		$resultCart = $connection->query($queryCart); //Executes the query $queryCart
		
		$querySum = "SELECT sum( det.subtotal ) 
					FROM tbl_s_product prod, 
						tbl_t_shop_detail det,
						tbl_t_shop_header hed
					WHERE prod.product_code = det.product_code and 							
							hed.transaction_number = det.transaction_number and
							hed.username = '$user'"; //Query to display all the amount tendered by a practicular customer
							//that has been previously paid already.							
		
		$resultSum = $connection->query($querySum); //Executes the query $querySum
		
		list($totalSum) = $resultSum->fetch_row(); //Display the total sum all the amount tendered by a particular customer
		$_SESSION['totalSum'] = $totalSum; //Declares a session with the name totalSum
		
		while ($rows = $resultCart->fetch_row())  //Display the list of the product that has been previously tendered
		{		
			$transNumber = $rows[0];	
			$shopDate = $rows[1];
			$prodCode = $rows[2];
			$prodDesc = $rows[3];
			$quantity = $rows[4];
			$subTotal = $rows[5];
		
		?>
		
		<!-- Display the result of the query $queryCart in a table format-->
		<tr>
				<td  style="text-align: left;">
					<?=$transNumber?>
				</td>
				
				<td  style="text-align: left;">
					<?=$shopDate?>
				</td>
				<td style="text-align: left;">				
					<?=$prodDesc?>
				</td>
								
				<td>
					<?=$quantity?>
				</td>
				
				<td style="text-align: right;">
					Php<?=$subTotal?>
				</td>								
		</tr>
		
		<!-- End of displaying the list-->
		<?
			
		} //End of the loop while
				
	?>
		<tr>
			<td colspan="5">
			<br />
			</td>
		</tr>
		<tr>
			<td colspan="4" style="text-align: right;">
				<b>TOTAL AMOUNT:</b>
			</td>
			
			<td>				
				Php<?=$totalSum?> <!-- Display the total sum -->
			</td>
		</tr>
	</table>
</div>
