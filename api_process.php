<?php
require_once "libInformation.php";
$_action = "";
if( isset($_GET['action'])) $_action = $_GET['action'];
if( isset($_POST['action'])) $_action = $_POST['action'];
switch ($_action) {
	case 'getApartmentInfo':
		break;
	case 'getProjectInfo':
		break;
	case 'saveProjectInfo':
		$_data = '';
		if( isset($_GET['data']))  $_data = $_GET['data'];
		if( isset($_POST['data'])) $_data = $_POST['data'];
		if( $_data){
			saveProjectInfo(json_decode($_data));
		} else{
			echo "No data";
		}
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
	default:
		break;
}
?>