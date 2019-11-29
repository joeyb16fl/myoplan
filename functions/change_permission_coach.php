<?php
include('config.php');
// Passkey that got from link 


$std_id=$_POST['co_id'];
$std_permission = $_POST['permission'];
echo $std_permission;
$tbl_name="mop_coach";

// Retrieve data from table where row that match this passkey 
$sql1="SELECT * FROM $tbl_name WHERE id = $std_id";
$result1=mysql_query($sql1);

// If successfully queried 
if($result1){

// Count how many row has this passkey
$count=mysql_num_rows($result1);
//print_r(mysql_fetch_array($result1));
// if found this passkey in our database, retrieve data from table "temp_user"
if($count==1){

// Insert data that retrieves from "temp_user" into table "user" 
$sql2="update $tbl_name set co_school_confirmed=$std_permission where Id=$std_id";
$result2=mysql_query($sql2);
//echo $result2;
}


// if not found passkey, display message "Wrong Confirmation code" 
else {
header("Location: school_profile.php");
//echo "Error";

}

// if successfully moved data from table"temp_user" to table "user" displays message "Your account has been activated" and don't forget to delete confirmation code from table "temp_user"
if($result2){

header("Location: ../school_profile.php");
//echo "Success";
// Delete information of this user from table "temp_user" that has this passkey 
}

}
?>