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

if(isset($_REQUEST['delete'])){
$adid=$_GET['delete'];
mysql_query("delete from published where adid='$adid'");

if(file_exists("../../newad/upload/$adid.jpg")){
unlink("../../newad/upload/$adid.jpg");
}
}


$vdatefrom = "";
$vdateto = "";
$vflttype="Any";
$vfltlocation = "Any";
$vpublish = "";
$vfeature = "";


if(isset($_REQUEST['datefrom'])){
	$datefrom=$_GET['datefrom'];
	$dateto=$_GET['dateto'];
	$flttype=$_GET['flttype'];
	$fltlocation=$_GET['fltlocation'];
	$publish=$_GET['publish'];
	$feature=$_GET['feature'];

	if($datefrom != "" || $dateto != ""){
		$qdate="&& date between '$datefrom' and '$dateto'";
		$datetext="Date:$datefrom to $dateto, ";
		$vdatefrom = "$datefrom";
		$vdateto = "$dateto";
	}
	else{
		$qdate = "";
		$datetext="";
	}

	if($flttype != "Any"){
		$qtype="&& type='$flttype'";
		$vflttype="$flttype";
	}
	else{
		$qtype = "";
	}

	if($fltlocation != "Any"){
		$qlocation = "&& location='$fltlocation'";
		$vfltlocation = "$fltlocation";
	}
	else{
		$qlocation = "";
	}

	if($publish != 0){
		$qpublish = "&& status = 'unpublished'";
		$publishtext = "No";
		$vpublish = "checked";
	}
	else{
		$qpublish = "";
		$publishtext = "Yes";
	}

	if($feature != 0){
		$qfeature = "&& feature = 1";
		$featuretext = "Yes";
		$vfeature = "checked";
	}
	else{
		$qfeature = "";
		$featuretext = "No";
	}


	$result=mysql_query("select * from published where title!='' $qdate $qtype $qlocation $qpublish $qfeature order by adid desc");
	$rcount=mysql_num_rows($result);
	$filtertext = "$rcount Records Found";

}
else{
	$result=mysql_query("select * from published order by adid desc");
	$rcount=mysql_num_rows($result);
	$filtertext = "$rcount Records Found";
}




?>
<html>
	<head>
		<title>Jamibikroy.com | Admin | Approved Ads</title>
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
		
		<script>
			function DeleteAd(adid){
				if(confirm("Are you Sure?")){
					
					var datefrom = document.getElementsByName('datefrom')[0].value;
					var dateto = document.getElementsByName('dateto')[0].value;
					var flttype = document.getElementsByName('flttype')[0].value;
					var fltlocation = document.getElementsByName('fltlocation')[0].value;
	
					if(document.getElementsByName('publish')[0].checked == true){
						var publish = 1;
					}
					else{
						var publish = 0;
					}

					if(document.getElementsByName('feature')[0].checked == true){
						var feature = 1;
					}
					else{
						var feature = 0;
					}

					window.location.href='?delete='+adid+'&&datefrom='+datefrom+'&&dateto='+dateto+'&&flttype='+flttype+'&&fltlocation='+fltlocation+'&&publish='+publish+'&&feature='+feature;
				}
			}
		</script>		


		<script type="text/javascript">
			function PublishAd(adid, status){
					xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function(){
						document.getElementById('').innerHTML = xmlhttp.responseText;
					}
					xmlhttp.open("POST", "publish.php", true);
					xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xmlhttp.send("adid="+adid+"&&status="+status);
			}
		</script>
		<script type="text/javascript">
			function PubIcnChange(icnid, lnkid){
				if(document.getElementById(lnkid).innerHTML == 'Publish'){
					document.getElementById(icnid).src='../../images/unpublishicon.png';
					document.getElementById(lnkid).innerHTML='Unpublish';
				}
				else{
					document.getElementById(icnid).src='../../images/publishicon.png';
					document.getElementById(lnkid).innerHTML='Publish';
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
		<script>
			function Filter(){
				var datefrom = document.getElementsByName('datefrom')[0].value;
				var dateto = document.getElementsByName('dateto')[0].value;
				var flttype = document.getElementsByName('flttype')[0].value;
				var fltlocation = document.getElementsByName('fltlocation')[0].value;

				if(document.getElementsByName('publish')[0].checked == true){
					var publish = 1;
				}
				else{
					var publish = 0;
				}

				if(document.getElementsByName('feature')[0].checked == true){
					var feature = 1;
				}
				else{
					var feature = 0;
				}

				window.location.href='?datefrom='+datefrom+'&&dateto='+dateto+'&&flttype='+flttype+'&&fltlocation='+fltlocation+'&&publish='+publish+'&&feature='+feature;
			}
		</script>


		<link rel="stylesheet" href="./south-street/jquery.ui.all.css" type="text/css">

		<script type="text/javascript" src="./jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="./jquery.ui.core.min.js"></script>
		<script type="text/javascript" src="./jquery.ui.widget.min.js"></script>
		<script type="text/javascript" src="./jquery.ui.datepicker.min.js"></script>
		<style type="text/css">
			.ui-datepicker
			{
				font-family: Arial;
				font-size: 13px;
				z-index: 1003 !important;
				display: none;
			}
		</style>
		<script type="text/javascript">
			$(document).ready(function()
			{
				var jQueryDatePicker1Opts =
				{
					dateFormat: 'yy-mm-dd',
					changeMonth: true,
					changeYear: true,
					showButtonPanel: false,
					showAnim: 'show'
				};
				$("#jQueryDatePicker1").datepicker(jQueryDatePicker1Opts);

				$("#jQueryDatePicker2").datepicker(jQueryDatePicker1Opts);
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
							<td>&nbsp;&nbsp;&nbsp;&nbsp;Approved Ads > <?php echo "$filtertext";?></td>
						</tr>
						<tr height="10px">
							<td></td>
						</tr>
						<tr height="30px" style="font-family:tahoma;font-size:13px;">
							<td align="right">
								Date: <input type="text" id="jQueryDatePicker1" name="datefrom" value="<?php echo "$vdatefrom";?>" style="width:100px;height:25px"> To: <input type="text" id="jQueryDatePicker2" name="dateto" value="<?php echo "$vdateto";?>" style="width:100px;height:25px"> | 
								Type: 
								<select name="flttype" style="height:25px">
									<option selected><?php echo "$vflttype";?></option>
									<option>Any</option>
									<?php
									$tquery=mysql_query("select * from formfields where fldtype!=''");
									while($trow=mysql_fetch_array($tquery)){
									echo "<option>$trow[fldtype]</option>";
									}
									?>
								</select> | 
								
								Location: 
								<select name="fltlocation" style="height:25px">
									<option selected><?php echo "$vfltlocation";?></option>
									<option>Any</option>
									<?php
									$lquery=mysql_query("select * from formfields where fldlocation!=''");
									while($lrow=mysql_fetch_array($lquery)){
									echo "<option>$lrow[fldlocation]</option>";
									}
									?>
								</select><br>
							</td>
						</tr>
						<tr height="30px" style="font-family:tahoma;font-size:13px;">
							<td align="right">
								<input type="checkbox" <?php echo "$vpublish";?> name="publish">UnPublished Ad &nbsp;&nbsp;<input type="checkbox" <?php echo "$vfeature";?> name="feature">Featured Ad
							</td>
						</tr>
						<tr height="30px">
							<td align="right">
								<input type="button" value="Filter" name="btnfilter" style="width:100px;height:25px" onclick="Filter()">
							</td>
						</tr>
						<tr height="10px">
							<td></td>
						</tr>
						<tr height="500px">
							<td align="center" valign="top">
								<!----------------------------------Pending Ads ----------------------------------------->
								<table border="1px" width="100%" style="border:1px solid lightgrey;border-collapse:collapse;font-family:tahoma;font-size:11px">
									<tr height="25px" bgcolor="#E5EFCE">
										<td>File No</td>
										<td>Date</td>
										<td>Type</td>
										<td>Title</td>
										<td>Location</td>
										<td>Size</td>
										<td>Price</td>
										<td>Phone no</td>
										<td></td>
										<td></td>
										<td></td>
										<td>Feature Ads</td>
									</tr>
								<?php
								while($row=mysql_fetch_array($result)){
								if($row['status'] == 'published'){
								$pubicon = "unpublishicon.png";
								$pubtext = "Unpublish";
								}
								else{
								$pubicon = "publishicon.png";
								$pubtext = "Publish";
								}

								if($row['feature'] == '1'){
								$chked="checked";
								}
								else{
								$chked="";
								}
								?>
									<tr height="25px">
										<td><?php echo "$row[adid]";?></td>
										<td><?php echo "$row[date]";?></td>
										<td><?php echo "$row[type]";?></td>
										<td><?php echo "$row[title]";?></td>
										<td><?php echo "$row[location]";?></td>
										<td><?php echo "$row[size]";?></td>
										<td><?php echo "$row[price]";?></td>
										<td><?php echo "$row[phone]";?></td>
										<td><table border="0px" style="border-collapse:collapse;font-family:tahoma;font-size:11px"><tr><td><img height="15px" src="../../images/viewicon.png"></td><td>&nbsp;<a href="view?adid=<?php echo "$row[adid]";?>">View</a></td></tr></table></td>
										<td><table border="0px" style="border-collapse:collapse;font-family:tahoma;font-size:11px"><tr><td><img id="pubicn<?php echo "$row[adid]";?>" height="15px" src="../../images/<?php echo "$pubicon";?>"></td><td>&nbsp;<span style="cursor:pointer;text-decoration:underline" id="pubtxt<?php echo "$row[adid]";?>" onclick="PublishAd('<?php echo "$row[adid]";?>', '<?php echo "$row[status]";?>');PubIcnChange('pubicn<?php echo "$row[adid]";?>', 'pubtxt<?php echo "$row[adid]";?>')"><?php echo "$pubtext";?></span></td></tr></table></td>
										<td><table border="0px" style="border-collapse:collapse;font-family:tahoma;font-size:11px"><tr><td><img height="15px" src="../../images/deleteicon.png"></td><td>&nbsp;<span style="text-decoration:underline;cursor:pointer" onclick="DeleteAd('<?php echo "$row[adid]";?>')">Delete</span></td></tr></table></td>
										<td><input type="checkbox" <?php echo "$chked";?> id="chk<?php echo "$row[adid]";?>" onclick="FeatureSelect('chk<?php echo "$row[adid]";?>', '<?php echo "$row[adid]";?>')"></td>

									</tr>
								<?php }?>								
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