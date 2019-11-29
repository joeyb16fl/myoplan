<?php
function GET_TOKEN_STRING($length = 15, $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ') {
	
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}



	$host="localhost"; // Host name 
	$username1="moiz_my"; // Mysql username 
	$password="6pathsofpain"; // Mysql password 
	$db_name="myoplan_db"; // Database name 
	session_start();

	//Connect to server and select database.
	mysql_connect("$host", "$username1", "$password")or die("cannot connect to server"); 
	mysql_select_db("$db_name")or die("cannot select DB");
    
?>