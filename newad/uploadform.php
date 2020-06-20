<?php
$adid=$_GET['adid'];
?>
<html>
<head>

</head>

<body>

<form action="submitform.php" method="post" enctype="multipart/form-data" style="position:absolute;left:0px;top:0px;">
<input onchange="submit()" type="file" name="fileadimage" accept=".gif, .jpg" style="position:absolute;left:0px;top:0px;margin:0 0;">
<input type="hidden" name="adid" value="<?php echo "$adid";?>">
</form>

</body>
</html>