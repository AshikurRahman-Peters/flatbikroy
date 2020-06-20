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

if(isset($_REQUEST['publish'])){
$adid=$_GET['publish'];

$result2= mysql_query("select * from products where adid='$adid'");
$numrows=mysql_num_rows($result2);

if($numrows!=0){
$row2=mysql_fetch_array($result2);

$cmbtype=mysql_real_escape_string("$row2[type]");
$cmblocation=mysql_real_escape_string("$row2[location]");
$txtsize=mysql_real_escape_string("$row2[size]");
$taaddress=mysql_real_escape_string("$row2[address]");
$cmbdocumentation=mysql_real_escape_string("$row2[documentation]");
$txtprice=mysql_real_escape_string("$row2[price]");
$txtadtitle=mysql_real_escape_string("$row2[title]");
$taaddetails=mysql_real_escape_string("$row2[details]");
$txtname=mysql_real_escape_string("$row2[yname]");
$cmbylocation=mysql_real_escape_string("$row2[ylocation]");
$tayaddress=mysql_real_escape_string("$row2[yaddress]");
$txtphone=mysql_real_escape_string("$row2[phone]");
$txtemail=mysql_real_escape_string("$row2[email]");
$date="$row2[date]";
$ipaddress="$row2[ipaddress]";

mysql_query("insert into published (adid, date, ipaddress, type, location, size, address, documentation, price, title, details, yname, ylocation, yaddress, phone, email, status) values ('$adid', '$date', '$ipaddress', '$cmbtype', '$cmblocation', '$txtsize', '$taaddress', '$cmbdocumentation', '$txtprice', '$txtadtitle', '$taaddetails', '$txtname', '$cmbylocation', '$tayaddress', '$txtphone', '$txtemail', 'published')");
mysql_query("delete from products where adid='$adid'");


//---------------Email sender---------------

$recipient = $txtemail; //recipient 
$email = "info@jamibikroy.com"; //senders e-mail adress 

$Name = "JamiBikroy.com"; //senders name 

$mail_body  = "Hello $txtname, \r\n";
$mail_body .= "Your ad has been published \r\n";
$mail_body .= "You can view the ad on this url - \r\n";
$mail_body .= "http://www.jamibikroy.com/item/detail/?adid=$adid \r\n\n";
$mail_body .= "With regards, \r\n";
$mail_body .= "JamiBikroy.com \r\n";

$newtitle = stripslashes("$txtadtitle");

$subject = "Your ad $newtitle has been published"; //subject 
$header = "From: $Name\r\n"; //optional headerfields 

mail($recipient, $subject, $mail_body, $header); //mail command :) 

//-------------Email Sender Ends------------

}
}

if(isset($_REQUEST['delete'])){
$adid=$_GET['delete'];

mysql_query("delete from products where adid='$adid'");

if(file_exists("../../newad/upload/$adid.jpg")){
unlink("../../newad/upload/$adid.jpg");
unlink("../../newad/thumb/$adid.jpg");
}
}

if(isset($_REQUEST['clean'])){
mysql_query("delete from products where title = ''");
}

if(isset($_REQUEST['typefltr'])){
$typefltr=$_GET['typefltr'];
$result=mysql_query("select * from products where type='$typefltr' order by adid desc");
$rowc=mysql_num_rows($result);
$rowcount="$rowc Records Found for $typefltr";
}
else{
$result=mysql_query("select * from products order by adid desc");
$rowc=mysql_num_rows($result);
$rowcount="$rowc Records Found";
}
?>

<html>
	<head>
		<title>Jamibikroy.com | Admin | Pending Ads</title>
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

		<script>
			function TypeFilter(){
				var type = document.getElementsByName('typefilter')[0].value;
				window.location.href='?typefltr='+type;
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
							<td>&nbsp;&nbsp;&nbsp;&nbsp;Pending Ads > <?php echo $rowcount;?></td>
						</tr>
						<tr height="10px">
							<td></td>
						</tr>
						<tr height="25px" style="font-family:tahoma;font-size:13px;">
							<td align="right">Filter Type: 
								<select name="typefilter" onchange="TypeFilter()" style="height:25px;">
									<?php
									$tquery=mysql_query("select * from formfields where fldtype!=''");
									while($trow=mysql_fetch_array($tquery)){
									echo "<option>$trow[fldtype]</option>";
									}
									?>
								</select>
								<a href="?clean"><input type="button" name="btnclean" value="Clear Blank Rows" style="height:25px;cursor:pointer"></a>
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
									</tr>
								<?php
								while($row=mysql_fetch_array($result)){
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
										<td align="center"><table border="0px" style="border-collapse:collapse;font-family:tahoma;font-size:11px"><tr><td><img height="15px" src="../../images/viewicon.png"></td><td>&nbsp;<a href="view?adid=<?php echo "$row[adid]";?>">View</a></td></tr></table></td>
										<td align="center"><table border="0px" style="border-collapse:collapse;font-family:tahoma;font-size:11px"><tr><td><img height="15px" src="../../images/publishicon.png"></td><td>&nbsp;<a href="?publish=<?php echo "$row[adid]";?>">Publish</a></td></tr></table></td>
										<td align="center"><table border="0px" style="border-collapse:collapse;font-family:tahoma;font-size:11px"><tr><td><img height="15px" src="../../images/deleteicon.png"></td><td>&nbsp;<a href="?delete=<?php echo "$row[adid]";?>">Delete</a></td></tr></table></td>
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