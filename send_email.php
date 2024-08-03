<?php
// Allow requests from your frontend domain
header("Access-Control-Allow-Origin: https://dev-fredrick.vercel.app");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

// Your existing code for sending email
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
    $mail->SMTPAuth = true;
    $mail->Username = 'fredrickmureti612@gmail.com'; // SMTP username
    $mail->Password = 'yjdxsxvdrpruglov'; // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Recipients
    $mail->setFrom('fredrickmureti612@gmail.com', 'Mailer');
    $mail->addAddress('fredrickmureti612@gmail.com');

    // Content
    $mail->isHTML(true);
    $mail->Subject = $_POST['subject'];
    $mail->Body    = $_POST['message'];

    $mail->send();
    echo 'Mail sent successfully!';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>
