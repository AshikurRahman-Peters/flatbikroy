<?php
session_start();
if (!isset($_SESSION['username']))
{
   header('Location: ../');
   exit;
}

$action=isset($_REQUEST['action']);
if ($action=="logout"){
   unset($_SESSION['username']);
   header('Location: ../');
   exit;
}

include('../../connect.php');
if(isset($_REQUEST['contsubmit'])){
$conttext=stripslashes(mysql_real_escape_string($_POST['conttext']));
mysql_query("update innerpages set contactus='$conttext' where id=1");
}

$result=mysql_query("select contactus from innerpages where id=1");
$row=mysql_fetch_array($result);

?>



<html>
	<head>
		<title>Jamibikroy.com | Admin | Contact Detail</title>
		<style type="text/css">
			.logout{
				color:white;
				text-decoration:none;
			}
			.logout:hover{
				color:yellow;
				text-decoration:underline;
			}
		</style>
		<link href="../css/style.css" rel="stylesheet" type="text/css">
		
		<script type="text/javascript">
			function LftmHover(id){
				document.getElementById(id).style.background = 'green';
				document.getElementById(id).style.color = 'white';
			}
			function LftmOut(id){
				document.getElementById(id).style.background = '';
				document.getElementById(id).style.color = 'green';
			}
			function LftmClick(id, page){
				window.location.href= page;
			}
		</script>
		<script src="nicEdit.js" type="text/javascript"></script>
		<script type="text/javascript">
			bkLib.onDomLoaded(function() {
			new nicEditor({fullPanel : true}).panelInstance('area2');
		});
		</script>
		
	</head>
	<body>
		<table border="0px" width="100%" height="100%" style="border-collapse:collapse;">
			<tr height="30px" bgcolor="green" style="font-family:tahoma;font-size:13px;color:white">
				<td>&nbsp;JamiBikroy.Com | Admin Panel</td>
				<td align="right"><?php echo $_SESSION['username'];?> | <a href="?action=logout" class="logout">Logout</a>&nbsp;&nbsp;</td>
			</tr>
			<tr>
				<td width="200px" bgcolor="#E5EFCE" align="center" valign="top"><br>
					<!-------------------------------- Left Container ----------------------------------------->
					<table border="0px" width="180px" style="border-collapse:collapse;">
						<tr height="30px">
							<td id="lftm1" onmouseover="LftmHover('lftm1')" onmouseout="LftmOut('lftm1')" onclick="LftmClick('lftm1', '../pending')" style="font-family:tahoma;color:green;font-size:13px;cursor:pointer">&nbsp;&nbsp;Pending Ads</td>
						</tr>
						<tr height="30px">
							<td id="lftm2" onmouseover="LftmHover('lftm2')" onmouseout="LftmOut('lftm2')" onclick="LftmClick('lftm2', '../published')" style="font-family:tahoma;color:green;font-size:13px;cursor:pointer">&nbsp;&nbsp;Approved Ads</td>
						</tr>
						<tr height="30px">
							<td id="lftm3" onmouseover="LftmHover('lftm3')" onmouseout="LftmOut('lftm3')" onclick="LftmClick('lftm3', '../generalsettings')" style="font-family:tahoma;color:green;font-size:13px;cursor:pointer">&nbsp;&nbsp;General Settings</td>
						</tr>
						<tr height="30px">
							<td id="lftm4" onmouseover="LftmHover('lftm4')" onmouseout="LftmOut('lftm4')" onclick="LftmClick('lftm4', '../aboutus')" style="font-family:tahoma;color:green;font-size:13px;cursor:pointer">&nbsp;&nbsp;About Us</td>
						</tr>
						<tr height="30px">
							<td id="lftm5" onmouseover="LftmHover('lftm5')" onmouseout="LftmOut('lftm5')" onclick="LftmClick('lftm5', '../companyprofile')" style="font-family:tahoma;color:green;font-size:13px;cursor:pointer">&nbsp;&nbsp;Company Profile</td>
						</tr>
						<tr height="30px">
							<td id="lftm6" onmouseover="LftmHover('lftm6')" onmouseout="LftmOut('lftm6')" onclick="LftmClick('lftm6', '../contactdetail')" style="font-family:tahoma;color:green;font-size:13px;cursor:pointer">&nbsp;&nbsp;Contact Detail</td>
						</tr>
						<tr height="30px">
							<td id="lftm7" onmouseover="LftmHover('lftm7')" onmouseout="LftmOut('lftm7')" onclick="LftmClick('lftm7', '../useraccounts')" style="font-family:tahoma;color:green;font-size:13px;cursor:pointer">&nbsp;&nbsp;User Accounts</td>
						</tr>
					</table>
					<!-------------------------------- Left Container Ends ------------------------------------->
				</td>

				<td align="left" valign="top">
					<!---------------------------------- Body Container ---------------------------------------->
					<table border="0px" width="100%" style="border-collapse:collapse;">
						<tr height="30px" bgcolor="#E5EFCE" style="font-family:tahoma;font-size:13px">
							<td>&nbsp;&nbsp;&nbsp;&nbsp;Contact Detail</td>
						</tr>
						<tr height="10px">
							<td></td>
						</tr>
						<tr height="500px">
							<td align="center" valign="top">
								<!----------------------------------Pending Ads ----------------------------------------->
								<form action="" method="post">
									<table border="0px" width="100%" style="border-collapse:collapse;font-family:tahoma;font-size:11px">
										<tr height="25px">
											<td><textarea id="area2" name="conttext" style="width:100%;height:400px;"><?php echo "$row[contactus]";?></textarea></td>
										</tr>
										<tr height="25px">
											<td align="right"><input type="submit" value="Save" name="contsubmit" style="width:100px;height:25px"></td>
										</tr>
									</table>
								</form>
								<!----------------------------------Pending Ads End ------------------------------------->
							</td>
						</tr>


					</table>
					<!----------------------------------Body Container Ends ------------------------------------>
				</td>
			</tr>
		</table>
	</body>
</html>