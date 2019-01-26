<?php
function getApartmentInfo($_aptName){

}

function saveProjectInfo($_projectInfo){
	$fName = __DIR__ . "/container/projectInfo.json";
	file_put_contents($fName, json_encode($_projectInfo));
	echo "OK";
}
function getProjectInfo(){
	$fName = __DIR__ . "/container/projectInfo.json";
	$contents = @file_get_contents($fName);
	
	return $contents;
}
?>