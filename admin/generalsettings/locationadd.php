<?php
$location=$_POST['location'];
include('../../connect.php');
$lcheck=mysql_query("select * from formfields where fldlocation = '$location'");
$lchrow=mysql_num_rows($lcheck);

if($lchrow == 0)
mysql_query("insert into formfields (fldlocation) values ('$location')");
else
echo "<div style='width:100%;text-align:center'><font style='font-family:tahoma;font-size:12px;color:red'>Location Already Exists</font></div><br>";
?>
<table border="1px" width="100%" style="border:1px solid lightgrey;border-collapse:collapse;">
<?php
$locationquery=mysql_query("select id, fldlocation from formfields where fldlocation!=''");
while($locationrow=mysql_fetch_array($locationquery)){
?>
	<tr style="font-family:tahoma;font-size:13px">
		<td><?php echo "$locationrow[fldlocation]";?></td>
		<td width="15px"><img src="../../images/deleteicon.png" height="15px" onclick="DeleteLocation('<?php echo "$locationrow[id]";?>')" style="cursor:pointer;"></td>
	</tr>
<?php }?>
</table>