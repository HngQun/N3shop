<?php
include "public/PHPMailer/src/PHPMailer.php";
include "public/PHPMailer/src/Exception.php";
include "public/PHPMailer/src/OAuth.php";
include "public/PHPMailer/src/POP3.php";
include "public/PHPMailer/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
//print_r($mail);
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.example.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'dangduc2589@gmail.com';                 // SMTP username
    $mail->Password = 'yfijkjsyxgvrgkvt';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
 
    //Recipients
    $mail->setFrom('dangduc2589@gmail.com', 'Mailer');

    $mail->addAddress('quandang2812@gmail.com', 'Minh Duc(joker)');     // Add a recipient
    $mail->addAddress('dangduc588@gmail.com', 'Minh Duc2(joker2)');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');
 
    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
 
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'test mail';
    $mail->Body    = 'new content test mail';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>