<?php

include('config.php');
// table name 
$tbl_name='std_athlete';

// values sent from form 

$name=$_POST["name"];
$address=$_POST['address'];
$phone=$_POST['phone'];

$username=$_POST['username'];

$password=$_POST['pwd1'];
$cpassword=$_POST['pwd2'];
$id=$_POST['id'];

$path = mysql_fetch_array(mysql_query("select std_image from std_athlete where Id=$id"));
//checks
if(!isset($_POST['name']) || empty($_POST['name']))
{
	echo "<script> alert('Enter Your Name...'); window.location='../athlete_profile.php';</script>";
	exit();	
}
if(!isset($_POST['dob_y']) || empty($_POST['dob_y']))
{
	echo "<script> alert('Enter Birth Year...'); window.location='../athlete_profile.php';</script>";
	exit();	
}
if(!isset($_POST['dob_m']) || empty($_POST['dob_m']))
{
	echo "<script> alert('Enter Birth Month...'); window.location='../athlete_profile.php';</script>";
	exit();	
}
if(!isset($_POST['dob_d']) || empty($_POST['dob_d']))
{
	echo "<script> alert('Enter Birth Day...'); window.location='../athlete_profile.php';</script>";
	exit();	
}if(!isset($_POST['weight']) || empty($_POST['weight']))
{
	echo "<script> alert('Enter Weight...'); window.location='../athlete_profile.php';</script>";
	exit();	
}if(!isset($_POST['grade']) || empty($_POST['grade']))
{
	echo "<script> alert('Enter Grade...'); window.location='../athlete_profile.php';</script>";
	exit();	
}
if(!isset($_POST['username']) || empty($_POST['username']))
{
	echo "<script> alert('Enter Username.....'); window.location='../athlete_profile.php';</script>";
	exit();	
}


if(!isset($_POST['phone']) || empty($_POST['phone']))
{
	
	echo "<script> alert('Enter your Phone number...'); window.location='../athlete_profile.php';</script>";
	exit();	
}
if(!isset($_POST['pwd1']) || empty($_POST['pwd1']))
{
	echo "<script> alert('Enter your password for the account...'); window.location='../athlete_profile.php';</script>";
	exit();	
}
if($_POST['pwd1'] != $_POST['pwd2'])
{
	echo "<script> alert('Your Password are not matching...'); window.location='../athlete_profile.php';</script>";
	exit();	
}









$target_file="abc";
$path_to_store="";
if(!empty($_FILES['p_image']['name']))
{
	$name_token = GET_TOKEN_STRING(30);

//image path

$target_dir = "../uploads/students/";
$target_file = $target_dir . basename($_FILES["p_image"]["name"]);
$filename = basename($_FILES["p_image"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$target_file = $target_dir . $name_token . "." . $imageFileType;
$path_to_store = "uploads/students/" . $name_token . "." . $imageFileType;
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["p_image"]["tmp_name"]);
    if($check !== false) {
        
        $uploadOk = 1;
    } else {
        echo "<script> alert('File is not an image.'); window.location = '../athlete_profile.php';</script>";
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
    echo "<script> alert('Sorry, your file was not uploaded.'); window.location = '../athlete_profile.php';</script>";
	exit();
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["p_image"]["tmp_name"], $target_file)) {
        
    } else {
        echo "<script> alert('Sorry, there was an error uploading your file.'); window.location = '../athlete_profile.php';</script>";
		exit();
    }
}

$previous_path = "../". $path["std_image"];
if (file_exists($previous_path)) {
$deleted = unlink($previous_path);
	}else{
		
	}
}
else{
	$path_to_store =  $path["std_image"];
}


$imgPath=$target_file;


	// Insert data into database 
	$sql = "UPDATE std_athlete SET username='$username', std_name='$name', std_address='$address', std_phone='$phone', std_pwd='$password', std_image='$path_to_store' where Id=$id";
$result=mysql_query($sql);

$id = mysql_insert_id();





if($result){
	$height = (int)(($_POST["height-f"] * 12) + ($_POST["height-i"]));
	$weight = $_POST["weight"];
	$grade = $_POST["grade"];
	$year = $_POST["dob_y"];
	$month = $_POST["dob_m"];
	$day = $_POST["dob_d"];
	
	$date_of_birth = $year . "-" . $month . "-" . $day;
	
		$std_ID = $_POST["id"];
$sql12 = "update std_data set std_dob='$date_of_birth', std_height=$height, std_weight=$weight, std_grade=$grade where std_id=$std_ID";
$result23 = mysql_query($sql12);

//echo $sql12;	
echo "<script> alert('Profile updated successfully'); window.location='../athlete_profile.php';</script>";
//header('Location: registration.html');
//echo "Error 2";
}
else {
echo "<script> alert('There was an error in updataing profile'); window.location='../athlete_profile.php';</script>";
//header('Location: registration.html');
//echo "Error 3";
}
?>