<table border="0px" width="230px" style="border-collapse:collapse;font-family:tahoma;">
	<tr>
		<td height="30px" style="background-image:url('<?php echo $base_url;?>images/102.png');background-repeat:no-repeat;background-position:left top;font-size:13px;color:white">&nbsp;&nbsp;Refine Attributes</td>
	</tr>
	<tr>
		<td align="center">
			<form action="<?php echo $base_url;?>filter" method="get" style="font-size:12px">
				<br>
				<table border="0px" width="200px" style="font-size:12px;border-collapse:collapse;">
					<tr>
						<td width="50px" style="color:#005500;">Type:</td>
						<td>
							<select name="cmbtype" style="width:150px;height:25px;font-size:12px" onchange="SizeText()">
<option>Any</option>
<?php
include('connect.php');
$typequery=mysql_query("select fldtype from formfields where fldtype!= ''");
while ($typerow=mysql_fetch_array($typequery)){
echo "<option>$typerow[fldtype]</option>";
}
?>
							</select>
						</td>
					</tr>
					<tr height="3px">
						<td colspan="2"></td>
					</tr>

					<tr>
						<td style="color:#005500;">Area:</td>
						<td>
							<select name="cmblocation" style="width:150px;height:25px;font-size:12px">
<option>Any</option>
<?php
$locationquery=mysql_query("select fldlocation from formfields where fldlocation!= ''");
while ($locationrow=mysql_fetch_array($locationquery)){
echo "<option>$locationrow[fldlocation]</option>";
}
?>
							</select></td>
					</tr>
					<tr height="5px">
						<td colspan="2"></td>
					</tr>

					<tr height="1px">
						<td colspan="2" style="border-bottom:1px solid #67B048"></td>
					</tr>

					<tr height="5px">
						<td colspan="2"></td>
					</tr>
					<tr>
						<td colspan="2" id="sizetext" style="color:#005500;">Size:</td>
					</tr>
					<tr height="5px">
						<td colspan="2"></td>
					</tr>

					<tr>
						<td colspan="2" align="right" style="color:#005500;">
							<input type="text" name="txtsizefrom" style="width:83px;height:25px;font-size:12px">
							to
							<input type="text" name="txtsizeto" style="width:83px;height:25px;font-size:12px">
						</td>
					</tr>
					<tr height="5px">
						<td colspan="2"></td>
					</tr>


					<tr height="1px">
						<td colspan="2" style="border-bottom:1px solid #67B048"></td>
					</tr>
					<tr height="5px">
						<td colspan="2"></td>
					</tr>

					<tr>
						<td colspan="2" style="color:#005500;">Price Range:</td>
					</tr>
					<tr height="5px">
						<td colspan="2"></td>
					</tr>

					<tr>
						<td colspan="2" align="right" style="color:#005500;">
							<input name="txtpricefrom" type="text" name="" style="width:83px;height:25px;font-size:12px">
							to
							<input name="txtpriceto" type="text" name="" style="width:83px;height:25px;font-size:12px">
						</td>
					</tr>
					<tr height="5px">
						<td colspan="2"></td>
					</tr>

					<tr>
						<td colspan="2" align="right"><input style="width:100px;height:35px;color:#005500;cursor:pointer" type="submit" name="fltrsubmit" value="Search"></td>
					</tr>
				</table>
			</form>
		</td>
	</tr>
	<tr height="10px"><td></td></tr>
	
	<tr>
		<td height="30px" style="background-image:url('<?php echo $base_url;?>images/102.png');background-repeat:no-repeat;background-position:left top;font-size:13px;color:white">&nbsp;&nbsp;Recent Ads</td>
	</tr>
	
	<tr>
		<td align="center">
			<!------------------------------ Recent Ads----------------------------------->
			<table border="0px" width="220px" style="border-collapse:collapse;">
				<tr height="10px">
					<td colspan="3"></td>
				</tr>
				<?php
				$unit="";
				$racount=mysql_query("select count(*) as racnt from published where status='published' && title!=''");
				$ratrow=mysql_fetch_array($racount);
				$raquery=mysql_query("select * from published where status='published' && title!='' order by id desc limit 5");
				while ($rarow=mysql_fetch_array($raquery)){
				if(file_exists("{$base_url}newad/thumb/$rarow[adid].jpg")){
				$img = "$rarow[adid].jpg";
				}
				else{
				$img = "noimg.jpg";
				}
				if($rarow['type'] == 'Land' || $rarow['type'] == 'Plot' || $rarow['type'] == 'Plot_for_Developers')
				$unit = "katha";
				else
				$unit = "sft.";
				?>
				<tr id="rarow<?php echo "$rarow[adid]";?>" onmouseover="rahover('rarow<?php echo "$rarow[adid]";?>')" onmouseout="rahover('rarow<?php echo "$rarow[adid]";?>')" onclick="window.location.href='<?php echo $base_url;?>item/detail/?adid=<?php echo "$rarow[adid]";?>'" align="left" valign="top" style="cursor:pointer;color:#006600">
					<td width="60px"><img src="<?php echo $base_url;?>newad/thumb/<?php echo "$img";?>" width="60px"></td>
					<td width="5px"></td>
					<td>
						<font style="font-family:tahoma;font-size:12px;font-weight:bold;"><?php echo "$rarow[title]";?></font><br>
						<font style="font-family:tahoma;font-size:3px;"><br></font>
						<font style="font-family:tahoma;font-size:11px;"><?php echo "$rarow[size] $unit $rarow[type] in $rarow[location]";?></font><br>
					</td>
				</tr>
				<tr height="10px">
					<td colspan="3"></td>
				</tr>
				<tr height="1px" style="border-bottom:1px solid #67B048">
					<td colspan="3"></td>
				</tr>
				<tr height="10px">
					<td colspan="3"></td>
				</tr>
				<?php }?>
			</table>
		
			<!------------------------------ Recent Ads End ------------------------------>
		</td>
	</tr>
	<tr height="10px"><td></td></tr>
	<tr>
		<td width="230px" height="150px" align="center">
			<!---------------------------- Company Ad ------------------------>
			<img src="<?php echo "{$base_url}images/placead.png"?>" width="220px">
			<!---------------------------- Company Ad End--------------------->
		</td>
	</tr>
	<tr height="15px"><td></td></tr>
	<tr height="25px" style="font-family:tahoma;font-size:12px;">
		<td>
		</td>
	</tr>

</table>