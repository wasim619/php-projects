
<?php
include_once('header.php');
include_once('navbar.php');
?>
<div class="container-fluid" id="main1"> <!-- jumbotron fluid -->
<div class="jumbotron text-center" id="searchjum">
<h1>Job Portal</h1>
    <p>Search for Jobs</p>
    <form class="form-inline" id="homesearch">
        <input type="text" class="form-control" size="50" placeholder="Enter your search keyword" name="keyword" id="keyword">
        <button type="button" onclick="search()" class="btn btn-lg " style="color: black"><span class="glyphicon glyphicon-search"></span> Search</button>
    </form>
</div>
</div> <!-- jumbotron -->
<?php
include_once('footer.php');
?>
if(isset($_POST["Remember"])){
  $ExpireTime=time()+86400;
  setcookie("SettingEmail",$Email,$ExpireTime);
  setcookie("SettingName",$Username,$ExpireTime);
}





<?php require_once("Include/Session.php"); ?>
<?php require_once("Include/Styles.css"); ?>
<?php require_once("Include/cFunctions.php"); ?>
<?php require_once("Include/DB.php"); ?>
<?php
if(isset($_POST["Submit"])){
$name=mysqli_real_escape_string($ConnectingDB,$_POST['Fullname']);
$Username=mysqli_real_escape_string($ConnectingDB,$_POST["Username"]);
$Email=mysqli_real_escape_string($ConnectingDB,$_POST["Email"]);
$Password=mysqli_real_escape_string($ConnectingDB,$_POST["Password"]);
$ConfirmPassword=mysqli_real_escape_string($ConnectingDB,$_POST["ConfirmPassword"]);
$Address=mysqli_real_escape_string($ConnectingDB,$_POST['Address']);
$State=mysqli_real_escape_string($ConnectingDB,$_POST['State']);
$City=mysqli_real_escape_string($ConnectingDB,$_POST['City']);
$Token=bin2hex(openssl_random_pseudo_bytes(40));

if(empty($name)&&empty($Username)&&empty($Email)&&empty($Password)&&empty($ConfirmPassword)&&empty($Address)&&empty($State)&&empty($City)){
	$_SESSION["message"]="All Fields must be filled out";
	Redirect_To("cregister.php");
}elseif($Password!==$ConfirmPassword){
	$_SESSION["message"]="Both Password Values must be Same";
	Redirect_To("cregister.php");

}elseif(strlen($Password)<4){
	$_SESSION["message"]="Password Should Include at least 4 values";
	Redirect_To("cregister.php");

}elseif(CheckEmailEkistsOrNot($Email)){
		$_SESSION["message"]="Email is Already in Use";
	Redirect_To("cregister.php");
}elseif(CheckUsernameEkistsOrNot($Username)){
    $_SESSION["message1"]="Username Already Exists";
  Redirect_To("cregister.php");
}

else{
	global $ConnectingDB;
	$Hashed_Password=Password_Encryption($Password);
	$Query="INSERT INTO candidate(name,username,email,password,address,state,city,token,active)
	VALUES('$name','$Username','$Email','$Hashed_Password','$Address','$State','$City','$Token','Off')";
	$Execute=mysqli_query($ConnectingDB,$Query);
	if($Execute){
 $subject="Confirm Account";
 $body='Hi '.$Username. '<br>Here is the link to Active your account
 http://localhost/job_portal/cActivate.php?token='.$Token;
 $SenderEmail="From:Job Portal Admin";
 if (mail($Email, $subject, $body, $SenderEmail)) {
                $_SESSION["SuccessMessage"]="Check Email for Activation";
		Redirect_To("clogin.php");
                    } else {
                $_SESSION["message"]="Something Went Wrong Try Again";
	Redirect_To("cregister.php");
                    }
}else{
		$_SESSION["message"]="Something Went Wrong Try Again!";
	Redirect_To("cregister.php");
	}


}


}

?>
<?php ?>
<!DOCTYPE>
<html>
<head>
		<title>Register Now</title>
</head>
	<body>
<div>
<?php echo Message(); ?>
<?php echo Message1(); ?>
<?php echo SuccessMessage(); ?>
</div>
<div id="centerpage">
	<br><a href="clogin.php"><span class="FieldInfo">Already a member? Login Now!</span></a>
		<br>
	<form action="cregister.php" method="post">
	<fieldset><b><strong>Candidate Registration</b></strong><br><br>
<span class="FieldInfo">Fullname:</span><br><input type="text" Name="Fullname" value=""><br>
<span class="FieldInfo">Username:</span><br><input type="text" Name="Username" value=""><br>
<span class="FieldInfo">Email:</span><br><input type="email" Name="Email" value=""><br>
<span class="FieldInfo">Password:</span><br><input type="password" Name="Password" value=""><br>
<span class="FieldInfo">Confirm Password:</span><br><input type="password" Name="ConfirmPassword" value="">
<span class="FieldInfo">Address:</span><br><input type="text" Name="Address" value=""><br>
<span class="FieldInfo">State:</span><br><input type="text" Name="State" value=""><br>
<span class="FieldInfo">City:</span><br><input type="text" Name="City" value=""><br>
<br><input type="Submit" Name="Submit" value="Register"><br>


	</fieldset>


	</form>
	</div>

	</body>
</html>













<?php require_once("Include/Session.php"); ?>
<?php require_once("Include/Styles.css"); ?>
<?php require_once("Include/cFunctions.php"); ?>
<?php require_once("Include/DB.php"); ?>
<?php
if(isset($_POST["Submit"])){
$Email=mysqli_real_escape_string($ConnectingDB,$_POST["Email"]);
$Password=mysqli_real_escape_string($ConnectingDB,$_POST["Password"]);
if(empty($Email)||empty($Password)){
	$_SESSION["message"]="All Fields must be filled out";
	Redirect_To("clogin.php");
}else{

	$Found_Account=Login_Attempt($Email,$Password);
	if(Login_Attempt($Email,$Password)){

		Redirect_To("cWelcome.php");
	}else{
		$_SESSION["message"]="Invalid Email / Password";
	Redirect_To("clogin.php");
	}

}
}
?>
<?php ?>
<!DOCTYPE>
<html>
<head>
		<title>Login</title>
</head>
	<body>
<div>
<?php echo Message(); ?>
<?php echo SuccessMessage(); ?></div>
<div id="centerpage">
<br><a href="cregister.php"><span class="FieldInfo">Don't Have an account? Creat One !</span></a><br>
	<form action="clogin.php" method="post">
	<fieldset>
<span class="FieldInfo">Email:</span><br><input type="email" Name="Email" value=""><br>
<span class="FieldInfo">Password:</span><br><input type="password" Name="Password" value=""><br>
<input type="checkbox" Name="Remember" ><span class="FieldInfo"> &nbsp;Remember me<span class="FieldInfo"><br>
<br><a href="Recover_Account.php"><span class="FieldInfo">Forgot Password</span></a>

<br><input type="Submit" Name="Submit" value="Login"><br>


	</fieldset>


	</form>
	</div>

	</body>
</html>
