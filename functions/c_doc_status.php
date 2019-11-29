<?php
include('config.php');
// Passkey that got from link 


$std_id=$_POST['std_id'];
$std_permission = $_POST['doc_status'];
$tbl_name="std_athlete";

// Retrieve data from table where row that match this passkey 
$sql1="update std_enrolled_sports set std_doc_status=$std_permission where std_id=$std_id";
$result1=mysql_query($sql1);

if($result1){
header("Location: ../coach_profile.php");

}
else {
	
echo "<script>alert('Failed to update $std_id $std_permission');window.location='../coach_profile.php'</script>";

}
?>