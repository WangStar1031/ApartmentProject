<?php
require_once __DIR__ . "/dbManager.php";

//fixallph
//CPanelUserPassword
function getApartmentInfo($_aptName){

}

// function saveProjectInfo($_projectInfo){
// 	$fName = __DIR__ . "/container/projectInfo.json";
// 	file_put_contents($fName, json_encode($_projectInfo));
// 	echo "OK";
// }
function ImageUpload($_apartNo, $_idxPhoto, $_catPhoto, $_idxGroup, $_strFileType, $_posRect, $_imgSrc, $_infos){
	$_retVal = new \stdClass;
	$dirName = "container/ap" . $_apartNo . "/project/uploaded/";
	if( !file_exists($dirName)){
		mkdir( $dirName, 0777);
	}
	$dirName .= $_idxPhoto . "/";
	if( !file_exists($dirName)){
		mkdir( $dirName, 0777);
	}

	$url = $dirName . date("Y-m-d-H-i-s", time()) . "." . $_strFileType;
	// $url = "container/ap" . $_apartNo . "/project/uploaded/" . $_idxPhoto . "/" . $_catPhoto . "/" . $_idxGroup . "_" . date("Y-m-d-H-i-s", time()) . "." . $_strFileType;
	$fName = __DIR__ . "/" . $url;
	$_retVal->type = $_strFileType;
	$result = false;
	$data = explode( ',', $_imgSrc );
	if( count($data) < 2){
		$_retVal->message = "Invalid Image Format.";
	} else{
		$img = base64_decode($data[1]);
		file_put_contents($fName, $img);
		$_retVal->message = "OK";
		$_retVal->fileName = $url;

		$infFileName = $dirName . $_catPhoto . ".json";
		$infContents = @file_get_contents($infFileName);
		$jsonInf = [];
		if( $infContents){
			$jsonInf = json_decode($infContents);
		}
		if( $_idxGroup == -1){
			$newInf = new \stdClass;
			$newInf->groupId = count($jsonInf);
			$newInf->arrNodes = [];
			$newNode = new \stdClass;
			$newNode->fileUrl = $url;
			$newNode->info = json_decode($_infos);
			$newInf->arrNodes[] = $newNode;
			$newInf->posRect = json_decode($_posRect);
			$jsonInf[] = $newInf;
			file_put_contents($infFileName, json_encode($jsonInf));
		} else{
			foreach ($jsonInf as $value) {
				if( $value->groupId == $_idxGroup ){
					$newNode = new \stdClass;
					$newNode->fileUrl = $url;
					$newNode->info = json_decode($_infos);
					$value->arrNodes[] = $newNode;
					file_put_contents($infFileName, json_encode($jsonInf));
					break;
				}
			}
		}
	}
	echo json_encode($_retVal);
}
function GetUploadedPhotos( $_apartNo, $_idxPhoto, $_catPhoto){
	$dirName = "container/ap" . $_apartNo . "/project/uploaded/";
	$dirName .= $_idxPhoto . "/";
	$retVal = [];
	$infFileName = $dirName . $_catPhoto . ".json";
	if( file_exists($infFileName)){
		$fContents = @file_get_contents($infFileName);
		if( $fContents){
			$retVal = json_decode($fContents);
		}
	}
	echo json_encode($retVal);
}
function createNewProject($_directoryName){
	$dirName = __DIR__ . "/container/" . $_directoryName . "/";
	if( file_exists($dirName)){
		echo "Already Exists.";
	} else{
		if( mkdir($dirName, 0777)){
			echo "OK";
		} else{
			echo "Can't create new project.";
		}
	}
}
function deleteDir($dirPath) {
	if (! is_dir($dirPath)) {
		throw new InvalidArgumentException("$dirPath must be a directory");
	}
	if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
		$dirPath .= '/';
	}
	$files = glob($dirPath . '*', GLOB_MARK);
	foreach ($files as $file) {
		if (is_dir($file)) {
			deleteDir($file);
		} else {
			unlink($file);
		}
	}
	rmdir($dirPath);
}
function removeProject($_directoryName){
	$dirName = __DIR__ . "/container/" . $_directoryName . "/";
	if( file_exists($dirName)){
		deleteDir($dirName);
	}
	DeleteProject($_directoryName);
	echo "OK";
}

?>