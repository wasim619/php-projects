<?php require_once("../Include/Session.php"); ?>
<?php require_once("../Include/Styles.css"); ?>
<?php require_once("../Include/cFunctions.php"); ?>
<?php require_once("../Include/DB.php"); ?>
<?php
if(isset($_GET['token'])){
    $TokenFromURL=$_GET['token'];
if(isset($_POST["Submit"])){

$Password=mysqli_real_escape_string($ConnectingDB,$_POST["Password"]);
$ConfirmPassword=mysqli_real_escape_string($ConnectingDB,$_POST["ConfirmPassword"]);

if(empty($Password)||empty($ConfirmPassword)){
	$_SESSION["message"]="All Fields must be filled out";
}elseif($Password!==$ConfirmPassword){
	$_SESSION["message"]="Both Password Values must be Same";

}elseif(strlen($Password)<4){
	$_SESSION["message"]="Password Should Include at least 4 values";

}
else{
	global $ConnectingDB;
	$Hashed_Password=Password_Encryption($Password);
	$Query="UPDATE candidate SET password='$Hashed_Password' WHERE token='$TokenFromURL'";
$Execute=mysqli_query($ConnectingDB,$Query);
if($Execute){
	    $_SESSION["SuccessMessage"]="Password Changed Successfully";
		Redirect_To("clogin.php");
}else{
		$_SESSION["message"]="Something Went Wrong Try Again!";
	        Redirect_To("clogin.php");
}



}


}
}
?>
<?php ?>
<?php
include_once('../header.php');
include_once('../navbar.php');
?>
<!DOCTYPE>
<html>
<head>
		<title>Create New Password</title>
</head>
	<body>
<div>
<?php echo Message(); ?>
<?php echo SuccessMessage(); ?></div>
<div id="centerpage">
	<form action="cReset_Password.php?token=<?php echo $TokenFromURL; ?>" method="post">
	<fieldset>

<span class="FieldInfo">New Password:</span><br><input type="password" Name="Password" value=""><br>
<span class="FieldInfo">Confirm Password:</span><br><input type="password" Name="ConfirmPassword" value="">
<br><input type="Submit" Name="Submit" value="Submit"><br>


	</fieldset>


	</form>
	</div>

	</body>
</html>
<?php
include_once('../footer.php');
?>
