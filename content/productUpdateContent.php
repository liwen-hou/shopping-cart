<?php

	$connection = new mysqli("127.0.0.1", "root", "", "dbshop");
	session_start();
 	$tempProdCode =  $_SESSION['prodCode'];
	$query = "SELECT prod.product_description,	
					 prod.quantity,
			  	     prod.price,
				     prod.image	
			 from tbl_s_product prod
			 where prod.product_code = '$tempProdCode'";
						
	$result = $connection->query($query);
	
	while($rows = $result->fetch_row()) 
	{
		$prodDesc = $rows[0];
		$quantity = $rows[1];
		$price = $rows[2];
		$image = $rows[3];
	}
	
	
?>


<table id="tblNewCart">
	<tr>
		<td>
			<b><?=$updateTitle?> </b>
			<br>
			<br>		</td>							
	</tr>
	<tr>
		<td>			
			<img src="<?=$image?>" width="100px" height="100px" />		
		</td>		
	</tr>
	
	<tr>
		<td style="text-align: left;">
			<b><?=$prodImageLBL?></b>
			<input type="file" name="image" style="width: 275px; margin-left: 20px;"/>			
		</td>
	</tr>
	
	<tr>
		<td style="text-align: left">
			<b><?=$prodNameLBL?> </b>	
			<input type="text" name="txtProdDesc" value="<?=$prodDesc?>" maxlength="100" style="margin-left:25px;" />
			</td>
	</tr>
		
	<tr>
		<td style="text-align: left">
			<b><?=$quantityLBL?>:  </b>	 	    
			<input type="text" name="txtQuantity" value="<?=$quantity?>" maxlength="7" style="margin-left:68px;" />
	    </td>
	</tr>
	
	<tr>
		<td style="text-align: left">
			<b><?=$priceLBL?>:</b>	
			<input type="text" name="txtPrice" value="<?=$price?>" maxlength="18" style="margin-left:92px;" />
		</td>
	</tr>
			
	<tr>
		<td>
			<br>
			<input type="submit" name="save" value="SAVE" id="btn" />
			<input type="submit" name="cancel" value="CANCEL" id="btn" />
		</td>
	</tr>
</table>

