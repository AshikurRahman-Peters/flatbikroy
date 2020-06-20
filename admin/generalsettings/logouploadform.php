<?php
if(isset($_POST['logoupload']))
{
	if($_FILES["logoimg"]["name"]!="")
	{
		if ((($_FILES["logoimg"]["type"] == "image/gif")
		|| ($_FILES["logoimg"]["type"] == "image/jpeg")
		|| ($_FILES["logoimg"]["type"] == "image/png")
		|| ($_FILES["logoimg"]["type"] == "image/pjpeg"))
		&& ($_FILES["logoimg"]["size"] < 1050000))
		{
			move_uploaded_file($_FILES["logoimg"]["tmp_name"], "../../images/logo.png");
		}
		else{
		?>
			<script>alert('Invalied File');</script>
		<?php
		}
	}
}
?>
<html>
<body style="width:300px;height:290px;margin:0 0">
<img src="../../images/logo.png" width="200px"><br><br>
<form action="" method="post" enctype="multipart/form-data">
<input type="file" name="logoimg"><br>
<input type="submit" name="logoupload" value="Upload">
</form>
</body>
</html>