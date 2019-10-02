<?php require_once("../Include/Session.php"); ?>
<?php require_once("../Include/Styles.css"); ?>
<?php require_once("../Include/cFunctions.php"); ?>
<?php require_once("../Include/DB.php"); ?>
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
	$Query="INSERT INTO candidate(name,username,email,password,address,state,city,token)
	VALUES('$name','$Username','$Email','$Password','$Address','$State','$City','$Token')";
	$Execute=mysqli_query($ConnectingDB,$Query);
	if($Execute){
		$_SESSION["SuccessMessage"]="You Have To Login";
Redirect_To("clogin.php");

}else{
		$_SESSION["message"]="Something Went Wrong Try Again!";
	Redirect_To("cregister.php");
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
		<title>Register Now</title>
</head>
	<body>

<nav class="navbar" id="insidenav">
		<div class="container-fluid">
				<div class="navbar-header">
						<a class="navbar-brand" href="../index.php">Job Portal</a>
				</div>
				<ul class="nav navbar-nav">
						<li class="active"><a href="cregister.php">Jobseeker Registration</a></li>

			 </ul>
				<ul class="nav navbar-nav navbar-right">
						<li><a href="clogin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			 </ul>
		 </div>
 </nav>

 <div class="mt-5">
 <?php echo Message(); ?>
 <?php echo Message1(); ?>
 <?php echo SuccessMessage(); ?>
 </div>
<div class="mt-5" id="centerpage">
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
<?php
include_once('../footer.php');
?>
