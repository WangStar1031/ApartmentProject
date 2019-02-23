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
function ImageUpload($_projectName, $_apartNo, $_idxPhoto, $_catPhoto, $_idxGroup, $_Type, $_strFileType, $_imgSrc, $_posRect, $_infos){
	$_retVal = new \stdClass;
	$paDir = "container/" . $_projectName . "/uploaded/";
	if( !file_exists($paDir)){
		mkdir($paDir, 0777);
	}
	$dirName = $paDir . "/original/";
	if( !file_exists(__DIR__ . "/" . $dirName)){
		mkdir( __DIR__ . "/" . $dirName, 0777);
	}
	$sdirName = $paDir . "/small/";
	if( !file_exists(__DIR__ . "/" . $sdirName)){
		mkdir( __DIR__ . "/" . $sdirName, 0777);
	}

	$url = date("Y-m-d-H-i-s", time()) . "." . $_strFileType;
	$fName = __DIR__ . "/" . $dirName . $url;
	$_retVal->type = $_strFileType;
	$result = false;
	$data = explode( ',', $_imgSrc );
	if( count($data) < 2){
		$_retVal->message = "Invalid Image Format.";
	} else{
		$img = base64_decode($data[1]);
		file_put_contents($fName, $img); // save original image

		switch($_strFileType){
			case 'bmp': $src = imagecreatefromwbmp($fName); break;
			case 'gif': $src = imagecreatefromgif($fName); break;
			case 'jpg': $src = imagecreatefromjpeg($fName); break;
			case 'png': $src = imagecreatefrompng($fName); break;
			default : $src = false; break;
		}
		list($width, $height) = getimagesize($fName);
		$_imgDst = imagecreatetruecolor(74, 74);
		imagecopyresized($_imgDst, $src, 0, 0, 0, 0, 74, 74, $width, $height);
		$dstImgPath = __DIR__ . "/" . $sdirName . $url;
		switch($_strFileType){
			case 'bmp': $retVal = imagewbmp( $_imgDst, $dstImgPath); break;
			case 'gif': $retVal = imagegif( $_imgDst, $dstImgPath); break;
			case 'jpg': $retVal = imagejpeg( $_imgDst, $dstImgPath); break;
			case 'png': $retVal = imagepng( $_imgDst, $dstImgPath); break;
			default : $retVal = false; break;
		}

		$_retVal->message = "OK";
		ImageUpload_DB($_projectName, $_apartNo, $_idxPhoto, $_catPhoto, $_idxGroup, $_Type, $dirName . $url, $sdirName . $url, $_posRect, $_infos);

		// $_retVal->fileName = $dirName . $url;

		// $infFileName = $dirName . $_catPhoto . ".json";
		// $infContents = @file_get_contents($infFileName);
		// $jsonInf = [];
		// if( $infContents){
		// 	$jsonInf = json_decode($infContents);
		// }
		// if( $_idxGroup == -1){
		// 	$newInf = new \stdClass;
		// 	$newInf->groupId = count($jsonInf);
		// 	$newInf->arrNodes = [];
		// 	$newNode = new \stdClass;
		// 	$newNode->fileUrl = $url;
		// 	$newNode->info = json_decode($_infos);
		// 	$newInf->arrNodes[] = $newNode;
		// 	$newInf->posRect = json_decode($_posRect);
		// 	$jsonInf[] = $newInf;
		// 	file_put_contents($infFileName, json_encode($jsonInf));
		// } else{
		// 	foreach ($jsonInf as $value) {
		// 		if( $value->groupId == $_idxGroup ){
		// 			$newNode = new \stdClass;
		// 			$newNode->fileUrl = $url;
		// 			$newNode->info = json_decode($_infos);
		// 			$value->arrNodes[] = $newNode;
		// 			file_put_contents($infFileName, json_encode($jsonInf));
		// 			break;
		// 		}
		// 	}
		// }
	}
	echo json_encode($_retVal);
}
function GetUploadedPhotos($_projectName, $_apartNo, $_idxPhoto, $_catPhoto){
	echo json_encode(GetUploadedPhotos_DB($_projectName, $_apartNo, $_idxPhoto, $_catPhoto));
	return;
	// $dirName = "container/ap" . $_apartNo . "/project/uploaded/";
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