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
		<td style="font-size:16px;">
			<b><?=$newCartTitle?></b>
			<br>
			<br>		</td>							
	</tr>
	
	<tr>
		<td>
			<img src="<?=$image?>" width="100px" height="100px" />		</td>		
	</tr>
	
	<tr>
		<td style="text-align: left">
			<b><?=$prodNameLBL?> </b>	<label style="margin-left: 36px;"><?=$prodDesc?></label>			</td>
	</tr>
		
	<tr>
		<td style="text-align: left">
			<b><?=$quantityLBL?>: </b>	 
	    <label style="margin-left: 78px;"></label>
	    <?=$quantity?> Available</td>
	</tr>
	
	<tr>
		<td style="text-align: left">
			<b><?=$priceLBL?>:</b>	 <label style="margin-left: 105px;"> Php <?=$price?>	</label>		
		</td>
	</tr>
	
	<tr>
		<td style="text-align: left">
			<br /> 
			<br />
			<b> <?=$orderQuantityLBL?> </b> 
			<input type="text" name="txtOrdQnty" style="text-align: right; margin-left: 50px; width:50px;" maxlength="7" id="txt" />
		</td>
	</tr>
	
	<tr>
		<td>
			<br>
			<input type="submit" name="saveCart" value="SAVE TO CART" id="btn2" />
		</td>
	</tr>
</table>

