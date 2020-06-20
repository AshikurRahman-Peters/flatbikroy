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
$maxfile = '512000';

	if($_FILES["fileadimage"]["name"]!=""){
		if (($_FILES["fileadimage"]["type"] == "image/gif") || ($_FILES["fileadimage"]["type"] == "image/jpeg") || ($_FILES["fileadimage"]["type"] == "image/pjpeg"))
		{
			if($_FILES["fileadimage"]["size"] < $maxfile)
			{
		
				$size = 70; // the thumbnail height

				$filedir = 'upload/'; // the directory for the original image
				$thumbdir = 'thumb/'; // the directory for the thumbnail image
				$prefix = 'thumb_'; // the prefix to be added to the original name

				$mode = '0666';
	
				$userfile_name = $_FILES['fileadimage']['name'];
				$userfile_tmp = $_FILES['fileadimage']['tmp_name'];
				$userfile_size = $_FILES['fileadimage']['size'];
				$userfile_type = $_FILES['fileadimage']['type'];
	
				if (isset($_FILES['fileadimage']['name'])) 
				{
					$prod_img = $filedir.$img;
			
					$prod_img_thumb = $thumbdir.$img;
					move_uploaded_file($userfile_tmp, $prod_img);
					chmod ($prod_img, octdec($mode));
		
					$sizes = getimagesize($prod_img);

					$aspect_ratio = $sizes[1]/$sizes[0]; 

					if ($sizes[1] <= $size)
					{
						$new_width = $sizes[0];
						$new_height = $sizes[1];
					}
					else
					{
						$new_height = $size;
						$new_width = abs($new_height/$aspect_ratio);
					}	

					$destimg=ImageCreateTrueColor($new_width,$new_height)
					or die('Problem In Creating image');
					$srcimg=ImageCreateFromJPEG($prod_img)
					or die('Problem In opening Source Image');
					if(function_exists('imagecopyresampled'))
					{
						imagecopyresampled($destimg,$srcimg,0,0,0,0,$new_width,$new_height,ImageSX($srcimg),ImageSY($srcimg))
						or die('Problem In resizing');
					}
					else
					{
						Imagecopyresized($destimg,$srcimg,0,0,0,0,$new_width,$new_height,ImageSX($srcimg),ImageSY($srcimg))
						or die('Problem In resizing');
					}
					ImageJPEG($destimg,$prod_img_thumb,90)
					or die('Problem In saving');
					imagedestroy($destimg);
				}


				echo "<div style='position:absolute;left:0px;top:0px;margin:0 0;font-family:tahoma;font-size:13px;'>Upload Complete</div>";
			}
			else
			{
			?>

				<script>alert("File size must be less than 500 KB")</script>
				<script>window.location.href='uploadform.php'</script>

			<?php 
			}
		}
		else
		{
		?>
			<script>alert("Invalid file format")</script>
			<script>window.location.href='uploadform.php'</script>	
		<?php
		}
	}
?>

</div>
</body>
</html>