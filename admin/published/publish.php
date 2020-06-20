<?php
$adid=$_POST['adid'];
$status=$_POST['status'];

if($status=="published"){
$newstatus="unpublished";
}
else{
$newstatus="published";
}

include('../../connect.php');
mysql_query("update published set status='$newstatus' where adid='$adid'");
?>