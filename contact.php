<?php
       if(isset ($_REQUEST['Button1']))
           {

$name=$_REQUEST['name'];
$company=$_REQUEST['company'];
$email=$_REQUEST['email'];
$phone=$_REQUEST['phone'];
$subject=$_REQUEST['subject'];
$message=$_REQUEST['message'];

$str1 = "Name: $name";
$str2 = "Company: $company";

$str3 = "Phone: $phone";

$str5 = "Message: $message";

if ($name == "" || $email == "" || $phone == ""){
?>
<script>
alert ('Please Fillup all the TextBox');
</script>

<?
}
else{
				   
mail("info@jomibikroy.com", "Subject: $subject","$str1 | $str2 | $str3 | $str5", "From: $email");
?>

<script>

alert('Thank You for your Message');
</script>
<?
}

}
           
?>
<div>

<table style="margin:50px auto">

	<tr>
		<td style="padding:10px;width:300px;color:black">
				
			<font style="font-size:18px"><b>Contact us</b></font><br><br>
			Chemico Technique International Ltd.<br>
			Capita South Avenue Tower (5th floor)<br>
			Plot # SW(H)-2, Road # 3,<br>
			7 Gulshan Avenue,<br>
			Dahka-1212, Bangladesh<br>
			Tel: +88029851262, +88029851263<br>
			Fax: +88029895624<br>
			Email: info@chemicotechnique.com<br>
			chemico@bdmail.net

		</td>
		
		<td valign="top" style="padding:10px;color:black">
		<font style="font-size:18px;">Send your Inquiry</font>
			<div id="bv_Form1" style="position:relative;width:370px;height:279px;">
			<form name="Form1" method="post" action="" id="Form1">
			<div id="bv_Text1" style="margin:0;padding:0;position:absolute;left:0px;top:17px;width:74px;height:16px;text-align:right;z-index:23;">
			<font style="font-size:13px" color="black" face="Arial">Name:</font></div>
			<div id="bv_Text1" style="margin:0;padding:0;position:absolute;left:0px;top:48px;width:74px;height:16px;text-align:right;z-index:23;">
			<font style="font-size:13px" color="black" face="Arial">Company:</font></div>
			<div id="bv_Text2" style="margin:0;padding:0;position:absolute;left:0px;top:75px;width:74px;height:16px;text-align:right;z-index:24;">
			<font style="font-size:13px" color="black" face="Arial">Email:</font></div>
			<div id="bv_Text3" style="margin:0;padding:0;position:absolute;left:0px;top:102px;width:74px;height:16px;text-align:right;z-index:25;">
			<font style="font-size:13px" color="black" face="Arial">Phone:</font></div>
			<div id="bv_Text4" style="margin:0;padding:0;position:absolute;left:0px;top:131px;width:74px;height:16px;text-align:right;z-index:26;">
			<font style="font-size:13px" color="black" face="Arial">Subject:</font></div>
			<div id="bv_Text5" style="margin:0;padding:0;position:absolute;left:0px;top:160px;width:74px;height:16px;text-align:right;z-index:27;">
			<font style="font-size:13px" color="black" face="Arial">Message:</font></div>
			<input type="text" style="position:absolute;left:80px;top:15px;width:274px;height:20px;border:1px #C0C0C0 solid;z-index:28" name="name" value="" tabindex="1">
			<input type="text" style="position:absolute;left:80px;top:43px;width:274px;height:20px;border:1px #C0C0C0 solid;z-index:28" name="company" value="" tabindex="2">
			<input type="text" style="position:absolute;left:80px;top:71px;width:274px;height:20px;border:1px #C0C0C0 solid;z-index:29" name="email" value="" tabindex="3">
			<input type="text" style="position:absolute;left:80px;top:99px;width:274px;height:20px;border:1px #C0C0C0 solid;z-index:30" name="phone" value="" tabindex="4">
			<input type="text" style="position:absolute;left:80px;top:128px;width:274px;height:20px;border:1px #C0C0C0 solid;z-index:31" name="subject" value="" tabindex="5">
			<textarea name="message" style="position:absolute;left:80px;top:157px;width:274px;height:80px;border:1px #C0C0C0 solid;z-index:32" rows="5" cols="24" tabindex="6"></textarea>
			<input type="submit" name="Button1" value="Submit" style="position:absolute;left:281px;top:250px;width:75px;height:24px;z-index:33" tabindex="7">
			</form>
			</div>
		</td>
	</tr>

</table>



</div>