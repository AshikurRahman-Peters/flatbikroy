<?php
$id=$_POST['id'];
include('../../connect.php');
mysql_query("delete from formfields where id='$id'");
?>
<table border="1px" width="100%" style="border:1px solid lightgrey;border-collapse:collapse;">
<?php
$typequery=mysql_query("select id, fldtype from formfields where fldtype!=''");
while($typerow=mysql_fetch_array($typequery)){
?>
	<tr style="font-family:tahoma;font-size:13px">
		<td><?php echo "$typerow[fldtype]";?></td>
		<td width="15px"><img src="../../images/deleteicon.png" height="15px" onclick="DeleteType('<?php echo "$typerow[id]";?>')" style="cursor:pointer;"></td>
	</tr>
<?php }?>
</table>