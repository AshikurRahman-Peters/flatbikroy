<?php
$curl="../";
include('../config.php');
include('../connect.php');

$type=$_GET['cmbtype'];
$location=$_GET['cmblocation'];
$sizefrom=$_GET['txtsizefrom'];
$sizeto=$_GET['txtsizeto'];
$pricefrom=$_GET['txtpricefrom'];
$priceto=$_GET['txtpriceto'];

//---------------------------------------------
if($type != "Any"){
$txttype="&& type='$type'";
}
else{
$txttype="";
}

if($location != "Any"){
$txtlocation="&& location='$location'";
}
else{
$txtlocation="";
}

if($sizefrom != "" && $sizeto != ""){
$txtsize="&& size between '$sizefrom' and '$sizeto'";
}
else{
$txtsize="";
}

if($priceto != ""){
$txtprice="&& price between '$pricefrom' and '$priceto'";
}
else{
$txtprice="";
}
//---------------------------------------------

/*
 Place code to connect to your DB here.
 */

// include your code to connect to DB.

$tbl_name = "published";
//your table name
// How many adjacent pages should be shown on each side?
$adjacents = 6;

/*
 First get total number of rows in data table.
 If you have a WHERE clause in your query, make sure you mirror it here.
 */

$query = "SELECT COUNT(*) as num FROM $tbl_name where title!='' && status='published' $txttype $txtlocation $txtsize $txtprice";
$total_pages = mysql_fetch_array(mysql_query($query));
$total_pages = $total_pages['num'];
?>
<html>
	<head>
		<title>Jamibikroy.com | Search Result</title>
		<link href="../css/style.css" rel="stylesheet" type="text/css">
		<script>
			function ImgHover(id, imgname){
				document.getElementById(id).src= '../images/'+imgname;
			}
		</script>
		<script>
			function showContent(){
				document.getElementById('loading').style.display = 'none';
				document.getElementById('content').style.display = '';
			}
		</script>
		<script>
			function ItemHover(id){
				document.getElementById(id).style.background= '#F0F0F0';
			}
			function ItemHoverOut(id){
				document.getElementById(id).style.background= '';
			}
		</script>
		<script>
			function rahover(id){
				if(document.getElementById(id).style.background == ''){
					document.getElementById(id).style.background = '#67B048';
					document.getElementById(id).style.color = 'white';
				}
				else{
					document.getElementById(id).style.background = '';
					document.getElementById(id).style.color = '#006600';
				}
			}
		</script>
		<script>
			function SizeText(){
				if(document.getElementsByName('cmbtype')[0].value == 'Any'){
					document.getElementById('sizetext').innerHTML = 'Size:';
				}
				else if(document.getElementsByName('cmbtype')[0].value == 'Land' || document.getElementsByName('cmbtype')[0].value == 'Plot' || document.getElementsByName('cmbtype')[0].value == 'Plot_for_Developers'){
					document.getElementById('sizetext').innerHTML = 'Size (katha):';
				}
				else{
					document.getElementById('sizetext').innerHTML = 'Size (sft.):';
				}
			}
		</script>
		<style>
			div.pagination {
				font-family:tahoma;
				font-size:13px;
				padding: 3px;
				margin: 3px;
			}

			div.pagination a {
				font-family:tahoma;
				font-size:13px;
				padding: 2px 5px 2px 5px;
				margin: 2px;
				border: 1px solid #AAAADD;
				text-decoration: none; /* no underline */
				color: black;
			}
			div.pagination a:hover, div.pagination a:active {
				font-family:tahoma;
				font-size:13px;
				border: 1px solid green;
				color: green;
			}
			div.pagination span.current {
				font-family:tahoma;
				font-size:13px;
				padding: 2px 5px 2px 5px;
				margin: 2px;
				border: 1px solid green;
				font-weight: bold;
				background-color: green;
				color: white;
			}
			div.pagination span.disabled {
				font-family:tahoma;
				font-size:13px;
				padding: 2px 5px 2px 5px;
				margin: 2px;
				border: 1px solid lightgray;
				color: lightgray;
			}

		</style>
	</head>
	<body onload="showContent()">
<?php include_once("../analyticstracking.php") ?>
		<div id="loading"><img src="../images/loading_icon.gif"></div>
		<table border="0px" id="content" width="1000px" height="1000px" style="border-collapse:collapse;background:white;display:none">
			<tr class="headerheight">
				<td>
					<?php include('../header.php');?>
				</td>
			</tr>
			<tr height="40px">
				<td align="right" style="font-family:tahoma;color:white;font-size:12px;background-image:url('../images/101.png');background-repeat:no-repeat;background-position:left top;">
					<?php include('../topmenu.php');?>
				</td>
			</tr>
			<tr height="700px">
				<td valign="top">
					<table border="0px" width="100%" height="100%" style="margin:-1 0;border-collapse:collapse;">
						<tr height="5px">
							<td width="240px" bgcolor="#E5EFCE">&nbsp;</td>
							<td width="20px"></td>
							<td></td>
						</tr>
						<tr>
							<td bgcolor="#E5EFCE" align="center" valign="top">

								<!--------------------- This is the Left Container------------------>
								<?php include('../leftcontains.php');?>
								<!------------------------ Left Container End----------------------->
							</td>
							<td></td>
							<td align="left" valign="top">
								<!----------------------------------------Body Container --------------------------------->
								<table border="0px" width="740px" style="border-collapse:collapse;">
									<tr height="40px" bgcolor="green">
										<td><font style="font-family:tahoma;font-size:14px;color:white">&nbsp;&nbsp;&nbsp;<?php echo "$total_pages";?> Records found</font></td>
									</tr>
									<tr height="30px" bgcolor="#EAEAEA">
										<td>


<?php


/* Setup vars for query. */
$targetpage = "";
//your file name  (the name of this file)
$limit = 10;
//how many items to show per page
if(isset($_REQUEST['page']))
$page = $_GET['page'];
else
$page=1;
if ($page)
	$start = ($page - 1) * $limit;
//first item to display on this page
else
	$start = 0;
//if no page var is given, set start to 0

/* Get data. */
$sql = "select * from published where title!='' && status='published' $txttype $txtlocation $txtsize $txtprice order by adid desc LIMIT $start, $limit";
$result = mysql_query($sql);

/* Setup page vars for display. */
if ($page == 0)
	$page = 1;
//if no page var is given, default to 1.
$prev = $page - 1;
//previous page is page - 1
$next = $page + 1;
//next page is page + 1
$lastpage = ceil($total_pages / $limit);
//lastpage is = total pages / items per page, rounded up.
$lpm1 = $lastpage - 1;
//last page minus 1

/*
 Now we apply our rules and draw the pagination object.
 We're actually saving the code to a variable in case we want to draw it more than once.
 */
$pagination = "";
if ($lastpage > 1) {
	$pagination .= "<div class=\"pagination\">";
	//previous button
	if ($page > 1)
		$pagination .= "<a href=\"$targetpage?page=$prev&&cmbtype=$type&&cmblocation=$location&&txtsizefrom=$sizefrom&&txtsizeto=$sizeto&&txtpricefrom=$pricefrom&&txtpriceto=$priceto\">< Previous</a>";
	else
		$pagination .= "<span class=\"disabled\">< Previous</span>";

	//pages
	if ($lastpage < 7 + ($adjacents * 2))//not enough pages to bother breaking it up
	{
		for ($counter = 1; $counter <= $lastpage; $counter++) {
			if ($counter == $page)
				$pagination .= "<span class=\"current\">$counter</span>";
			else
				$pagination .= "<a href=\"$targetpage?page=$counter&&cmbtype=$type&&cmblocation=$location&&txtsizefrom=$sizefrom&&txtsizeto=$sizeto&&txtpricefrom=$pricefrom&&txtpriceto=$priceto\">$counter</a>";
		}
	} elseif ($lastpage > 5 + ($adjacents * 2))//enough pages to hide some
	{
		//close to beginning; only hide later pages
		if ($page < 1 + ($adjacents * 2)) {
			for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
				if ($counter == $page)
					$pagination .= "<span class=\"current\">$counter</span>";
				else
					$pagination .= "<a href=\"$targetpage?page=$counter&&cmbtype=$type&&cmblocation=$location&&txtsizefrom=$sizefrom&&txtsizeto=$sizeto&&txtpricefrom=$pricefrom&&txtpriceto=$priceto\">$counter</a>";
			}
			$pagination .= "...";
			$pagination .= "<a href=\"$targetpage?page=$lpm1&&cmbtype=$type&&cmblocation=$location&&txtsizefrom=$sizefrom&&txtsizeto=$sizeto&&txtpricefrom=$pricefrom&&txtpriceto=$priceto\">$lpm1</a>";
			$pagination .= "<a href=\"$targetpage?page=$lastpage&&cmbtype=$type&&cmblocation=$location&&txtsizefrom=$sizefrom&&txtsizeto=$sizeto&&txtpricefrom=$pricefrom&&txtpriceto=$priceto\">$lastpage</a>";
		}
		//in middle; hide some front and some back
		elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
			$pagination .= "<a href=\"$targetpage?page=1&&cmbtype=$type&&cmblocation=$location&&txtsizefrom=$sizefrom&&txtsizeto=$sizeto&&txtpricefrom=$pricefrom&&txtpriceto=$priceto\">1</a>";
			$pagination .= "<a href=\"$targetpage?page=2&&cmbtype=$type&&cmblocation=$location&&txtsizefrom=$sizefrom&&txtsizeto=$sizeto&&txtpricefrom=$pricefrom&&txtpriceto=$priceto\">2</a>";
			$pagination .= "...";
			for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
				if ($counter == $page)
					$pagination .= "<span class=\"current\">$counter</span>";
				else
					$pagination .= "<a href=\"$targetpage?page=$counter&&cmbtype=$type&&cmblocation=$location&&txtsizefrom=$sizefrom&&txtsizeto=$sizeto&&txtpricefrom=$pricefrom&&txtpriceto=$priceto\">$counter</a>";
			}
			$pagination .= "...";
			$pagination .= "<a href=\"$targetpage?page=$lpm1&&cmbtype=$type&&cmblocation=$location&&txtsizefrom=$sizefrom&&txtsizeto=$sizeto&&txtpricefrom=$pricefrom&&txtpriceto=$priceto\">$lpm1</a>";
			$pagination .= "<a href=\"$targetpage?page=$lastpage&&cmbtype=$type&&cmblocation=$location&&txtsizefrom=$sizefrom&&txtsizeto=$sizeto&&txtpricefrom=$pricefrom&&txtpriceto=$priceto\">$lastpage</a>";
		}
		//close to end; only hide early pages
		else {
			$pagination .= "<a href=\"$targetpage?page=1&&cmbtype=$type&&cmblocation=$location&&txtsizefrom=$sizefrom&&txtsizeto=$sizeto&&txtpricefrom=$pricefrom&&txtpriceto=$priceto\">1</a>";
			$pagination .= "<a href=\"$targetpage?page=2&&cmbtype=$type&&cmblocation=$location&&txtsizefrom=$sizefrom&&txtsizeto=$sizeto&&txtpricefrom=$pricefrom&&txtpriceto=$priceto\">2</a>";
			$pagination .= "...";
			for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
				if ($counter == $page)
					$pagination .= "<span class=\"current\">$counter</span>";
				else
					$pagination .= "<a href=\"$targetpage?page=$counter&&cmbtype=$type&&cmblocation=$location&&txtsizefrom=$sizefrom&&txtsizeto=$sizeto&&txtpricefrom=$pricefrom&&txtpriceto=$priceto\">$counter</a>";
			}
		}
	}

	//next button
	if ($page < $counter - 1)
		$pagination .= "<a href=\"$targetpage?page=$next&&cmbtype=$type&&cmblocation=$location&&txtsizefrom=$sizefrom&&txtsizeto=$sizeto&&txtpricefrom=$pricefrom&&txtpriceto=$priceto\">Next ></a>";
	else
		$pagination .= "<span class=\"disabled\">Next ></span>";
	$pagination .= "</div>\n";
}
?>
<?=$pagination ?>

										</td>
									</tr>
									<tr height="30px">
										<td></td>
									</tr>
									<tr>
										<td>
											<table border="0px" width="740px" style="border-collapse:collapse;">
											<?php
											

											$unit="";

											
											
											while($row=mysql_fetch_array($result)){
											if (file_exists("../newad/thumb/$row[adid].jpg")){
											$img = "$row[adid].jpg";
											}
											else{
											$img = "noimg.jpg";
											}

											if($row['type']=="Land" || $row['type']=="Plot" || $row['type']=="Plot_for_Developers")
											$unit="katha";
											if($row['type']=="Flat" || $row['type']=="Shop")
											$unit="sft.";
											?>
												<tr id="<?php echo "$row[id]";?>" onmouseover="ItemHover('<?php echo "$row[id]";?>')" onmouseout="ItemHoverOut('<?php echo "$row[id]";?>')" onclick="window.location.href='../item/detail/?adid=<?php echo "$row[adid]";?>';" height="80px" style="border:1px solid lightgrey;cursor:pointer">
													<td width="100px" align="center" valign="middle"><img src="../newad/thumb/<?php echo $img;?>" width="90px" height="70px"></td>
													<td width="5px"></td>
													<td width="400px" align="left" valign="top">
														<font style="font-family:tahoma;font-size:15px;color:green;font-weight:bold"><?php echo "$row[title]";?></font><br><font style="font-size:4px"><br></font>
														<font style="font-family:tahoma;font-size:13px;color:gray;"><?php echo "$row[size] $unit $row[type]";?> in <?php echo "$row[location]";?></font>
													</td>
													<td width="15px"></td>
													<td>
														<font style="font-family:tahoma;font-size:14px;">tk. <?php echo number_format("$row[price]", 2);?></font><br>
														<font style="font-family:tahoma;font-size:12px;color:gray">Posted on <?php echo "$row[date]";?></font>
													</td>
												</tr>
												<tr height="10px">
													<td colspan="5"></td>
												</tr>
											<?php }?>
											</table>
										</td>
									</tr>
								</table>
								<!----------------------------------------Body Container End ----------------------------->
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr height="100px" style="border-top:1px solid lightgray">
				<td align="center"><?php include('../footer.php');?></td>
			</tr>
			<tr height="40px">
				<td bgcolor="green" align="center"><?php include('../bottom-footer.php');?></td>
			</tr>
		</table>
	</body>
</html>