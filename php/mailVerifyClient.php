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
require('PHPMailer/src/Exception.php');
require('PHPMailer/src/PHPMailer.php');
// require_once('../../PHPMailer/src/OAuth.php');              // Commend out for uncertain issues
require('PHPMailer/src/SMTP.php');

// echo "haha2";
// Required to instantiation and passing 'true' , enable exceptions
function _mail($receiver, $name, $id ,$username, $password){                              // Insert mail type when running
  $mail = new PHPMAILER(true);
  echo $mtitle = 'Email Verification';
  echo $mbody = 'Please verify your email in our system with the link below: <br> http://localhost:81/Agile%20(test)/client/verifyEmail.php?q='.$id.'<br>
    <br>
    <h1>This is your login credential.</h1>
    <p>Username:'.$username.'</p>
    <p>Password:'.$password.'</p>';
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
    $mail->addAddress($receiver, $name);
    // Content
    $mail->isHTML(true);
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
