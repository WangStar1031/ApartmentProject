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

	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<!-- <link href="assets/css/boilerplate.css" rel="stylesheet" type="text/css"> -->
	<link href="assets/css/master.css" rel="stylesheet" type="text/css">
	<link href="assets/css/mastertag.css" rel="stylesheet" type="text/css">
	<link href="assets/css/masterclass.css" rel="stylesheet" type="text/css">
	<link href="assets/css/project.css" rel="stylesheet" type="text/css">
	<link href="assets/css/dropdawn.css" rel="stylesheet" type="text/css">
	<link href="assets/css/popup.css" rel="stylesheet" type="text/css">
	<link href="assets/css/receptionnotes.css" rel="stylesheet" type="text/css">

	<link rel="stylesheet" href="assets/css/topnav/normalize.css">
	<link rel="stylesheet" href="assets/css/topnav/ospb.css">
	<link rel="stylesheet" href="assets/css/topnav/horizontal.css">
	<link rel="stylesheet" href="assets/css/topnav/next-prev.css">
	<link rel="stylesheet" href="assets/css/topnav/displayornot.css">
	<link rel="stylesheet" href="assets/css/topnav/content.css">
	<link rel="stylesheet" href="assets/css/topnav/toptable.css">
	<link rel="stylesheet" href="assets/css/sidebar/toptable.css">
	<link rel="stylesheet" href="assets/css/sidebar/content.css">

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
if( isset($_GET['apartNo'])){
	$apartNo = $_GET['apartNo'];
}
$path = dirname($_SERVER['REQUEST_URI']) . "/";
?>
<a href="logout.php"><button class="btn btn-danger" style="margin: 10px;">Log out</button></a>
<div class="gridContainer clearfix"></div>
<div id="main-container">
   <div id="comercial-container" class="display-comercial">
         <div id="comercial-content">
            <p style="margin-right: 0; height: 500px;"><object data="http://www.watchwork.co.il/0_Documentations-Instructions/Instuctions-Reception-Apartment-with-Sections/" width="100%" height="100%"></object></p>	
        </div>
    </div>
<div id="project-container">
<div id="top"></div>
<div id="project-content">
    <div id="sub-header">
        <header class="pagespan">
		<table class="table-2">
		    <tr class="row-2_1">
				<td class="cell-2_1"><span class="cell-2_1-title">צילום ותיעוד</span></td>
				<td class="cell-2_1"><span class="cell-2_1-title" title="Contractor">יזם</span></td>
				<td class="cell-2_1"><span class="cell-2_1-title" title="Project">פרויקט</span></td>
			</tr>
		    <tr class="row-2_2">
			    <td class="cell-2_2"><span class="cell-2_2-title" >WatchWork</span></td>
				<td class="cell-2_2"><span class="cell-2_2-title content-constructor"></span></td>			
				<td class="cell-2_2"><span class="cell-2_2-title content-proiect"></span></td>
			</tr>			
		    <tr class="row-2_3">
			    <td class="cell-2_3"><span class="cell-2_2-subtitle content-subwatchwork"></span></td>
				<td class="cell-2_3"><span class="cell-2_2-subtitle content-subconstructor"></span></td>			
				<td class="cell-2_3"><span class="cell-2_2-subtitle content-subproiect"></span></td>
			</tr>			
		</table>
		<table class="table-3">
		    <tr class="row-3">
			    <td class="cell-3"><span class="family-title" title="Date"> תאריך: </span><span class="family-name content-data" title="Date"></span></td>
				<td class="cell-3"><span class="family-title" title="Entrance"> כניסה:</span> <span class="family-name  content-what" title="Entrance"></span></td>				
				<td class="cell-3"><span class="family-title" title="Building">בניין:</span> <span class="family-name  content-apartament" title="Building"></span></td>
			</tr>
		</table>
				  
	    </header>
		
		<div class="pagespan container">
		    <div class="wrap">
			    <div class="scrollbar">
				    <div class="handle">
					    <div class="mousearea"></div>
				    </div>
			    </div>

			    <div class="frame" id="centered">
				    <ul class="clearfix">
				    	<?php
				    	for($i = 1; $i <= 20; $i++){
					    	$href = $path . "main.php?apartNo=" . $i;
			    		?>
					    <li class="display-or-not-<?=$i?> <?php if($apartNo == $i) echo "active";?>">
                            <div class="horiz-top" title="Apartment"><a href="<?=$href?>"><span class="doc-number"><?=$i?></span><span class="doc">דירה</span></a></div>
							<div class="horiz-bottom">
						       <div class="fleft horiz-bottoms" title="Ceilings"><a href="<?=$href?>#ceilins">תיקרות</a></div>
							   <div class="fleft horiz-bottoms" title="flooring"><a href="<?=$href?>#floorings">רצפות</a></div>
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
			            <div class="clear rec-title">קישור מהיר</div>
<?php
$dir = __DIR__ . "/container/ap" . $apartNo . "/project/plans/";
$files = scandir($dir);
$i = 0;
foreach($files as $file){
	if( $file == ".." || $file == ".")
		continue;
	$i++;
?>
<div class="rec-number"><a class="plan-popup" href="#No<?=$i?>"><?=$i?><span><img src="container/ap<?=$apartNo?>/project/plans/<?=$i?>pl.jpg" /></span></a></div>
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
	            	for($i = 1; $i < 10; $i++){
	            	?>
					<span class="sections"><a href="#section<?=$i?>"><?=$i?></a></span>
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
				<img class="desktop" src="container/ap<?=$apartNo?>/project/plans/<?=$i?>pl.jpg">
			</div>
			<div class="photo" id="photo<?=$i?>">
				<img class="desktop" src="container/ap<?=$apartNo?>/project/photos/<?=$i?>pi.jpg" title="click to switch between photo and plan">
			</div>
		</div>
		<div id="dwld">
			<div id="photonumber" class="fleft" title="photo number">
				<strong><?=$i?></strong>
			</div>
			<div id="gototop" class="fleft" title="go to top">
				<a href="#top">&#128285;</a>
			</div>
			<div id="d-arrow" class="fright" title="download">
				<a href="container/ap<?=$apartNo?>/project/big/<?=$i?>pi.jpg" download >
					<strong>&#8615;</strong>
				</a>
			</div>
			<div id="zooom" class="fright" title="zoom">
				<a href="container/ap<?=$apartNo?>/project/big/<?=$i?>pi.jpg" target="_blank">&#128270;</a>
			</div>
			<div id="upload-over-plan" class="fright upload-over-button" title="">
				<span class="upload-over-button" title="photo over photo" onclick="popup(<?=$i?>, 'photo')">
					<span class="upload-over-right over-black"></span>
					<span class="upload-over-left over-black"></span>
				</span>
			</div>
			<div id="upload-over-plan" class="fright upload-over-button" title="">
				<span class="upload-over-button" title="photo over plan" onclick="popup(<?=$i?>, 'plan')">
					<span class="upload-over-right over-white"></span>
					<span class="upload-over-left over-black"></span>
				</span>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
<!-- <a name="section<?=$i?>"></a> -->
<?php
}
?>
<style type="text/css">
	.uploadImgWnd, .uploadedImgWnd{
		position: fixed;
		top: 5%;
		left: 1%;
		width: 42%;
		margin: auto;
		font-size: 0.8em;
	}
	.imgBorder, .contrlBorder{
		border: 2px solid #aaa;
		padding: 5px;
		border-radius: 5px;
		background: #e8e8e8;
	}
	.imgUpload{
		width: 120px;
		float: left;
	}
	.imgUpload img{
		border: 1px solid;
		/*width: 90%;*/
		width: 120px;
		margin: auto;
		height: auto;
		min-height: 120px;
		min-width: 120px;
	}
	.imgUpload label{
		font-size: 1em;
		color: black;
		border: 1px solid;
	}
	.infFields{
		width: calc( 100% - 120px);
		float: left;
		color: black;
	}
	.infFields table, .infFields table input{
		width: 100%;
	}
	.infFields label{
		width: 100%;
	}
	.infFields label input{
		text-align: left;
	}
	.uploadImgWnd input[type='text'], .uploadImgWnd textarea{
		width: 100%;
	}
	.uploadImgWnd select{
		width: 100%;
		padding: 0px;
		line-height: 1em;
		height: 2em;
	}
</style>
<div class="uploadImgWnd" style="display: none;">
	<div class="imgBorder">
		<img src="container/ap<?=$apartNo?>/project/photos/1pi.jpg">
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
					<select>
						<option>During Construction Works</option>
						<option>During the handover</option>
						<option>After the handover</option>
					</select>
					<label>Shooting Person</label>
					<select>
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
												<option>First Defect</option>
												<option>Repeating Defect</option>
											</select>
										</td>
										<td>
											Frequency
										</td>
									</tr>
									<tr>
										<td>
											<select id="origin">
												<option>Works Defect</option>
												<option>Material Defect</option>
												<option>Element Malfunction</option>
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
										<td>
											<button>Reparation</button>
											<button>Defect</button>
										</td>
									</tr>
									<tr>
										<td>Defect</td>
									</tr>
									<tr>
										<td>
											<input type="text" name="">
										</td>
									</tr>
									<tr>
										<td>Description</td>
									</tr>
									<tr>
										<td>
											<textarea>	</textarea>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<table>
						<tr>
							<td><input type="text" name=""></td>
							<td>Worker</td>
							<td><input type="text" name=""></td>
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
<div class="modal fade" role="dialog" id="listPhotoModal">
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
<style type="text/css">
	#listPhotoModal .modal-body{
		overflow-x: auto;
		height: 400px;
		margin-bottom: 10px;
	}
</style>

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
	$.post("api_process.php", {action: "getUploadedInfo", apartNo: apartNo, idxPhoto: _id, catPhoto: _cat}, function(data){
		var infos = JSON.parse(data);
		uploadedInfos = infos;
		var strHtml = "";
		var pW = $(".imgBorder").width();
		var pH = $(".imgBorder").height();
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
		imgPath = "container/ap" + apartNo + "/project/photos/" + _id + "pi.jpg";
	} else{
		imgPath = "container/ap" + apartNo + "/project/plans/" + _id + "pl.jpg";
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
	var fr = new FileReader();	fr.onload = function(e) {
		// console.log(e);
		target.src = this.result;
		var strHtml = "";
			strHtml += '<div class="uploadedImgTitle">';
				strHtml += '<img onclick="imgMinusClicked(this)" src="assets/images/minus.png">';
				strHtml += '<img onclick="imgPlusClicked(this)" src="assets/images/plus.png">';
				// strHtml += '<img onclick="imgSearchClicked(this)" src="assets/images/search.png">';
				strHtml += '<div style="clear:both;"></div>';
			strHtml += '</div>';
			strHtml += '<img class="uploadedImg" style="width:100px; height:auto;" src="' + this.result + '">';
		$(".uploadedImgPan").html(strHtml);
		$(".uploadedImgPan").css({"top":"10px", "left":"10px"});
		$(".uploadedImgPan").draggable();
	};
	src.addEventListener("change", function(){
		fr.readAsDataURL(src.files[0]);
		console.log(src.files[0]);
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
	var infos = {ShootingDate: '2019-01-02', ShootingTime: 'During Construction Works'};
	$.post("api_process.php", {action: "imgUpload", apartNo: apartNo, idxPhoto: prevId, catPhoto: prevCat, idxGroup: idxGroup, strFileType: strFileType, imgSrc: srcImg, posRect: JSON.stringify(posRect), infos: JSON.stringify(infos)}, function(data){
		console.log(data);
		var response = JSON.parse(data);
		if( response.message == "OK"){
			uploadedPhotoDraw();
		}
	})
}

function popupGallery(){
	$(".uploadedImgWnd").show();
}
function imgMinusClicked(_this){
	console.log($(_this));
	var img = $(_this).parent().parent().find(".uploadedImg").eq(0);
	img.css({width: img.width() * 0.9});
}
function imgPlusClicked(_this){
	var img = $(_this).parent().parent().find(".uploadedImg").eq(0);
	img.css({width: img.width() * 1.1});
}
function imgSearchClicked(_this){
	var img = $(_this).parent().parent().find(".uploadedImg").eq(0);
	window.open(img.attr("src"), 'Image');
	// img.css({width: img.width() * 1.1});
}
</script> 

<style type="text/css">
	.uploadedImgTitle{
		width: 100%;
		background-color: gray;
	}
	.uploadedImgPan{
		/*padding: 10px;*/
		z-index: 100;
	}
	.ui-state-highlight{
		/*background-color: red;*/
	}
	.ui-droppable-hover{
		border: 2px solid blue;
		/*background-color: green;*/
	}
	.uploadedImgTitle img{
		width: 15px;
		height: 15px;
		float: right;
		cursor: pointer;
	}
	.groupContainer .photoCount{
		color: white;
		position: absolute;
		right: 0px;
		bottom: 0px;
		background-color: black;
		width: 1.5em;
		height: 1.5em;
		border-radius: 100%;
		cursor: pointer;
    }
</style>
</html>

