
<table id="tblResult">
	<tr>
		<td colspan="2" style="text-align: left; font-weight: bold;">
			<h4> Thank You for registering to our website.</h4>

			<b>Here is the summary of your account.</b>
			<br />		
		</td>
	</tr>
<?php
	
	include("operations\unset.php");
	echo unset_registration();

	$usern = $_POST['txtUsername'];
	
	$query = "Select cx.username,
				cx.customer_last_name,
				cx.customer_first_name,
				cx.customer_address,
				ctry.country_name,
				cx.mobile_number,
				cx.phone_number,
				cx.email_address 
			 from tbl_s_customer cx,
			    tbl_s_systemuser sys,
			    tbl_u_country ctry
			 where cx.username = sys.username and
				cx.country_code = ctry.country_code and 
				cx.username = '$usern'"; //Query to display the result of registration
	$result = $connection->query($query); //Executes the above query
	
	
	
	while($rows=$result->fetch_row()) //Get the value of fields on the specified query
	{
		$result0 = $rows[0];
		$result1 = $rows[1];
		$result2 = $rows[2];
		$result3 = $rows[3];
		$result4 = $rows[4];
		$result5 = $rows[5];
		$result6 = $rows[6];
		$result7 = $rows[7];
	}
?>

	<tr>
		<td style="text-align: left; font-weight: bold;">
			USERNAME:
		</td>
		<td style="text-align: left">
			<?=$result0?>
		</td>
	</tr>
	
	<tr>
		<td style="text-align: left; font-weight: bold;">
			LAST NAME:
		</td>
		<td style="text-align: left">
			<?=$result1?>
		</td>
	</tr>

	<tr>
		<td style="text-align: left; font-weight: bold;">
			FIRST NAME:
		</td>
		<td style="text-align: left">
			<?=$result2?>
		</td>
	</tr>

	<tr>
		<td style="text-align: left; font-weight: bold;">
			ADDRESS:
		</td>
		<td style="text-align: left">
			<?=$result3?>
		</td>
	</tr>

	<tr>
		<td style="text-align: left; font-weight: bold;">
			COUNTRY:
		</td>
		<td style="text-align: left">
			<?=$result4?>
		</td>
	</tr>

	<tr>
		<td style="text-align: left; font-weight: bold;">
			MOBILE NUMBER:
		</td>
		<td style="text-align: left">
			<?=$result5?>
		</td>
	</tr>

	<tr>
		<td style="text-align: left; font-weight: bold;">
			PHONE NUMBER:
		</td>
		<td style="text-align: left">
			<?=$result6?>
		</td>
	</tr>

	<tr>
		<td style="text-align: left; font-weight: bold;">
			EMAIL-ADDRESS:
		</td>
		<td style="text-align: left">
			<?=$result7?>
		</td>
	</tr>
	
	<tr>
		<td colspan="2" style="text-align: left">
			<br />
			<h4> You can now begin to order in our shopping cart: <a href="login.php">Click here to login</a></h4>
			
		</td>
	</tr>
		
</table>



	
	

	
	
