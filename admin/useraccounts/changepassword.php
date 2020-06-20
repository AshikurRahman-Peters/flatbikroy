<?php
include('../../connect.php');
$cuser = $_POST['cuser'];
$cpass = MD5(mysql_real_escape_string($_POST['cpass']));
$npass = MD5(mysql_real_escape_string($_POST['npass']));
$opass = $_POST['opass'];

if($opass != $cpass){
echo "<font style='font-size:12px;color:red'>Old Password did not match</font>";
}
else{
mysql_query("update adminusers set password='$npass' where username='$cuser'");
echo "<font style='font-size:12px;color:green'>Password Successfully Changed</font>";
}
?>
