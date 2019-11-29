<?php
include("includes/config.php");
// table name 
$token = GET_TOKEN_STRING();
$tbl_name="reg_schools";
$target_file = $_POST["logo_c"];
if(!empty($_FILES['logo']['name']))
{
	$target_file = "";


//image path

$target_dir = "uploads/";
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
        echo "<script> alert('File is not an image.'); window.location = 'http://www.myoplan.com/admin/schools.php';</script>";
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
    echo "<script> alert('Sorry, your file was not uploaded.'); window.location = 'http://www.myoplan.com/admin/add_school.php';</script>";
	exit();
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
        
    } else {
        echo "<script> alert('Sorry, there was an error uploading your file.'); window.location = 'http://www.myoplan.com/admin/add_school.php';</script>";
		exit();
    }
}

}

// values sent from form 

$id=$_POST['id'];
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$contact=$_POST['contact'];
$address=$_POST['address'];


if(true){


// Insert data into database 
$sql="update  $tbl_name set sc_name='$name' , sc_email='$email' ,sc_pwd='$password', sc_logo='$target_file', address='$address', sc_phone='$contact' where id=$id";
$result=mysql_query($sql);

$id = mysql_insert_id();
$sentmail;
// if suceesfully inserted data into database, send confirmation link to email 
if($result){
	echo "<script> alert('Profile Updated Successfully'); window.location='schools.php';</script>";
}
}
else{
	echo "<script> alert('An error occured while updating profile'); window.location='schools.php';</script>";
	exit();	
}
?>