var arrParts = [];
var projectInfo = {};
var arrApartmentInfo = [];

function clickedApart(_this){
	$(".mainContents").removeClass("selectedTr");
	$(_this).addClass("selectedTr");
}
function insertNewApartments(_curTr){
	var strHtml = "";
	var aptName = _curTr.find(".apartName").eq(0).text();
	var aptPicCount = _curTr.find(".imageCount").eq(0).text();
	strHtml += '<tr class="mainContents" onclick="clickedApart(this)">';
		strHtml += '<td><input type="checkbox" name="chk_aparts"></td>';
		strHtml += '<td class="apartDir">' + aptName + '</td>';
		strHtml += '<td class="imgCount">' + aptPicCount + '</td>';
	strHtml += '</tr>';
	$(".projectTable").append(strHtml);
	var aptInfo = {};
	aptInfo.aptName = aptName;
	aptInfo.photoCount = aptPicCount;
	aptInfo.address = "";
	aptInfo.aptParts = [];
	arrApartmentInfo.push(aptInfo);
}
function insertNewApartmentsFromArray(){
	var strHtml = "";
	for( var i = 0; i < arrApartmentInfo.length; i++){
		var _aptName = arrApartmentInfo[i].aptName;
		var _aptPicCount = arrApartmentInfo[i].photoCount;
		strHtml += '<tr class="mainContents" onclick="clickedApart(this)">';
			strHtml += '<td><input type="checkbox" name="chk_aparts"></td>';
			strHtml += '<td class="apartDir">' + _aptName + '</td>';
			strHtml += '<td class="imgCount">' + _aptPicCount + '</td>';
		strHtml += '</tr>';
	}
	$(".projectTable").append(strHtml);
	// var aptInfo = {};
	// aptInfo.aptName = _aptName;
	// aptInfo.photoCount = _aptPicCount;
	// aptInfo.address = "";
	// aptInfo.aptParts = [];
	// arrApartmentInfo.push(aptInfo);
}
function checkInRight(_aptName){
	var arrRightTableTrs = $(".projectTable tr.mainContents");
	for( var i = 0; i < arrRightTableTrs.length; i++){
		var curTr = arrRightTableTrs.eq(i);
		var aptName = curTr.find("td.apartDir").eq(0).text();
		if( aptName == _aptName)
			return true;
	}
	return false;
}
function removeApartment(){
	var arrChks = $(".projectTable input[type=checkbox]");
	var arrCheckedApartments = [];
	for( var i = 0; i < arrChks.length; i++){
		var curChk = arrChks.eq(i);
		if( curChk.prop("checked")){
			var remApartName = curChk.parent().parent().find(".apartDir").text();
			// console.log(remApartName);
			var idx = arrApartmentInfo.indexOf(remApartName);
			arrApartmentInfo.splice( idx, 1);
			curChk.parent().parent().remove();
		}
	}
}
function addApartment(){
	var arrChks = $(".preInfoTable input[type=checkbox]");
	var arrCheckedApartments = [];
	for( var i = 0; i < arrChks.length; i++){
		var curChk = arrChks.eq(i);
		if( curChk.prop("checked")){
			arrCheckedApartments.push(curChk.parent().parent());
		}
	}
	if( arrCheckedApartments.length == 0){
		alert("No selected.");
		return;
	}
	for( var i = 0; i < arrCheckedApartments.length; i++){
		var curTr = arrCheckedApartments[i];
		var aptName = curTr.find(".apartName").eq(0).text();
		var ptCount = curTr.find(".imageCount").eq(0).text();
		if( checkInRight(aptName) || ptCount == 0){
			continue;
		}
		insertNewApartments(curTr);
	}
}
function addPartsToAPT(_partName){

}
function removePartClicked(_this){
	var partDiv = $(_this).parent();
	var partName = partDiv.find(".partName").text();
	var r = confirm("Are you sure remove current part(" + partName + ")?");
	if( r == true){
		partDiv.remove();
		var idx = arrParts.indexOf(partName);
		arrParts.splice( idx, 1);
	}
}
function makeParts() {
	var strHtml = "";
	for( var i = 0; i < arrParts.length; i++){
		if( i % 3 == 0 && i != 0){
			strHtml += "<br>";
		}
		strHtml += "<div class='partDiv'><span class='partName'>" + arrParts[i] + "</span><span class='removePart' onclick='removePartClicked(this)'>&times;</span></div>";
	}
	$("#proParts").html(strHtml);
}
function addNewParts(){
	var curPart = $("input[name=txtCurPart]").val();
	if( !curPart ){
		alert("No Part Name.");
	} else{
		if( arrParts.indexOf(curPart) == -1){
			$("input[name=txtCurPart]").val("");
			arrParts.push(curPart.trim());
			makeParts();
		} else{
			alert("Already Exists.");
			$("input[name=txtCurPart]").val("");
		}
	}
	$("input[name=txtCurPart]").focus();
}
function onSaveProjectInfo(){
	projectInfo.name = $("#projectName").val();
	projectInfo.parts = arrParts;
	projectInfo.apartmentInfo = arrApartmentInfo;
	$.post("api_process.php", {action:"saveProjectInfo", data: JSON.stringify(projectInfo)}, function(data){
		if( data == "OK"){
			alert("Successfully saved.");
		} else{
			alert("No Save.");
		}
	});
}

function getProjectInfo(){
	var strInfo = $("#projectInfo").val();
	if( strInfo ){
		projectInfo = JSON.parse(strInfo);
		console.log( projectInfo);
		$("#projectName").val(projectInfo.name);
		arrParts = projectInfo.parts;
		makeParts();
		arrApartmentInfo = projectInfo.apartmentInfo;
		insertNewApartmentsFromArray();
	}
}
getProjectInfo();