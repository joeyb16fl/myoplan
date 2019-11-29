<?php
$to = "demo@myoplansports.com";
$name = $_POST['first_name'].' '.$_POST['contact_lname'].' '.$_POST['contact_oname'];
$message = $_POST['contact_message'];
$from = $_POST['contact_email'];
$headers = "From:" . $from;
ini_set("SMTP","smtp.gmail.com"); 
ini_set("sendmail_from","demo@myoplansports.com");
mail($to,$name,$message,$headers);
//header("Location: http://www.myoplansports.com/contact.php");
//die();
?>
<script type="text/javascript">
alert('Mail Sent Successfully.');
window.location.href = "http://www.myoplansports.com/contact.php";
</script>