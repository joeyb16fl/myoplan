<?php

//include('config.php');
// table name 
$tbl_name='std_athlete';
$sentmail=false;

// Random confirmation code 
$confirm_code=md5(uniqid(rand())); 
$host="localhost"; // Host name 
	$username1="root"; // Mysql username 
	$password=""; // Mysql password 
	$db_name="myoplan_db"; // Database name 
	session_start();

	//Connect to server and select database.
	mysql_connect("$host", "$username1", "$password")or die("cannot connect to server"); 
	mysql_select_db("$db_name")or die("cannot select DB");


// values sent from form 

$name=$_POST["name"];
$email=$_POST['email'];
$p_email=$_POST['p_email'];
$c_code=$_POST['c_code'];
$username=$_POST['username'];
$phone=$_POST['phone'];
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

if(!isset($_POST['p_email']) || empty($_POST['p_email']))
{
	echo "<script> alert('Enter your parent email...'); window.location='http://www.myoplan.com/login.php';</script>";
	
	exit();	
}
else{
		$_parent_email = $_POST["p_email"];
		$_query="select * from parent where email='$_parent_email'";
		$count = mysql_num_rows(mysql_query($_query));
		if($count < 1){
			echo "<script> alert('Your parent email is not registered...'); window.location='http://www.myoplan.com/login.php';</script>";
			exit();	
		}
}
if(!isset($_POST['c_code']) || empty($_POST['c_code']))
{
	echo "<script> alert('Enter your coach code...'); window.location='http://www.myoplan.com/login.php';</script>";
	exit();	
}
if(!isset($_POST['username']) || empty($_POST['username']))
{
	echo "<script> alert('Enter your username...'); window.location='http://www.myoplan.com/login.php';</script>";
	exit();	
}
if(!ctype_alnum($_POST['username']))
{
	echo "<script> alert('Username must contain only alphanumeric characters'); window.location='http://www.myoplan.com/login.php';</script>";
	exit();	
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
	echo "<script> alert('Your passwords do not match. Please try again'); window.location='http://www.myoplan.com/login.php';</script>";
	exit();	
}
//check for username availability
$avail = "SELECT * from $tbl_name WHERE username='$username'";
$result1 = mysql_query($avail);
$count1=mysql_num_rows($result1);
if($count1 == 1)
{
	echo "<script> alert('Username Already Exist. Please choose different username...'); window.location='http://www.myoplan.com/login.php';</script>";
	exit();	
}

//check for email availability
$availi = "SELECT * from $tbl_name WHERE std_email='$email'";
$result2 = mysql_query($availi);
$count2=mysql_num_rows($result2);
if($count2 == 1)
{
	echo "<script> alert('Email Already Exist. Please enter different email...'); window.location='http://www.myoplan.com/login.php';</script>";
	exit();	
}




	// Insert data into database 
	$sql = "INSERT INTO std_athlete(std_name, std_email, std_parent, std_coach, std_phone, std_pwd, username, status, confirm_code) VALUES "
	."('$name', '$email', '$p_email', '$c_code', '$phone', '$password', '$username', 0, '$confirm_code')";

$result=mysql_query($sql);

$id = mysql_insert_id();



// if suceesfully inserted data into database, send confirmation link to email 
if($result){

	$sql2 = "INSERT INTO std_data(std_id, std_dob, std_grade, std_height, std_weight, std_position) VALUES" . "($id, '2000-01-01', 0, 0, 0, 0)";

$result1=mysql_query($sql2);
	
// ---------------- SEND MAIL FORM ----------------

// send e-mail to ...
$to=$email;

// Your subject
$subject="MyoPlan Sports Confirmation Link";

// From
$header="from: myoplansports.com <noreply@myoplansports.com>";

// Your message
$alink = '<a href="http://www.myoplan.com/functions/std_confirmation.php?passkey=$confirm_code&key_id=$id'"> Activate Account </a>';
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
//echo "<script> alert('Not found your email in our database'); window.location='http://www.myoplan.com/login.php';</script>";
//header('Location: registration.html');
//echo "Error 1";
}


// if your email succesfully sent
if($sentmail){
//echo "<script> alert('Your Confirmation link Has Been Sent To Your Email Address.'); window.location='http://www.myoplan.com/login.php';</script>";
//header('Location: registration.html');
//echo "Error 2";
}
else {
//echo "<script> alert('Cannot send Confirmation link to your e-mail address'); window.location='http://www.myoplan.com/login.php';</script>";
//header('Location: registration.html');
//echo "Error 3";
}
?>


