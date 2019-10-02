<?php require_once("../Include/Session.php"); ?>
<?php require_once("../Include/Styles.css"); ?>
<?php require_once("../Include/cFunctions.php"); ?>
<?php require_once("../Include/DB.php"); ?>
<?php
if(isset($_POST["Submit"])){

$Email=mysqli_real_escape_string($ConnectingDB,$_POST["Email"]);

if(empty($Email)){
	$_SESSION["message"]="Email Required";
	Redirect_To("eRecover_Account.php");
}elseif(!CheckEmailEkistsOrNot($Email)){
		$_SESSION["message"]="Email not Found";
	Redirect_To("eregister.php");
}
else{
	global $ConnectingDB;
	$Query="SELECT * FROM employer WHERE email='$Email'";
	$Execute=mysqli_query($ConnectingDB,$Query);
	if($admin=mysqli_fetch_array($Execute)){
		$admin["username"];
		$admin["token"];
 $subject="Reset Password";
 $body='Hi ' .$admin["username"]. 'Here is the link to Reset you Password'.'
 http://localhost/job_portal/eReset_Password.php?token='.$admin["token"];
 $SenderEmail="From:Job Portal Admin";
 if (mail($Email, $subject, $body, $SenderEmail)) {
                $_SESSION["SuccessMessage"]="Check Email for Resetting Password";
		Redirect_To("elogin.php");
                    } else {
                $_SESSION["message"]="Something Went Wrong Try Again";
	Redirect_To("eregister.php");
                    }
}else{
		$_SESSION["message"]="Something Went Wrong Try Again!";
	Redirect_To("eregister.php");
	}


}


}

?>
<?php ?>
<?php
include_once('../header.php');

?>
<!DOCTYPE>
<html>
<head>
		<title>Forgot Password</title>
</head>
	<body>
<div>
<?php echo Message(); ?>
<?php echo SuccessMessage(); ?></div>
<div id="centerpage">
	<form action="eRecover_Account.php" method="post">
	<fieldset>
<span class="FieldInfo">Email:</span><br><input type="email" Name="Email" value=""><br>
<br><input type="Submit" Name="Submit" value="Submit"><br>


	</fieldset>


	</form>
	</div>

	</body>
</html>
<?php
include_once('../footer.php');
?>
