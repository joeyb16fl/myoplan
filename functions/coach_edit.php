<?php

include('config.php');
// table name 
$tbl_name='mop_coach';

// values sent from form 

$name=$_POST["name"];
$email=$_POST['email'];
$address=$_POST['address'];
$phone=$_POST['phone'];

$username=$_POST['username'];

$password=$_POST['pwd1'];
$cpassword=$_POST['pwd2'];
$id=$_POST['id'];

$path = mysql_fetch_array(mysql_query("select image from mop_coach where id=$id"));
//checks
if(!isset($_POST['name']) || empty($_POST['name']))
{
	echo "<script> alert('Enter Your Name...'); window.location='../coach_profile.php';</script>";
	exit();	
}
if(!isset($_POST['dob_y']) || empty($_POST['dob_y']))
{
	echo "<script> alert('Enter Birth Year...'); window.location='../coach_profile.php';</script>";
	exit();	
}
if(!isset($_POST['dob_m']) || empty($_POST['dob_m']))
{
	echo "<script> alert('Enter Birth Month...'); window.location='../coach_profile.php';</script>";
	exit();	
}
if(!isset($_POST['dob_d']) || empty($_POST['dob_d']))
{
	echo "<script> alert('Enter Birth Day...'); window.location='../coach_profile.php';</script>";
	exit();	
}
if(!isset($_POST['email']) || empty($_POST['email']))
{
	echo "<script> alert('Enter Email.....'); window.location='../coach_profile.php';</script>";
	exit();	
}
if(!isset($_POST['username']) || empty($_POST['username']))
{
	echo "<script> alert('Enter Username.....'); window.location='../coach_profile.php';</script>";
	exit();	
}


if(!isset($_POST['phone']) || empty($_POST['phone']))
{
	
	echo "<script> alert('Enter your Phone number...'); window.location='../coach_profile.php';</script>";
	exit();	
}
if(!isset($_POST['pwd1']) || empty($_POST['pwd1']))
{
	echo "<script> alert('Enter your password for the account...'); window.location='../coach_profile.php';</script>";
	exit();	
}
if($_POST['pwd1'] != $_POST['pwd2'])
{
	echo "<script> alert('Your Password are not matching...'); window.location='../coach_profile.php';</script>";
	exit();	
}









$target_file="abc";
$path_to_store="";
if(!empty($_FILES['p_image']['name']))
{
	$name_token = GET_TOKEN_STRING(30);

//image path

$target_dir = "../uploads/coaches/";
$target_file = $target_dir . basename($_FILES["p_image"]["name"]);
$filename = basename($_FILES["p_image"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$target_file = $target_dir . $name_token . "." . $imageFileType;
$path_to_store = "uploads/coaches/" . $name_token . "." . $imageFileType;
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["p_image"]["tmp_name"]);
    if($check !== false) {
        
        $uploadOk = 1;
    } else {
        echo "<script> alert('File is not an image.'); window.location = '../coach_profile.php';</script>";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "<script> alert('Sorry, file already exists.'); </script>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["p_image"]["size"] > 50000000) {
    echo "<script> alert('Sorry, your file is too large.'); </script>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "<script> alert('Sorry, only PDF and DOC files are allowed.'); </script>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<script> alert('Sorry, your file was not uploaded.'); window.location = '../coach_profile.php';</script>";
	exit();
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["p_image"]["tmp_name"], $target_file)) {
        
    } else {
        echo "<script> alert('Sorry, there was an error uploading your file.'); window.location = '../coach_profile.php';</script>";
		exit();
    }
}

$previous_path = "../". $path["image"];
if (file_exists($previous_path)) {
$deleted = unlink($previous_path);
	}
}
else{
	$path_to_store =  $target_file;
}


	$imgPath=$target_file;

	$year = $_POST["dob_y"];
	$month = $_POST["dob_m"];
	$day = $_POST["dob_d"];
	
	$date_of_birth = $year . "-" . $month . "-" . $day;
	//echo $id . "<br>";;
	// Insert data into database 
	$sql = "UPDATE mop_coach SET username='$username', co_name='$name', co_email='$email', co_address='$address', co_phone='$phone', co_pwd='$password', image='$imgPath', co_dob='$date_of_birth' where id=$id";
	//echo $sql . "<br>";
	$result = mysql_query($sql);

	$id = mysql_insert_id();





if($result){
	//echo "success";
echo "<script> alert('Profile Updated Sucessfully'); window.location='../coach_profile.php';</script>";
}
else {
	//echo "failed";
echo "<script> alert('There was an error in updataing profile'); window.location='../coach_profile.php';</script>";
//header('Location: registration.html');
//echo "Error 3";
}
?>