<?php

require_once('functions/config.php');
// table name 

// values sent from form 

$name=$_POST["name"];
$email=$_POST['email'];
$address=$_POST['address'];
$phone=$_POST['phone'];

$username=$_POST['username'];

$password=$_POST['pwd1'];
$cpassword=$_POST['pwd2'];
$id=$_POST['id'];

	$sql = "UPDATE sc_admin SET username='$username', name='$name', email='$email', address='$address', phone='$phone', pwd='$password' where id=$id";
$result=mysql_query($sql);

if($result){
	echo "<script> alert('Profile updated successfully'); window.location = 'sc_admin_profile.php';</script>";
}
else{
	echo "<script> alert('There was an error while updating profile'); window.location = 'sc_admin_profile.php';</script>";
}

?>