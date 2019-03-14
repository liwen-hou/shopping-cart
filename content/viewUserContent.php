<div id="divAdmin">
	<table id="tblAdmin">
		<tr>
			<td colspan="2" style="font-size: 16px;">
				SHOPPING CART ADMINISTRATOR
			</td>
				
		</tr>
	
		<tr>
			<td>
				<?=$usernameLBL?>
			</td>

			<td>
				<?
				session_start()
				?>
				<?=$_SESSION['user']?>
			</td>

		</tr>
	
		<tr>
			<td>
					<?=$passwordLBL?>
			</td>
		
			<td>
					<a href="password.php">Change Password</a>
			</td>
		</tr>
	</table>
	
</div>

<div id="divProduct">	
<h4 style="text-align:left"> LIST OF CUSTOMER</h4>
	<table id="tblUser" border="1">
		<tr>
			<td>
				<b> USERNAME </b>
			</td>
		
			<td>
				<b> FULL NAME </b>
			</td>
				
			<td>
				<b> USER ROLES </b>
			</td>
		</tr>

	<?php
		$connection = new mysqli("127.0.0.1", "root", "", "dbshop");
	
		$queryUser = "Select sys.username, cx.customer_first_name, cx.customer_last_name, sys.user_level
						from tbl_s_customer cx,
						 tbl_s_systemuser sys
				  		where cx.username = sys.username";
		$resultUser = $connection->query($queryUser);
	
		while($rows = $resultUser->fetch_row())
		{
			$username = $rows[0];
			$firstName = $rows[1];
			$lastName = $rows[2];
			$userLevel = $rows[3];
		?>
		
		<tr>
			<td style="text-align: left;">				
				<?=$username?>
			</td>
			
			<td style="text-align: left;">
				<?=$firstName?> <?=$lastName?>
			</td>

			<td style="text-align: left;">
				<?
					if($userLevel=="LT")
					{
						echo "LIMITED";
					}
					
					else
					{
						echo "ADMINISTRATOR";
					}
				?>
			</td>
			
		</tr>
		<?
		}
	?>


	</table>
</div>