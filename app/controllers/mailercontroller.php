<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader

require '../vendor/autoload.php';


//Load Composer's autoloader


//Create an instance; passing `true` enables exceptions
//$mail = new PHPMailer();


//Server settings
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
// $mail->isSMTP();                                            //Send using SMTP
// $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
// $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
// $mail->Username   = 'hfgroup2a@gmail.com';                     //SMTP username
// $mail->Password   = 'inholland@test';                               //SMTP password
// $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
// $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.mailtrap.io';
$mail->SMTPAuth = true;
$mail->Port = 2525;
$mail->Username = '872529c30e47d0';
$mail->Password = '46ab987e6f40c8';