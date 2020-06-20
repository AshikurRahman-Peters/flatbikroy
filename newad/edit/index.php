<?php
$curl="../../";
include('../../config.php');
include('../../connect.php');
$adid=$_GET['adid'];
$cmbtype=stripslashes("$_GET[cmbtype]");
$cmblocation=stripslashes("$_GET[cmblocation]");
$txtsize=stripslashes("$_GET[txtsize]");
$taaddress=stripslashes("$_GET[taaddress]");
$cmbdocumentation=stripslashes("$_GET[cmbdocumentation]");
$txtprice=stripslashes("$_GET[txtprice]");
$txtadtitle=stripslashes("$_GET[txtadtitle]");
$taaddetails=stripslashes(strip_tags("$_GET[taaddetails]"));
$txtname=stripslashes("$_GET[txtname]");
$cmbylocation=stripslashes("$_GET[cmbylocation]");
$tayaddress=stripslashes("$_GET[tayaddress]");
$txtphone=stripslashes("$_GET[txtphone]");
$txtemail=stripslashes("$_GET[txtemail]");

?>


<html>
	<head>
		<title>Jamibikroy.com | New Ad | Edit</title>
		<link href="../../css/style.css" rel="stylesheet" type="text/css">
		<script src="../../js/jscript.js"></script>
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

		<script>
			function FormSubmit(id){
				if (document.getElementsByName('txtsize')[0].value == ''){
					document.getElementsByName('txtsize')[0].style.border='1px solid red';
					document.getElementById('sizeerrtxt').height='20px';
					document.getElementById('sizeerrtxt').innerHTML = 'Size can not be empty';
				}
				if (document.getElementsByName('txtprice')[0].value == ''){
					document.getElementsByName('txtprice')[0].style.border='1px solid red';
					document.getElementById('priceerrtxt').height='20px';
					document.getElementById('priceerrtxt').innerHTML = 'Price can not be empty';
				}
				if (document.getElementsByName('txtadtitle')[0].value == ''){
					document.getElementsByName('txtadtitle')[0].style.border='1px solid red';
					document.getElementById('titleerrtxt').height='20px';
					document.getElementById('titleerrtxt').innerHTML = 'Title can not be empty';
				}
				if (document.getElementsByName('txtname')[0].value == ''){
					document.getElementsByName('txtname')[0].style.border='1px solid red';
					document.getElementById('ynameerrtxt').height='20px';
					document.getElementById('ynameerrtxt').innerHTML = 'Please enter your Name';
				}
				if (document.getElementsByName('txtphone')[0].value == ''){
					document.getElementsByName('txtphone')[0].style.border='1px solid red';
					document.getElementById('phoneerrtxt').height='20px';
					document.getElementById('phoneerrtxt').innerHTML = 'Please enter your Phone no.';
				}

				var x=document.getElementsByName('txtemail')[0].value;
				var eok = 0;
				var atpos=x.indexOf("@");
				var dotpos=x.lastIndexOf(".");
				if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
				{
					document.getElementsByName('txtemail')[0].style.border='1px solid red';
					document.getElementById('emailerrtxt').height='20px';
					document.getElementById('emailerrtxt').innerHTML = 'Not a valid Email Id';
				}
				else{
					eok = 1;
				}

				if (document.getElementsByName('txtsize')[0].value != '' && document.getElementsByName('txtprice')[0].value != '' && document.getElementsByName('txtadtitle')[0].value != '' && document.getElementsByName('txtname')[0].value != '' && document.getElementsByName('txtphone')[0].value != '' && eok == 1){
					document.getElementById(id).submit();
				}
				
			}
		</script>
		<script>
			function SizeText(){
				if(document.getElementsByName('cmbtype')[0].value == 'Land' || document.getElementsByName('cmbtype')[0].value == 'Plot' || document.getElementsByName('cmbtype')[0].value == 'Plot_for_Developers'){
					document.getElementById('sizetext').innerHTML = 'katha';
				}
				else{
					document.getElementById('sizetext').innerHTML = 'sft.';
				}
				if(document.getElementsByName('cmbtype')[0].value == 'Plot_for_Developers'){
					document.getElementById('fldprice').innerHTML = '*Expected Signing Money:';
				}
				else{
					document.getElementById('fldprice').innerHTML = '*Expected Price:';
				}
			}
		</script>
		<script>
			function FldTextValidation(textbox, errtxt){
				if(textbox.value!= ''){
					textbox.style.border='';
					document.getElementById(errtxt).innerHTML = '';
					document.getElementById(errtxt).height='0px';
				}
			}
		</script>
	</head>
	<body onload="SizeText();showContent()">
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
							<td width="302" style="background-image:url('../../images/newadpointer1.png');background-repeat:no-repeat;background-position:left top;">Fill Up your Form</td>
							<td width="7"></td>
							<td width="302" style="background-image:url('../../images/newadpointer2.png');background-repeat:no-repeat;background-position:left top;">Confirm your Information</td>
							<td width="7"></td>
							<td width="302" style="background-image:url('../../images/newadpointer3.png');background-repeat:no-repeat;background-position:left top;">Publish your Ad</td>
						</tr>
						<tr>
							<td id="adformcontainer" colspan="5" valign="top" align="center"><br><br>
								<!----------------- Form Area ---------------->
								<form id="form1" action="../review" method="get" style="width:800px;text-align:left;margin:0 auto">
								<input type="hidden" name="adid" value="<?php echo "$adid";?>">
								<table border="0px" width="800px" style="border-collapse:collapse;">
									
									<tr height="15px">
										<td colspan="3"></td>
									</tr>

									<tr style="font-family:tahoma;font-size:13px">
										<td align="right" width="200px">*Ad Title:</td>
										<td width="10px"></td>
										<td><input type="text" name="txtadtitle" value="<?php echo "$txtadtitle";?>" style="width:250px;height:27px" maxlength="100" onKeyUp="FldTextValidation(this, 'titleerrtxt')"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px;color:red">
										<td colspan="2"></td>
										<td id="titleerrtxt"></td>
									</tr>
									<tr height="15px">
										<td colspan="3"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px" valign="top">
										<td align="right" width="200px">Ad Details:</td>
										<td width="10px"></td>
										<td><textarea name="taaddetails" id="taMessage2" style="width:350px;height:100px;font-family:tahoma;font-size:13px" onkeyup="CheckFieldLength(this, 'charcount2', 'remaining2', 1000);" onkeydown="CheckFieldLength(this, 'charcount2', 'remaining2', 1000);" onmouseout="CheckFieldLength(this, 'charcount2', 'remaining2', 1000);" onfocus="ChangeHeight('taarea2char')"><?php echo "$taaddetails";?></textarea></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px;" valign="top">
										<td align="right" width="200px"></td>
										<td width="10px"></td>
										<td><div id="taarea2char" style="height:0px;overflow:hidden"><small><span id="charcount2">0</span> characters entered. | <span id="remaining2">1000</span> characters remaining.</small></div></td>
									</tr>

									<tr height="15px">
										<td colspan="3"></td>
									</tr>

									<tr style="font-family:tahoma;font-size:13px">
										<td align="right" width="200px">Type:</td>
										<td width="10px"></td>
										<td>
											<select name="cmbtype" style="width:250px;height:27px;font-size:13px;" onchange="SizeText()">
												<option selected><?php echo "$cmbtype";?></option>
												<?php
												$typequery=mysql_query("select fldtype from formfields where fldtype!= ''");
												while ($typerow=mysql_fetch_array($typequery)){
												echo "<option>$typerow[fldtype]</option>";
												}
												?>
											</select>
										</td>
									</tr>

									<tr height="15px">
										<td colspan="3"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px">
										<td align="right" width="200px">Location:</td>
										<td width="10px"></td>
										<td>
											<select name="cmblocation" style="width:250px;height:27px;font-size:13px;">
												<option selected><?php echo "$cmblocation";?></option>
												<?php
												$locationquery=mysql_query("select fldlocation from formfields where fldlocation!= ''");
												while ($locationrow=mysql_fetch_array($locationquery)){
												echo "<option>$locationrow[fldlocation]</option>";
												}
												?>
											</select>
										</td>
									</tr>

									<tr height="15px">
										<td colspan="3"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px">
										<td align="right" width="200px">*Size:</td>
										<td width="10px"></td>
										<td><input type="text" name="txtsize" value="<?php echo "$txtsize";?>" style="width:150px;height:27px" maxlength="50" onKeyUp="numericFilter(this);FldTextValidation(this, 'sizeerrtxt')"> <span id="sizetext"></span></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px;color:red">
										<td colspan="2"></td>
										<td id="sizeerrtxt"></td>
									</tr>
									<tr height="15px">
										<td colspan="3"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px" valign="top">
										<td align="right" width="200px">Address:</td>
										<td width="10px"></td>
										<td><textarea name="taaddress" id="taMessage1" style="width:350px;height:70px;font-family:tahoma;font-size:13px" onkeyup="CheckFieldLength(this, 'charcount1', 'remaining1', 200);" onkeydown="CheckFieldLength(this, 'charcount1', 'remaining1', 200);" onmouseout="CheckFieldLength(this, 'charcount1', 'remaining1', 200);" onfocus="ChangeHeight('taarea1char')"><?php echo "$taaddress";?></textarea></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px;" valign="top">
										<td align="right" width="200px"></td>
										<td width="10px"></td>
										<td><div id="taarea1char" style="height:0px;overflow:hidden"><small><span id="charcount1">0</span> characters entered. | <span id="remaining1">200</span> characters remaining.</small></div></td>
									</tr>
									<tr height="15px">
										<td colspan="3"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px">
										<td align="right" width="200px">Documentation:</td>
										<td width="10px"></td>
										<td>
											<select name="cmbdocumentation" style="width:250px;height:27px;font-size:13px;">
												<option selected><?php echo "$cmbdocumentation";?></option>
												<option>Completed</option>
												<option>Processing</option>
												<option>Not Completed</option>
											</select>
										</td>
									</tr>
									<tr height="15px">
										<td colspan="3"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px">
										<td id="fldprice" align="right" width="200px">*Expected Price:</td>
										<td width="10px"></td>
										<td><input type="text" name="txtprice" value="<?php echo "$txtprice";?>" style="width:150px;height:27px" maxlength="50" onKeyUp="numericFilter(this);FldTextValidation(this, 'priceerrtxt')"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px;color:red">
										<td colspan="2"></td>
										<td id="priceerrtxt"></td>
									</tr>
									<tr height="15px">
										<td colspan="3"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px">
										<td align="right" valign="top" width="200px">Image:</td>
										<td width="10px"></td>
										<td><iframe style="width:100%;height:25px;" src="uploadform.php?adid=<?php echo "$adid";?>" scrolling="no" frameborder="0"></iframe></td>
									</tr>
									<tr height="15px">
										<td colspan="3"></td>
									</tr>
									
									<tr height="25px" bgcolor="#DBEBBC" style="font-family:tahoma;font-size:13px;color:#003700">
										<td colspan="3">&nbsp;&nbsp;&nbsp;About Yourself</td>
									</tr>
									<tr height="15px">
										<td colspan="3"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px">
										<td align="right" width="200px">*Your Name:</td>
										<td width="10px"></td>
										<td><input type="text" name="txtname" value="<?php echo "$txtname";?>" style="width:250px;height:27px;" maxlength="30" onKeyUp="FldTextValidation(this, 'ynameerrtxt')"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px;color:red">
										<td colspan="2"></td>
										<td id="ynameerrtxt"></td>
									</tr>
									<tr height="15px">
										<td colspan="3"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px">
										<td align="right" width="200px">Your Location:</td>
										<td width="10px"></td>
										<td>
											<select name="cmbylocation" style="width:200px;height:27px;font-size:13px;">
												<?php
												$locationquery=mysql_query("select fldlocation from formfields where fldlocation!= ''");
												while ($locationrow=mysql_fetch_array($locationquery)){
												echo "<option>$locationrow[fldlocation]</option>";
												}
												?>
											</select>
										</td>
									</tr>
									<tr height="15px">
										<td colspan="3"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px" valign="top">
										<td align="right" width="200px">Your Address:</td>
										<td width="10px"></td>
										<td><textarea name="tayaddress" id="taMessage3" style="width:350px;height:70px;font-family:tahoma;font-size:13px" onkeyup="CheckFieldLength(this, 'charcount3', 'remaining3', 200);" onkeydown="CheckFieldLength(this, 'charcount3', 'remaining3', 200);" onmouseout="CheckFieldLength(this, 'charcount3', 'remaining3', 200);" onfocus="ChangeHeight('taarea3char')"><?php echo "$tayaddress";?></textarea></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px;" valign="top">
										<td align="right" width="200px"></td>
										<td width="10px"></td>
										<td><div id="taarea3char" style="height:0px;overflow:hidden"><small><span id="charcount3">0</span> characters entered. | <span id="remaining3">200</span> characters remaining.</small></div></td>
									</tr>
									<tr height="15px">
										<td colspan="3"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px">
										<td align="right" width="200px">*Phone:</td>
										<td width="10px"></td>
										<td><input type="text" name="txtphone" value="<?php echo "$txtphone";?>" style="width:200px;height:27px;" maxlength="30" onKeyUp="FldTextValidation(this, 'phoneerrtxt')"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px;color:red">
										<td colspan="2"></td>
										<td id="phoneerrtxt"></td>
									</tr>
									<tr height="15px">
										<td colspan="3"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px">
										<td align="right" width="200px">*Email:</td>
										<td width="10px"></td>
										<td><input type="text" name="txtemail" value="<?php echo "$txtemail";?>" style="width:250px;height:27px;" maxlength="40" onKeyUp="FldTextValidation(this, 'emailerrtxt')"></td>
									</tr>
									<tr style="font-family:tahoma;font-size:13px;color:red">
										<td colspan="2"></td>
										<td id="emailerrtxt"></td>
									</tr>
									<tr height="15px">
										<td colspan="3"></td>
									</tr>
									<tr height="40px">
										<td align="right" width="200px"></td>
										<td width="10px"></td>
										<td><input type="button" onclick="FormSubmit('form1')" value="Review Ad" style="width:150px;height:30px"></td>
									</tr>
									<tr height="15px">
										<td colspan="3"></td>
									</tr>

								</table>
								</form>
								
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