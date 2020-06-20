<?php
$curl="../../";
include('../../config.php');
$adid=$_GET['adid'];

$cmbtype=stripslashes("$_GET[cmbtype]");
$cmblocation=stripslashes("$_GET[cmblocation]");
$txtsize=stripslashes("$_GET[txtsize]");
$taaddress=stripslashes("$_GET[taaddress]");
$cmbdocumentation=stripslashes("$_GET[cmbdocumentation]");
$txtprice=stripslashes("$_GET[txtprice]");
$txtadtitle=stripslashes("$_GET[txtadtitle]");
$taaddetails=stripslashes(nl2br("$_GET[taaddetails]"));
$txtname=stripslashes("$_GET[txtname]");
$cmbylocation=stripslashes("$_GET[cmbylocation]");
$tayaddress=stripslashes("$_GET[tayaddress]");
$txtphone=stripslashes("$_GET[txtphone]");
$txtemail=stripslashes("$_GET[txtemail]");

if(file_exists("../upload/$adid.jpg")){
$img="$adid.jpg";
}
else{
$img="noimg.jpg";
}

if($cmbtype == "Plot_for_Developers")
$pricetext = "Expected Signing Money:";
else
$pricetext = "Expected Price:";

if($cmbtype == "Flat" || $cmbtype == "Shop")
$unit = "sft.";
else
$unit = "katha";

?>

<html>
	<head>
		<title>Jamibikroy.com | New Ad | Review</title>
		<link href="../../css/style.css" rel="stylesheet" type="text/css">
		<script>
			function showContent(){
				document.getElementById('loading').style.display = 'none';
				document.getElementById('content').style.display = '';
			}
		</script>
		<script>
			function SubmitForm(id){
				document.getElementById(id).submit();
			}
		</script>
		<script>
			function ImgHover(id, imgname){
				document.getElementById(id).src= '../../images/'+imgname;
			}
		</script>
	</head>
	<body onload="showContent()">
<?php include_once("../../analyticstracking.php") ?>
		<div id="loading"><img src="../../images/loading_icon.gif"></div>
		<table border="0px" id="content" width="1000px" height="1000px" style="border-collapse:collapse;display:none">
			<tr class="headerheight">
				<td>
					<?php include('../../header.php');?>
				</td>
			</tr>
			<tr height="40px">
				<td align="right" style="font-family:tahoma;color:white;font-size:12px;background-image:url('../../images/101.png');background-repeat:no-repeat;background-position:left top;">
					<?php include('../../topmenu.php');?>
				</td>
			</tr>
			<tr>
				<td valign="middle" align="center" bgcolor="#D8E9B8">
					<table border="0px" width="920px" style="margin:30 0;border-collapse:collapse;background:white;">
						<tr height="41px" bgcolor="#98CE80" align="center" valign="middle" style="font-family:tahoma;color:white;font-weight:bold">
							<td width="302" style="background-image:url('../../images/newadpointer2-1.png');background-repeat:no-repeat;background-position:left top;">Fill Up your Form</td>
							<td width="7"></td>
							<td width="302" style="background-image:url('../../images/newadpointer2-2.png');background-repeat:no-repeat;background-position:left top;">Confirm your Information</td>
							<td width="7"></td>
							<td width="302" style="background-image:url('../../images/newadpointer3.png');background-repeat:no-repeat;background-position:left top;">Publish your Ad</td>
						</tr>
						<tr>
							<td id="adformcontainer" colspan="5" valign="top" align="center"><br><br>
								<!----------------- Form Area ---------------->

								<table border="0px" width="800px" style="border-collapse:collapse;">

									<tr height="15px">
										<td width="320px" rowspan="17"><img src="../upload/<?php echo $img;?>" border="1px" width="300px"><br><br><br></td>
										<td width="480px" colspan="3"></td>
									</tr>

									<tr style="font-family:tahoma;font-size:13px">
										<td align="right">Ad Title:</td>
										<td width="10px"></td>
										<td><?php echo $txtadtitle;?></td>
									</tr>
									<tr height="5px">
										<td colspan="3"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px" valign="top">
										<td align="right">Ad Details:</td>
										<td width="10px"></td>
										<td><?php echo $taaddetails;?></td>
									</tr>
									
									<tr height="30px">
										<td colspan="3"></td>
									</tr>

									<tr style="font-family:tahoma;font-size:13px">
										<td width="150px" align="right">Type:</td>
										<td width="10px"></td>
										<td><?php echo $cmbtype;?></td>
										
									</tr>

									<tr height="5px">
										<td colspan="3"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px">
										<td align="right">Location:</td>
										<td width="10px"></td>
										<td><?php echo $cmblocation;?></td>
									</tr>

									<tr height="5px">
										<td colspan="3"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px">
										<td align="right">Size:</td>
										<td width="10px"></td>
										<td><?php echo "$txtsize $unit";?></td>
									</tr>
									<tr height="5px">
										<td colspan="3"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px" valign="top">
										<td align="right">Address:</td>
										<td width="10px"></td>
										<td><?php echo $taaddress;?></td>
									</tr>
									
									<tr height="5px">
										<td colspan="3"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px">
										<td align="right">Documentation:</td>
										<td width="10px"></td>
										<td><?php echo $cmbdocumentation;?></td>
									</tr>
									<tr height="5px">
										<td colspan="3"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px">
										<td align="right"><?php echo $pricetext;?></td>
										<td width="10px"></td>
										<td><?php echo $txtprice;?></td>
									</tr>
									<tr height="5px">
										<td colspan="3"></td>
									</tr>

									<tr height="25px" bgcolor="#DBEBBC" style="font-family:tahoma;font-size:13px;color:#003700">
										<td colspan="4">&nbsp;&nbsp;&nbsp;About Yourself</td>
									</tr>
									<tr height="5px">
										<td rowspan="13"></td>
										<td colspan="3"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px">
										<td align="right">Your Name:</td>
										<td width="10px"></td>
										<td><?php echo $txtname;?></td>
									</tr>
									<tr height="5px">
										<td colspan="3"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px">
										<td align="right">Your Location:</td>
										<td width="10px"></td>
										<td><?php echo $cmbylocation;?></td>
									</tr>
									<tr height="5px">
										<td colspan="3"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px" valign="top">
										<td align="right">Your Address:</td>
										<td width="10px"></td>
										<td><?php echo $tayaddress;?></td>
									</tr>
									
									<tr height="5px">
										<td colspan="3"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px">
										<td align="right">Phone:</td>
										<td width="10px"></td>
										<td><?php echo $txtphone;?></td>
									</tr>
									<tr height="5px">
										<td colspan="3"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px">
										<td align="right">Email:</td>
										<td width="10px"></td>
										<td><?php echo $txtemail;?></td>
									</tr>
									<tr height="150px">
										<td colspan="3"></td>
									</tr>
									<tr height="40px">
										<td align="right"></td>
										<td width="10px"></td>


										<form id="editform" action="../edit" method="get">
										<input type="hidden" name="adid" value="<?php echo "$adid";?>">
										<input type="hidden" name="cmbtype" value="<?php echo "$cmbtype";?>">
										<input type="hidden" name="cmblocation" value="<?php echo "$cmblocation";?>">
										<input type="hidden" name="txtsize" value="<?php echo "$txtsize";?>">
										<input type="hidden" name="taaddress" value="<?php echo "$taaddress";?>">
										<input type="hidden" name="cmbdocumentation" value="<?php echo "$cmbdocumentation";?>">
										<input type="hidden" name="txtprice" value="<?php echo "$txtprice";?>">
										<input type="hidden" name="txtadtitle" value="<?php echo "$txtadtitle";?>">
										<input type="hidden" name="taaddetails" value="<?php echo "$taaddetails";?>">
										<input type="hidden" name="txtname" value="<?php echo "$txtname";?>">
										<input type="hidden" name="cmbylocation" value="<?php echo "$cmbylocation";?>">
										<input type="hidden" name="tayaddress" value="<?php echo "$tayaddress";?>">
										<input type="hidden" name="txtphone" value="<?php echo "$txtphone";?>">
										<input type="hidden" name="txtemail" value="<?php echo "$txtemail";?>">
										</form>

										<form id="postform" action="../postad" method="get">
										<input type="hidden" name="adid" value="<?php echo "$adid";?>">
										<input type="hidden" name="cmbtype" value="<?php echo "$cmbtype";?>">
										<input type="hidden" name="cmblocation" value="<?php echo "$cmblocation";?>">
										<input type="hidden" name="txtsize" value="<?php echo "$txtsize";?>">
										<input type="hidden" name="taaddress" value="<?php echo "$taaddress";?>">
										<input type="hidden" name="cmbdocumentation" value="<?php echo "$cmbdocumentation";?>">
										<input type="hidden" name="txtprice" value="<?php echo "$txtprice";?>">
										<input type="hidden" name="txtadtitle" value="<?php echo "$txtadtitle";?>">
										<input type="hidden" name="taaddetails" value="<?php echo "$taaddetails";?>">
										<input type="hidden" name="txtname" value="<?php echo "$txtname";?>">
										<input type="hidden" name="cmbylocation" value="<?php echo "$cmbylocation";?>">
										<input type="hidden" name="tayaddress" value="<?php echo "$tayaddress";?>">
										<input type="hidden" name="txtphone" value="<?php echo "$txtphone";?>">
										<input type="hidden" name="txtemail" value="<?php echo "$txtemail";?>">
										</form>

										<td>
											<input type="button" value="Edit Information" onclick="SubmitForm('editform')" style="width:130px;height:30px">&nbsp;&nbsp;<input type="button" value="Post Ad" onclick="SubmitForm('postform')" style="width:130px;height:30px">
										</td>
									</tr>
									<tr height="5px">
										<td colspan="3"></td>
									</tr>

								</table>
								
								<!----------------- Form Area End ------------>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr height="100px" style="border-top:1px solid lightgray">
				<td align="center"><?php include('../../footer.php');?></td>
			</tr>
			<tr height="40px">
				<td bgcolor="green" align="center"><?php include('../../bottom-footer.php');?></td>
			</tr>
		</table>
	</body>
</html>