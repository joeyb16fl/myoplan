<?php

include('config.php');
// table name 
$tbl_name='parent';

// username and password sent from form 
if(!isset($_POST['username']) || empty($_POST['username']))
{
echo "<script> alert('Enter Username...'); window.location='http://www.myoplan.com/login.php';</script>";
exit();	
}
if(!isset($_POST['passwd']) || empty($_POST['passwd']))
{
echo "<script> alert('Enter Password...'); window.location='http://www.myoplan.com/login.php';</script>";
exit();	
}


$myusername=$_POST['username']; 
$mypassword=$_POST['passwd']; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
$_SESSION["user"] = $myusername;
$rows=mysql_fetch_array($result);
$_SESSION["id"] = $rows["id"];
$_SESSION["name"] = $rows["name"];

$_SESSION["email"] = $rows["email"];

$_SESSION["phone"] = $rows["phone"];

//echo "<script> alert ('".session_id()."'); </script>";
header("location:http://www.myoplan.com/profile.php");
exit();
}
else {
echo "<script> alert('Wrong Username or Password'); window.location='http://www.myoplan.com/login.php';</script>";
exit();
}
?>