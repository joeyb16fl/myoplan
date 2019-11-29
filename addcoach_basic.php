<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('functions/config.php');

$token_for_students = GET_TOKEN_STRING(10);
$doc_token = GET_TOKEN_STRING(15);
$confirm_code = GET_TOKEN_STRING(10);
// table name 
$tbl_name='mop_coach';
$sentmail=false;
// values sent from form 
$admn_id = $_SESSION["id"];
$name=$_POST["name"];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$username=$_POST['username'];
$password=$_POST['password'];
$status=false;


$availi = "SELECT * from $tbl_name WHERE co_email='$email' or username='$username'";
$result2 = mysql_query($availi);
$count2=mysql_num_rows($result2);
if($count2 == 1)
{
	echo "<script> alert('Email or Username Already Exist. Please enter different email...'); window.location='sc_admin_profile.php';</script>";
	exit();	
}




	// Insert data into database 
	$sql = "INSERT INTO mop_coach(co_name, co_email, co_phone, co_pwd, co_address, co_doc_token, co_reg_code, username, confirm_code, admn_id) VALUES "
	."('$name', '$email', '$phone', '$password', '$address', '$doc_token', '$token_for_students', '$username', '$confirm_code',$admn_id)";
$result=mysql_query($sql);
 
$id = mysql_insert_id();



// if suceesfully inserted data into database, send confirmation link to email 
if($result){
// ---------------- SEND MAIL FORM ----------------

// send e-mail to ...
$to=$email;

// Your subject
$subject="MyoPlan - Your confirmation link here";

// From
$header="from: myoplan.com <noreply@myoplan.com>";

// Your message
$message="Your Comfirmation link \r\n";
$message.="Click on this link to activate your account \r\n";
$message.="http://www.myoplan.com/functions/coach_confirmation.php?passkey=$confirm_code&key_id=$id";

// send email
$sentmail = mail($to,$subject,$message,$header);
}

// if not found 
else {
echo "<script> alert('Not found your email in our database'); window.location='sc_admin_profile.php';</script>";
//header('Location: registration.html');
//echo "Error 1";
}


// if your email succesfully sent
if($sentmail){
echo "<script> alert('A confirmation link Has Been Sent To Your Email Address.'); window.location='sc_admin_profile.php';</script>";
//header('Location: registration.html');
//echo "Error 2";
}
else {
echo "<script> alert('Cannot send Confirmation link to your e-mail address'); window.location='sc_admin_profile.php';</script>";
//header('Location: registration.html');
//echo "Error 3";
}   
?>