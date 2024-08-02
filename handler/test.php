<?php
// echo "Hello Chief";
echo dirname(__DIR__) . '/dbase/config.php';
exit();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "./vendor/autoload.php";
try {
    $mail = new PHPMailer(true);

    $senderemail = "support@zenixmining.com";
    $senderpassword = "#Zenix1234";
    $senderFrom = "Zenixmining";
    $mail->Host = 'smtp.hostinger.com';
    $mail->SMTPDebug = 2;
    $mail->isSMTP();

    $mail->SMTPAuth = true;
    $mail->Username = $senderemail;
    $mail->Password = $senderpassword;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;
    $mail->setFrom($senderemail, $senderFrom);
    $mail->addAddress("nsudekenechi2@gmail.com");
    $mail->Subject = "Testing this";
    $mail->Body = "Hello Chief";
    $mail->AltBody = 'Body in plain text for non-HTML mail clients';
    $mail->send();
    return true;

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}