
function myFunction() {
    location.reload();
}
function countClicked(_i){
	var curInfo = uploadedInfos[_i];
	console.log(curInfo);
	var strHtml = "";
	for( var i = 0; i < curInfo.arrNodes.length; i++){
		var curNode = curInfo.arrNodes[i];
		strHtml += '<div style="padding: 5px;" id="imgId' + curNode.Id + '">';
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
									strHtml += '<textarea style="width:100%;" value="' + curNode.info.Description + '" placeholder="Description" readonly></textarea>';
								strHtml += '</td>';
							strHtml += '</tr>';
						strHtml += '</table>';
					strHtml += '</td>';
					strHtml += '<td style="width: 10%; vertical-align: text-bottom;">';
						strHtml += '<div><a target="_blank" href="' + curNode.fileUrl + '"><i class="fas fa-search-plus"></i></a></div>';
						// strHtml += '<div><a href="#" onclick="editDetails(this)"><i class="fas fa-pencil-alt"></i></a></div>';
						strHtml += '<div><a href="#" onclick="removeImage(' + curNode.Id + ')"><i class="fas fa-trash-alt"></i></a></div>';
					strHtml += '</td>';
					strHtml += '<td style="width:30%;">';
						strHtml += '<table>';
							strHtml += '<tr>';
								strHtml += '<td><img src="' + curNode.fileSUrl + '" style="width:100%;"></td>';
							strHtml += '</tr>';
							strHtml += '<tr>';
								strHtml += '<td>';
									strHtml += '<div class="fleft">' + curNode.info.ShootingDate + '</div>';
									strHtml += '<div class="fright">' + curNode.Type + '</div>';
									strHtml += '<div style="clear: both;"></div>';
									strHtml += '<p>' + curNode.info.Desc + '</p>';
									strHtml += '<div>';
								strHtml += '</td>';
							strHtml += '</tr>';
						strHtml += '</table>';
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
			var lastImgPath = arrNodes[ ptCount - 1].fileSUrl;

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
function updateArrNotes(){
	$(".textBox").hide();
	$.post("api_process.php", {action: "getArrNotes", projectPath: "project1", apartNo: apartNo}, function(response){
		// console.log(response);
		var arrNotes = JSON.parse(response);
		var strHtml = "";
		for( var i = 0; i < arrNotes.length; i++){
			var curNote = arrNotes[i];
			strHtml += '<a class="fright photoBtn btn" href="#No' + curNote.PhotoIdx + '">' + curNote.PhotoIdx + '</a>';
		}
		$("#arrNotes").html(strHtml);
	});
}
function updateArrDefect_Reparation(){
	$.post("api_process.php", {action: "getArrDefects", projectPath: "project1", apartNo: apartNo}, function(response){
		// console.log(response);
		var arrNodes = JSON.parse(response);
		var strHtml = "";
		for( var i = 0; i < arrNodes.length; i++){
			var curNode = arrNodes[i];
			strHtml += '<a class="fright photoBtn btn" href="#No' + curNode.PhotoIdx + '">' + curNode.PhotoIdx + '</a>';
		}
		$("#arrDefects").html(strHtml);
	});
	$.post("api_process.php", {action: "getArrReparation", projectPath: "project1", apartNo: apartNo}, function(response){
		// console.log(response);
		var arrNodes = JSON.parse(response);
		var strHtml = "";
		for( var i = 0; i < arrNodes.length; i++){
			var curNode = arrNodes[i];
			strHtml += '<a class="fright photoBtn btn" href="#No' + curNode.PhotoIdx + '">' + curNode.PhotoIdx + '</a>';
		}
		$("#arrReparation").html(strHtml);
	});
}
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
	var Type = "Defect";
	if( $("#btnTypeGroup div").eq(0).hasClass("popupBtn"))
		Type = "Reparation";
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
			updateArrDefect_Reparation();
		}
	})
}
	if( fullWidth < 769){
		$("#centered ul").width(181 * aptCount);
		$("a").eq(0).css("position", "relative");
		$("a").eq(0).find("button").addClass("mobile_logout").removeClass("btn-danger").removeClass("btn");
		$("#mainHeader").hide();
		$("#mobileHeader").show();
	}
	$(".forReparations").hide();
	function onNoteSave(_this){
		var textId = $(_this).parent().find("textarea").attr("Id");
		var photoNumber = textId.replace("text", "");
		var strNotes = $("#" + textId).val();
		$.post("api_process.php", {action: "updateNotes", projectName: "project1", apartNo: apartNo, photoNumber: photoNumber, strNotes: strNotes}, function(data){
			if( data == "OK"){
				alert("Saved.");
				updateArrNotes();
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
		$(_this).parent().find("div").removeClass("popupBtn");
		$(_this).addClass("popupBtn");
		$(".forDefects").hide();
		$(".forReparations").show();
		var sels = $(".forReparations").parent();
		for( var i = 0; i < sels.length; i++){
			sels.eq(0).find("option.forReparations").eq(0).prop("selected", true);
		}
		$("#desc").html("תיקון");//Reparation
	}
	function onDefect(_this){
		$(_this).parent().find("div").removeClass("popupBtn");
		$(_this).addClass("popupBtn");
		$(".forReparations").hide();
		$(".forDefects").show();
		var sels = $(".forDefects").parent();
		for( var i = 0; i < sels.length; i++){
			sels.eq(0).find("option.forDefects").eq(0).prop("selected", true);
		}
		$("#desc").html("פגם");//Defect
	}
	function closeUploadImgWnd(){
		$(".uploadImgWnd").hide();
	}
	function editDetails(_this){
		console.log(_this);
	}
	function removeImage(_idx){
		var r = confirm("Are you sure remove this?");
		if( r == true){
			$.post("api_process.php", {action: "removeUploadedImg", idx : _idx}, function(data){
				if( data == "OK"){
					$("#imgId" + _idx).remove();
					uploadedPhotoDraw();
				}
			});
		}
	}
	var nTop = $("#wraperr").offset().top;
	console.log(nTop);
	function setNavTop() {
		$('#wraperr').css('position','');
		var nScrollTop = $("#project-container").scrollTop();
		var nRealTop = Math.max(0, nTop - nScrollTop);
		if( nRealTop == 0){
			$('#wraperr').css('position','absolute');
		}
		$('#wraperr').css('z-index', 1000);
		$('#wraperr').css('top', nRealTop);
		$("#wraperr").css('width',$("#wraperr").parent().width());
	}
	$("#project-container").scroll(function(){
		setNavTop();
	});
	$(window).scroll(function(){
		$('#wraperr').css('position','');
		var nScrollTop = $(document).scrollTop();
		// console.log(nScrollTop);
		var nRealTop = Math.max(nScrollTop, nTop);
		if( nRealTop != nTop){
			$('#wraperr').css('position','absolute');
		}
		$('#wraperr').css('z-index', 1000);
		$('#wraperr').css('top', nRealTop);
		$("#wraperr").css('width',$("#wraperr").parent().width());
	});
