<?
require_once('includes/config.php');

if(isset($_POST) && isset($_SESSION)){
	
	$title = strtolower(trim($_POST["sport"]));
	$is_exist = mysql_num_rows(mysql_query("select * from sports_offered where sport_title='$title'")) > 0 ?true:false;
	if(!$is_exist){
		$_sql = "insert into sports_offered set sport_title='$title'";
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
		echo '<meta http-equiv="refresh" content="1; URL=sports.php" />';
	}
	
}



?>