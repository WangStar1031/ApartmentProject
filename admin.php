<?php
session_start();
// print_r($_SESSION['reparationUserName']);

if( !isset($_SESSION['reparationUserName'])){
	header("Location: login.php");
}
if( $_SESSION['reparationUserName'] == ""){
	header("Location: login.php");
}
if( strcasecmp($_SESSION['reparationUserName'], "admin") != 0){
	header("Location: main.php");
}

$dir = __DIR__ . "/container/";
$files = glob($dir . "ap*");
// print_r($files);
$count = count($files);
require_once __DIR__ . "/libInformation.php";
$projectInfo = getProjectInfo();

foreach ($files as $value) {
	$dirName = basename($value);

}
?>
<link rel="stylesheet" type="text/css" href="./assets/css/main/admin.css?<?=time()?>">
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<input type="hidden" name="projectInfo" id="projectInfo" value='<?=$projectInfo?>'>
<a href="logout.php"><button class="btn btn-danger" style="margin: 10px;">Log out</button></a>
<div>
	<table style="margin: auto;">
		<tr>
			<td class="vertical-top" colspan="3" style="padding: 10px;">
				<h3>Project Information</h3>
				<label for="projectName">projectName : </label>
				<input type="text" name="projectName" id="projectName"/>
				<p style="text-align: right;">
					<button onclick="onSaveProjectInfo()">Save Project Info</button>
				</p>
			</td>
			<td class="vertical-top" style="padding: 10px;">
				<span>
					<h4>
						Parts
						<input type="text" name="txtCurPart">
						<button onclick="addNewParts()">Add New</button>
					</h4>
					
				</span>
				<!-- <p id="txtParts" style="display: none;"></p> -->
				<div id="proParts">
				</div>
			</td>
		</tr>
		<tr>
			<td class="vertical-top">
				<table class="preInfoTable"><!-- Primary Datas -->
					<tr>
						<th colspan="2">Apartment</th>
						<th>Photo Count</th>
					</tr>
				<?php
				for ($i = 0; $i < $count; $i++) {
					$apartName = "ap" . ($i + 1);
					$subDir = $dir . $apartName . "/project/photos/";
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
				<table>
					<tr>
						<td style="text-align: center;">
							<button onclick="addApartment()">Add >></button>
						</td>
					</tr>
					<tr>
						<td>
							<button onclick="removeApartment()"><< Remove</button>
						</td>
					</tr>
				</table>
			</td>
			<td class="vertical-top">
				<table class="projectTable">
					<tr>
						<th colspan="2">Apartment</th>
						<th>Photo Count</th>
					</tr>
				</table>
			</td>
			<td class="vertical-top">
				<h4>Apartment Information</h4>
				<label>Address : </label>
				<input type="text" name="address">
				<p style="text-align: right;">
					<button style="vertical-align: bottom;">Save Apartment Info</button>
				</p>
				<table style="margin: auto;">
					<tr>
						<th>Part Name</th>
						<th>Start Number</th>
						<!-- <th>End Number</th> -->
					</tr>
				</table>
			</td>
		</tr>
	</table>
</div>
<script type="text/javascript" src="assets/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="assets/js/main/admin.js?<?=time()?>"></script>