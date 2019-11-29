<?php
include("admin/includes/config.php");
// table name 
$tbl_name="documents";
$id=$_POST['sc_id'];
$token = GET_TOKEN_STRING(20);
if(!empty($_FILES['document']['name']))
{
	


//image path

$target_dir = "admin/uploads/documents/";
$target_file = $target_dir . basename($_FILES["document"]["name"]);
$filename = basename($_FILES["document"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$target_file = $target_dir . $token . "." . $imageFileType;
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["document"]["tmp_name"]);
    if($check !== false) {
        
        $uploadOk = 1;
    } else {
        echo "<script> alert('There was an error in uploading the file.'); window.location = '".$_SESSION["current_page"]."';</script>";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "<script> alert('Sorry, file already exists.'); </script>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["document"]["size"] > 50000000) {
    echo "<script> alert('Sorry, your file is too large.'); </script>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "pdf" && $imageFileType != "doc") {
    echo "<script> alert('Sorry, only PDF and DOC files are allowed.'); </script>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<script> alert('Sorry, your file was not uploaded.'); window.location = '".$_SESSION["current_page"]."';</script>";
	exit();
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["document"]["tmp_name"], $target_file)) {
        
    } else {
        echo "<script> alert('Sorry, there was an error uploading your file.'); window.location = '".$_SESSION["current_page"]."';</script>";
		exit();
    }
}

}

// values sent from form 
$doc_token=$_POST['doc_token'];

$title=$_POST['doc_title'];

$imgPath="";



if(!isset($_POST['doc_title']) || empty($_POST['doc_title']))
{
	echo "<script> alert('Please Enter the Title for Document'); window.location='".$_SESSION["current_page"]."';</script>";
	exit();	
}



if(!empty($_FILES['img']['name']))
{
$imgPath= "./admin//uploads/documents/".$target_file;
}

//checks
if(!isset($_POST['doc_title']) || empty($_POST['doc_title']))
{
	echo "<script> alert('Enter Document Title'); window.location='".$_SESSION["current_page"]."';</script>";
	exit();	
}

// Insert data into database 
$sql="INSERT INTO $tbl_name(doc_path,doc_title,doc_user_key)VALUES('$target_file', '$title', '$doc_token')";
$result=mysql_query($sql);

// if suceesfully inserted data into database, send confirmation link to email 
if($result){
	echo "<script> alert('Document Uploaded Successfully'); window.location='".$_SESSION["current_page"]."';</script>";
	exit();	
}

?>