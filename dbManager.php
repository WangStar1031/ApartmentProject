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
			$sql = "INSERT INTO projectinfo(ProjectPath, ProjectName) values(?,?)";
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
	function saveProjectInfo( $_objProjectInfo){
		global $db;
		$ProjectPath = $_objProjectInfo->ProjectPath;
		$sql = "SELECT * FROM projectinfo WHERE ProjectPath='$ProjectPath'";
		$result = $db->select($sql);
		if( $result == false){
			$sql = "INSERT INTO projectinfo(ProjectPath, ProjectName, ProjectType, Zone, City, Street, No, Constructor, ProjectManager, WorksManager, Photography, DocumentDate, BuildingNumber) values(?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$stmt = $db->prepare($sql);
			$stmt->execute([$_objProjectInfo->ProjectPath, $_objProjectInfo->ProjectName, $_objProjectInfo->ProjectType, $_objProjectInfo->Zone, $_objProjectInfo->City, $_objProjectInfo->Street, $_objProjectInfo->No, $_objProjectInfo->Constructor, $_objProjectInfo->ProjectManager, $_objProjectInfo->WorksManager, $_objProjectInfo->Photography, $_objProjectInfo->DocumentDate, $_objProjectInfo->BuildingNumber]);
		} else{
			$sql = "UPDATE projectinfo SET ProjectPath=?, ProjectName=?, ProjectType=?, Zone=?, City=?, Street=?, No=?, Constructor=?, ProjectManager=?, WorksManager=?, Photography=?, DocumentDate=?, BuildingNumber=? WHERE ProjectPath='$ProjectPath'";
			$stmt = $db->prepare($sql);
			$stmt->execute([$_objProjectInfo->ProjectPath, $_objProjectInfo->ProjectName, $_objProjectInfo->ProjectType, $_objProjectInfo->Zone, $_objProjectInfo->City, $_objProjectInfo->Street, $_objProjectInfo->No, $_objProjectInfo->Constructor, $_objProjectInfo->ProjectManager, $_objProjectInfo->WorksManager, $_objProjectInfo->Photography, $_objProjectInfo->DocumentDate, $_objProjectInfo->BuildingNumber]);
		}
		echo "OK";
	}
	function DeleteProject($_directoryName){
		global $db;
		$sql = "DELETE FROM projectinfo WHERE ProjectPath='$_directoryName'";
		$db->__exec__($sql);
	}
?>