<?php
$curl="";
include('config.php');
?>

<html>
	<head>
		<title>Jomibikroy.com | Buy/Sale Land, Plot, Apartment, Shop Online | Jomibikroy online</title>
		<meta name="KEYWORDS" content="jomibikroy.com, jami sales, land sale, plot sale, flat sale, apartment sale, shop sale, online land sale Bangladesh, Land in Dhaka, ??? ??????">
		<meta name="DESCRIPTION" content="Welcome to jomibikroy.com. We have started online portal JomiBikroy.com to make buy and sale properties easy for you. You can buy and sale your land, plot, flat, shop easily with this website. We observe every post manually that's why there is no posibility of cheating. Our main target is to make comunication between buyer and saler of land/properties.">

		<link href="css/style.css" rel="stylesheet" type="text/css">
		<script>
			function ImgHover(id, imgname){
				document.getElementById(id).src= 'images/'+imgname;
			}
		</script>
		<script>
			function showContent(){
				document.getElementById('loading').style.display = 'none';
				document.getElementById('content').style.display = '';
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
	</head>
	<body onload="showContent()">
		<?php include_once("analyticstracking.php") ?>
		<div id="loading"><img src="images/loading_icon.gif"></div>
		<table border="0px" id="content" width="1000px" height="1000px" style="border-collapse:collapse;display:none">
			<tr class="headerheight">
				<td>
					<?php include('header.php');?>
				</td>
			</tr>
			<tr height="40px">
				<td align="right" style="font-family:tahoma;color:white;font-size:12px;background-image:url('images/101.png');background-repeat:no-repeat;background-position:left top;">
					<?php include('topmenu.php');?>
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
								<?php include('leftcontains.php');?>
								<!------------------------ Left Container End----------------------->
							</td>
							<td></td>
							<td align="left" valign="top">
								<!----------------------------------------Body Container --------------------------------->
								<table border="0px" width="740px" style="border-collapse:collapse;">
									<tr>
										
										<td width="140"><a style="color:white" href="item/?type=Land"><img id="srchimg1" onmouseover="ImgHover('srchimg1', 'landsrchbuttonh.png')" onmouseout="ImgHover('srchimg1', 'landsrchbutton.png')" width="140px" src="images/landsrchbutton.png" style="cursor:pointer"></a></td>
										<td width="10px"></td>
										<td width="140"><a style="color:white" href="item/?type=Plot"><img id="srchimg2" onmouseover="ImgHover('srchimg2', 'plotsrchbuttonh.png')" onmouseout="ImgHover('srchimg2', 'plotsrchbutton.png')" width="140px" src="images/plotsrchbutton.png" style="cursor:pointer"></a></td>
										<td width="10px"></td>
										<td width="140"><a style="color:white" href="item/?type=Flat"><img id="srchimg3" onmouseover="ImgHover('srchimg3', 'aptsrchbuttonh.png')" onmouseout="ImgHover('srchimg3', 'aptsrchbutton.png')" width="140px" src="images/aptsrchbutton.png" style="cursor:pointer"></a></td>
										<td width="10px"></td>
										<td width="140"><a style="color:white" href="item/?type=Shop"><img id="srchimg4" onmouseover="ImgHover('srchimg4', 'shopsrchbuttonh.png')" onmouseout="ImgHover('srchimg4', 'shopsrchbutton.png')" width="140px" src="images/shopsrchbutton.png" style="cursor:pointer"></a></td>
										<td width="10px"></td>
										<td width="140"><a style="color:white" href="item/?type=Plot_for_Developers"><img id="srchimg5" onmouseover="ImgHover('srchimg5', 'plotdvsrchbuttonh.png')" onmouseout="ImgHover('srchimg5', 'plotdvsrchbutton.png')" width="140px" src="images/plotdvsrchbutton.png" style="cursor:pointer"></a></td>
									</tr>
									<tr height="10px">
										<td colspan="9"></td>
									</tr>
									<tr height="1px" style="border-bottom:1px solid lightgrey">
										<td colspan="9"></td>
									</tr>
									<tr height="10px">
										<td colspan="9"></td>
									</tr>
									<tr height="10px">
										<td colspan="9" style="font-family:tahoma;">
											<?php
											$wcresult=mysql_query("select welcomenote from pagetext where id=1");
											$wcrow=mysql_fetch_array($wcresult);
											echo "$wcrow[welcomenote]";
											?>
										</td>
									</tr>
									<tr height="30px">
										<td colspan="9"></td>
									</tr>
									<tr height="30px">
										<td colspan="9" style="font-family:tahoma;font-size:13px;color:white;background-image:url('images/hotprojectheader.png');background-repeat:no-repeat;background-position:left top;">
											&nbsp;&nbsp;<strong>Hot Projects</strong>
										</td>
									</tr>

								</table>
								<br><br>
								<!----------------------------Hot Products----------------->
								<?php
								$unit="";
								$query="select * from published where title!='' && status='published' && feature='1' order by adid desc";
								$result=mysql_query($query);
 								$cols=2;		// Here we define the number of columns
								echo "<table border='0px' width='740px' style='border-collapse:collapse;'>";	// The container table with $cols columns
									do{
										echo "<tr valign='top'>";
										for($i=1;$i<=$cols;$i++){	// All the rows will have $cols columns even if
											// the records are less than $cols
											$row=mysql_fetch_array($result);
											if($row){
												if(file_exists("newad/thumb/$row[adid].jpg")){
													$img = "$row[adid].jpg";
												}
												else{
													$img="noimg.jpg";
												}
												
												if($row['type'] == "Land" || $row['type'] == "Plot" || $row['type'] == "Plot_for_Developers")
												$unit = "katha";
												else
												$unit = "sft.";
 								?>
        										<td width="50%">
            											<table border="0px" style="border-collapse:collapse;">
                											<tr valign="top">
                    												<td><img border="1px" width="100px" height="70px" src="newad/thumb/<?php echo "$img" ?>" /></td> <!-- columns can have both text and images -->
														<td width="5px"></td>
                    												<td>
                        												<font style="font-family:tahoma;font-size:14px;color:#00833F;font-weight:bold;"><?php echo stripslashes("$row[title]") ?></font><br />
                        												<font style="font-family:tahoma;font-size:12px;color:gray"><?php echo "$row[location]<br>$row[size] $unit $row[type]";?></font><br>
                        												<font style="font-family:tahoma;font-size:12px;font-weight:bold;color:#00833F"><a class="hotproductdetail" href="item/detail/?adid=<?php echo "$row[adid]";?>">View Details</a></font><br />
                    												</td>
                    												<td width="30px">&nbsp;</td>	<!-- Create gap between columns -->
                											</tr>
           											</table>
        										</td>
											<?php
											}
										}
										echo "</tr>";
										echo "<tr height='20px'>";
											echo "<td colspan=$cols></td>";
										echo "</tr>";
									} while($row);
								echo "</table>";
 											?>
								<!----------------------------Hot Products End----------------->
								<!----------------------------------------Body Container End ----------------------------->
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr height="100px" style="border-top:1px solid lightgray">
				<td align="center"><?php include('footer.php');?></td>
			</tr>
			<tr height="40px">
				<td bgcolor="green" align="center"><?php include('bottom-footer.php');?></td>
			</tr>
		</table>
	</body>
</html>