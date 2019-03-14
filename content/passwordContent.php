<div id="divPassword">
	<table id = "tblPassword">
			<tr>
				<td colspan="2" style="text-align:center; font-size:16px;">
					<?=$passwordTitle?>
				</td>
		
			</tr>				
			
			<tr>
				<td colspan="2">
					<br />
				</td>
			</tr>							
			<tr>
				<td>
					<?=$currentPassword?>
				</td>
							
				<td>
					<input type="password" name="txtCurrentPass" />
				</td>
			</tr>
						
			<tr>
				<td>
					<?=$newPassword?>
				</td>
							
					<td>
				<input type="password" name="txtNewPass" maxlength="50" />
				</td>
			</tr>
			
			<tr>
				<td>
					<?=$confirmPassword?>
				</td>
							
					<td>
				<input type="password" name="txtConfirmPass" maxlength="50" />
				</td>
			</tr>

						
			<tr>
				<td colspan="2" style="text-align:center">
					<br />
					<input type="submit" value="SAVE" name="save" id="btn" />
					<input type="submit" value="CANCEL" name="cancel" id="btn" />
				</td>
			</tr>
						
	</table>
</div>
