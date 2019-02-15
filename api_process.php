<?php
require_once "libInformation.php";
$_action = "";
if( isset($_GET['action'])) $_action = $_GET['action'];
if( isset($_POST['action'])) $_action = $_POST['action'];
switch ($_action) {
	case 'getApartmentInfo':
		break;
	case 'getProjectInfo':
		$_projectPath = '';
		if( isset($_GET['projectPath'])) $_projectPath = $_GET['projectPath'];
		if( isset($_POST['projectPath'])) $_projectPath = $_POST['projectPath'];
		echo json_encode(getProjectInfo( $_projectPath));
		break;
	case 'getParts':
		$_projectId = '';
		if( isset($_GET['projectId'])) $_projectId = $_GET['projectId'];
		if( isset($_POST['projectId'])) $_projectId = $_POST['projectId'];
		echo json_encode(getParts($_projectId));
		break;
	case 'getApartments':
		$_projectId = '';
		if( isset($_GET['projectId'])) $_projectId = $_GET['projectId'];
		if( isset($_POST['projectId'])) $_projectId = $_POST['projectId'];
		echo json_encode(getApartments($_projectId));
		break;
	case "imgUpload":
		$_apartNo = '';
		if( isset($_GET['apartNo'])) $_apartNo = $_GET['apartNo'];
		if( isset($_POST['apartNo'])) $_apartNo = $_POST['apartNo'];
		$_idxPhoto = '';
		if( isset($_GET['idxPhoto'])) $_idxPhoto = $_GET['idxPhoto'];
		if( isset($_POST['idxPhoto'])) $_idxPhoto = $_POST['idxPhoto'];
		$_catPhoto = '';
		if( isset($_GET['catPhoto'])) $_catPhoto = $_GET['catPhoto'];
		if( isset($_POST['catPhoto'])) $_catPhoto = $_POST['catPhoto'];
		$_idxGroup = '';
		if( isset($_GET['idxGroup'])) $_idxGroup = $_GET['idxGroup'];
		if( isset($_POST['idxGroup'])) $_idxGroup = $_POST['idxGroup'];
		$_idxGroup = '';
		if( isset($_GET['idxGroup'])) $_idxGroup = $_GET['idxGroup'];
		if( isset($_POST['idxGroup'])) $_idxGroup = $_POST['idxGroup'];
		$_strFileType = '';
		if( isset($_GET['strFileType'])) $_strFileType = $_GET['strFileType'];
		if( isset($_POST['strFileType'])) $_strFileType = $_POST['strFileType'];
		$_posRect = '';
		if( isset($_GET['posRect'])) $_posRect = $_GET['posRect'];
		if( isset($_POST['posRect'])) $_posRect = $_POST['posRect'];
		$_imgSrc = '';
		if( isset($_GET['imgSrc'])) $_imgSrc = $_GET['imgSrc'];
		if( isset($_POST['imgSrc'])) $_imgSrc = $_POST['imgSrc'];
		$_infos = '';
		if( isset($_GET['infos'])) $_infos = $_GET['infos'];
		if( isset($_POST['infos'])) $_infos = $_POST['infos'];
		ImageUpload($_apartNo, $_idxPhoto, $_catPhoto, $_idxGroup, $_strFileType, $_posRect, $_imgSrc, $_infos);
		break;
	case "getUploadedInfo":
		$_apartNo = '';
		if( isset($_GET['apartNo'])) $_apartNo = $_GET['apartNo'];
		if( isset($_POST['apartNo'])) $_apartNo = $_POST['apartNo'];
		$_idxPhoto = '';
		if( isset($_GET['idxPhoto'])) $_idxPhoto = $_GET['idxPhoto'];
		if( isset($_POST['idxPhoto'])) $_idxPhoto = $_POST['idxPhoto'];
		$_catPhoto = '';
		if( isset($_GET['catPhoto'])) $_catPhoto = $_GET['catPhoto'];
		if( isset($_POST['catPhoto'])) $_catPhoto = $_POST['catPhoto'];
		GetUploadedPhotos( $_apartNo, $_idxPhoto, $_catPhoto);
		break;
	case "newProject":
		$_directoryName = '';
		if( isset($_GET['directoryName'])) $_directoryName = $_GET['directoryName'];
		if( isset($_POST['directoryName'])) $_directoryName = $_POST['directoryName'];
		createNewProject($_directoryName);
		break;
	case "removeProject":
		$_directoryName = '';
		if( isset($_GET['directoryName'])) $_directoryName = $_GET['directoryName'];
		if( isset($_POST['directoryName'])) $_directoryName = $_POST['directoryName'];
		removeProject($_directoryName);
		break;
	// case "changeProjectName":
	// 	$_directoryName = '';
	// 	if( isset($_GET['directoryName'])) $_directoryName = $_GET['directoryName'];
	// 	if( isset($_POST['directoryName'])) $_directoryName = $_POST['directoryName'];
	// 	$_projectName = '';
	// 	if( isset($_GET['projectName'])) $_projectName = $_GET['projectName'];
	// 	if( isset($_POST['projectName'])) $_projectName = $_POST['projectName'];
	// 	ChangeProjectName( $_directoryName, $_projectName);
	// 	break;
	case "saveProjectName":
		$_projectPath = '';
		if( isset($_GET['projectPath'])) $_projectPath = $_GET['projectPath'];
		if( isset($_POST['projectPath'])) $_projectPath = $_POST['projectPath'];
		$_projectName = '';
		if( isset($_GET['projectName'])) $_projectName = $_GET['projectName'];
		if( isset($_POST['projectName'])) $_projectName = $_POST['projectName'];
		saveProjectName($_projectPath, $_projectName);
		break;
	case "saveProjectInfo":
		$_projectInfo = "";
		if( isset($_GET['projectInfo'])) $_projectInfo = $_GET['projectInfo'];
		if( isset($_POST['projectInfo'])) $_projectInfo = $_POST['projectInfo'];
		$_objProjectInfo = json_decode($_projectInfo);
		saveProjectInfo( $_objProjectInfo);
		break;
	case "sendInviteEmail":
		$_UserEmail = "";
		if( isset($_GET['UserEmail'])) $_UserEmail = $_GET['UserEmail'];
		if( isset($_POST['UserEmail'])) $_UserEmail = $_POST['UserEmail'];
		sendInviteEmail($_UserEmail);
		break;
	case "removeUser":
		$_UserEmail = "";
		if( isset($_GET['UserEmail'])) $_UserEmail = $_GET['UserEmail'];
		if( isset($_POST['UserEmail'])) $_UserEmail = $_POST['UserEmail'];
		removeUser($_UserEmail);
		break;
	default:
		break;
}
?>