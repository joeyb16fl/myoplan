<?
require_once('admin/includes/config.php');

$sports = mysql_query("select * from sports_offered order by sport_title");

while($sport = mysql_fetch_array($sports)){
	
?>

	<option value="<?=$sport["id"]?>"><?=ucwords($sport["sport_title"])?></option>


<?
}
?>