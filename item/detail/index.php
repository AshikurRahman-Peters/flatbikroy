<?php
$curl="../../";
include('../../config.php');
$adid=$_GET['adid'];
include('../../connect.php');
$result=mysql_query("select * from published where adid='$adid' && status='published'");
$row=mysql_fetch_array($result);

$cmbtype=$row['type'];
$cmblocation="$row[location]";
$txtsize="$row[size]";
$taaddress="$row[address]";
$cmbdocumentation="$row[documentation]";
$txtprice="$row[price]";
$txtadtitle="$row[title]";
$taaddetails=nl2br("$row[details]");
$txtname="$row[yname]";
$cmbylocation="$row[ylocation]";
$tayaddress="$row[yaddress]";
$txtphone="$row[phone]";
$txtemail="$row[email]";

if(file_exists("../../newad/upload/$adid.jpg")){
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
		<title><?php echo $txtadtitle;?></title>
		<link href="../../css/style.css" rel="stylesheet" type="text/css">
		<script>
			function SubmitForm(id){
				document.getElementById(id).submit();
			}
		</script>
		<script>
			function showContent(){
				document.getElementById('loading').style.display = 'none';
				document.getElementById('content').style.display = '';
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

						<tr>
							<td id="adformcontainer" colspan="5" valign="top" align="center"><br><br>
								<!----------------- Form Area ---------------->

								<table border="0px" width="800px" style="border-collapse:collapse;">

									<tr height="15px">
										<td width="320px" rowspan="19"><img src="../../newad/upload/<?php echo $img;?>" border="1px" width="300px"><br><br><br></td>
										<td width="480px" colspan="3"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px;font-weight:bold">
										<td width="150px" align="right">File No:</td>
										<td width="10px"></td>
										<td><?php echo $adid;?></td>
									</tr>

									<tr height="5px">
										<td colspan="3"></td>
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
										<td align="right">Type:</td>
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
									<tr height="30px">
										<td colspan="3"></td>
									</tr>

									
									<tr height="25px" bgcolor="#DBEBBC" style="font-family:tahoma;font-size:13px;color:#003700">
										<td colspan="4" align="center">Contact Details</td>
									</tr>
									<tr height="40" style="font-family:tahoma;font-size:15px;color:#00005E;font-weight:bold">
										<td colspan="4" align="center">Call for more details - 01977-933335</td>
									</tr>
									<tr height="200px" style="font-family:tahoma;font-size:13px;color:#003700">
										<td colspan="4"></td>
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