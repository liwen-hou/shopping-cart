<table id="tblPayment">
	<tr>
		<td colspan="2" style="text-align: center;">
			<h3>PAYMENT OF SHOPPING CART</h3>
			<br />
		</td>
	</tr>
	
	<tr>
		<td>
			<b>TYPE OF CARD:</b>
		</td>
		
		<td>
			<select name="card">
				<option> CHOOSE TYPE </option>
				<option> VISA</option>
				<option> MASTER</option>
			</select>
		</td>
	</tr>
	<tr>		
		<td>
			<b>CREDIT CARD NUMBER:</b>
		</td>
		
		<td>
			<input type="text" name="txtCardNumber" maxlength="16" />
		</td>
	</tr>
	
	<tr>
		<td>
			<b>AUTHORIZATION CODE:</b>
		</td>
		<td>
			<input type="text" name="txtCode" maxlength="5" />
		</td>
	</tr>
	
	<tr>
		<td>
			<b>SHIPPING ADDRESS: </b>
		</td>
		
		<td>
			<input type="text" name="txtShipAddress" maxlength="200" style="width: 225px;"
		</td>
	</tr>
	
	
	<tr>
		<td colspan="2" style="text-align: center">
			<br />
			<br />
			<input type="submit" name="payCart" value="SUBMIT" id="btn" />
			<input type="submit" name="cnclCart" value="CANCEL" id="btn" />
		</td>
	</tr>
		
</table>

<br />
<br />
For your information:
<br />
To complete this transaction you must filled out all the fields provided. Make sure you choose the type of card that
is valid for this transaction. 			
