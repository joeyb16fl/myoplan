<?php

include('config.php');


$confirm_code = GET_TOKEN_STRING(15);
$doc_token = GET_TOKEN_STRING(15);
// table name 
$tbl_name='sc_admin';
$sentmail=false;
// values sent from form 

$admin_type = $_POST["admin_type"];
$name=$_POST["name"];
$email=$_POST['email'];
//$address=$_POST['address'];
$phone=$_POST['phone'];
//$sport=$_POST['sports'];
$username=$_POST['username'];
//$parent_email = $_POST['p_email'];

$password=$_POST['pwd1'];
$cpassword=$_POST['pwd2'];
$status=false;



//checks
if(!isset($_POST['name']) || empty($_POST['name']))
{
	echo "<script> alert('Enter Your Name...'); window.location='../login.php';</script>";
	exit();	
}
if(!isset($_POST['email']) || empty($_POST['email']))
{
	echo "<script> alert('Enter Email...'); window.location='../login.php';</script>";
	exit();	
}

if(false)
{
	echo "<script> alert('Enter your parent email...'); window.location='../login.php';</script>";
	
	exit();	
}
else{
/*		$_query="select * from parent where email='$parent_email'";
		$count = mysql_num_rows(mysql_query($_query));
		if($count < 1){
			echo "<script> alert('Your parent is not yet registered using email  $parent_email ...'); window.location='../login.php';</script>";
			exit();	
		}
*/
}

if(!isset($_POST['phone']) || empty($_POST['phone']))
{
	
	echo "<script> alert('Enter your Phone number...'); window.location='../login.php';</script>";
	exit();	
}
if(!isset($_POST['pwd1']) || empty($_POST['pwd1']))
{
	echo "<script> alert('Enter your password for the account...'); window.location='../login.php';</script>";
	exit();	
}
if($_POST['pwd1'] != $_POST['pwd2'])
{
	echo "<script> alert('Your Password are not matching...'); window.location='../login.php';</script>";
	exit();	
}

//check for email availability
$availi = "SELECT * from $tbl_name WHERE email='$email'";
$result2 = mysql_query($availi);
$count2=mysql_num_rows($result2);
if($count2 > 0)
{
	echo "<script> alert('Email Already Exist. Please enter different email...'); window.location='../login.php';</script>";
	exit();	
}

	// Insert data into database 
	$sql = "INSERT INTO $tbl_name(username, name, email, phone, pwd, sport, status ,std_doc_token, confirm_code) VALUES "
	."('$username', '$name', '$email','$phone', '$password', $admin_type, 0 ,'$doc_token','$confirm_code')";
$result=mysql_query($sql);

$id = mysql_insert_id();



// if suceesfully inserted data into database, send confirmation link to email 
if($result){
	$sql2 = "INSERT INTO std_data(std_id, std_dob, std_grade, std_height, std_weight, std_position) VALUES" . "($id, '2000-01-01', 0, 0, 0, 0)";

$result1=mysql_query($sql2);
$sql3= "insert into std_enrolled_sports(std_id, sp_id) VALUES($id,$sport)";
$db_update = mysql_query($sql3);
// ---------------- SEND MAIL FORM ----------------

// send e-mail to ...
$to=$email;

// Your subject
$subject="MyoPlan Sports Confirmation Link";

// From
$header  = 'MIME-Version: 1.0' . "\r\n";
$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$header .= "from: myoplan.com <noreply@myoplan.com>";

$alink = '<a href="http://myoplansports.com/functions/admin_confirmation.php?passkey='.$confirm_code.'&key_id='.$id.'"> Activate Account </a>';
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
echo "<script> alert('Not found your email in our database'); window.location='../login.php';</script>";
//header('Location: registration.html');
//echo "Error 1";
}


// if your email succesfully sent
if($sentmail){
echo "<script> alert('Your Confirmation link Has Been Sent To Your Email Address.'); window.location='../login.php';</script>";
//header('Location: registration.html');
//echo "Error 2";
}
else {
echo "<script> alert('Cannot send Confirmation link to your e-mail address'); window.location='../login.php';</script>";
//header('Location: registration.html');
//echo "Error 3";
}
?>