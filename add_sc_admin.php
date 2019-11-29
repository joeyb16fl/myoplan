<?
require_once('functions/config.php');

if(isset($_POST) && isset($_SESSION)){
	$school = $_POST["sc_id"];	
	$name = $_POST["name"];	
	$email = $_POST["email"];	
	$pwd = $_POST["password"];	
	$sport = $_POST["sport"];	
	$ph = $_POST["phone"];	
	$uname = $_POST["username"];	
	$url = "school_profile.php";
	
	$query = "insert into sc_admin set phone='$ph', username='$uname',	sc_id=$school, name='$name', email='$email', pwd='$pwd', sport=$sport";
	
	$res = mysql_query($query);
	//echo $query;
	if($res){
	
		echo "<script>alert('Record Updated Successfully.'); window.location='$url'</script>";
	}
	else{
		echo "<script>alert('There was an error while updating records.'); window.location='$url'</script>";
	}
	
	
	 
} 

?>