<table id="tblRegister">
	<? session_start() ?>
	<tr>
		<td colspan="2" style="text-align:center; font-weight: bold; font-size:16px;">
			<?=$registerTitle?> 
		</td>
	</tr>
	
	<tr>
		<td colspan="2">
			<br />
		</td>
	</tr>							
									
	<tr>
		<td>
			<b><?=$lastNameLBL?></b>
		</td>
							
		<td>
			<input type="text" name="txtLname" maxlength="100" value="<?=$_SESSION['lastname']?>" id="txt" /> *
		</td>
	</tr>
						
	<tr>
		<td>
			<b><?=$firstNameLBL?></b>
		</td>
							
		<td>
			<input type="text" name="txtFname" maxlength="100" value="<?=$_SESSION['firstname']?>" id="txt" /> *
		</td>
	</tr>
						
	<tr>
		<td>
			<b><?=$usernameLBL?></b>
		</td>
							
		<td>
			<input type="text" name="txtUsername" maxlength="50" value="<?=$_SESSION['username']?>" id="txt" /> *
		</td>
	</tr>						
						
	<tr>
		<td>
			<b><?=$passwordLBL?></b>
		</td>
							
		<td>
			<input type="password" name="txtPass" maxlength="50" id="txt" /> *
		</td>
	</tr>

	<tr>
		<td>
			<b><?=$confirmPassword?></b>
		</td>
							
		<td>
			<input type="password" name="txtConfirmPass" maxlength="50" id="txt" /> *
		</td>
	</tr>
						
	<tr>
		<td>
			<b><?=$addressLBL?></b>
		</td>
							
		<td>
			<input type="text" name="txtAddress" maxlength="200" value="<?=$_SESSION['address']?>" id="txt" /> *
		</td>
	</tr>
	
	<tr>
		<td>
			<b><?=$countryLBL?></b>
		</td>
							
		<td>
			<select name="country" style="width:145px;" id="txt">
			
					<?php
					
						echo countries();	
																	
					?>

			</select>
		</td>
	</tr>
	
	<tr>
		<td>
			<b><?=$phoneNumberLBL?></b>
		</td>
							
		<td>
			<input type="text" name="txtPhone" maxlength="11" value="<?=$_SESSION['phone']?>" id="txt" /> *
		</td>
	</tr>
	
	<tr>
		<td>
			<b><?=$mobileNumberLBL?></b>
		</td>
							
		<td>
			<input type="text" name="txtMobile" maxlength="13" value="<?=$_SESSION['mobile']?>" id="txt" /> *
		</td>
	</tr>

	<tr>
		<td>
			<b><?=$emailLBL?></b>
		</td>
							
		<td>
			<input type="text" name="txtEmail" maxlength="100" value="<?=$_SESSION['email']?>" id="txt" /> *
		</td>
	</tr>
																		
	<tr>
		<td colspan="2" style="text-align:center">
			<input type="submit" value="REGISTER" name="register" id="btn2" />
		</td>
	</tr>

</table>
