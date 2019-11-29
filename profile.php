<?php
	session_start();
	if(isset($_SESSION["name"])){
	$acctype = $_SESSION["acctype"];
	
	
	switch($acctype){
		case 1:
				header("Location: school_profile.php");
				break;
		case 2:
				header("Location: athlete_profile.php");
				break;
		case 3:
				header("Location: coach_profile.php");
				break;
		case 4:
				header("Location: parent_profile.php");
				break;
		
	}
	}
	
?>
