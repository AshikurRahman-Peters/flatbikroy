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

?>



<html>
	<head>
		<title>Jamibikroy.com | Admin | User Accounts</title>
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

		<script type="text/javascript">
			function ChangePassword(cuser, cpass, npass, cnpass, opass){
				if(cpass != '' && npass != '' && cnpass != ''){
					if (npass != cnpass){
						alert("New Password and Confirm Password did not match");
					}
					else{
						xmlhttp = new XMLHttpRequest();
						xmlhttp.onreadystatechange = function(){
							document.getElementById('cperrtxt').innerHTML = xmlhttp.responseText;
						}
						xmlhttp.open("POST", "changepassword.php", true);
						xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						xmlhttp.send("cuser="+cuser+"&&cpass="+cpass+"&&npass="+npass+"&&opass="+opass);
					}
				}
				else{
					alert("Please Input all fields");
				}
			}
		</script>

		<script>
			function CreateUser(){
				var user = document.getElementsByName('txtnusername')[0].value;
				var pass = document.getElementsByName('txtnewpassword')[0].value;
				var cpass = document.getElementsByName('txtcnewpassword')[0].value;

				if(user == '' || pass == '' || cpass == ''){
					alert("Please Input all fields");
				}
				else{
					if(pass != cpass){
						alert("Password did not match");
					}
					else{
						xmlhttp = new XMLHttpRequest();
						xmlhttp.onreadystatechange = function(){
							document.getElementById('useraccarea').innerHTML = xmlhttp.responseText;
						}
						xmlhttp.open("POST", "createuser.php", true);
						xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						xmlhttp.send("user="+user+"&&pass="+pass);
					}
				}
			}
		</script>

		<script>
			function DeleteUser(id){
				if(confirm("Are you Sure?")){
					xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function(){
						document.getElementById('useraccarea').innerHTML = xmlhttp.responseText;
					}
					xmlhttp.open("POST", "deleteuser.php", true);
					xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xmlhttp.send("id="+id);
				}
			}
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
							<td>&nbsp;&nbsp;&nbsp;&nbsp;User Accounts</td>
						</tr>
						<tr height="10px">
							<td></td>
						</tr>
						<tr height="500px">
							<td align="center" valign="top">
								<!----------------------------------Pending Ads ----------------------------------------->
								<table border="0px" width="100%" style="border-collapse:collapse;">
									<tr>
										<td width="50%">
											<?php
											$uquery=mysql_query("select * from adminusers where username='$_SESSION[username]'");
											$urow=mysql_fetch_array($uquery);
											?>
											<fieldset style="font-family:tahoma;font-size:13px;"><legend>Change Current Account Pasword</legend>
												<form action="" method="POST">
												<input type="hidden" name="cpassword" value="<?php echo "$urow[password]";?>">
												<table border="0px" style="border-collapse:collapse;">
													<tr height="25px" style="font-family:tahoma;font-size:13px;">
														<td width="150px" align="right">Current Password:</td>
														<td width="5px"></td>
														<td><input type="password" name="txtcpassword" style="width:200px;height:25px"></td>
													</tr>
													<tr height="5px">
														<td colspan="3"></td>
													</tr>
													<tr height="25px" style="font-family:tahoma;font-size:13px;">
														<td align="right">New Password:</td>
														<td></td>
														<td><input type="password" name="txtnpassword" style="width:200px;height:25px"></td>
													</tr>
													<tr height="5px">
														<td colspan="3"></td>
													</tr>
													<tr height="25px" style="font-family:tahoma;font-size:13px;">
														<td align="right">Confirm New Password:</td>
														<td></td>
														<td><input type="password" name="txtcnpassword" style="width:200px;height:25px"></td>
													</tr>
													<tr height="5px">
														<td colspan="3"></td>
													</tr>
													<tr height="25px" style="font-family:tahoma;font-size:13px;">
														<td></td>
														<td></td>
														<td align="right"><input type="button" name="btncpassword" value="Change Password" onclick="ChangePassword('<?php echo "$_SESSION[username]";?>', txtcpassword.value, txtnpassword.value, txtcnpassword.value, cpassword.value)" style="width:150px;height:25px"></td>
													</tr>
													<tr height="15px">
														<td colspan="3" id="cperrtxt"></td>
													</tr>

												</table>
												</form>
											</fieldset>
										</td>
										<td width="50%">
										</td>
									</tr>
									<tr>
										<td>
											<fieldset style="font-family:tahoma;font-size:13px"><legend>Manage User Accounts</legend>
												<table border="0px" width="100%" style="border-collapse:collapse;font-family:tahoma;font-size:13px">
													<tr>
														<td align="right" width="150px">Username:</td>
														<td width="5px"></td>
														<td width="200px"><input type="text" name="txtnusername" style="width:200px;height:25px"></td>
														<td></td>
													</tr>
													<tr height="5px"><td colspan="4"></td></tr>
													<tr>
														<td align="right">Password:</td>
														<td width="5px"></td>
														<td><input type="password" name="txtnewpassword" style="width:200px;height:25px"></td>
														<td></td>
													</tr>
													<tr height="5px"><td colspan="4"></td></tr>
													<tr>
														<td align="right">Confirm Password:</td>
														<td width="5px"></td>
														<td><input type="password" name="txtcnewpassword" style="width:200px;height:25px"></td>
														<td></td>
													</tr>
													<tr height="5px"><td colspan="4"></td></tr>
													<tr align="right">
														<td></td>
														<td width="5px"></td>
														<td><input type="button" name="btncreateuser" value="Create New User" onclick="CreateUser()" style="width:150px;height:25px"></td>
														<td></td>
													</tr>
													<tr height="15px"><td colspan="4"></td></tr>
													<tr>
														<td colspan="4" align="center">
															<div id="useraccarea" style="width:100%;height:150px;overflow:auto">
																<table border="1px" width="100%" style="border-collapse:collapse;border:1px solid lightgrey;font-family:tahoma;font-size:13px">
																	<tr bgcolor="lightgreen">
																		<td>Username</td>
																		<td width="10px"></td>
																	</tr>
																	<?php
																	$cuquery=mysql_query("select * from adminusers order by id desc");
																	while($curow=mysql_fetch_array($cuquery)){
																	?>
																	<tr>
																		<td><?php echo "$curow[username]";?></td>
																		<td width="10px"><img src="../../images/deleteicon.png" height="15px" style="cursor:pointer" onclick="DeleteUser('<?php echo "$curow[id]";?>')"></td>
																	</tr>
																	<?php } ?>
																</table>
															</div>
														</td>
													</tr>

												</table>
											</fieldset>
										</td>
										<td></td>
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