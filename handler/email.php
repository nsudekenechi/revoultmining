<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "./vendor/autoload.php";
function sendEmail($emailFile, $search, $replace, $subject, $to)
{
    try {
        $mail = new PHPMailer(true);
        $senderemail = "support@zenixmining.live";
        $senderpassword = "LZzM>78s6!P";
        $senderFrom = "Zenixmining";
        $mail->Host = 'smtp.hostinger.com';
        $body = file_get_contents($emailFile);
        $body = str_replace($search, $replace, $body);
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Username = $senderemail;
        $mail->Password = $senderpassword;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;
        $mail->setFrom($senderemail, $senderFrom);
        $mail->clearAddresses();
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AltBody = 'Body in plain text for non-HTML mail clients';
        $mail->send();
        return true;

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

