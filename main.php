<?php
session_start();

if( !isset($_SESSION['reparationUserName'])){
	header("Location: login.php");
}
if( $_SESSION['reparationUserName'] == ""){
	header("Location: login.php");
}

?>
<!doctype html>
<html class="">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Photo Documentation</title>
	<link rel="icon" type="image/png" href="assets/images/reparation_logo.png">

	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="assets/css/master.css">
	<link rel="stylesheet" type="text/css" href="assets/css/mastertag.css">
	<link rel="stylesheet" type="text/css" href="assets/css/masterclass.css">
	<link rel="stylesheet" type="text/css" href="assets/css/project.css">
	<link rel="stylesheet" type="text/css" href="assets/css/dropdawn.css">
	<link rel="stylesheet" type="text/css" href="assets/css/popup.css">
	<link rel="stylesheet" type="text/css" href="assets/css/receptionnotes.css">

	<link rel="stylesheet" href="assets/css/topnav/normalize.css">
	<link rel="stylesheet" href="assets/css/topnav/ospb.css">
	<link rel="stylesheet" href="assets/css/topnav/horizontal.css">
	<link rel="stylesheet" href="assets/css/topnav/displayornot.css">
	<link rel="stylesheet" href="assets/css/topnav/content.css">
	<link rel="stylesheet" href="assets/css/topnav/toptable.css">
	<link rel="stylesheet" href="assets/css/sidebar/toptable.css">
	<link rel="stylesheet" href="assets/css/sidebar/content.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/main/main.css?<?=time()?>">

	
	<script src="assets/js/respond.min.js"></script>
	<!-- <script src="assets/js/jquery-1.10.1.js"></script> -->
	<script src="assets/js/topnav/modernizr.js"></script>

	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery-ui.js"></script>
	<script src="assets/js/topnav/plugins.js"></script>
	<script src="assets/js/topnav/sly.min.js"></script>

	<script src="assets/SpryAssets/SpryEffects.js" type="text/javascript"></script>
	<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>

	<script type="text/javascript">
		function MM_effectAppearFade(targetElement, duration, from, to, toggle)
		{
			Spry.Effect.DoFade(targetElement, {duration: duration, from: from, to: to, toggle: toggle});
		}

		function MM_showHideLayers() {
		  var i,p,v,obj,args=MM_showHideLayers.arguments;
		  for (i=0; i<(args.length-2); i+=3) 
		  with (document) if (getElementById && ((obj=getElementById(args[i]))!=null)) { v=args[i+2];
		    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
		    obj.visibility=v; }
		}
		// add a class of 'loading' to the HTML, then remove it once the page has finished loading
		(function(c){
			c('scripted loading')
			window.onload = function(){setTimeout(function(){
				c(c().replace('loading',''))
			},30)}

		}(function(c){
			var h = document.lastChild
			return c ? h.className = c : h.className
		}))
	</script>

	<script type="text/javascript">
		function toggle_visibility(id) {
			var e = document.getElementById(id);
			if(e.style.display == 'block')
				e.style.display = 'none';
			else
				e.style.display = 'block';
		}
	</script>
	<style type="text/css">
		.over-white. .over-black{
			box-sizing: content-box!important;
		}
	</style>
</head>
<body>
<?php
$apartNo = 1;
require_once __DIR__ . "/libInformation.php";
if( isset($_GET['apartNo'])){
	$apartNo = $_GET['apartNo'];
}
$path = dirname($_SERVER['REQUEST_URI']) . "/";
$project = getProjectInfo("project1");
if( $project == false){
	echo "No project information.";
	exit();
}
$projectInfo = $project[0];
$documentDate = $projectInfo['DocumentDate'];
$documentMonth = date("m", strtotime($documentDate));
$documentYear = date("Y", strtotime($documentDate));
$parts4Project = getParts($projectInfo['Id']);
$apartmentInfo = getApratmentInfo($projectInfo['Id']);
$curApartment = $apartmentInfo[$apartNo - 1];
$arrPartInfos = explode(",", $curApartment['PartInfos']);
$sectionCount = $curApartment['SectionCount'];
$arrSectionInfos = explode(",", $curApartment['SectionInfos']);
?>
<a href="logout.php" style="position: absolute;"><button class="btn btn-danger" style="margin: 10px;">Log out</button></a>
<div class="gridContainer clearfix"></div>
<div id="main-container">
   <div id="comercial-container" class="display-comercial">
         <div id="comercial-content">
            <p style="margin-right: 0; height: 500px;"><object data="http://www.watchwork.co.il/0_Documentations-Instructions/Instuctions-Reception-Apartment-with-Sections/" width="100%" height="100%"></object></p>	
        </div>
    </div>
<div id="project-container">
<div id="top"></div>
<style type="text/css">
	#sub-header table table label{
		background-color: #ccc;
	}
</style>
<div id="project-content">
    <div id="sub-header">
        <header class="pagespan">
        	<table class="table-bordered" style="width: 100%">
        		<tr>
        			<td>
        				<table style="width: 100%">
        					<tr>
        						<td id="projectNumber"><?=$projectInfo['ProjectNumber']?></td>
        						<td><label>N<u>o</u>.</label></td>
        						<td colspan="2" id="projectType"><?=$projectInfo['ProjectType']?></td>
        						<td><label>Type</label></td>
        						<td colspan="2" id="projectName"><?=$projectInfo['ProjectName']?></td>
        						<td><label>Name</label></td>
        						<td>Project</td>
        					</tr>
        					<tr>
        						<td id="addressNo"><?=$projectInfo['No']?></td>
        						<td><label>N<u>o</u>.</label></td>
        						<td colspan="2" id="addressStreet"><?=$projectInfo['Street']?></td>
        						<td><label>Street</label></td>
        						<td id="addressCity"><?=$projectInfo['City']?></td>
        						<td><label>City</label></td>
        						<td id="addressZone"><?=$projectInfo['Zone']?></td>
        						<td><label>Zone</label></td>
        					</tr>
        					<tr>
        						<td colspan="3" id="projectManager"><?=$projectInfo['ProjectManager']?></td>
        						<td colspan="2"><label>ProjectManger</label></td>
        						<td colspan="2" id="constructor"><?=$projectInfo['Constructor']?></td>
        						<td colspan="2"><label>Contractor</label></td>
        					</tr>
        					<tr>
        						<td colspan="3" id="photography"><?=$projectInfo['Photography']?></td>
        						<td colspan="2"><label>Photography</label></td>
        						<td colspan="2" id="worksManager"><?=$projectInfo['WorksManager']?></td>
        						<td colspan="2"><label>Works Manager</label></td>
        					</tr>
        				</table>
        			</td>
        			<td>
        				<table style="width: 100%">
        					<tr>
        						<td colspan="2" id="buildingNo"><?=$projectInfo['BuildingNumber']?></td>
        						<td><label>Building<br>No. / Name</label></td>
        					</tr>
        					<tr>
        						<td colspan="2" id="entranceNumber"><?=$projectInfo['EntranceNumber']?></td>
        						<td><label>Entrance<br>No. / Name</label></td>
        					</tr>
        					<tr>
        						<td id="documentMonth"><?=$documentMonth?></td>
        						<td id="documentYear"><?=$documentYear?></td>
        						<td><label>Documentation<br>Date</label></td>
        					</tr>
        				</table>
        			</td>
        		</tr>
        	</table>
	    </header>
		
		<div class="pagespan">
		    <div class="wrap">
			    <!-- <div class="scrollbar">
				    <div class="handle">
					    <div class="mousearea"></div>
				    </div>
			    </div> -->
			    <?php
			    $nApartCount = count($apartmentInfo);
			    ?>
			    <div class="frame" id="centered" style=" overflow-x: scroll; overflow-y: hidden;">
				    <ul class="clearfix" style="width: <?=260*$nApartCount?>px;">
				    	<?php
				    	for($i = 1; $i <= $nApartCount; $i++){
					    	$href = $path . "main.php?apartNo=" . $i;
			    		?>
					    <li class="<?php if($apartNo == $i) echo "active";?>">
                            <div class="horiz-top" title="Apartment"><a href="<?=$href?>"><span class="doc-number"><?=$i?></span><span class="doc">דירה</span></a></div>
							<div class="horiz-bottom">
								<?php
								$curApartment = $apartmentInfo[$i - 1];
								$width = 100 / count($parts4Project);
								for( $j = 0; $j < count($parts4Project); $j++){
									$val = $parts4Project[$j]['PartName'];
									$arrPartInfos = explode(",", $curApartment['PartInfos']);
									$imgNumber = 0;
									if( count($arrPartInfos) > $j){
										$imgNumber = $arrPartInfos[$j];
									}
								?>
								<div class="fleft horiz-bottoms" title="<?=$val?>" style="width: <?=$width?>%"><a href="<?=$href?>#No<?=$imgNumber?>"><?=$val?></a></div>
								<?php
								}
								?>
						       <!-- <div class="fleft horiz-bottoms" title="Ceilings"><a href="<?=$href?>#ceilins">תיקרות</a></div>
							   <div class="fleft horiz-bottoms" title="flooring"><a href="<?=$href?>#floorings">רצפות</a></div> -->
							</div>
						</li>
			    		<?php
						}
				    	?>
				    </ul>
			    </div>
		    </div>
	    </div>

        <div id="wraperr">
            <div id="navMenu">
                <ul>
                    <li class="buttons-lines-color-1  project-li-section-project" title="quick link">
<!-- START WRAPPER -->        

<div id="wrapper" class="">
    <div id="popupBox1">  
        <div class="popupBoxWrapper1">
            <div class="popupBoxContent1">
                  <a href="javascript:void(0)" onclick="toggle_visibility('popupBox1');">x</a>	   
	            <div id="reception-notes-container">		 
		            <div id="reception-notes">
		            	<div class="col-md-12 col-xs-12">
		            		<div class="row" style="color: black;">
		            			<div class="col-md-4 col-xs-4">
		            				<div class="row">
			            				<div style="background-color: #e68e52;">Notes</div>
			            				<div class="col-md-12 col-mxs12" style="background-color: #ecb38b; height: 1000px;">
			            					<div class="row">
				            					<?php
				            					$arrNotes = getAllNotes($projectInfo['Id'], $apartNo);
				            					foreach ($arrNotes as $value) {
				            						$idx = $value['PhotoIdx'];
			            						?>
			            						<a class="fright photoBtn btn" href="#No<?=$idx?>"><?=$idx?></a>
			            						<?php
				            					}
				            					?>
			            					</div>
			            				</div>
		            				</div>
		            			</div>
		            			<div class="col-md-4 col-xs-4">
		            				<div class="row">
			            				<div style="background-color: #61d668;">Reparations</div>
			            				<div style="background-color: #99ef9e; height: 1000px;">
			            					<?php
			            					$arrReparation = getAllReparations( $projectInfo['Id'], $apartNo);
			            					foreach ($arrReparation as $value) {
			            						$idx = $value['PhotoIdx'];
		            						?>
		            						<a class="fright photoBtn btn" href="#No<?=$idx?>"><?=$idx?></a>
		            						<?php
			            					}
			            					?>
			            				</div>
		            				</div>
		            			</div>
		            			<div class="col-md-4 col-xs-4">
		            				<div class="row">
			            				<div style="background-color: #d45555;">Defects</div>
			            				<div style="background-color: #e88d8d; height: 1000px;">
			            					<?php
			            					$arrDefects = getAllDefects( $projectInfo['Id'], $apartNo);
			            					foreach ($arrDefects as $value) {
			            						$idx = $value['PhotoIdx'];
		            						?>
		            						<a class="fright photoBtn btn" href="#No<?=$idx?>"><?=$idx?></a>
		            						<?php
			            					}
			            					?>
			            				</div>
		            				</div>
		            			</div>
		            		</div>
		            	</div>
			            <!-- <div class="clear rec-title">קישור מהיר</div> -->
<?php
$files = [];
$dir = __DIR__ . "/container/project1/ap" . $apartNo . "/project/plans/";
if( file_exists($dir)){
	$files = scandir($dir);
}
$i = 0;
foreach($files as $file){
	break;
	if( $file == ".." || $file == ".")
		continue;
	$i++;
?>
<div class="rec-number"><a class="plan-popup" href="#No<?=$i?>"><?=$i?><span><img src="container/project1/ap<?=$apartNo?>/project/plans/<?=$i?>pl.jpg" /></span></a></div>
<?php
}


?>
		            </div>   
		        </div> 
                  				
            </div>
        </div>
    </div>           
                   <a href="javascript:void(0)" onclick="toggle_visibility('popupBox1');">קישור מהיר</a>
</div>

<!-- END WRAPPER -->

                    </li> 	

                     <li class="buttons-lines-color-1  project-li-section-project" title="Go to Sections">
<!-- START WRAPPER -->
<div id="wrapper" class="">
  <div id="popupBox3">
    <div class="popupBoxWrapper3">
      <div class="popupBoxContent3">
       <a href="javascript:void(0)" onclick="toggle_visibility('popupBox3');">x</a>
	    <div class="popup-content-container">
		    <div class="fleft popup-container-numere">
	            <div class="popup-content-numere">
	            	<?php
	            	for($i = 1; $i <= $sectionCount; $i++){
	            		$curSectionNumber = $arrSectionInfos[$i - 1];
	            	?>
					<span class="sections"><a href="#No<?=$curSectionNumber?>"><?=$i?></a></span>
	            	<?php
		            }
	            	?>
	            </div>
			</div>
			<div class="fright popup-content-plan">
	               <img src="assets/images/sectiuni-ap1.jpg">  
			</div>	
			<div class="clear"></div>
	    </div>
    </div>
  </div>
</div>           
      <a href="javascript:void(0)" onclick="toggle_visibility('popupBox3');"><strong>אזורים</strong></a>
</div>
<!-- END WRAPPER -->
            </li>					
					
<?php
$onClickString = "";
$i = 0;
foreach($files as $file){
	if( $file == ".." || $file == ".")
		continue;
	$i ++;
	if( $i == 1){
		$onClickString .= "MM_effectAppearFade('photo" . $i . "', 500, 100, 0, true)";
	} else{
		$onClickString .= ", " . "MM_effectAppearFade('photo" . $i . "', 500, 100, 0, true)";
	}
}
?>
					<li class="buttons-lines-color-1  project-li-project" title="click to switch between photos and plans"><div onClick="<?=$onClickString?>">

<a href="#">תוכניות / תמונות</a></div></li>

				    <li class="buttons-lines-color-1 project-li-return-project" style="border-right: 0px solid #fff;" title="Refresh page"><div onclick="myFunction()"><a href="#"><strong>&#x21ba;</strong></a></div></li>

                </ul> 

<br class="clear"/>             

            </div>

        </div> 

    </div>  

    <div id="sub-home">
<?php
$i = 0;
foreach($files as $file){
	if( $file == ".." || $file == ".")
		continue;
	$i++;
?>
<div id="No<?=$i?>" class="center-screen">
	<div id="photoplan">
		<div id="plan" onClick="MM_effectAppearFade('photo<?=$i?>', 500, 100, 0, true)">
			<div id="hideonload">
				<img class="desktop" src="container/project1/ap<?=$apartNo?>/project/plans/<?=$i?>pl.jpg">
			</div>
			<div class="photo" id="photo<?=$i?>">
				<img class="desktop" src="container/project1/ap<?=$apartNo?>/project/photos/<?=$i?>pi.jpg" title="click to switch between photo and plan">
			</div>
		</div>
		<div class="textBox">
			<div>
				<div style="float: left;" onclick="closeNote(this)">&#10006;</div>
				<div style="float: right;">Notes</div>
				<div style="clear: both;"></div>
			</div>
			<textarea id="text<?=$i?>" rows="3"></textarea><br>
			<button class="btn-success" style="float: right; margin-top: 10px;" onclick="onNoteSave(this)">Save</button>
		</div>
		<div id="dwld">
			<div class="fleft" title="photo number">
				<strong><?=$i?></strong>
			</div>
			<div class="fleft upload-over-button" title="go to top">
				<a href="#top">
					<span><i class="fas fa-arrow-up"></i></span>
				</a>
			</div>
			<div class="fright upload-over-button" title="download">
				<a href="container/ap<?=$apartNo?>/project/big/<?=$i?>pi.jpg" download >
					<span><i class="fas fa-download"></i></span>
				</a>
			</div>
			<div class="fright upload-over-button" title="zoom">
				<a href="container/project1/ap<?=$apartNo?>/project/big/<?=$i?>pi.jpg" target="_blank">
					<span><i class="fas fa-search-plus"></i></span>
				</a>
			</div>
			<div class="fright upload-over-button" title="edit">
				<!-- <a href="#"> -->
					<span onclick="showNotes(this)" style="cursor: pointer;"><i class="far fa-edit"></i></span>
				<!-- </a> -->
			</div>
			<div class="fright upload-over-button" title="">
				<a href="#">
					<span class="upload-over-button" title="photo over photo" onclick="popup(<?=$i?>, 'photo')">
						<i class="far fa-clone"></i>
					</span>
				</a>
			</div>
			<div class="fright upload-over-button" title="">
				<a href="#">
					<span class="upload-over-button" title="photo over plan" onclick="popup(<?=$i?>, 'plan')">
						<i class="fas fa-clone"></i>
					</span>
				</a>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
<!-- <a name="section<?=$i?>"></a> -->
<?php
}
?>
<div class="uploadImgWnd" style="display: none;">
	<div class="imgBorder">
		<img src="container/project1/ap<?=$apartNo?>/project/photos/1pi.jpg">
		<div class="uploadedImgPan" style="position: absolute; top:10px;">
		</div>
		<div id="uploadedContainer" style="position: absolute; top: 10px">
		</div>
	</div>
	<div class="contrlBorder">
		<div class="imgUpload">
			<img src="" id="img_drawer">
			<input type="file" id="img_picker" style="display: none;">
			<br><br>
			<label for="img_picker">Upload Photo</label>
		</div>
		<div class="infFields col-md-12" style="text-align: right;">
			<div class="row">
				<div class="col-md-5">
					<label>Shooting Date:</label>
					<table>
						<tr>
							<td><input type="text" name="Day" placeholder="Day"></td>
							<td><input type="text" name="Month" placeholder="Month"></td>
							<td><input type="text" name="Year" placeholder="Year"></td>
						</tr>
					</table>
					<label>Shooting Time:</label>
					<select id="ShootingTime">
						<option>During Construction Works</option>
						<option>During the handover</option>
						<option>After the handover</option>
					</select>
					<label>Shooting Person</label>
					<select id="ShootingPerson">
						<option>Company representative</option>
						<option>Contractor</option>
						<option>Tenant</option>
					</select>
					<button onclick="SaveImage()">Save</button>
				</div>
				<div class="col-md-7">
					<table>
						<tr>
							<td>
								<table>
									<tr>
										<td>
											<select id="frequency">
												<option class="forDefects">First Defect</option>
												<option class="forDefects">Repeating Defect</option>

												<option class="forReparations">First Aid</option>
												<option class="forReparations">Normal Repair</option>
												<option class="forReparations">Additional Repair</option>
											</select>
										</td>
										<td>
											Frequency
										</td>
									</tr>
									<tr>
										<td>
											<select id="origin">
												<option class="forDefects">Works Defect</option>
												<option class="forDefects">Material Defect</option>
												<option class="forDefects">Element Malfunction</option>

												<option class="forReparations">Works Defect</option>
												<option class="forReparations">Material Defect</option>
												<option class="forReparations">Item Replacement</option>
											</select>
										</td>
										<td>
											Origin
										</td>
									</tr>
									<tr>
										<td>
											<select id="structure">
												<option>Structural Defect</option>
												<option>Non-Structural Defect</option>
											</select>
										</td>
										<td>
											Structure
										</td>
									</tr>
									<tr>
										<td>
											<select id="level">
												<option>Minor</option>
												<option>Moderate</option>
												<option>Serious</option>
											</select>
										</td>
										<td>
											Level
										</td>
									</tr>
								</table>
							</td>
							<td>
								<table>
									<tr>
										<td id="btnTypeGroup">
											<button onclick="onReparation(this)">Reparation</button>
											<button onclick="onDefect(this)" class="btn-success">Defect</button>
										</td>
									</tr>
									<tr>
										<td id="desc">Defect</td>
									</tr>
									<tr>
										<td>
											<input type="text" name="desc">
										</td>
									</tr>
									<tr>
										<td>Description</td>
									</tr>
									<tr>
										<td>
											<textarea name="description"></textarea>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<table>
						<tr>
							<td><input type="text" name="worker"></td>
							<td>Worker</td>
							<td><input type="text" name="contractor"></td>
							<td>Contractor</td>
						</tr>
					</table>
				</div>
			</div>
			<!-- <button onclick="popupGallery()">Open Image Gallery</button> -->
		</div>
		<div style="clear: both;"></div>
	</div>
</div>

</div>


    <div id="home-footer" class="header-footer-background footer-border">
        <div class="left footer-left"><h1>Concept and Design: <b>Sorel Alexander</b><br> <a href="http://www.watchwork.co.il" target="_blank"><b>© 2017 Watchwork</b></a><br> All Rights Rezerved</h1></div>
	    <div class="left footer-left"><img src="assets/images/watchwork-logo.png"></div>
        <div class="left footer-left"><h1>054-2096602 <br> office@watchwork.net <br> <a href="http://www.watchwork.co.il" target="_blank"><b>www.watchwork.co.il</b></a></h1></div>	

	    <div class="clear"></div>	

    </div>
	
</div>

</div>

</div>
<div class="modal fade" role="dialog" id="listPhotoModal" style="z-index: 10000;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
			</div>
		</div>

	</div>
</div>

<script>
var apartNo = <?=$apartNo?>;
function myFunction() {
    location.reload();
}
var prevId = -1, prevCat = "";
var uploadedInfos = [];
function countClicked(_i){
	var curInfo = uploadedInfos[_i];
	console.log(curInfo);
	var strHtml = "";
	for( var i = 0; i < curInfo.arrNodes.length; i++){
		var curNode = curInfo.arrNodes[i];
		strHtml += '<div style="padding: 5px;">';
			strHtml += '<table style="width:100%;">';
				strHtml += '<tr>';
					strHtml += '<td style="width:60%;">';
						strHtml += '<table>';
							strHtml += '<tr>';
								strHtml += '<td>' + curNode.info.ShootingTime + '</td>';
								strHtml += '<td>Shooting Time</td>';
								strHtml += '<td rowspan="7">';
								strHtml += '</td>';
							strHtml += '</tr>';
							strHtml += '<tr>';
								strHtml += '<td>' + curNode.info.Frequency + '</td>';
								strHtml += '<td>Frequency</td>';
							strHtml += '</tr>';
							strHtml += '<tr>';
								strHtml += '<td>' + curNode.info.Origin + '</td>';
								strHtml += '<td>Shooting Time</td>';
							strHtml += '</tr>';
							strHtml += '<tr>';
								strHtml += '<td>' + curNode.info.Structure + '</td>';
								strHtml += '<td>Structure</td>';
							strHtml += '</tr>';
							strHtml += '<tr>';
								strHtml += '<td>' + curNode.info.Level + '</td>';
								strHtml += '<td>Level</td>';
							strHtml += '</tr>';
							strHtml += '<tr>';
								strHtml += '<td>' + curNode.info.Contractor + '</td>';
								strHtml += '<td>Contractor</td>';
							strHtml += '</tr>';
							strHtml += '<tr>';
								strHtml += '<td>' + curNode.info.Worker + '</td>';
								strHtml += '<td>Worker</td>';
							strHtml += '</tr>';
							strHtml += '<tr>';
								strHtml += '<td colspan="3">';
									strHtml += '<textarea></textarea>';
								strHtml += '</td>';
							strHtml += '</tr>';
						strHtml += '</table>';
					strHtml += '</td>';
					strHtml += '<td style="width10%;">';
					strHtml += '</td>';
					strHtml += '<td style="width:40%;">';
						strHtml += '<img src="' + curNode.fileUrl + '" style="width:100%;">';
					strHtml += '</td>';
				strHtml += '</tr>';
			strHtml += '</table>';
		strHtml += '</div>';
	}
	$("#listPhotoModal .modal-body").html(strHtml);
	$('#listPhotoModal').modal('toggle');
}
function uploadedPhotoDraw(){
	var _id = prevId;
	var _cat = prevCat;
	$(".uploadedImgPan").html("");
	$(".imgUpload img").attr("src", "");

	var el = $('#img_picker');
	el.val("");
	$(".groupContainer").remove();
	$.post("api_process.php", {action: "getUploadedInfo", projectName: "project1", apartNo: apartNo, idxPhoto: _id, catPhoto: _cat}, function(data){
		var infos = JSON.parse(data);
		uploadedInfos = infos;
		var strHtml = "";
		var pW = $(".imgBorder").width();
		var pH = $(".imgBorder").height();
		$("input[name=Year]").val("");
		$("input[name=Month]").val("");
		$("input[name=Day]").val("");
		for( var i = 0; i < infos.length; i++){
			var curInfo = infos[i];
			var xScale = pW / curInfo.posRect.parentWidth;
			var yScale = pH / curInfo.posRect.parentHeight;
			var left = parseInt(xScale * curInfo.posRect.left);
			var width = parseInt(xScale * curInfo.posRect.width);
			var top = parseInt(yScale * curInfo.posRect.top);
			var height = parseInt(yScale * curInfo.posRect.height);
			var arrNodes = curInfo.arrNodes;
			var ptCount = arrNodes.length;
			var lastImgPath = arrNodes[ ptCount - 1].fileUrl;

			strHtml += '<div class="groupContainer" style="top:' + top + 'px;left:' + left + 'px; position: absolute;" groupId="' + curInfo.groupId + '">';
				strHtml += '<img src="' + lastImgPath + '" style="width:' + width + 'px; height: ' + height + 'px;">';
				strHtml += '<div class="photoCount" onclick="countClicked(' + i + ')">' + ptCount + '</div>';
			strHtml += '</div>';
			
		}
		$(".imgBorder").append(strHtml);
		$(".groupContainer").droppable({
			accept: ".uploadedImgPan",
			classes: {
				"ui-droppable-active": "ui-state-highlight"
			},
			drop: function( event, ui ) {
				droppedUi(event, ui);
			},
			out: function( event, ui){
				outUi(event, ui);
			}
		});
	});
}
function popup(_id, _cat){
	var imgPath = "";
	if( _cat == "photo"){
		imgPath = "container/project1/ap" + apartNo + "/project/photos/" + _id + "pi.jpg";
	} else{
		imgPath = "container/project1/ap" + apartNo + "/project/plans/" + _id + "pl.jpg";
	}
	$(".imgBorder img").eq(0).attr("src",imgPath);
	if( $(".uploadImgWnd").is(":visible")){
		if( prevId == _id && prevCat == _cat){
			$(".uploadImgWnd").hide();
		}
	} else{
		$(".uploadImgWnd").show();
	}
	prevId = _id;
	prevCat = _cat;
	uploadedPhotoDraw();
}
function droppedUi(event, ui){
	console.log(event);
	console.log(ui);
	var target = event.target;
	var groupId = target.getAttribute("groupid");
	// console.log( target.getAttribute("groupid"));
	var curEle = event.toElement;
	curEle.setAttribute("groupId", groupId);
}
function outUi(event, ui){
	console.log(ui);
	var curEle = event.toElement;
	curEle.setAttribute("groupId", "");
}
function showImage(src, target){
	var fr = new FileReader();
	fr.onload = function(e) {
		console.log(e);
		target.src = this.result;
		var strHtml = "";
			// strHtml += '<div class="uploadedImgTitle">';
			// 	strHtml += '<img onclick="imgMinusClicked(this)" src="assets/images/minus.png">';
			// 	strHtml += '<img onclick="imgPlusClicked(this)" src="assets/images/plus.png">';
			// 	// strHtml += '<img onclick="imgSearchClicked(this)" src="assets/images/search.png">';
			// 	strHtml += '<div style="clear:both;"></div>';
			// strHtml += '</div>';
			strHtml += '<img class="uploadedImg" style="width:74px; height:auto;" src="' + this.result + '">';
		$(".uploadedImgPan").html(strHtml);
		$(".uploadedImgPan").css({"top":"10px", "left":"10px"});
		$(".uploadedImgPan").draggable();
	};
	src.addEventListener("change", function(){
		var lastModifiedDate = src.files[0].lastModifiedDate;
		var year = lastModifiedDate.getFullYear();
		var month = lastModifiedDate.getMonth() + 1;
		var day = lastModifiedDate.getDate();
		$("input[name=Year]").val(year);
		$("input[name=Month]").val(month);
		$("input[name=Day]").val(day);
		fr.readAsDataURL(src.files[0]);
	});
}
var src = document.getElementById("img_picker");
var target = document.getElementById("img_drawer");
showImage(src, target);

function SaveImage(){
	// var strFileType = /[^.]+$/.exec(src.files[0].name).pop();
	var fileName = src.files[0].name;
	var strFileType = fileName.split(".").pop();
	var curCtrl = $(".uploadedImgPan .uploadedImg");
	var srcImg = curCtrl.attr("src");
	var idxGroup = -1;
	if( curCtrl.attr("groupId")){
		idxGroup = parseInt(curCtrl.attr("groupId"));
	}
	var pW = $(".imgBorder").width();
	var pH = $(".imgBorder").height();
	var w = $(".uploadedImgPan .uploadedImg").width();
	var h = $(".uploadedImgPan .uploadedImg").height();
	var pos = $(".uploadedImgPan").position();
	var posRect = {left: pos.left, top: pos.top, width: w, height: h, parentWidth: pW, parentHeight: pH};
	var year = $("input[name=Year]").val();
	var month = $("input[name=Month]").val();
	var day = $("input[name=Day]").val();
	var ShootingDate = year + '-' + month + '-' + day;
	var ShootingTime = $("#ShootingTime").val();
	var ShootingPerson = $("#ShootingPerson").val();
	var Frequency = $("#frequency").val();
	var Origin = $("#origin").val();
	var Structure = $("#structure").val();
	var Level = $("#level").val();
	var Type = $("#btnTypeGroup .btn-success").eq(0).text();
	var Desc = $("input[name=desc]").val();
	var Description = $("textarea[name=description]").val();
	var Worker = $("input[name=worker]").val();
	var Contractor = $("input[name=contractor]").val();

	var infos = {ShootingDate: ShootingDate, ShootingTime: ShootingTime, ShootingPerson: ShootingPerson, Frequency: Frequency, Origin: Origin, Structure: Structure, Level: Level, Desc: Desc, Description: Description, Worker: Worker, Contractor: Contractor};
	
	$.post("api_process.php", {action: "imgUpload", projectName: "project1", apartNo: apartNo, idxPhoto: prevId, catPhoto: prevCat, idxGroup: idxGroup, Type: Type, strFileType: strFileType, imgSrc: srcImg, posRect: JSON.stringify(posRect), infos: JSON.stringify(infos)}, function(data){
		console.log(data);
		var response = JSON.parse(data);
		if( response.message == "OK"){
			uploadedPhotoDraw();
		}
	})
}
</script> 

<script type="text/javascript">
	var fullWidth = document.body.clientWidth;
	var aptCount = "<?=$nApartCount?>";
	if( fullWidth < 769){
		$("#centered ul").width(181 * aptCount);
		$("a").eq(0).css("position", "relative");
	}
	$(".forReparations").hide();
	function onNoteSave(_this){
		var textId = $(_this).parent().find("textarea").attr("Id");
		var photoNumber = textId.replace("text", "");
		var strNotes = $("#" + textId).val();
		// var textBox = $(_this).parent();
		// textBox.hide();

		// $projectId = $projectInfo['Id'];
		// $apartNo
		$.post("api_process.php", {action: "updateNotes", projectName: "project1", apartNo: apartNo, photoNumber: photoNumber, strNotes: strNotes}, function(data){
			if( data == "OK"){
				alert("Saved.");
			}
		});
	}
	function showNotes(_this){
		var textBox = $(_this).parent().parent().parent().find(".textBox").eq(0);
		if( textBox.is(':visible')){
			textBox.hide();
		} else{
			var textId = $(_this).parent().parent().parent().find("textarea").attr("Id");
			var photoNumber = textId.replace("text", "");
			$.post("api_process.php", {action: "getNotes", projectName: "project1", apartNo: apartNo, photoNumber: photoNumber}, function(data){
				$("#" + textId).val(data);
				textBox.show();
			});
		}
	}
	function closeNote(_this){
		$(_this).parent().parent().hide();
	}
	function onReparation(_this){
		$(_this).parent().find("button").removeClass("btn-success");
		$(_this).addClass("btn-success");
		$(".forDefects").hide();
		$(".forReparations").show();
		var sels = $(".forReparations").parent();
		for( var i = 0; i < sels.length; i++){
			sels.eq(0).find("option.forReparations").eq(0).prop("selected", true);
		}
		$("#desc").html("Reparation");
	}
	function onDefect(_this){
		$(_this).parent().find("button").removeClass("btn-success");
		$(_this).addClass("btn-success");
		$(".forReparations").hide();
		$(".forDefects").show();
		var sels = $(".forDefects").parent();
		for( var i = 0; i < sels.length; i++){
			sels.eq(0).find("option.forDefects").eq(0).prop("selected", true);
		}
		$("#desc").html("Defect");
	}
</script>
</html>

