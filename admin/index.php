<?php
if(isset($_POST['btnlogin'])){
include('../connect.php');
	$username=$_POST['txtusername'];
	$password=MD5(mysql_real_escape_string($_POST['txtpassword']));
	$result=mysql_query("select * from adminusers where username='$username' && password='$password'");
	$row=mysql_num_rows($result);
	if ($row == 0){
	?>
		<script>alert('Invalid Username or Password');</script>
	<?php
	}
	else{
		session_start();
		$_SESSION['username']="$username";
		header('location:pending');
		exit;
	}
}
?>
<html>
	<head>
		<title>Jamibikroy.com | Admin</title>
		<link href="css/style.css" rel="stylesheet" type="text/css">
	</head>

	<body>
<?php include_once("../analyticstracking.php") ?>
		<table border="0px" width="100%" height="100%" style="border-collapse:collapse;font-family:tahoma">
			<tr height="40px" bgcolor="green">
				<td align="center" style="font-size:16px;color:white">JamiBikroy.Com</td>
			</tr>

			<tr>
				<td align="center">
					<form action="" method="post">
					<table border="0px" width="450px" height="300px" style="border-collapse:collapse;font-family:tahoma;border:1px solid green;">
						<tr height="40px">
							<td colspan="4" align="center" bgcolor="green" style="font-size:15px;color:white">Admin Login</td>
						</tr>

						<tr height="70px">
							<td width="25px"></td>
							<td width="100px"></td>
							<td></td>
							<td width="25px"></td>
						</tr>
						<tr height="30px">
							<td></td>
							<td align="right" style="font-size:13px">Username &nbsp;</td>
							<td><input type="text" name="txtusername" style="width:300px;height:30px"></td>
							<td></td>
						</tr>
						<tr height="15px">
							<td colspan="4"></td>
						</tr>
						<tr height="30px">
							<td></td>
							<td align="right" style="font-size:13px">Password &nbsp;</td>
							<td><input type="password" name="txtpassword" style="width:300px;height:30px"></td>
							<td></td>
						</tr>
						<tr height="15px">
							<td colspan="4"></td>
						</tr>
						<tr height="100px">
							<td></td>
							<td></td>
							<td align="right" valign="top"><input type="submit" name="btnlogin" value="Login" style="width:100px;height:30px"></td>
							<td></td>
						</tr>
					</table>
					</form>
				</td>
			</tr>

		</table>
	</body>
</html>