<?php
$id = $_POST['id'];

include('../../connect.php');
mysql_query("delete from adminusers where id='$id'");

?>
<table border="1px" width="100%" style="border-collapse:collapse;border:1px solid lightgrey;font-family:tahoma;font-size:13px">
	<tr bgcolor="lightgreen">
		<td>Username</td>
		<td width="10px"></td>
	</tr>
	<?php
	$cuquery=mysql_query("select * from adminusers order by id desc");
	while($curow=mysql_fetch_array($cuquery)){
	?>
	<tr>
		<td><?php echo "$curow[username]";?></td>
		<td width="10px"><img src="../../images/deleteicon.png" height="15px" style="cursor:pointer" onclick="DeleteUser('<?php echo "$curow[id]";?>')"></td>
	</tr>
	<?php } ?>
</table>
