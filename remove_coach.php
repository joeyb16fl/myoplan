<?
	include("functions/config.php");
	$cid = $_REQUEST["id"];
	$coaches = "delete  from mop_coach where id=$cid";
	$data = mysql_query($coaches);
	if($data){
		echo "<script>alert('Profile Removed Successfully');window.location='sc_admin_profile.php'</script>";
		
	}
	else{
		echo "<script>alert('There was an error while processing your request');window.location='sc_admin_profile.php'</script>";
	}
	
	
?>		