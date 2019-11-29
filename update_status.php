<?
	include("functions/config.php");
	$std_id1 = $_REQUEST["std_id"];
	$coach = $_REQUEST["coach"];
	
	$result = mysql_fetch_array(mysql_query("select std_cut_listed from std_enrolled_sports where std_id = $std_id1 and std_coach_code='$coach'"));
	
	if($result["std_cut_listed"] == 0){
		$a = mysql_query("update std_enrolled_sports set std_cut_listed=1 where std_id=$std_id1 and std_coach_code='$coach'");
		if($a){
		echo 1;
		}else{
			echo $std_id1 . " " . $coach;
		}
	}
	else{
		$a = mysql_query("update std_enrolled_sports set std_cut_listed=0 where std_id=$std_id1 and std_coach_code='$coach'");
		if($a){
		echo 1;
		}else{
			echo "error";
		}
	}
	
	
	
	
	



?>