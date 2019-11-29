<?
require_once('includes/config.php');

if(isset($_POST) && isset($_SESSION)){
	
	$title = strtolower(trim($_POST["position"]));
	$sport = $_POST["sport"];
	$count = mysql_num_rows(mysql_query($sql = "select * from sport_positions where 	position='$title' and g_id=$sport"));
	
	if($count == 0){
		$_sql = "insert into sport_positions set position='$title', g_id=$sport";
		$update = mysql_query($_sql);
		
		if($update){
				$_SESSION["status"] = 1;
				echo '<meta http-equiv="refresh" content="1; URL=sports.php" />';
		}
		else{
			$_SESSION["status"] = 0;
			echo '<meta http-equiv="refresh" content="1; URL=sports.php" />';
		}
	}else{
		$_SESSION["status"] = 2;
		//echo '<meta http-equiv="refresh" content="1; URL=sports.php" />';
	}
	
}

  

?>