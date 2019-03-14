<?
	session_start(); //Define  to start a session
?>
<br />
<table id="tblResultPayment">
	<tr>
		<td style="vertical-align: top;">
			<b> INFORMATION: </b>
		</td>
		<td style="vertical-align: top;">
			The payment of your shopping cart with the ORDER NUMBER <b><?=$_SESSION['orderNumber']?> </b> is successful.
		</td>
	</tr>
	
	<tr>
		<td>
			<br />
			<br />
		</td>
	</tr>
	
	<tr>
		<td style="vertical-align: top;">
			<b>NOTE: </b> 
		</td>
		<td style="vertical-align: top;">
			Take down your ORDER NUMBER as validation for further transaction.
		</td>
	</tr>
	
	<tr>
	</tr>
	
	<tr>
		<td>
			<br />
		</td>
	</tr>
	
	<tr>
		<td colspan="2">
			You can now begin again other transaction for our shopping cart. <a href="product.php"> Click here </a>
		</td>
	</tr>

	
</table>