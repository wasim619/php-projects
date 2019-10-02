<?php require_once("../Include/Session.php"); ?>
<?php require_once("../Include/Styles.css"); ?>
<?php require_once("../Include/eFunctions.php"); ?>
<?php require_once("../Include/DB.php"); ?>
<?php
if(isset($_POST["Submit"])){
$Email=mysqli_real_escape_string($ConnectingDB,$_POST["Email"]);
$Password=mysqli_real_escape_string($ConnectingDB,$_POST["Password"]);
if(empty($Email)||empty($Password)){
	$_SESSION["message"]="All Fields must be filled out";
	Redirect_To("elogin.php");
}else{

	global $ConnectingDB;

	if(Login_Attempt($Email,$Password)){
		$_SESSION["User_Id"]=[$Found_Account['id']];
		$_SESSION["User_Name"]=$Found_Account['username'];
		$_SESSION["User_Email"]=$Found_Account['email'];
		if(isset($_POST["Remember"])){
			$ExpireTime=time()+10;
			setcookie("SettingEmail",$Email,$ExpireTime);
			setcookie("SettingName",$Username,$ExpireTime);
		}

		Redirect_To("employer.php");
	}else{
		$_SESSION["message"]="Invalid Email / Password";
	Redirect_To("elogin.php");
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
		<title>Login</title>
</head>
	<body>
		<nav class="navbar" id="insidenav">
				<div class="container-fluid">
						<div class="navbar-header">
								<a class="navbar-brand" href="../index.php">Job Portal</a>
						</div>
						<ul class="nav navbar-nav">
								<li class="active"><a href="eregister.php">Employer Registration</a></li>

					 </ul>
						<ul class="nav navbar-nav navbar-right">
								<li><a href="elogin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					 </ul>
				 </div>
		 </nav>
<div>
<?php echo Message(); ?>
<?php echo SuccessMessage(); ?></div>
<div class="mt-5" id="centerpage">
<br><a href="eregister.php"><span class="FieldInfo">Don't Have an account? Creat One !</span></a><br>
	<form action="elogin.php" method="post">
	<fieldset>
<span class="FieldInfo">Email:</span><br><input type="email" Name="Email" value=""><br>
<span class="FieldInfo">Password:</span><br><input type="password" Name="Password" value=""><br>
<input type="checkbox" Name="Remember" ><span class="FieldInfo"> &nbsp;Remember me<span class="FieldInfo"><br>
<br><a href="eRecover_Account.php"><span class="FieldInfo">Forgot Password</span></a>

<br><input type="Submit" Name="Submit" value="Login"><br>


	</fieldset>


	</form>
	</div>

	</body>
</html>
<?php
include_once('../footer.php');
?>
