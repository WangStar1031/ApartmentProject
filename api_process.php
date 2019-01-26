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
	default:
		break;
}
?>