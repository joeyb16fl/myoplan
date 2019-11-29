<?php

include('config.php');
// table name 
$tbl_name='temp_parent';
$tbl_real ='parent';

// Random confirmation code 
$confirm_code=md5(uniqid(rand())); 



// values sent from form 

$pname=$_POST['pname'];
$username=$_POST['username'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];



//checks
if(!isset($_POST['pname']) || empty($_POST['pname']))
{
	echo "<script> alert('Enter Your Name...'); window.location='http://www.myoplan.com/login.php';</script>";
	exit();	
}
if(!isset($_POST['username']) || empty($_POST['username']))
{
	echo "<script> alert('Enter username...'); window.location='http://www.myoplan.com/login.php';</script>";
	exit();	
}

if(!isset($_POST['email']) || empty($_POST['email']))
{
	echo "<script> alert('Enter your email address...'); window.location='http://www.myoplan.com/login.php';</script>";
	exit();	
}
if(!isset($_POST['phone']) || empty($_POST['phone']))
{
	echo "<script> alert('Enter your Phone number...'); window.location='http://www.myoplan.com/login.php';</script>";
	exit();	
}
if(!isset($_POST['password']) || empty($_POST['password']))
{
	echo "<script> alert('Enter your password for the account...'); window.location='http://www.myoplan.com/login.php';</script>";
	exit();	
}
if($_POST['password'] != $_POST['cpassword'])
{
	echo "<script> alert('Your Password do not match. Please Try Again'); window.location='http://www.myoplan.com/login.php';</script>";
	exit();	
}

//check for username availability
$avail = "SELECT * from $tbl_real WHERE username='$username'";
$result1 = mysql_query($avail);
$count1=mysql_num_rows($result1);
if($count1 == 1)
{
	echo "<script> alert('Username Already Exist. Please choose different username...'); window.location='http://www.myoplan.com/login.php';</script>";
	exit();	
}

//check for email availability
$availi = "SELECT * from $tbl_real WHERE email='$email'";
$result2 = mysql_query($availi);
$count2=mysql_num_rows($result2);
if($count2 == 1)
{
	echo "<script> alert('Email Already Exist. Please enter different email...'); window.location='http://www.myoplan.com/login.php';</script>";
	exit();	
}




// Insert data into database 
$sql="INSERT INTO $tbl_name(confirm_code,name,username,email,password,phone)VALUES('$confirm_code', '$pname','$username', '$email', '$password', '$phone')";
$result=mysql_query($sql);

// if suceesfully inserted data into database, send confirmation link to email 
if($result){
// ---------------- SEND MAIL FORM ----------------

// send e-mail to ...
$to=$email;

// Your subject
$subject="MyoPlan - Here is your confirmation link";

// From
$header="from: myoplan.com <noreply@myoplan.com>";

// Your message
$message="Your Confirmation link \r\n";
$message.="Click on this link to activate your account \r\n";
$message.="http://www.myoplan.com/functions/parentconfirmation.php?passkey=$confirm_code";

// send email
$sentmail = mail($to,$subject,$message,$header);
}

// if not found 
else {
echo "<script> alert('Not found your email in our database'); window.location='http://www.myoplan.com/login.php';</script>";
//header('Location: registration.html');
}

// if your email succesfully sent
if($sentmail){
echo "<script> alert('Your Confirmation link Has Been Sent To Your Email Address.'); window.location='http://www.myoplan.com/login.php';</script>";
//header('Location: registration.html');
}
else {
echo "<script> alert('Cannot send Confirmation link to your e-mail address'); window.location='http://www.myoplan.com/login.php';</script>";
//header('Location: registration.html');
}
?>