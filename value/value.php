<?php
	
	//NAVIGATION MENU VALUE
	$index = "HOME";
	$menuVision = "VISION";
	$menuMission = "MISSION";
	$menuAbout = "ABOUT US";
	
	
	//MENU VALUE
	$menuTitle = "BASIC MENU";
	$login = "LOG-IN";
	$register = "REGISTER";
	$registerLink = "register.php";	
	
	$menuProduct = "PRODUCT";	
	$productLink = "product.php";
	
	session_start();
		
	if(!empty($_SESSION['userLevel']))
	{
		if($_SESSION['userLevel'] == "AD")
		{
			$register = "ADMIN ACCOUNT";
			$registerLink = "viewUser.php";
			
			$menuOrder = "LIST OF ORDERS";
			$ordersLink = "listOfOrder.php";
			
			$menuProduct = "PRODUCT MAINTENANCE";
			$productLink = "productView.php";
		}
		
		else
		{
			$register = "ACCOUNT";
			$registerLink = "viewAccount.php";
			
			$menuOrder = "VIEW CART";
			$ordersLink = "viewCart.php";
			
			$menuProduct = "PRODUCT";	
			$productLink = "product.php";

		}
	}
	
	else if(empty($_SESSION['userLevel']))
	{
		$productLink = "listOfProduct.php";
	}
	
	
				
	//LOGIN-MENU VALUE
	$loginTitle = "EXISTING MEMBER: LOG-IN!";
	$usernameLBL = "USERNAME: ";
	$passwordLBL = "PASSWORD: ";
	
	//REGISTER CONTENT
	$registerTitle = "REGISTER";
	
	//ACCOUNT CONTENT
	$accountTitle = "MY ACCOUNT";
	$lastNameLBL = "LAST NAME: ";
	$firstNameLBL = "FIRST NAME: ";
	$addressLBL = "ADDRESS: ";
	$countryLBL = "COUNTRY: ";
	$mobileNumberLBL = "MOBILE NUMBER: ";
	$phoneNumberLBL = "PHONE NUMBER: ";
	$emailLBL = "EMAIL ADDRESS: ";
		
	
	//CHANGE PASSWORD CONTENT
	$passwordTitle = "CHANGE PASSWORD";
	$currentPassword = "CURRENT PASSWORD: ";
	$newPassword = "NEW PASSWORD: ";
	$confirmPassword = "CONFIRM PASSWORD: ";

	//PRODUCT INFORMATION
	$prodNameLBL = "PRODUCT NAME: ";
	$prodDescLBL = "PRODUCT DESCRIPTION";
	$quantityLBL = "QUANTITY";
	$priceLBL = "PRICE ";
	
	//NEW CART CONTENT
	$newCartTitle = "ADDING PRODUCT TO CART";
	$orderQuantityLBL = "ORDER QUANTITY:";
	
	//UPDATE PRODUCT CONTENT
	$updateTitle = "UPDATE PRODUCT";
	$prodImageLBL = "PRODUCT IMAGE: ";
?>