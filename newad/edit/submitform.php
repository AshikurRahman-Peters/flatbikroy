<html>
<head>
<style type="text/css">
#loading {
font:bold 12px Verdana;
color:green;
}
</style>
<script type="text/javascript">
function showContent(){
//hide loading status...
document.getElementById("loading").style.display='none';

//show content
document.getElementById("content").style.display='block';
}
</script>
</head>

<body onload="showContent()">
<script type="text/javascript">
document.write('<div id="loading" style="position:absolute;left:0px;top:0px;margin:0 0;font-family:tahoma;font-size:13px;">Uploading Image...</div>');
</script>
<div id="content">
<script type="text/javascript">
//hide content
document.getElementById("content").style.display='none';
</script>

<?php
$adid=$_POST['adid'];
$img="$adid.jpg";

	if($_FILES["fileadimage"]["name"]!=""){
		if ((($_FILES["fileadimage"]["type"] == "image/gif")
		|| ($_FILES["fileadimage"]["type"] == "image/jpeg")
		|| ($_FILES["fileadimage"]["type"] == "image/pjpeg"))
		&& ($_FILES["fileadimage"]["size"] < 1050000)){
		move_uploaded_file($_FILES["fileadimage"]["tmp_name"],
		"../upload/$img");
		echo "<div style='position:absolute;left:0px;top:0px;margin:0 0;font-family:tahoma;font-size:13px;'>Upload Complete</div>";
	}
	else{
?>

	<script>alert("Invalid File")</script>
	<script>history.back()</script>
<?php
	header('location:uploadform.php');
	}
	}
?>

</div>
</body>
</html>