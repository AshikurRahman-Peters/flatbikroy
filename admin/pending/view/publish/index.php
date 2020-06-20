<?php
session_start();
if (!isset($_SESSION['username']))
{
   header('Location: ../../../../');
   exit;
}

$adid="$_GET[adid]";
include('../../../../connect.php');

$result2= mysql_query("select * from products where adid='$adid'");
$numrows=mysql_num_rows($result2);

if($numrows!=0){
$row2=mysql_fetch_array($result2);


$cmbtype=mysql_real_escape_string(stripslashes("$_GET[cmbtype]"));
$cmblocation=mysql_real_escape_string(stripslashes("$_GET[cmblocation]"));
$txtsize=mysql_real_escape_string(stripslashes("$_GET[txtsize]"));
$taaddress=mysql_real_escape_string(stripslashes("$_GET[taaddress]"));
$cmbdocumentation=mysql_real_escape_string(stripslashes("$_GET[cmbdocumentation]"));
$txtprice=mysql_real_escape_string(stripslashes("$_GET[txtprice]"));
$txtadtitle=mysql_real_escape_string(stripslashes("$_GET[txtadtitle]"));
$taaddetails=mysql_real_escape_string(stripslashes("$_GET[taaddetails]"));
$txtname=mysql_real_escape_string(stripslashes("$_GET[txtname]"));
$cmbylocation=mysql_real_escape_string(stripslashes("$_GET[cmbylocation]"));
$tayaddress=mysql_real_escape_string(stripslashes("$_GET[tayaddress]"));
$txtphone=mysql_real_escape_string(stripslashes("$_GET[txtphone]"));
$txtemail=mysql_real_escape_string(stripslashes("$_GET[txtemail]"));
$date="$_GET[date]";
$ipaddress="$_GET[ipaddress]";

mysql_query("insert into published (adid, date, ipaddress, type, location, size, address, documentation, price, title, details, yname, ylocation, yaddress, phone, email, status) values ('$adid', '$date', '$ipaddress', '$cmbtype', '$cmblocation', '$txtsize', '$taaddress', '$cmbdocumentation', '$txtprice', '$txtadtitle', '$taaddetails', '$txtname', '$cmbylocation', '$tayaddress', '$txtphone', '$txtemail', 'published')");
mysql_query("delete from products where adid='$adid'");

//---------------Email sender---------------

$recipient = $txtemail; //recipient 
$email = "info@jamibikroy.com"; //senders e-mail adress 

$Name = "JamiBikroy.com"; //senders name 

$mail_body  = "Hello $txtname, \r\n";
$mail_body .= "Your ad has been published \r\n";
$mail_body .= "You can view the ad on this url - \r\n";
$mail_body .= "http://www.jamibikroy.com/item/detail/?adid=$adid \r\n\n";
$mail_body .= "With regards, \r\n";
$mail_body .= "JamiBikroy.com \r\n";

$newtitle = stripslashes("$txtadtitle");

$subject = "Your ad $newtitle has been published"; //subject 
$header = "From: $Name\r\n"; //optional headerfields 

mail($recipient, $subject, $mail_body, $header); //mail command :) 

//-------------Email Sender Ends------------

}
?>


<html>
<head>
<title>Jamibikroy.com | Admin | Pending Ads | Publish</title>
<script>window.location.href='../../';</script>
</head>
</html>