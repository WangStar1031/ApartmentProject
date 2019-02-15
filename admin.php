<?php
session_start();

if( !isset($_SESSION['reparationUserName'])){
	header("Location: login.php");
}
if( $_SESSION['reparationUserName'] == ""){
	header("Location: login.php");
}
if( strcasecmp($_SESSION['reparationUserName'], "admin") != 0){
	header("Location: main.php");
}

$dir = __DIR__ . "/container/project1/";
$files = glob($dir . "ap*");
// print_r($files);
$count = count($files);
require_once __DIR__ . "/libInformation.php";

foreach ($files as $value) {
	$dirName = basename($value);

}
?>
<head>
	<link rel="icon" type="image/png" href="assets/images/reparation_logo.png">
</head>

<!-- <link rel="stylesheet" href="./assets/bootstrap_select/css/bootstrap-select.min.css">
<script src="./assets/bootstrap_select/js/bootstrap-select.min.js"></script>
<script src="./assets/bootstrap_select/js/i18n/defaults-en_US.min.js"></script>
 -->

<link rel="stylesheet" type="text/css" href="./assets/css/main/admin.css?<?=time()?>">
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<a href="logout.php"><button class="btn btn-danger" style="margin: 10px;">Log out</button></a>
<style type="text/css">
	.mainTab table{
		width: 100%;
	}
	.mainTab table td, .mainTab table th{
		padding: 5px;
	}
	table.nonPadding td, table.nonPadding th{
		padding: 0px;
	}
</style>
<div>
	<div class="container">
		<ul class="nav nav-tabs">
			<li class="active" onclick="onTabClicked(0)"><a href="#">Project Management</a></li>
			<li class="" onclick="onTabClicked(1)"><a href="#">User Management</a></li>
		</ul>		
		<div class="forProject mainTab">
			<h3>Project Information</h3>
			<table class="table-bordered">
				<tr>
					<td class="vertical-top" colspan="3" style="padding: 10px;">
						<table class="nonBorder">
							<tr>
								<td><label for="projectName">Project Name : </label></td>
								<td><input class="form-control" type="text" id="projectName"/><br></td>
								<td><label for="projectType">Project Type:</label></td>
								<td>
									<select id="projectType" class="form-control">
										<option class="Public">Public</option>
										<option class="Commercial">Commercial</option>
										<option class="Office">Office</option>
										<option class="Residential">Residential</option>
									</select>
								</td>
							</tr>
							<tr>
								<td><label>Location : </label></td>
								<td colspan="3">
									<table class="nonPadding">
										<tr>
											<td>Zone</td>
											<td>City</td>
											<td>Street</td>
											<td>No</td>
										</tr>
										<tr>
											<td><input type="text" class="form-control" id="zone"></td>
											<td><input type="text" class="form-control" id="city"></td>
											<td><input type="text" class="form-control" id="street"></td>
											<td><input type="text" class="form-control" id="no"></td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td><label>Constructor : </label></td>
								<td><input type="text" class="form-control" id="constructor"></td>
								<td><label>Project Manager : </label></td>
								<td><input type="text" class="form-control" id="projectmanager"></td>
							</tr>
							<tr>
								<td><label>Works Manager : </label></td>
								<td><input type="text" class="form-control" id="worksmanager"></td>
								<td><label>Photography : </label></td>
								<td><input type="text" class="form-control" id="photography"></td>
							</tr>
							<tr>
								<td><label>Building N<u>o</u> : </label></td>
								<td><input type="text" class="form-control" id="buildingnumber"></td>
								<td><label>Document Date : </label></td>
								<td><input type="date" class="form-control" id="documentdate" value="<?= date("Y-m-d")?>"></td>
							</tr>
						</table>
						<p style="text-align: right;">
							<button onclick="onSaveProjectInfo()" class="btn btn-success">Save Project Info</button>
						</p>
					</td>
					<td class="vertical-top" style="padding: 10px;">
						<span>
							<h4>
								Parts
								<table class="nonBorder">
									<tr>
										<td><input class="form-control" type="text" name="txtCurPart"></td>
										<td><button class="btn btn-success" onclick="addNewParts()">Add New</button></td>
									</tr>
								</table>
							</h4>
							
						</span>
						<!-- <p id="txtParts" style="display: none;"></p> -->
						<div id="proParts">
						</div>
					</td>
				</tr>
				<tr>
					<td class="vertical-top">
						<table class="preInfoTable table-bordered table-striped"><!-- Primary Datas -->
							<tr>
								<th colspan="2">Apartment</th>
								<th>Photo Count</th>
							</tr>
						<?php
						for ($i = 0; $i < $count; $i++) {
							$apartName = "ap" . ($i + 1);
							$subDir = $dir . $apartName . "/project/photos/";
							if( !file_exists($subDir))
								continue;
							$photos = scandir($subDir);
						?>
							<tr>
								<td><input type="checkbox" name="chk_aparts"></td>
								<td class="apartName"><?=$apartName?></td>
								<td class="imageCount"><?=count($photos) - 2?></td>
							</tr>
						<?php
						}
						?>
						</table>
					</td>
					<td style="padding: 10px;">
						<table class="">
							<tr>
								<td style="text-align: center;">
									<button class="btn btn-success" onclick="addApartment()">Add >></button>
								</td>
							</tr>
							<tr>
								<td style="text-align: center;">
									<button class="btn btn-danger" onclick="removeApartment()"><< Remove</button>
								</td>
							</tr>
						</table>
					</td>
					<td class="vertical-top">
						<table class="projectTable table-bordered table-striped">
							<tr>
								<th colspan="2">Apartment</th>
								<th>Photo Count</th>
							</tr>
						</table>
					</td>
					<td class="vertical-top">
						<h4>Apartment Information</h4>
						<table>
							<tr>
								<td>
									<label>Section Count : </label>
								</td>
								<td>
									<input type="number" id="sectionCount" min="1" class="form-control" onchange="sectionCountChanged()">
								</td>
							</tr>
						</table>
						<p style="text-align: right;">
							<button class="btn btn-success" onclick="openSectionImgModal()">View Section Image</button>
						</p>
						<table class="table-bordered table-striped" id="tblSections">
							<tr>
								<th>Section N<u>o</u></th>
								<th>Image N<u>o</u></th>
							</tr>
						</table>
						<br>
						<table class="table-bordered table-striped">
							<tr>
								<th>N<u>o</u></th>
								<th>Part Name</th>
								<th>Image N<u>o</u></th>
								<!-- <th>End Number</th> -->
							</tr>
						</table>
						<br>
						<p style="text-align: right;">
							<button class="btn btn-success" style="vertical-align: bottom;">Save Apartment Info</button>
						</p>
					</td>
				</tr>
			</table>
		</div>
		<div class="forUser mainTab" style="display: none;">
			<h3>User Information</h3>
			<table class="table-bordered table-striped">
				<tr>
					<th>N<u>o</u></th>
					<th>User Name</th>
					<th>User Email</th>
					<th>Action</th>
				</tr>
				<?php
				$allUsers = getAllUsers();
				$index = 0;
				foreach ($allUsers as $value) {
					if( $value['UserName'] != "admin"){
						$index++;
				?>
				<tr onclick="SelectedUser(this)">
					<td><?=$index?></td>
					<td><?=$value['UserName']?></td>
					<td><?=$value['UserEmail']?></td>
					<td>
						<button class="btn btn-danger">Remove</button>
					</td>
				</tr>
				<?php
					}
				}
				?>
			</table>
			<br>
			<button class="btn btn-success">Invite User</button>
			<?php
			$allProjects = getAllProjects();
			?>
		</div>
	</div>
</div>

<div class="modal fade" role="dialog" id="sectionImgModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
			</div>
		</div>

	</div>
</div>

<script type="text/javascript" src="assets/js/jquery-1.9.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/main/admin.js?<?=time()?>"></script>
<script type="text/javascript">
	function onTabClicked(_idTab){
		$("ul.nav-tabs li").removeClass("active");
		$("ul.nav-tabs li").eq(_idTab).addClass("active");
		$('.mainTab').hide();
		$('.mainTab').eq(_idTab).show();
	}
	function getProjectInfo(){
		$.post("api_process.php", {action: "getProjectInfo", projectPath: "project1"}, function(data){
			if( data != "false"){
				var projectInfo = JSON.parse(data)[0];
				console.log(projectInfo);
				$("#projectName").val(projectInfo.ProjectName);
				$("#projectType ." + projectInfo.ProjectType).prop("selected", true);
				$("#zone").val(projectInfo.Zone);
				$("#city").val(projectInfo.City);
				$("#street").val(projectInfo.Street);
				$("#no").val(projectInfo.No);
				$("#constructor").val(projectInfo.Constructor);
				$("#projectmanager").val(projectInfo.ProjectManager);
				$("#worksmanager").val(projectInfo.WorksManager);
				$("#photography").val(projectInfo.Photography);
				$("#buildingnumber").val(projectInfo.BuildingNumber);
			}
		});
	}
	getProjectInfo();
	function onRemove(_this){
		var r = confirm("Are you sure remove project?\nAll files will be removed from your disk.");
		if( r == true){
			var dirName = $(_this).parent().parent().find(".dirName").eq(0).text();
			$.post("api_process.php", {action: "removeProject", directoryName: dirName}, function(data){
				if( data == "OK"){
					$(_this).parent().parent().remove();
					var arrNumbers = $("#tblProjects .number");
					for( var i = 1; i <= arrNumbers.length; i++){
						arrNumbers.eq(i - 1).html(i);
					}
				} else{
					alert("Can't remove project.");
				}
			});
		}
	}
	function onSaveProjectInfo(){
		var projectInfo = {};
		projectInfo.ProjectPath = "project1";
		projectInfo.ProjectName = $("#projectName").val();
		projectInfo.Zone = $("#zone").val();
		projectInfo.City = $("#city").val();
		projectInfo.Street = $("#street").val();
		projectInfo.No = $("#no").val();
		projectInfo.Constructor = $("#constructor").val();
		projectInfo.ProjectManager = $("#projectmanager").val();
		projectInfo.WorksManager = $("#worksmanager").val();
		projectInfo.Photography = $("#photography").val();
		projectInfo.ProjectType = $("#projectType option:selected").val();
		projectInfo.DocumentDate = $("#documentdate").val();
		projectInfo.BuildingNumber = $("#buildingnumber").val();
		$.post("api_process.php", {action: "saveProjectInfo", projectInfo: JSON.stringify(projectInfo)}, function(data){
			if( data == "OK"){
				alert("Successfully saved.");
			} else{
				alert("Can't saved.");
			}
		});
	}
	function SelectedUser(_this){
	}
	function openSectionImgModal(){
		$('#sectionImgModal').modal('toggle');
	}
	function clickedApart(_this){
		console.log(_this);
		$(".mainContents").removeClass("selectedTr");
		$(_this).addClass("selectedTr");
		$("#sectionCount").val("");
	}
	function sectionCountChanged(){
		if( $(".mainContents selectedTr").length == 0) return;
		var nCount = $("#sectionCount").val();
		var strHtml = "";
		for(var i = 0; i < nCount; i++){
			strHtml += '<tr>';
				strHtml += '<td class="sectionNumber">' + (i + 1) + '</td>';
				strHtml += '<td><input type="number" min="1" class="ImgNumber"></td>';
			strHtml += '</tr>';
		}
		$("#tblSections tr").filter(function(_index){
			return _index != 0;
		}).remove();
		$("#tblSections").append(strHtml);
	}
</script>