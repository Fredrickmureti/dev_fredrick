<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Path to Composer's autoload.php

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'fredrickmureti612@gmail.com'; // Your Gmail address
    $mail->Password = 'yjdxsxvdrpruglov'; // Your Gmail app password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Recipients
    $mail->setFrom('fredrickmureti612@gmail.com', 'Your Name');
    $mail->addAddress('fredrickmureti612@gmail.com'); // Your Gmail address

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Test Email';
    $mail->Body    = 'This is a test email from PHPMailer using Gmail.';

    $mail->send();
    echo 'Mail sent successfully!';
} catch (Exception $e) {
    echo "Failed to send mail. Mailer Error: {$mail->ErrorInfo}";
}
