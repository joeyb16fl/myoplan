<?php
require("admin/includes/config.php");
// table name 
$tbl_name="std_enrolled_sports";
$std_id=$_POST['std_id'];
$coach_code = $_POST["coach_code"];


$isvalid=false;

$coaches = mysql_query("select * from mop_coach where co_reg_code='$coach_code'");
if(mysql_num_rows($coaches) == 1){
	$data = mysql_fetch_array($coaches);
	$sport =  $data["co_sport_for"];
	
	$is_already_reg = (mysql_num_rows(mysql_query("select * from $tbl_name where std_id=$std_id and std_coach_code='$coach_code'")) >0) ? true:false;
	if(!$is_already_reg){
		$result = mysql_query("insert into $tbl_name(std_id,std_coach_code) values($std_id,'$coach_code')");
	}
	else{
		echo "<script>alert('You are already registered to respective sport.');window.location='athlete_profile.php'</script>";
		exit();
	}
	if($result){
		echo "<script>alert('Request Sent Successfully');window.location='athlete_profile.php'</script>";
		exit();
	}
	else{
		echo "<script>alert('There was an error in Processing the request');window.location='athlete_profile.php'</script>";
		exit();
	}
	
	
}
else{
	echo "<script>alert('The Coach code you provided is invalid');window.location='athlete_profile.php'</script>";
	exit();
}





?>