<?php
include('../../connect.php');
$user = $_POST['user'];
$pass = MD5(mysql_real_escape_string($_POST['pass']));

$check=mysql_query("select * from adminusers where username='$user'");
$crow=mysql_num_rows($check);

if($crow != 0){
echo "<font style='color:red'>Username already exists</font><br><br>";
}
else{
mysql_query("insert into adminusers (username, password) values ('$user', '$pass')");
}
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
