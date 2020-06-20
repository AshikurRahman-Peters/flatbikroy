<?php
session_start();
if (!isset($_SESSION['username']))
{
   header('Location: ../../');
   exit;
}

$action=isset($_REQUEST['action']);
if ($action=="logout"){
   unset($_SESSION['username']);
   header('Location: ../../');
   exit;
}


$adid=$_GET['adid'];
include('../../../connect.php');
$result=mysql_query("select * from published where adid='$adid'");
$row=mysql_fetch_array($result);

$cmbtype="$row[type]";
$cmblocation="$row[location]";
$txtsize="$row[size]";
$taaddress="$row[address]";
$cmbdocumentation="$row[documentation]";
$txtprice="$row[price]";
$txtadtitle="$row[title]";
$taaddetails="$row[details]";
$txtname="$row[yname]";
$cmbylocation="$row[ylocation]";
$tayaddress="$row[yaddress]";
$txtphone="$row[phone]";
$txtemail="$row[email]";
$status="$row[status]";
$date="$row[date]";
$ipaddress="$row[ipaddress]";

if($row['feature'] == '1'){
$chked = "checked";
}
else{
$chked = "";
}

if($cmbtype == "Plot_for_Developers")
$pricetext = "Expected Signing Money:";
else
$pricetext = "Expected Price:";


if($row['status'] == "published"){
$pubicn="unpublishicon.png";
$pubtxt="Unpublish";
}
else{
$pubicn="publishicon.png";
$pubtxt="Publish";
}

if(file_exists("../../../newad/upload/$adid.jpg")){
$img="$adid.jpg";
}
else{
$img="noimg.jpg";
}

if(isset($_REQUEST['delete'])){
$adid=$_GET['delete'];
mysql_query("delete from published where adid='$adid'");

if(file_exists("../../../newad/upload/$adid.jpg")){
unlink("../../../newad/upload/$adid.jpg");
unlink("../../../newad/thumb/$adid.jpg");
}

header('location:../');
}
?>

<html>
	<head>
		<title>Jamibikroy.com | Admin | Approved Ads | View</title>
		<link href="../../css/style.css" rel="stylesheet" type="text/css">
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
		<script>
			function tdhover(id){
				document.getElementById(id).style.background='#E1E1E1';
			}
			function tdout(id){
				document.getElementById(id).style.background='';
			}

		</script>
		<script type="text/javascript">
			function SaveForm(){
				if(confirm("Are you Sure?")){
					var adid = document.detailform.adid.value;
					var type = document.detailform.cmbtype.value;
					var location = document.detailform.cmblocation.value;
					var size = document.detailform.txtsize.value;
					var address = document.detailform.taaddress.value;
					var documentation = document.detailform.cmbdocumentation.value;
					var price = document.detailform.txtprice.value;
					var title = document.detailform.txtadtitle.value;
					var details = document.detailform.taaddetails.value;
					var yname = document.detailform.txtname.value;
					var ylocation = document.detailform.cmbylocation.value;
					var yaddress = document.detailform.tayaddress.value;
					var phone = document.detailform.txtphone.value;
					var email = document.detailform.txtemail.value;
					var date = document.detailform.date.value;
					var ipaddress = document.detailform.ipaddress.value;

					xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function(){
						document.getElementById('').innerHTML = xmlhttp.responseText;
					}
					xmlhttp.open("POST", "save.php", true);
					xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xmlhttp.send("adid="+adid+"&&type="+type+"&&location="+location+"&&size="+size+"&&address="+address+"&&documentation="+documentation+"&&price="+price+"&&title="+title+"&&details="+details+"&&yname="+yname+"&&ylocation="+ylocation+"&&yaddress="+yaddress+"&&phone="+phone+"&&email="+email+"&&date="+date+"&&ipaddress="+ipaddress);
				}
			}
		</script>
		<script type="text/javascript">
			function PublishForm(){
				if(confirm("Are you Sure?")){
					var adid = document.detailform.adid.value;
					var status = document.detailform.status.value;
					
					xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function(){
						document.getElementById('').innerHTML = xmlhttp.responseText;
					}
					xmlhttp.open("POST", "publish.php", true);
					xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xmlhttp.send("adid="+adid+"&&status="+status);
				}
			}
		</script>
		
		<script>
			function IcnChange(){
				if(document.getElementById('pubtxt').innerHTML == 'Publish'){
					document.getElementById('pubicn').src='../../../images/unpublishicon.png';
					document.getElementById('pubtxt').innerHTML = 'Unpublish';
				}
				else{
					document.getElementById('pubicn').src='../../../images/publishicon.png';
					document.getElementById('pubtxt').innerHTML = 'Publish';
				}
			}
		</script>
		<script type="text/javascript">
			function FeatureSelect(chkid, adid){
				var ftrsts;
				if(document.getElementById(chkid).checked == true){
					ftrsts=1;
				}
				else{
					ftrsts=0;
				}
					xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function(){
						document.getElementById('').innerHTML = xmlhttp.responseText;
					}
					xmlhttp.open("POST", "feature.php", true);
					xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xmlhttp.send("adid="+adid+"&&ftrsts="+ftrsts);
			}
		</script>
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
							<td id="lftm1" onmouseover="LftmHover('lftm1')" onmouseout="LftmOut('lftm1')" onclick="LftmClick('lftm1', '../../pending')" style="font-family:tahoma;color:green;font-size:13px;cursor:pointer">&nbsp;&nbsp;Pending Ads</td>
						</tr>
						<tr height="30px">
							<td id="lftm2" onmouseover="LftmHover('lftm2')" onmouseout="LftmOut('lftm2')" onclick="LftmClick('lftm2', '../../published')" style="font-family:tahoma;color:green;font-size:13px;cursor:pointer">&nbsp;&nbsp;Approved Ads</td>
						</tr>
						<tr height="30px">
							<td id="lftm3" onmouseover="LftmHover('lftm3')" onmouseout="LftmOut('lftm3')" onclick="LftmClick('lftm3', '../../generalsettings')" style="font-family:tahoma;color:green;font-size:13px;cursor:pointer">&nbsp;&nbsp;General Settings</td>
						</tr>
						<tr height="30px">
							<td id="lftm4" onmouseover="LftmHover('lftm4')" onmouseout="LftmOut('lftm4')" onclick="LftmClick('lftm4', '../../aboutus')" style="font-family:tahoma;color:green;font-size:13px;cursor:pointer">&nbsp;&nbsp;About Us</td>
						</tr>
						<tr height="30px">
							<td id="lftm5" onmouseover="LftmHover('lftm5')" onmouseout="LftmOut('lftm5')" onclick="LftmClick('lftm5', '../../companyprofile')" style="font-family:tahoma;color:green;font-size:13px;cursor:pointer">&nbsp;&nbsp;Company Profile</td>
						</tr>
						<tr height="30px">
							<td id="lftm6" onmouseover="LftmHover('lftm6')" onmouseout="LftmOut('lftm6')" onclick="LftmClick('lftm6', '../../contactdetail')" style="font-family:tahoma;color:green;font-size:13px;cursor:pointer">&nbsp;&nbsp;Contact Detail</td>
						</tr>
						<tr height="30px">
							<td id="lftm7" onmouseover="LftmHover('lftm7')" onmouseout="LftmOut('lftm7')" onclick="LftmClick('lftm7', '../../useraccounts')" style="font-family:tahoma;color:green;font-size:13px;cursor:pointer">&nbsp;&nbsp;User Accounts</td>
						</tr>
					</table>
					<!-------------------------------- Left Container Ends ------------------------------------->
				</td>

				<td align="left" valign="top">
					<!---------------------------------- Body Container ---------------------------------------->
					<table border="0px" width="100%" style="border-collapse:collapse;">
						<tr height="30px" bgcolor="#E5EFCE" style="font-family:tahoma;font-size:13px">
							<td>&nbsp;&nbsp;&nbsp;&nbsp;Approved Ads > Detail</td>
						</tr>
						<tr height="10px">
							<td></td>
						</tr>
						<tr height="500px">
							<td align="center" valign="top">
								<!---------------------------------- Ad Details ----------------------------------------->
								<form name="detailform" action="" method="get">
								<input type="hidden" name="adid" value="<?php echo "$adid";?>">
								<input type="hidden" name="status" value="<?php echo "$status";?>">
								<input type="hidden" name="date" value="<?php echo "$date";?>">
								<input type="hidden" name="ipaddress" value="<?php echo "$ipaddress";?>">
								<table border="0px" width="100%" style="border-collapse:collapse;font-family:tahoma;font-size:11px">
									<tr height="40px">
										<td colspan="4">
											<table border="0px" width="100%" style="border-collapse:collapse;border-bottom:1px solid gray">
												<tr>
													<td width="100px" style="font-size:14px"><input id="chkbox" type="checkbox" <?php echo "$chked";?> onclick="FeatureSelect('chkbox', '<?php echo "$adid";?>')"> Feature Ad</td>
													<td></td>
													<td id="saveicn" width="50px" align="center" style="font-size:11px;cursor:pointer" onmouseover="tdhover('saveicn')" onmouseout="tdout('saveicn')" onclick="SaveForm()"><img height="28px" src="../../../images/saveicon.png"><br>Save</td>
													<td id="pbicn" width="50px" align="center" style="font-size:11px;cursor:pointer" onmouseover="tdhover('pbicn')" onmouseout="tdout('pbicn')" onclick="PublishForm();IcnChange()"><img id="pubicn" height="28px" src="../../../images/<?php echo "$pubicn";?>"><br><span id="pubtxt"><?php echo "$pubtxt";?></span></td>
													<td id="dlticn" width="50px" align="center" style="font-size:11px;cursor:pointer" onmouseover="tdhover('dlticn')" onmouseout="tdout('dlticn')"><a href="?delete=<?php echo "$adid";?>"><img height="28px" src="../../../images/deleteicon.png"><br>Delete</a></td>
												</tr>
												
											</table>
										</td>
									</tr>
									<tr height="10px">
										<td colspan="4"></td>
									</tr>									

									<tr style="font-family:tahoma;font-size:13px;font-weight:bold">

										<td width="50px" align="right">File No:</td>
										<td width="10px"></td>
										<td width="400px"><?php echo $adid;?></td>
										<td rowspan="18" align="center" valign="middle"><img src="../../../newad/upload/<?php echo $img;?>" border="1px" width="280px"><br><br><br></td>
									</tr>
									<tr height="5px">
										<td colspan="3"></td>
									</tr>

									<tr style="font-family:tahoma;font-size:13px">
										<td align="right">Ad Title:</td>
										<td width="10px"></td>
										<td><input type="text" name="txtadtitle" value="<?php echo $txtadtitle;?>" style="width:250px;height:27px" maxlength="100"></td>
									</tr>
									<tr height="5px">
										<td colspan="3"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px" valign="top">
										<td align="right">Ad Details:</td>
										<td width="10px"></td>
										<td><textarea name="taaddetails" id="taMessage2" style="width:350px;height:100px;font-family:tahoma;font-size:13px"><?php echo $taaddetails;?></textarea></td>
									</tr>
									
									<tr height="5px">
										<td colspan="3"></td>
									</tr>

									<tr style="font-family:tahoma;font-size:13px">
										<td align="right">Type:</td>
										<td width="10px"></td>
										<td>
											<select name="cmbtype" style="width:250px;height:27px;font-size:13px;">
												<option selected><?php echo $cmbtype;?></option>
												<?php
												$tquery=mysql_query("select * from formfields where fldtype!=''");
												while($trow=mysql_fetch_array($tquery)){
												echo "<option>$trow[fldtype]</option>";
												}
												?>
											</select>
										</td>
										
									</tr>

									<tr height="5px">
										<td colspan="3"></td>
									</tr>

									<tr style="font-family:tahoma;font-size:13px">
										<td align="right">Location:</td>
										<td width="10px"></td>
										<td>
											<select name="cmblocation" style="width:250px;height:27px;font-size:13px;">
												<option selected><?php echo $cmblocation;?></option>
												<?php
												$lquery=mysql_query("select * from formfields where fldlocation!=''");
												while($lrow=mysql_fetch_array($lquery)){
												echo "<option>$lrow[fldlocation]</option>";
												}
												?>
											</select>
										</td>
									</tr>

									<tr height="5px">
										<td colspan="3"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px">
										<td align="right">Size:</td>
										<td width="10px"></td>
										<td><input type="text" name="txtsize" value="<?php echo $txtsize;?>" style="width:150px;height:27px" maxlength="50"></td>
									</tr>
									<tr height="5px">
										<td colspan="3"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px" valign="top">
										<td align="right">Address:</td>
										<td width="10px"></td>
										<td><textarea name="taaddress" id="taMessage1" style="width:350px;height:70px;font-family:tahoma;font-size:13px"><?php echo $taaddress;?></textarea></td>
									</tr>
									
									<tr height="5px">
										<td colspan="3"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px">
										<td align="right">Documentation:</td>
										<td width="10px"></td>
										<td>
											<select name="cmbdocumentation" style="width:250px;height:27px;font-size:13px;">
												<option selected><?php echo $cmbdocumentation;?></option>
												<option>Completed</option>
												<option>Not Completed</option>
											</select>
											
										</td>
									</tr>
									<tr height="5px">
										<td colspan="3"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px">
										<td align="right"><?php echo "$pricetext";?></td>
										<td width="10px"></td>
										<td><input type="text" name="txtprice" value="<?php echo $txtprice;?>" style="width:150px;height:27px" maxlength="50"></td>
									</tr>
									<tr height="30px">
										<td colspan="3"></td>
									</tr>


									
									<tr height="25px" bgcolor="#DBEBBC" style="font-family:tahoma;font-size:13px;color:#003700">
										<td colspan="4" align="center">About Ad Publisher</td>
									</tr>
									<tr height="10px">
										<td colspan="3"></td>
										<td rowspan="10"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px">
										<td align="right">Name:</td>
										<td width="10px"></td>
										<td><input type="text" name="txtname" value="<?php echo $txtname;?>" style="width:250px;height:27px" maxlength="100"></td>
									</tr>
									<tr height="5px">
										<td colspan="3"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px">
										<td align="right">Location:</td>
										<td width="10px"></td>
										<td>
											<select name="cmbylocation" style="width:250px;height:27px;font-size:13px;">
												<option selected><?php echo $cmbylocation;?></option>
												<?php
												$lquery=mysql_query("select * from formfields where fldlocation!=''");
												while($lrow=mysql_fetch_array($lquery)){
												echo "<option>$lrow[fldlocation]</option>";
												}
												?>
											</select>
										</td>
									</tr>
									<tr height="5px">
										<td colspan="3"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px">
										<td align="right">Address:</td>
										<td width="10px"></td>
										<td><textarea name="tayaddress" id="taMessage3" style="width:350px;height:70px;font-family:tahoma;font-size:13px"><?php echo $tayaddress;?></textarea></td>
									</tr>
									<tr height="5px">
										<td colspan="3"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px">
										<td align="right">Phone:</td>
										<td width="10px"></td>
										<td><input type="text" name="txtphone" value="<?php echo $txtphone;?>" style="width:250px;height:27px" maxlength="100"></td>
									</tr>
									<tr height="5px">
										<td colspan="3"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px">
										<td align="right">Email:</td>
										<td width="10px"></td>
										<td><input type="text" name="txtemail" value="<?php echo $txtemail;?>" style="width:250px;height:27px" maxlength="100"></td>
									</tr>
									<tr height="30px">
										<td colspan="4"></td>
									</tr>
									

					
									
								</table>
								</form>
								<!---------------------------------- Ad Details End ------------------------------------->
							</td>
						</tr>

					</table>
					<!----------------------------------Body Container Ends ------------------------------------>
				</td>
			</tr>
		</table>
	</body>
</html>