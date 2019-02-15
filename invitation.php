<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="assets/js/jquery-1.9.1.min.js"></script>

<?php
require_once __DIR__ . "/dbManager.php";
global $db;

$UserEmail = "";
if( isset($_POST['UserEmail'])) $UserEmail = $_POST['UserEmail'];
if( $UserEmail != ""){
	$UserName = $_POST['UserName'];
	$Password = $_POST['password'];

	$sql = "UPDATE user SET UserName = ?, Password = ?, InviteUrl='' WHERE UserEmail = '$UserEmail'";
	$stmt= $db->prepare($sql);
	$stmt->execute([$UserName, $Password]);
?>
<div class="container">
	<h3>Welcome to post your information.</h3>
	<p>Successfully signed up.</p>
	<a href="login.php">Goto Login</a>
</div>
<?php
	exit();
}
$key = "";
if(isset($_GET['key'])) $key = $_GET['key'];
if( $key != ""){
	$sql = "SELECT * FROM user WHERE InviteUrl='$key'";
	$result = $db->select($sql);
	if( $result != false){
		$UserEmail = $result[0]['UserEmail'];
?>

<div class="container">
	<h3>Welcome!</h3>
	<form method="post" onsubmit="return validateFormData()">
		<input type="hidden" name="UserEmail" value="<?=$UserEmail?>">
		<table>
			<tr>
				<td><label>User Email</label></td>
				<td><?=$UserEmail?></td>
			</tr>
			<tr>
				<td><label>User Name</label></td>
				<td><input type="text" class="form-control" name="UserName"></td>
			</tr>
			<tr>
				<td><label>Password</label></td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td><label>Confirm Password</label></td>
				<td><input type="password" name="confpass"></td>
			</tr>
		</table>
		<button>Send</button>
	</form>
	
</div>
<style type="text/css">
	.required{
		border: 1px solid red;
	}
</style>
<script type="text/javascript">
	function validateFormData(){
		var userName = $("input[name=UserName]").val();
		if( !userName){
			$("input[name=UserName]").addClass("required");
			return false;
		}
		if( userName == "admin"){
			$("input[name=UserName]").addClass("required");
			return false;
		}
		var Password = $("input[name=password]").val();
		var confPass = $("input[name=confpass]").val();
		if( !Password){
			$("input[name=password]").addClass("required");
			return false;
		}
		if(!confPass){
			$("input[name=confpass]").addClass("required");
			return;
		}
		if( Password != confPass){
			$("input[name=password]").addClass("required");
			$("input[name=confpass]").addClass("required");
			return false;
		}
		return true;
	}
</script>
<?php
	} else{
		echo "Invalid key.";
	}
}
?>