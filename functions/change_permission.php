<?php
include('config.php');
// Passkey that got from link 


$std_id=$_POST['std_id'];
$std_permission = $_POST['permission'];
$tbl_name="std_athlete";

// Retrieve data from table where row that match this passkey 
$sql1="SELECT * FROM $tbl_name WHERE Id = $std_id";
$result1=mysql_query($sql1);

if($result1){

$count=mysql_num_rows($result1);
if($count==1){

$sql2="update $tbl_name set parent_confirm=$std_permission where Id=$std_id";
$result2=mysql_query($sql2);
}



else {
header("Location: ../parent_profile.php");

}

if($result2){

header("Location: ../parent_profile.php");
}

}
?>