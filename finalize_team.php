<?
include("functions/config.php");
$coach = $_REQUEST["coach_code"];

$team_name = $_REQUEST["team_name"];
$ids = mysql_query("select std_id from std_enrolled_sports where std_cut_listed=1 and std_coach_code='$coach'");
if(mysql_num_rows($ids) >0){
$_add_team = mysql_query("insert into teams(team_name, team_coach_code) values('$team_name', '$coach');");

$id = mysql_insert_id();
if($_add_team){
	//echo "Entered If statement<br>";
	while($idss = mysql_fetch_array($ids)){
		//echo "Entered Loop<br>";
		$actual_id = $idss["std_id"];
		$query = "insert into team_members(std_id, coach_code, team_id) values($actual_id, '$coach', $id);";
		mysql_query($query);
		//echo $query . "<br>";
		mysql_query("update std_enrolled_sports set selected=1 where std_id=$actual_id");
		
	}
	
}
//echo "finalized";
echo "<script>window.location='coach_teams.php'</script>";
}
else{
	echo "<script>alert('Please Select atleast one student'); window.location='coach_profile.php'</script>";
}



?>