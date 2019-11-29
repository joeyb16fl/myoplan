<?php

include('config.php');

// table name 
$tbl_name='mop_admin';

// username and password sent from form 
if(!isset($_POST['username']) || empty($_POST['username']))
{
echo "<script> alert('Enter Username...'); window.location='http://localhost/myoplan/admin/index.php';</script>";
exit();	
}
if(!isset($_POST['password']) || empty($_POST['password']))
{
echo "<script> alert('Enter Password...'); window.location='http://localhost/myoplan/admin/index.php';</script>";
exit();	
}


$myusername=$_POST['username']; 
$mypassword=$_POST['password']; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM $tbl_name WHERE email='$myusername' and password='$mypassword'";
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
$_SESSION["is_super"] = $rows["is_super"];
//echo "<script> alert ('".session_id()."'); </script>";
header("location: home.php");
exit();
}
else {
echo "<script> alert('Wrong Username or Password'); window.location='http://www.myoplan.com/admin/index.php';</script>";
session_destroy();
exit();
}
?>