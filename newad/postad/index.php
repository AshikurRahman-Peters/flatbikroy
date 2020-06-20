<?php
$curl="../../";
include('../../config.php');

$adid=$_GET['adid'];
include('../../connect.php');
$cmbtype=mysql_real_escape_string(stripslashes("$_GET[cmbtype]"));
$cmblocation=mysql_real_escape_string(stripslashes("$_GET[cmblocation]"));
$txtsize=mysql_real_escape_string(stripslashes("$_GET[txtsize]"));
$taaddress=mysql_real_escape_string(stripslashes("$_GET[taaddress]"));
$cmbdocumentation=mysql_real_escape_string(stripslashes("$_GET[cmbdocumentation]"));
$txtprice=mysql_real_escape_string(stripslashes("$_GET[txtprice]"));
$txtadtitle=mysql_real_escape_string(stripslashes("$_GET[txtadtitle]"));
$taaddetails=strip_tags(mysql_real_escape_string(stripslashes("$_GET[taaddetails]")));
$txtname=mysql_real_escape_string(stripslashes("$_GET[txtname]"));
$cmbylocation=mysql_real_escape_string(stripslashes("$_GET[cmbylocation]"));
$tayaddress=mysql_real_escape_string(stripslashes("$_GET[tayaddress]"));
$txtphone=mysql_real_escape_string(stripslashes("$_GET[txtphone]"));
$txtemail=mysql_real_escape_string(stripslashes("$_GET[txtemail]"));
$date=(gmstrftime("%Y-%m-%d"));
$ipaddress=$_SERVER['REMOTE_ADDR'];

if($cmbtype=="Land" || $cmbtype=="Plot" || $cmbtype=="Plot_for_Developers")
$unit="katha";
else
$unit="sft.";

if (file_exists("../../newad/thumb/$adid.jpg")){
$img = "$adid.jpg";
}
else{
$img = "noimg.jpg";
}

$result=mysql_query("select title from products where adid='$adid'");
$row=mysql_fetch_array($result);

if($row['title'] == ''){
mysql_query("update products set date='$date', ipaddress='$ipaddress', type='$cmbtype', location='$cmblocation', size='$txtsize', address='$taaddress', documentation='$cmbdocumentation', price='$txtprice', title='$txtadtitle', details='$taaddetails', yname='$txtname', ylocation='$cmbylocation', yaddress='$tayaddress', phone='$txtphone', email='$txtemail' where adid='$adid'");


//---------------Email sender---------------

$recipient = $txtemail; //recipient 
$email = "info@jamibikroy.com"; //senders e-mail adress 

$Name = "JamiBikroy.com"; //senders name 

$mail_body  = "Hello $txtname, \r\n";
$mail_body .= "Thank you for posting your ad on JamiBikroy.com \r\n";
$mail_body .= "Your ad will now be reviewed. It can take maximum 3 hours from now to publish the ad \r\n";
$mail_body .= "When the ad has been approved, you will be notified by this email \r\n\n";
$mail_body .= "With regards, \r\n";
$mail_body .= "JamiBikroy.com \r\n";

$newtitle = stripslashes($txtadtitle);

$subject = "Your ad $newtitle has submitted to jamibikroy.com"; //subject 
$header = "From: $Name\r\n"; //optional headerfields 

mail($recipient, $subject, $mail_body, $header); //mail command :) 

//-------------Email Sender Ends------------

}
?>


<html>
	<head>
		<title>Jamibikroy.com | New Ad | Post</title>
		<link href="../../css/style.css" rel="stylesheet" type="text/css">
		<script>
			function ImgHover(id, imgname){
				document.getElementById(id).src= '../../images/'+imgname;
			}
		</script>
		<script>
			function showContent(){
				document.getElementById('loading').style.display = 'none';
				document.getElementById('content').style.display = '';
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
							<td width="302" style="background-image:url('../../images/newadpointer2.png');background-repeat:no-repeat;background-position:left top;">Confirm your Information</td>
							<td width="7"></td>
							<td width="302" style="background-image:url('../../images/newadpointer3-3.png');background-repeat:no-repeat;background-position:left top;">Publish your Ad</td>
						</tr>
						<tr>
							<td id="adformcontainer" colspan="5" valign="top" align="center"><br><br>
								<!----------------- Form Area ---------------->

								<table border="0px" width="800px" height="600px" style="border-collapse:collapse;">
									<tr height="150px">
										<td valign="top" align="center" colspan="5" style="font-family:tahoma;font-size:15px">
											<font style="font-family:tahoma;font-size:18px">Your ad has been successfully posted for review</font><br>
											<font style="font-family:tahoma;font-size:14px">It will take maximum 3 hours to publish. After reviewing the ad an email will be sent to this mail<br></font>
											<font style="font-family:tahoma;font-size:14px;color:green"><?php echo "$txtemail";?></font>
										</td>
									</tr>
									<tr height="80px" style="border:1px solid lightgray">
										<td width="100px" align="center" valign="middle"><img src="../../newad/thumb/<?php echo $img;?>" width="90px" height="70px"></td>
										<td width="5px"></td>
										<td width="400px" align="left" valign="top">
											<font style="font-family:tahoma;font-size:15px;color:green;font-weight:bold"><?php echo stripslashes("$txtadtitle");?></font><br><font style="font-size:4px"><br></font>
											<font style="font-family:tahoma;font-size:13px;color:gray;"><?php echo "$txtsize $unit $cmbtype";?> in <?php echo "$cmblocation";?></font>
										</td>
										<td width="15px"></td>
										<td>
											<font style="font-family:tahoma;font-size:14px;">tk. <?php echo number_format("$txtprice", 2);?></font><br>
											<font style="font-family:tahoma;font-size:12px;color:gray">Posted on <?php echo "$date";?></font>
										</td>
									</tr>
									<tr><td colspan="5"></td></tr>
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