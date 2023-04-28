<?php

include_once __DIR__."/src/PHPMailer.php"; 
include_once __DIR__."/src/SMTP.php"; 

use PHPMailer\PHPMailer\PHPMailer;
$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = 'sandbox.smtp.mailtrap.io';
$mail->SMTPAuth = true;

$mail->Username = '0f3fc33b10cb';
$mail->Password = '75722e7f5cd4';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 2525;

$mail->setFrom('59de7406-e1171d@inbox.mailtrap.io', 'Your Api email');
$mail->addAddress('jonathan_test@mail.com', 'Me');
$mail->Subject = 'Thanks for choosing Our Hotel!';
// Set HTML 
$mail->isHTML(TRUE);
$mail->Body = '<html>Hi there, we are happy to <br>confirm your booking.</br> Please check the document in the attachment.</html>';
$mail->AltBody = 'Hi there, we are happy to confirm your booking. Please check the document in the attachment.';
// add attachment 
// just add the '/path/to/file.pdf'
$attachmentPath = './confirmations/yourbooking.pdf';
if (file_exists($attachmentPath)) {
    $mail->addAttachment($attachmentPath, 'yourbooking.pdf');
}

// send the message
if(!$mail->send()){
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}