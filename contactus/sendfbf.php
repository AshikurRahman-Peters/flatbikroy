<?php
$fbfname= stripslashes("$_POST[fbfname]");
$fbfphone= stripslashes("$_POST[fbfphone]");
$fbfemail= stripslashes("$_POST[fbfemail]");
$fbfsubject= stripslashes("$_POST[fbfsubject]");
$fbfmessage= stripslashes("$_POST[fbfmessage]");


//---------------Email sender---------------

$recipient = "info@jamibikroy.com"; //recipient 
$email = $fbfemail; //senders e-mail address 

$Name = $fbfname; //senders name 

$mail_body  = "$fbfmessage \r\n\n";
$mail_body .= "$Name \r\n";
$mail_body .= "$fbfphone \r\n";
$mail_body .= "$fbfemail \r\n";

$subject = "FeedBack: $fbfsubject"; //subject 
$header = "From: $Name\r\n"; //optional headerfields 

mail($recipient, $subject, $mail_body, $header); //mail command :) 

//-------------Email Sender Ends------------

?>