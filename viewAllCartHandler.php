<?php
	
	if(isset($_POST['currentCart']))
	{
		require("viewCart.php");
	}
	
	if(isset($_POST['rescentCart']))
	{
		require("viewAllCart.php");
	}
?>