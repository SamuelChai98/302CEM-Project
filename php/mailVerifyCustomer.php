<?php
/*

SEND EMAIL USING PHPMAILER Ver6.0.7

**/
//
// define('MAILER', 'admin@hrsystem.veecotech.com.my');
// define('PASSWORD', 'admin123@');
define('MAILER', 'dubbykia@gmail.com');
define('PASSWORD', 'password~');
define('NAME', 'Admin');
// define('HOST','vps.veecotech.com.my');
define('HOST','smtp.gmail.com');

// Import PHPMAILER classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// echo "haha";
require_once('PHPMailer/src/Exception.php');
require_once('PHPMailer/src/PHPMailer.php');
// require_once('../../PHPMailer/src/OAuth.php');              // Commend out for uncertain issues
require_once('PHPMailer/src/SMTP.php');

// echo "haha2";
// Required to instantiation and passing 'true' , enable exceptions
function _mail($receiver, $name, $id){                              // Insert mail type when running
  $mail = new PHPMAILER(true);
  $mtitle = 'Email Verification';
  $mbody = 'Please verify your email in our system with the link below: <br> http://localhost:81/Agile%20(test)/customer/verifyemail.php?q='.$id;
  try{
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = HOST;                                   // Specify main and backup SMTP servers ( Using default )
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = MAILER;                                 // SMTP username
    $mail->Password   = PASSWORD;                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    // $mail->Port       = 465;                                    // TCP port to connect to 465 / 587
    $mail->Port       = 587;                                    // TCP port to connect to 465 / 587

    //Recipients
    $mail->setFrom(MAILER, NAME);
    $mail->addAddress($receiver, $name);                                // Add a recipient
    // $mail->addAddress('ellen@example.com');                   // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $mtitle;
    $mail->Body    = $mbody;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo "Send success.";
  }
  catch(Exception $e){
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}
// echo "mail";
// _mail('mrducky700123@gmail.com','123qweasdqwe214114');
 ?>
