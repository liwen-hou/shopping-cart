<?php
	session_start(); //Define to start a session
	$user = $_SESSION['user'];	//Import a value of a session
	
	$queryAccount = "Select cx.customer_first_name, 
							cx.customer_last_name,
							cx.username,
							cx.customer_address,
							cnt.country_name,
							cx.mobile_number,
							cx.phone_number,
							cx.email_address
						from tbl_s_customer cx,
								tbl_u_country cnt
						where cx.username = '$user' and
								cx.country_code = cnt.country_code"; //Query to display the account of current customer that 
								//has been logged in
	
	$resultAccount = $connection->query($queryAccount); //Executes the query $queryAccount
	
	
	while($rows = $resultAccount->fetch_row()) //Get the value of the fields specified on the above query
	{
		$lastName = $rows[0];
		$firstName = $rows[1];
		$username = $rows[2];
		$address = $rows[3];
		$country = $rows[4];
		$mobile = $rows[5];
		$phone = $rows[6];
		$email = $rows[7];
	}
	
	
	
?>

<!-- Display the account information of the particular customer who logged in-->
<table id="tblRegister">
	
	<tr>
		<td colspan="2" style="text-align:center; font-weight: bold; font-size:16px;">
			<?=$accountTitle?>
		</td>
	</tr>
	
	<tr>
		<td colspan="2">
			<br />
		</td>
	</tr>					
									
	<tr>
		<td>
			<b> <?=$lastNameLBL?> </b>
		</td>
							
		<td>
			<input type="text" name="txtLname" maxlength="100" value="<?=$lastName?>" id="txt" />
		</td>
	</tr>
						
	<tr>
		<td>
			<b> <?=$firstNameLBL?> </b>
		</td>
							
		<td>
			<input type="text" name="txtFname" maxlength="100" value="<?=$firstName?>" id="txt" />
		</td>
	</tr>
						
	<tr>
		<td>
			<b> <?=$usernameLBL?> </b>
		</td>
							
		<td>
			<input type="text" name="txtUsername" maxlength="50" value="<?=$username?>" readonly="true" />
		</td>
	</tr>
	
	<tr>
		<td>
			<b> <?=$passwordLBL?> </b>
		</td>
							
		<td>
			<a href = "password.php"><i>Change Password</i></a> 
		</td>
	</tr>							
						

						
	<tr>
		<td>
			<b> <?=$addressLBL?> </b>
		</td>
							
		<td>
			<input type="text" name="txtAddress" maxlength="200" value="<?=$address?>" id="txt" />
		</td>
	</tr>
	
	<tr>
		<td>
			<b> <?=$countryLBL?> </b>
		</td>
							
		<td>
			<select name="country" style="width:145px;" id="txt">
			
					<?
						$query = "Select country_name from tbl_u_country order by country_name asc";
						$result = $connection->query($query);
						
						while(list($country_name) = $result->fetch_row())
						{
							echo "<option>$country_name</option>";																				
						}
						
					?>
					
			</select>
		</td>
	</tr>
	
	<tr>
		<td>
			<b> <?=$phoneNumberLBL?> </b>
		</td>
							
		<td>
			<input type="text" name="txtPhone" maxlength="11" value="<?=$phone?>" id="txt" />
		</td>
	</tr>
	
	<tr>
		<td>
			<b> <?=$mobileNumberLBL?> </b>
		</td>
							
		<td>
			<input type="text" name="txtMobile" maxlength="13" value="<?=$mobile?>" id="txt" />
		</td>
	</tr>

	<tr>
		<td>
			<b> <?=$emailLBL?> </b>
		</td>
							
		<td>
			<input type="text" name="txtEmail" maxlength="100" value="<?=$email?>" id="txt" />
		</td>
	</tr>
																		
	<tr>
		<td colspan="2" style="text-align:center">
			<br />
			<input type="submit" value="SAVE" name="save" id="btn" />
		</td>
	</tr>

</table>
