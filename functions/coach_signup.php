<?php

include('config.php');

$token_for_students = GET_TOKEN_STRING(10);
$doc_token = GET_TOKEN_STRING(15);
$confirm_code = GET_TOKEN_STRING(10);
// table name 
$tbl_name='mop_coach';
$sentmail=false;
// values sent from form 

$name=$_POST["name"];
$email=$_POST['email'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$sc_reg_code=$_POST['sc_reg_code'];
$sport=$_POST['sports'];
$username=$_POST['username'];

$password=$_POST['pwd1'];
$cpassword=$_POST['pwd2'];
$status=false;



//checks
if(!isset($_POST['name']) || empty($_POST['name']))
{
	echo "<script> alert('Enter Your Name...'); window.location='http://www.myoplan.com/login.php';</script>";
	exit();	
}
if(!isset($_POST['email']) || empty($_POST['email']))
{
	echo "<script> alert('Enter Email.....'); window.location='http://www.myoplan.com/login.php';</script>";
	exit();	
}

if(false)
{
	echo "<script> alert('Enter your parent email...'); window.location='http://www.myoplan.com/login.php';</script>";
	
	exit();	
}
else{
		$_reg_code = $_POST["sc_reg_code"];
		$_query="select * from reg_schools where sc_reg_code='$_reg_code'";
		$count = mysql_num_rows(mysql_query($_query));
		if($count < 1){
			echo "<script> alert('No school is registered with school code provide $_reg_code ...'); window.location='http://www.myoplan.com/login.php';</script>";
			exit();	
		}
}

if(!isset($_POST['phone']) || empty($_POST['phone']))
{
	
	echo "<script> alert('Enter your Phone number...'); window.location='http://www.myoplan.com/login.php';</script>";
	exit();	
}
if(!isset($_POST['pwd1']) || empty($_POST['pwd1']))
{
	echo "<script> alert('Enter your password for the account...'); window.location='http://www.myoplan.com/login.php';</script>";
	exit();	
}
if($_POST['pwd1'] != $_POST['pwd2'])
{
	echo "<script> alert('Your Password are not matching...'); window.location='http://www.myoplan.com/login.php';</script>";
	exit();	
}

//check for email availability
$availi = "SELECT * from $tbl_name WHERE co_email='$email' or username='$username'";
$result2 = mysql_query($availi);
$count2=mysql_num_rows($result2);
if($count2 == 1)
{
	echo "<script> alert('Email or Username Already Exist. Please enter different email...'); window.location='http://www.myoplan.com/login.php';</script>";
	exit();	
}




	// Insert data into database 
	$sql = "INSERT INTO mop_coach(co_name, co_email, co_address, co_phone, co_pwd, co_school_reg_code, co_sport_for, co_doc_token, co_reg_code, username, confirm_code) VALUES "
	."('$name', '$email', '$address', '$phone', '$password', '$sc_reg_code', '$sport', '$doc_token', '$token_for_students', '$username', '$confirm_code')";
$result=mysql_query($sql);

$id = mysql_insert_id();



// if suceesfully inserted data into database, send confirmation link to email 
if($result){
// ---------------- SEND MAIL FORM ----------------

// send e-mail to ...
$to=$email;

// Your subject
$subject="MyoPlan Sports Confirmation Link";

// From
$header="from: myoplan.com <support@myoplan.com>";

// Your message
$alink = '<a href="http://www.myoplan.com/functions/coach_confirmation.php?passkey=$confirm_code&key_id=$id'"> Activate Account </a>';
// message
$message = '
<html>
<head>
  <title>Your Confirmation link</title>
</head>
<body>
<p>Click on this link to activate your account!</p>
<p>'.$alink.'</p>
</body>
</html>
';

// send email
$sentmail = mail($to,$subject,$message,$header);
}

// if not found 
else {
echo "<script> alert('Email not found in our database'); window.location='http://www.myoplan.com/login.php';</script>";
//header('Location: registration.html');
//echo "Error 1";
}


// if your email succesfully sent
if($sentmail){
echo "<script> alert('Your Confirmation link Has Been Sent To Your Email Address.'); window.location='http://www.myoplan.com/login.php';</script>";
//header('Location: registration.html');
//echo "Error 2";
}
else {
echo "<script> alert('Cannot send Confirmation link to your e-mail address'); window.location='http://www.myoplan.com/login.php';</script>";
//header('Location: registration.html');
//echo "Error 3";
}
?>


// Your message
$alink = '<a href="http://www.myoplan.com/functions/coach_confirmation.php?passkey=$confirm_code&key_id=$id'"> Activate Account </a>';
// message
$message = '
<html>
<head>
  <title>Your Confirmation link</title>
</head>
<body>
<p>Click on this link to activate your account!</p>
<p>'.$alink.'</p>
</body>
</html>
';
