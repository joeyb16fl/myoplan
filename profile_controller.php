<?php

include('functions/config.php');
// table name


$acctype = $_REQUEST["acctype"];
if(!isset($_SESSION["name"]) || !isset($_SESSION["email"]) || !isset($_SESSION["phone"]) || !isset($_SESSION["id"])){
	session_destroy();
	header("Location: login.php");
	exit();
}

if($acctype == 1){
	header("Location: school_profile.php");
	exit();
}
else if($acctype == 2){
	header("Location: athlete_profile.php");
	exit();
}
else if($acctype == 3){
	header("Location: coach_profile.php");
	exit();
}
else if($acctype == 4){
	header("Location: parent_profile.php");
	exit();
}
else if($acctype == 5){
	header("Location: sc_admin_profile.php");
	exit();
}
?>