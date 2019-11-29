<?php
$to = "demo@myoplansports.com";
$name = $_POST['first_name'];
$message = $_POST['contact_message'];
$from = $_POST['contact_email'];
$headers = "From:" . $from;
ini_set("SMTP","smtp.gmail.com"); 
ini_set("sendmail_from","demo@myoplansports.com");
mail($to,$name,$message,$headers);
echo "Mail Sent.";
?>
