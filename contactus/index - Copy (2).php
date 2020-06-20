<?php
$curl="../";
include('../config.php');
include('../connect.php');
$result=mysql_query("select contactus from innerpages where id=1");
$row=mysql_fetch_array($result);

if(isset($_REQUEST['fbfsubmit'])){
$fbfname= stripslashes("$_POST[fbfname]");
$fbfphone= stripslashes("$_POST[fbfphone]");
$fbfemail= stripslashes("$_POST[fbfemail]");
$fbfsubject= stripslashes("$_POST[fbfsubject]");
$fbfmessage= stripslashes("$_POST[fbfmessage]");

if($fbfname == "" || $fbfphone == "" || $fbfemail == "" || $fbfsubject == "" || $fbfmessage == ""){
	echo "<script>alert('Please fillup all fields');</script>";
}
else{
$eok = 0;
?>
	<script>
	var x=document.getElementsByName('fbfemail')[0].value;
	var atpos=x.indexOf("@");
	var dotpos=x.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
	{
		<?php $eok;?> = 0;
	}
	else{
		<?php $eok;?> = 1;
	}
	</script>
<?php
if($eok == 0){
	echo "<script>alert('Email is not valid');</script>";
}
else{
//---------------Email sender---------------

$recipient = "info@jamibikroy.com"; //recipient 
$email = $fbfemail; //senders e-mail address 

$Name = $fbfname; //senders name 

$mail_body  = "$fbfmessage \r\n\n";
$mail_body .= "$Name \r\n";
$mail_body .= "$fbfphone \r\n";

$subject = "FeedBack: $fbfsubject"; //subject 
$header = "From: $Name\r\n"; //optional headerfields 

mail($recipient, $subject, $mail_body, $header); //mail command :) 

//-------------Email Sender Ends------------
}
}

}
?>


<html>
	<head>
		<title>Jamibikroy.com | Contact Us</title>
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
										<td width="365px" align="left" valign="top"><?php echo "$row[contactus]";?></td>
										<td width="10px"></td>
										<td width="10px" style="border-left:1px solid lightgrey"></td>
										<td width="355px">
											<!-------------------FeedBack Form------------------>
											<form action="" method="post">
											<table border="0px" width="350px" style="border-collapse:collapse;font-family:tahoma;font-size:13px">
												<tr height="30px" align="center">
													<td colspan="3" align="left" style="font-size:15px;font-weight:bold">Send Your FeedBack</td>
												</tr>

												<tr height="5px"><td colspan="3"></td></tr>
												<tr>
													<td align="right" valign="middle">Name</td>
													<td width="5px"></td>
													<td><input type="text" name="fbfname" style="width:200px;height:25px"></td>
												</tr>

												<tr height="5px"><td colspan="3"></td></tr>
												<tr>
													<td align="right" valign="middle">Phone no</td>
													<td></td>
													<td><input type="text" name="fbfphone" style="width:200px;height:25px"></td>
												</tr>

												<tr height="5px"><td colspan="3"></td></tr>
												<tr>
													<td align="right" valign="middle">Email</td>
													<td></td>
													<td><input type="text" name="fbfemail" style="width:200px;height:25px"></td>
												</tr>

												<tr height="5px"><td colspan="3"></td></tr>
												<tr>
													<td align="right" valign="middle">Subject</td>
													<td></td>
													<td><input type="text" name="fbfsubject" style="width:200px;height:25px"></td>
												</tr>

												<tr height="5px"><td colspan="3"></td></tr>
												<tr>
													<td align="right" valign="top">Message</td>
													<td></td>
													<td><textarea name="fbfmessage" style="width:250px;height:100px;font-family:tahoma;font-size:13px"></textarea></td>
												</tr>

												<tr height="5px"><td colspan="3"></td></tr>
												<tr>
													<td></td>
													<td></td>
													<td align="left" valign="middle"><input type="submit" name="fbfsubmit" value="Send Message" style="width:150px;height:25px"></td>
												</tr>

											</table>
											</form>
											<!-------------------FeedBack Form Ends ------------>
										</td>
									</tr>

									<tr height="40px"><td colspan="4"></td></tr>
									<tr height="30px"><td colspan="4" style="font-family:tahoma;font-size:15px;color:green;font-weight:bold">Location Map</td></tr>

									<tr height="5px"><td colspan="4"></td></tr>
									<tr>
										<td colspan="4" align="left"><img src="../images/map.jpg" style="border:1px solid gray"></td>
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