<?php
$adid="$_POST[adid]";
include('../../../connect.php');
$cmbtype=mysql_real_escape_string(stripslashes("$_POST[type]"));
$cmblocation=mysql_real_escape_string(stripslashes("$_POST[location]"));
$txtsize=mysql_real_escape_string(stripslashes("$_POST[size]"));
$taaddress=mysql_real_escape_string(stripslashes("$_POST[address]"));
$cmbdocumentation=mysql_real_escape_string(stripslashes("$_POST[documentation]"));
$txtprice=mysql_real_escape_string(stripslashes("$_POST[price]"));
$txtadtitle=mysql_real_escape_string(stripslashes("$_POST[title]"));
$taaddetails=mysql_real_escape_string(stripslashes("$_POST[details]"));
$txtname=mysql_real_escape_string(stripslashes("$_POST[yname]"));
$cmbylocation=mysql_real_escape_string(stripslashes("$_POST[ylocation]"));
$tayaddress=mysql_real_escape_string(stripslashes("$_POST[yaddress]"));
$txtphone=mysql_real_escape_string(stripslashes("$_POST[phone]"));
$txtemail=mysql_real_escape_string(stripslashes("$_POST[email]"));
$date="$_POST[date]";
$ipaddress="$_POST[ipaddress]";

mysql_query("update published set date='$date', ipaddress='$ipaddress', type='$cmbtype', location='$cmblocation', size='$txtsize', address='$taaddress', documentation='$cmbdocumentation', price='$txtprice', title='$txtadtitle', details='$taaddetails', yname='$txtname', ylocation='$cmbylocation', yaddress='$tayaddress', phone='$txtphone', email='$txtemail' where adid='$adid'");
?>