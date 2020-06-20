<?php
$id=$_POST['id'];
include('../../connect.php');
mysql_query("delete from formfields where id='$id'");
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