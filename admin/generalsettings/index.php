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
if(isset($_REQUEST['wcsubmit'])){
$wctext = mysql_real_escape_string(stripslashes($_POST['wctext']));
mysql_query("update pagetext set welcomenote='$wctext' where id=1");
}

$wcquery=mysql_query("select welcomenote from pagetext where id=1");
$wcrow=mysql_fetch_array($wcquery);
?>

<html>
	<head>
		<title>Jamibikroy.com | Admin | General Settings</title>
		<script>
			function notalert(){
				alert("error");
			}
		</script>
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
		<script>
			function AddType(){
				var type = document.getElementById('txttype').value;
				xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function(){
					document.getElementById('typelist').innerHTML = xmlhttp.responseText;
				}
				xmlhttp.open("POST", "typeadd.php", true);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xmlhttp.send("type="+type);
			}
		</script>
		<script>
			function DeleteType(id){
				xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function(){
					document.getElementById('typelist').innerHTML = xmlhttp.responseText;
				}
				xmlhttp.open("POST", "typedelete.php", true);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xmlhttp.send("id="+id);
			}
		</script>
		<script>
			function AddLocation(){
				var location = document.getElementById('txtlocation').value;
				xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function(){
					document.getElementById('locationlist').innerHTML = xmlhttp.responseText;
				}
				xmlhttp.open("POST", "locationadd.php", true);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xmlhttp.send("location="+location);
			}
		</script>
		<script>
			function DeleteLocation(id){
				xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function(){
					document.getElementById('locationlist').innerHTML = xmlhttp.responseText;
				}
				xmlhttp.open("POST", "locationdelete.php", true);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xmlhttp.send("id="+id);
			}
		</script>

		
	</head>
	<body>
		<table border="0px" width="100%" height="500px" style="border-collapse:collapse;">
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
							<td>&nbsp;&nbsp;&nbsp;&nbsp;General Settings</td>
						</tr>
						<tr height="10px">
							<td></td>
						</tr>
						<tr height="500px">
							<td align="center" valign="top">
								<!----------------------------------Pending Ads ----------------------------------------->
								<table border="0px" width="100%" height="100%" style="border-collapse:collapse;font-family:tahoma;font-size:11px">
									<tr height="300px">
										<td width="320px" align="left" valign="top">
											<fieldset><legend>Logo</legend><iframe width="320px" height="300px" frameborder="0" scrolling="no" src="logouploadform.php"></iframe></fieldset>
										</td>
										<td align="center" valign="top">
											<table border="0px" width="90%" height="30px" style="border-collapse:collapse;background:green;font-size:13px;color:white;margin:5px auto;"><tr><td align="center">Manage Types</td></tr></table>
											<table border="0px" width="90%" style="border-collapse:collapse;font-family:tahoma;font-size:13px;margin:0 auto">
												<tr height="10px">
													<td colspan="2"></td>
												</tr>
												<tr height="25px">
													<td align="right"><input type="text" id="txttype" style="width:100%;height:25px"></td>
													<td><input type="button" value="Add" id="btntypeadd" onclick="AddType()" style="height:25px"></td>
												</tr>
												<tr height="10px">
													<td colspan="2"></td>
												</tr>
												<tr>
													<td colspan="2" align="left" valign="top">
														<div id="typelist" style="width:100%;height:233px;overflow:auto;border:1px solid gray">
															<table border="1px" width="100%" style="border-collapse:collapse;border:1px solid lightgrey">
															<?php
															$typequery=mysql_query("select id, fldtype from formfields where fldtype!=''");
															while($typerow=mysql_fetch_array($typequery)){
															?>
																<tr style="font-family:tahoma;font-size:13px">
																	<td><?php echo "$typerow[fldtype]";?></td>
																	<td width="15px"><img src="../../images/deleteicon.png" height="15px" onclick="DeleteType('<?php echo "$typerow[id]";?>')" style="cursor:pointer;"></td>
																</tr>
															<?php }?>
															</table>
														</div>
													</td>
												</tr>
											</table>
										</td>
										<td width="5px"></td>
										<td align="center" valign="top">
											<table border="0px" width="90%" height="30px" style="border-collapse:collapse;background:green;font-size:13px;color:white;margin:5px auto;"><tr><td align="center">Manage Location</td></tr></table>
											<table border="0px" width="90%" style="border-collapse:collapse;font-family:tahoma;font-size:13px;margin:0 auto">
												<tr height="10px">
													<td colspan="2"></td>
												</tr>
												<tr height="25px">
													<td align="right"><input type="text" id="txtlocation" style="width:100%;height:25px"></td>
													<td><input type="button" value="Add" id="btnlocationadd" onclick="AddLocation()" style="height:25px"></td>
												</tr>
												<tr height="10px">
													<td colspan="2"></td>
												</tr>
												<tr>
													<td colspan="2" align="left" valign="top">
														<div id="locationlist" style="width:100%;height:233px;overflow:auto;border:1px solid gray">
															<table border="1px" width="100%" style="border-collapse:collapse;border:1px solid lightgrey">
															<?php
															$locationquery=mysql_query("select id, fldlocation from formfields where fldlocation!=''");
															while($locationrow=mysql_fetch_array($locationquery)){
															?>
																<tr style="font-family:tahoma;font-size:13px">
																	<td><?php echo "$locationrow[fldlocation]";?></td>
																	<td width="15px"><img src="../../images/deleteicon.png" height="15px" onclick="DeleteLocation('<?php echo "$locationrow[id]";?>')" style="cursor:pointer;"></td>
																</tr>
															<?php }?>
															</table>
														</div>
													</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr height="400px">
										<td align="left" valign="top" colspan="4">
											<fieldset><legend>Welcome Note</legend>
												<form name="wcform" action="" method="post">
													<textarea id="area2" name="wctext" style="width:100%;height:223px;"><?php echo "$wcrow[welcomenote]";?></textarea>
													<div style="width:100%;text-align:right"><input type="submit" value="Save" name="wcsubmit" style="width:100px;height:30px"></div>
												</form>
											</fieldset>
										</td>
									</tr>
								</table>
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