<?php
$curl="../";
include('../config.php');
include('../connect.php');
$result=mysql_query("select cprofile from innerpages where id=1");
$row=mysql_fetch_array($result);
?>


<html>
	<head>
		<title>Jamibikroy.com | Company Profile</title>
		<link href="../css/style.css" rel="stylesheet" type="text/css">
		<script>
			function ImgHover(id, imgname){
				document.getElementById(id).src= '../images/'+imgname;
			}
		</script>

		<script>
			function showContent(){
				document.getElementById('loading').style.display = 'none';
				document.getElementById('content').style.display = '';
			}
		</script>

		<script>
			function rahover(id){
				if(document.getElementById(id).style.background == ''){
					document.getElementById(id).style.background = '#67B048';
					document.getElementById(id).style.color = 'white';
				}
				else{
					document.getElementById(id).style.background = '';
					document.getElementById(id).style.color = '#006600';
				}
			}
		</script>
		<script>
			function SizeText(){
				if(document.getElementsByName('cmbtype')[0].value == 'Any'){
					document.getElementById('sizetext').innerHTML = 'Size:';
				}
				else if(document.getElementsByName('cmbtype')[0].value == 'Land' || document.getElementsByName('cmbtype')[0].value == 'Plot' || document.getElementsByName('cmbtype')[0].value == 'Plot_for_Developers'){
					document.getElementById('sizetext').innerHTML = 'Size (katha):';
				}
				else{
					document.getElementById('sizetext').innerHTML = 'Size (sft.):';
				}
			}
		</script>
	</head>
	<body onload="showContent()">
		<?php include_once("../analyticstracking.php") ?>
		<div id="loading"><img src="../images/loading_icon.gif"></div>
		<table border="0px" id="content" width="1000px" height="1000px" style="border-collapse:collapse;background:white;display:none">
			<tr class="headerheight">
				<td>
					<?php include('../header.php');?>
				</td>
			</tr>
			<tr height="40px">
				<td align="right" style="font-family:tahoma;color:white;font-size:12px;background-image:url('../images/101.png');background-repeat:no-repeat;background-position:left top;">
					<?php include('../topmenu.php');?>
				</td>
			</tr>
			<tr height="700px">
				<td valign="top">
					<table border="0px" width="100%" height="100%" style="margin:-1 0;border-collapse:collapse;">
						<tr height="5px">
							<td width="240px" bgcolor="#E5EFCE">&nbsp;</td>
							<td width="20px"></td>
							<td></td>
						</tr>
						<tr>
							<td bgcolor="#E5EFCE" align="center" valign="top">

								<!--------------------- This is the Left Container------------------>
								<?php include('../leftcontains.php');?>
								<!------------------------ Left Container End----------------------->
							</td>
							<td></td>
							<td align="left" valign="top">
								<!----------------------------------------Body Container --------------------------------->
								<table border="0px" width="740px" style="border-collapse:collapse;">
									<tr>
										<td><?php echo "$row[cprofile]";?></td>
									</tr>

								</table>
								<br><br>
								<!----------------------------------------Body Container End ----------------------------->
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr height="100px" style="border-top:1px solid lightgray">
				<td align="center"><?php include('../footer.php');?></td>
			</tr>
			<tr height="40px">
				<td bgcolor="green" align="center"><?php include('../bottom-footer.php');?></td>
			</tr>
		</table>
	</body>
</html>