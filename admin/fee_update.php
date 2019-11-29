<?
require_once('includes/config.php');

if(isset($_POST) && isset($_SESSION)){
	
	$sport = $_POST["sport"];
	$fee = $_POST["fee"];
		$_sql = "update sports_offered set fee=$fee where id=$sport";
		$update = mysql_query($_sql);
		
		if($update){
				$_SESSION["status"] = 1;
				echo '<meta http-equiv="refresh" content="1; URL=sports.php" />';
		}
		else{
			$_SESSION["status"] = 0;
			echo '<meta http-equiv="refresh" content="1; URL=sports.php" />';
		}
	
	
}



?>