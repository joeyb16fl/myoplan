<?php

include('config.php');
// table name 

// values sent from form 

$name=$_POST["name"];
$email=$_POST['email'];
$address=$_POST['address'];
$phone=$_POST['phone'];

$username=$_POST['username'];

$password=$_POST['pwd1'];
$cpassword=$_POST['pwd2'];
$id=$_POST['id'];

$path = mysql_fetch_array(mysql_query("select sc_logo from reg_schools where id=$id"));

$target_file="abc";
$path_to_store="";
if(!empty($_FILES['p_image']['name']))
{
	$name_token = GET_TOKEN_STRING(30);

//image path

$target_dir = "../admin/uploads/";
$target_file = $target_dir . basename($_FILES["p_image"]["name"]);
$filename = basename($_FILES["p_image"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$target_file = $target_dir . $name_token . "." . $imageFileType;
$path_to_store = "../admin/uploads/" . $name_token . "." . $imageFileType;
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["p_image"]["tmp_name"]);
    if($check !== false) {
        
        $uploadOk = 1;
    } else {
        echo "<script> alert('File is not an image.'); window.location = '../school_profile.php';</script>";
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
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<script> alert('Sorry, your file was not uploaded.'); window.location = '../school_profile.php';</script>";
	exit();
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["p_image"]["tmp_name"], $target_file)) {
        
    } else {
        echo "<script> alert('Sorry, there was an error uploading your file.'); window.location = '../school_profile.php';</script>";
		exit();
    }
}

$previous_path = "../admin/". $path["sc_logo"];
if (file_exists($previous_path)) {
$deleted = unlink($previous_path);
	}else{
		
	}
}
else{
	$path_to_store =  $path["sc_logo"];
}


$imgPath=$target_file;


	// Insert data into database 
	$sql = "UPDATE reg_schools SET username='$username', sc_name='$name', sc_email='$email', address='$address', sc_phone='$phone', sc_pwd='$password', sc_logo='$path_to_store' where id=$id";
$result=mysql_query($sql);

if($result){
	echo "<script> alert('Profile updated successfully'); window.location = '../school_profile.php';</script>";
}
else{
	echo "<script> alert('There was an error while updating profile'); window.location = '../school_profile.php';</script>";
}

?>