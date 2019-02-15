<?php
	require_once __DIR__ . '/library/Mysql.php';
	
	$db = new Mysql();
	$db->exec("set names utf8");
	function getApartmentInfo_DB($_aptName){

	}
	function getAllUsers(){
		global $db;
		$sql = "SELECT * FROM user";
		return $db->select($sql);
	}
	function getAllProjects(){
		global $db;
		$sql = "SELECT * FROM projectinfo";
		return $db->select($sql);
	}
	function getProjectInfo4User($_userId){
		global $db;
		$sql = "SELECT * FROM user_project WHERE UserId = '$_userId'";
		return $db->select($sql);
	}
	function saveProjectName($_projectPath, $_projectName){
		global $db;
		$sql = "SELECT * FROM projectinfo WHERE ProjectPath = '$_projectPath'";
		$result = $db->select($sql);
		if( $result == false){
			$sql = "INSERT INTO projectinfo(ProjectPath, ProjectName) VALUES(?,?)";
			$stmt = $db->prepare($sql);
			$stmt->execute([$_projectPath, $_projectName]);
		} else{
			$sql = "UPDATE projectinfo SET ProjectName = ? WHERE ProjectPath = ?";
			$stmt= $db->prepare($sql);
			$stmt->execute([$_projectName, $_projectPath]);
		}
		echo "OK";
	}
	function getProjectInfo( $_projectPath){
		global $db;
		$sql = "SELECT * FROM projectinfo WHERE ProjectPath='$_projectPath'";
		$result = $db->select($sql);
		return $result;
	}
	function getApartments($_projectId){///adsfdsfasdf
		// return false;
		global $db;
		$sql = "SELECT * FROM apartmentinfo WHERE ProjectId='$_projectId' ORDER BY Id ASC";
		$result = $db->select($sql);
		if( $result == false){
			return false;
		}
		$arrRetVal = [];
		foreach ($result as $value) {
			$objApart = new \stdClass;
			$objApart->Id = $value['Id'];
			$objApart->ApartmentName = $value['ApartmentName'];
			$objApart->SectionCount = $value['SectionCount'];
			$objApart->PictureCount = $value['PictureCount'];
			$objApart->arrPartInfos = [];
			$objApart->arrSectionInfos = [];
		}
		return $result;
	}
	function getParts($_projectId){
		global $db;
		$sql = "SELECT * FROM parts WHERE ProjectId='$_projectId'";
		$result = $db->select($sql);
		return $result;
	}
	function saveParts($_projectId, $_arrParts){
		global $db;
		$result = getParts($_projectId);
		$arrCurParts = [];
		if( $result){
			foreach ($result as $value) {
				$arrCurParts[] = $value['PartName'];
			}
		}
		foreach ($arrCurParts as $value) {
			if( !in_array($value, $_arrParts)){
				$sql = "DELETE FROM parts WHERE ProjectId='$_projectId' AND PartName='$value'";
				$db->__exec__($sql);
			}
		}
		foreach ($_arrParts as $value) {
			if( !in_array($value, $arrCurParts)){
				$sql = "INSERT INTO parts(ProjectId, PartName) VALUES(?,?)";
				$stmt = $db->prepare($sql);
				$stmt->execute([$_projectId, $value]);
			}
		}
	}
	function getApratmentInfo( $_projectId){
		global $db;
		$sql = "SELECT * FROM apartmentinfo WHERE ProjectId='$_projectId'";
		$result = $db->select($sql);
		return $result;
	}
	function saveApartmentInfo($_projectId, $_arrApartments){
		global $db;
		$result = getApratmentInfo($_projectId);
		$arrCurApartmentIDs = [];
		if( $result){
			foreach ($result as $value) {
				$arrCurApartmentIDs[] = $value['Id'];
			}
		}
		$sql = "DELETE FROM apartmentinfo WHERE ProjectId='$_projectId'";
		$db->__exec__($sql);
		if( count($arrCurApartmentIDs)){
			$strWhere = implode(",", $arrCurApartmentIDs);
			$sql = "DELETE FROM partinfo WHERE ApartmentId in ('$strWhere')";
			$db->__exec__($sql);
			$sql = "DELETE FROM sectioninfo WHERE ApartmentId in ('$strWhere')";
			$db->__exec__($sql);
		}
		foreach ($_arrApartments as $value) {
			$aptName = $value->ApartmentName;
			$secCount = $value->SectionCount;
			$picCount = $value->PictureCount;
			$PartInfos = $value->PartInfos;
			$SectionInfos = $value->SectionInfos;
			$sql = "INSERT INTO apartmentinfo(ProjectId, ApartmentName, SectionCount, PictureCount, PartInfos, SectionInfos) VALUES(?,?,?,?,?,?)";
			$stmt = $db->prepare($sql);
			$stmt->execute([$_projectId, $aptName, $secCount, $picCount, $PartInfos, $SectionInfos]);
		}
	}
	function saveProjectInfo( $_objProjectInfo){
		global $db;
		$ProjectPath = $_objProjectInfo->ProjectPath;
		$sql = "SELECT * FROM projectinfo WHERE ProjectPath='$ProjectPath'";
		$result = $db->select($sql);
		if( $result == false){
			$sql = "INSERT INTO projectinfo(ProjectPath, ProjectName, ProjectType, Zone, City, Street, No, Constructor, ProjectManager, WorksManager, Photography, DocumentDate, BuildingNumber) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$stmt = $db->prepare($sql);
			$stmt->execute([$_objProjectInfo->ProjectPath, $_objProjectInfo->ProjectName, $_objProjectInfo->ProjectType, $_objProjectInfo->Zone, $_objProjectInfo->City, $_objProjectInfo->Street, $_objProjectInfo->No, $_objProjectInfo->Constructor, $_objProjectInfo->ProjectManager, $_objProjectInfo->WorksManager, $_objProjectInfo->Photography, $_objProjectInfo->DocumentDate, $_objProjectInfo->BuildingNumber]);
		} else{
			$sql = "UPDATE projectinfo SET ProjectPath=?, ProjectName=?, ProjectType=?, Zone=?, City=?, Street=?, No=?, Constructor=?, ProjectManager=?, WorksManager=?, Photography=?, DocumentDate=?, BuildingNumber=? WHERE ProjectPath='$ProjectPath'";
			$stmt = $db->prepare($sql);
			$stmt->execute([$_objProjectInfo->ProjectPath, $_objProjectInfo->ProjectName, $_objProjectInfo->ProjectType, $_objProjectInfo->Zone, $_objProjectInfo->City, $_objProjectInfo->Street, $_objProjectInfo->No, $_objProjectInfo->Constructor, $_objProjectInfo->ProjectManager, $_objProjectInfo->WorksManager, $_objProjectInfo->Photography, $_objProjectInfo->DocumentDate, $_objProjectInfo->BuildingNumber]);
		}

		$sql = "SELECT * FROM projectinfo WHERE ProjectPath='$ProjectPath'";
		$result = $db->select($sql);
		$_projectId = $result[0]['Id'];
		saveParts($_projectId, $_objProjectInfo->arrParts);
		saveApartmentInfo($_projectId, $_objProjectInfo->arrApartmentInfo);
		echo "OK";
	}
	function DeleteProject($_directoryName){
		global $db;
		$sql = "DELETE FROM projectinfo WHERE ProjectPath='$_directoryName'";
		$db->__exec__($sql);
	}
	function removeUser($_UserEmail){
		global $db;
		$sql = "DELETE FROM user WHERE UserEmail='$_UserEmail'";
		$db->__exec__($sql);
		echo "OK";
	}
	function makeEncryptKey($_keyword){
		if( $_keyword == "")return "";
		$_key1 = crypt(time(), "");
		$_key2 = crypt($_keyword, "");
		$_key3 = "";//crypt(date("Ymd"), "");
		$key =  $_key1 . $_key2 . $_key3;
		$key = str_replace("$", "", $key);
		$key = str_replace(".", "", $key);
		$key = str_replace("/", "", $key);
		return $key;
	}
	function sendInviteEmail($_UserEmail){
		global $db;
		$sql = "SELECT * FROM user WHERE UserEmail='$_UserEmail'";
		$result = $db->select($sql);
		if( $result == false){
			$key = makeEncryptKey($_UserEmail);

			$sql = "INSERT INTO user(UserEmail, InviteUrl) VALUES(?,?)";
			$stmt = $db->prepare($sql);
			$stmt->execute([$_UserEmail, $key]);
			
			$to = $_UserEmail;
			$subject = "Welcome!";
			$txt = "Hello, there.\n I invites ";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			// $headers = "From: webmaster@example.com";
			$message = "
			<html>
			<head>
			<title>Invitation.</title>
			</head>
			<body>
			<h4>Hello, there.</h4>
			<p>We invite you to our building reparation system.</p>
			<p>Please click bellow link url.</p>
			<a href='http://www.watchwork.co.il/UploadsProjectUser1/invitation.php?key=" . $key . "'>click me</a>
			</body>
			</html>
			";

			mail($to,$subject,$message,$headers);
			echo "Sent";
		} else{
			$row = $result[0];
			if( $row['InviteUrl'] != NULL){
				echo "Invite Sent, but not accepted yet.";
			} else{
				echo "Already exists.";
			}
		}
	}
?>