<?php

if (file_exists($php_email_form = '../assets/vendor/php-email-form/PHPMailer.php')) {
  include($php_email_form);
  include('../assets/vendor/php-email-form/SMTP.php');
  include('../assets/vendor/php-email-form/Exception.php');
} else {
  die('Unable to load the "PHP Email Form" Library!');
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$contact = new PHPMailer(true);
$contact->isSMTP();


$contact->Host = 'smtp.gmail.com';
$contact->SMTPAuth = true;
$contact->Port = 587;
$contact->Username = 'jordankatetegirwe@gmail.com';
$contact->Password = 'xpwnljysoseuzmlp';
$contact->SMTPSecure = 'tls';

$contact->setFrom('jordankatetegirwe@gmail.com', 'Jordan HollyTech Website Contact Form');
$contact->addAddress('jordankatetegirwe@gmail.com', 'Jordan HollyTech');
$contact->Subject = 'Jordan HollyTech Website Contact Form';
$contact->addReplyTo($_POST['email'], $_POST['name']);



// Enable HTML if needed
$contact->isHTML(true);
$bodyParagraphs = ["Name: {$_POST['name']}", "Email: {$_POST['email']}", "Message:", nl2br($_POST['message'])];
$body = join('<br />', $bodyParagraphs);
$contact->Body = $body;


// echo $contact->send();
if ($res = $contact->send()) {

 echo $successMessage = 'OK';

} else {

  $errorMessage = 'Oops, something went wrong. Mailer Error: ' . $contact->ErrorInfo;
}
