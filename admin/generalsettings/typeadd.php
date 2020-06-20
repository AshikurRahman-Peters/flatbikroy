<?php
$type=$_POST['type'];
include('../../connect.php');
$check=mysql_query("select * from formfields where fldtype = '$type'");
$chrow=mysql_num_rows($check);
if($chrow == 0)
mysql_query("insert into formfields (fldtype) values ('$type')");
else
echo "<div style='width:100%;text-align:center'><font style='font-family:tahoma;font-size:12px;color:red'>Type Already Exists</font></div><br>";
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