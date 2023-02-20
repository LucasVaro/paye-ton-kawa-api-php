<?php
namespace Api\Model;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ModelMail
{
    public function sendMail($mailClient, $body, $qrCodeBase64)
    {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPDebug = 0;
        $mail->Host = 'smtp.gmail.com';
        $mail->Username = MAIL_NAME;
        $mail->Password = MAIL_PASSWORD;
        $mail->Port = 465; //SMTP port
        $mail->SMTPSecure = "ssl";
        $mail->setFrom(MAIL_NAME, "Paye ton kawa");
        $mail->addAddress($mailClient);
        $mail->isHTML(true);
        $mail->Subject = 'QRCODE Authentification';
        $htmlContent = <<<EOD
            <!DOCTYPE html>
            <html>
            <head>
                <meta charset="utf-8">
                <title>QR Code Email</title>
            </head>
            <body>
                <p>Please see the attached QR code image:</p>
                <img src="cid:qrcode">
            </body>
            </html>
            EOD;
        $htmlContent = str_replace('cid:qrcode', $qrCodeBase64, $htmlContent);
        $mail->Body = $htmlContent; 
        $isSend = true;
        if (!$mail->send()) {
            $isSend = false;
        }
        $mail->smtpClose();
        return $isSend;
    }
}