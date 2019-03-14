<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$title?></title>

<link rel="stylesheet" href="design/theme.css" type="text/css"  />

</head>
<body>
<?	
	include("value/value.php");	
	include("operations/connection.php");
?>
	<table>
		<tr>
			<td id="header" colspan="2">
				<tr>
					<td  id = "cell1">
						<img src = "image/myLogo.gif" id = "myLogo">				
					</td>

					<td id = "cell2">
						<img src = "image/logo.gif" id = "logo">
					</td>
				</tr>
			</td>
		</tr>
		
		<tr>
			<td id="navigation" colspan="2">
				<a href="home.php"> <?=$index?> </a>
				&nbsp; &nbsp; &nbsp; &nbsp;
				<a href="mission.php"> <?=$menuMission?> </a>
				&nbsp; &nbsp; &nbsp; &nbsp;
				<a href="vision.php"> <?=$menuVision?> </a>
				&nbsp; &nbsp; &nbsp; &nbsp; 
				<a href="aboutUs.php"> <?=$menuAbout?> </a>
				&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;				
											
				<?=$message?>	
					
				<?=$user?>		
				&nbsp; &nbsp;
				<a href="logout.php"> <?=$logout?> </a>
			</td>
			
			
			
		</tr>

		<tr>
			<td id="menu">
			
				<table id="tblMenu">
					<tr>
						<td>
							<?=$menuTitle?>				
						</td>
					</tr>
						
					<tr>
						<td>
							<a href="login.php">
								<?=$login?>
							</a>
						</td>					
					</tr>
					
					<tr>
						<td>
							<a href=<?=$registerLink?>>
								<?=$register?>
							</a>
						</td>					
					</tr>
					
					<tr>
						<td>
							<a href=<?=$productLink?>>
								<?=$menuProduct?>
							</a>
						</td>					
					</tr>
					
					<tr>
						<td>
							<a href="<?=$ordersLink?>">
								<?=$menuOrder?>
							</a>
						</td>
					<tr>
							
				</table>
			</td>
			
			<td id="content">
				<form id="frmContent" action=<?=$handler?> method="post">
					<table id="tblError">
						<tr>
							<td style="color:Red; font-family:Arial, Helvetica, sans-serif; font-weight: bold; width: 20px; vertical-align: top;">
								<?=$error?>
							</td>
								
							<td style="color:black; font-family:Arial, Helvetica, sans-serif; vertical-align: top; font-weight: bold;">
								<?=$errorMessage?>
							</td>
						</tr>			
					</table>
					
					<?
						include($content);
					?>
				</form>
			</td>
		</tr>
		
		<tr>
			<td id="footer" colspan="2">
				COPYRIGHT © INFORM ME!
				<br />
				ALL RIGHTS RESERVED 2008
			</td>
		</tr>
	</table>



</body>
</html>
