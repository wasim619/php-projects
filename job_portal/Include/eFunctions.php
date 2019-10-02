<?php require_once("DB.php"); ?>
<?php
function Redirect_To($NewLocation){
	header("Location:".$NewLocation);
	exit;
}
function Password_Encryption($Password) {
  	$BlowFish_Hash_Format = "$2y$10$";  // 2y to Tells PHP to use Blowfish with a "cost" of 10
	  $Salt_Length = 22; 			// Blowfish salts should be 22-characters or greater
	  $Salt = Generate_Salt($Salt_Length);
	  $Formating_Blowfish_With_Salt = $BlowFish_Hash_Format . $Salt;
	  $Hash = crypt($Password, $Formating_Blowfish_With_Salt);
		return $Hash;
	}
function Generate_Salt($length) {
	  // Not 100% unique, not 100% random, but good enough for a salt
	  // MD5 Algorithm returns 32 characters
	  $Unique_Random_String = md5(uniqid(mt_rand(), true));
// Valid characters for a salt are [a to z - A to Z 0 to 9 . / ]
	  $Base64_String = base64_encode($Unique_Random_String);
	  		// But not '+' which is valid in base64 encoding so we are replacing it with '.'

	  $Modified_Base64_String = str_replace('+', '.', $Base64_String);
	  //Using Substr function we Truncate string to the correct length
	  $Salt = substr($Modified_Base64_String, 0, $length);

		return $Salt;
	}
function Password_Check($Password, $Existing_Hash) {
    // existing hash contains format and salt  at start that we made in our password encyption function
	  $Hash = crypt($Password, $Existing_Hash);
	  if ($Hash === $Existing_Hash) {
	    return true;
	  } else {
	    return false;
	  }
	}
function CheckEmailEkistsOrNot($Email){
	global $ConnectingDB;
	$Query="SELECT * FROM employer wHERE cemail='$Email'";
	$Execute=mysqli_query($ConnectingDB,$Query);
	if(mysqli_num_rows($Execute)>0){
		return true;
	}else {
		return false;
	}
}
function ChecknameEkistsOrNot($name){
	global $ConnectingDB;
	$Query="SELECT * FROM employer wHERE cname='$name'";
	$Execute=mysqli_query($ConnectingDB,$Query);
	if(mysqli_num_rows($Execute)>0){
		return true;
	}else {
		return false;
	}
}

	function Login_Attempt($Email,$Password){
		global $ConnectingDB;
		$Query="SELECT * FROM employer WHERE cemail='$Email' AND password='$Password' ";
		$Execute=mysqli_query($ConnectingDB,$Query);
		if(mysqli_num_rows($Execute)>0){
			return true;
			}else{
			return false;	}
		}

function login(){
	if(isset($_SESSION["User_Id"])||isset($_COOKIE["SettingEmail"])){
		return true;
	}
}

function Confirm_login(){
	if(!login()){
	$_SESSION["message"]="You have to Login";
	Redirect_To("elogin.php");
	}

}


?>
