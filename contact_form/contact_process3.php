<?php
if(isset($_POST['send'])) {
 
    $to = "demo@myoplansports.com";
    $subject = "Contact Form - MyoPlan Sports";
    
    $message = 'First Name: ' . $_POST['first_name'] . "\r\n\r\n";
    $message .= 'Last Name: ' . $_POST['last_name'] . "\r\n\r\n";
    $message .= 'Organization: ' . $_POST['org'] . "\r\n\r\n";
    $message .= 'Phone: ' . $_POST['telephone'] . "\r\n\r\n";
    $message .= 'Email: ' . $_POST['email_from'] . "\r\n\r\n";
    $message .= 'Comments: ' . $_POST['comments'] . "\r\n\r\n";
    
    echo $message;
    
?>
    
    <?php
	include("header.php");

?>
    <body>
    <?php if(isset($success) && $success) { ?>
    <h1>Thank You</>
    <p>Your message has been sent</p>
    
    <?php } else { ?>
    
    <h1>Oops!</h1>
    <p>Sorry, there was a problem sending your message.</p>
    </body>