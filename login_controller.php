<?php

include('functions/config.php');
// table name 
$tbl_name='';
$col_email = '';
$col_pwd = '';
$acctype = $_POST['acctype'];
//There are some things that needs to  be managed


$val1="";
$val2="";
$val3="";
$val4="";


if($acctype == 0){
	echo "<script> alert('Please choose a Login Account Type'); window.location='/login.php';</script>";
	exit();
}
else if($acctype == 1){
	$tbl_name = 'reg_schools';
	$col_email = 'sc_email';
	$col_pwd = 'sc_pwd';
	
	$val1="id";
	$val2="sc_name";
	$val3="sc_email";
	$val4="sc_phone";
	
}
else if($acctype == 2){
	$tbl_name = 'std_athlete';
	$col_email = 'std_email';
	$col_pwd = 'std_pwd';
	
	$val1="Id";
	$val2="std_name";
	$val3="std_email";
	$val4="std_phone";
}
else if($acctype == 3){
	$tbl_name = 'mop_coach';
	$col_email = 'co_email';
	$col_pwd = 'co_pwd';
	
	$val1="id";
	$val2="co_name";
	$val3="co_email";
	$val4="co_phone";
}
else if($acctype == 4){
	$tbl_name = 'parent';
	$col_email = 'email';
	$col_pwd = 'password';
	
	$val1="id";
	$val2="name";
	$val3="email";
	$val4="phone";
}
else if($acctype == 5){
	$tbl_name = 'sc_admin';
	$col_email = 'email';
	$col_pwd = 'pwd';
	
	$val1="sc_id";
	$val2="name";
	$val3="email";
	$val4="phone";
}


// username and password sent from form 
if(!isset($_POST['username']) || empty($_POST['username']))
{
echo "<script> alert('Enter Username...'); window.location='/login.php';</script>";
exit();	
}
if(!isset($_POST['passwd']) || empty($_POST['passwd']))
{
echo "<script> alert('Enter Password...'); window.location='/login.php';</script>";
exit();	
}


$myusername=$_POST['username']; 
$mypassword=$_POST['passwd']; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM $tbl_name WHERE ($col_email='$myusername' OR username='$myusername') and $col_pwd='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
$rows=mysql_fetch_array($result);
if($rows['status'] != 0){
$_SESSION["id"] = $rows["$val1"];
$_SESSION["name"] = $rows["$val2"];

$_SESSION["email"] = $rows["$val3"];

$_SESSION["phone"] = $rows["$val4"];
$_SESSION["acctype"] =  $acctype;

//echo "<script> alert ('".session_id()."'); </script>";
$data_to_send = "acctype=".$acctype; 
header("location: profile_controller.php?".$data_to_send);
exit();
}
else{
	echo "<script> alert('Your Email is not confirmed yet, please confirm your email first to login'); window.location='/login.php';</script>";
	exit();
}
}
else {
echo "<script> alert('Wrong Username or Password'); window.location='/login.php';</script>";
exit();
}
?>