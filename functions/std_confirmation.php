<?php
include('config.php');
// Passkey that got from link 


$passkey=$_GET['passkey'];
$tbl_name="std_athlete";

// Retrieve data from table where row that match this passkey 
$sql1="SELECT * FROM $tbl_name WHERE confirm_code ='$passkey'";
$result1=mysql_query($sql1);

// If successfully queried 
if($result1){

// Count how many row has this passkey
$count=mysql_num_rows($result1);

// if found this passkey in our database, retrieve data from table "temp_user"
if($count==1){

// Insert data that retrieves from "temp_user" into table "user" 
$sql2="update $tbl_name set status=1 where confirm_code='$passkey'";
$result2=mysql_query($sql2);
}

// if not found passkey, display message "Wrong Confirmation code" 
else {
	// echo "<script> alert('Wrong Confirmation code'); window.location='http://www.myoplan.com'; </script>";
?>	
<script type="text/javascript">
alert('Wrong Confirmation code.');
window.location.href = "http://www.myoplan.com";
</script>
<?php }

// if successfully moved data from table"temp_user" to table "user" displays message "Your account has been activated" and don't forget to delete confirmation code from table "temp_user"
if($result2){
 //echo "<script> alert('Your account has been activated. Go to the Sign-In for login.'); window.location='http://www.myoplan.com/login.php'; </script>";
?>
<script type="text/javascript">
alert('Your account has been activated. Go to the Sign-In for login.');
window.location.href = "http://www.myoplan.com/login.php";
</script>
 
<?php 
// Delete information of this user from table "temp_user" that has this passkey 
}

}
die();
?>