<?php
include("includes/config.php");

$sc_id = $_REQUEST["sc_id"];
$doc_status = $_REQUEST["doc_status"];

$_query = "update reg_schools set sc_doc_status=$doc_status where id=$sc_id";
$result = mysql_query($_query);
if($result){
	header("Location: view_school.php?sc_id=$sc_id");
	exit();
}
else{
	echo "Error in updating Records";
	exit();
}
?>