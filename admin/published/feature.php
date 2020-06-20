<?php
$adid=$_POST['adid'];
$ftrsts=$_POST['ftrsts'];
include('../../connect.php');
mysql_query("update published set feature='$ftrsts' where adid='$adid'");
?>