<?php
include("includes/config.php");
$token = GET_TOKEN_STRING(30,'0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ_abcdefghijklmnopqrstuvwxyz');
// table name 
$tbl_name="mop_admin";

if(!empty($_FILES['logo']['name']))
{
	


//image path

$target_dir = "uploads/users/";
$target_file = $target_dir . basename($_FILES["logo"]["name"]);
$filename = basename($_FILES["logo"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$target_file = $target_dir . $token . "." . $imageFileType;
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["logo"]["tmp_name"]);
    if($check !== false) {
        
        $uploadOk = 1;
    } else {
        echo "<script> alert('File is not an image.'); window.location = 'http://www.myoplan.com/admin/add_user.php';</script>";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "<script> alert('Sorry, file already exists.'); </script>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["logo"]["size"] > 50000000) {
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
    echo "<script> alert('Sorry, your file was not uploaded.'); window.location = 'http://www.myoplan.com/admin/add_user.php';</script>";
	exit();
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
        
    } else {
        echo "<script> alert('Sorry, there was an error uploading your file.'); window.location = 'http://www.myoplan.com/admin/add_user.php';</script>";
		exit();
    }
}

}

// values sent from form 
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$contact=$_POST['contact'];
$address=$_POST['address'];
$imgPath="";




if(!empty($_FILES['img']['name']))
{
$imgPath= "./uploads/users/".$target_file;
}

//checks
if(!isset($_POST['name']) || empty($_POST['name']))
{
	echo "<script> alert('Enter Name...'); window.location='http://www.myoplan.com/admin/add_user.php';</script>";
	exit();	
}
if(!isset($_POST['email']) || empty($_POST['email']))
{
	echo "<script> alert('Enter Email...'); window.location='http://www.myoplan.com/admin/add_user.php';</script>";
	exit();	
}
if(!isset($_POST['password']) || empty($_POST['password']))
{
	echo "<script> alert('Enter Password...'); window.location='http://www.myoplan.com/admin/add_user.php';</script>";
	exit();	
}
if(!isset($_POST['contact']) || empty($_POST['contact']))
{
	echo "<script> alert('Enter Phone Number...'); window.location='http://www.myoplan.com/admin/add_user.php';</script>";
	exit();	
}
if(!isset($_POST['address']) || empty($_POST['address']))
{
	echo "<script> alert('Enter price of product...'); window.location='http://www.myoplan.com/admin/add_user.php';</script>";
	exit();	
}

$isExist = mysql_num_rows(mysql_query("select * from $tbl_name where email='$email'"));
if($isExist == 0){


// Insert data into database 
$sql="INSERT INTO $tbl_name(name, email,password,phone,image,address,is_super)VALUES('$name', '$email', '$password', '$contact', '$target_file', '$address', 0)";
$result=mysql_query($sql);
// if suceesfully inserted data into database, send confirmation link to email 
if($result){
	echo "<script> alert('Profile Created Successfully...'); window.location='users.php';</script>";
	exit();	
}
}
else{
	echo "<script> alert('Username With Same Email ID Already Exist...'); window.location='add_user.php';</script>";
	exit();	
}





?>