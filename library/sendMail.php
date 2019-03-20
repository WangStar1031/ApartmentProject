<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/mail/PHPMailer.php';
require __DIR__ . '/mail/SMTP.php';
require __DIR__ . '/mail/Exception.php';
function sendMail($_UserEmail, $key){
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'williamdeluna2018@gmail.com';
        $mail->Password = 'G56dRm9!!!';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('fixallph@israel01.jetserver.net', 'fixallph');
        $mail->addAddress($_UserEmail);

        $mail->isHTML(true);
        $mail->Subject = 'Welcome!';
        $mail->Body = "<html>
            <head>
                <title>Invitation.</title>
            </head>
        <body>
        <h4>Hello, there.</h4>
        <p>We invite you to our building reparation system.</p>
        <p>Please click bellow link url.</p>
        <a href='http://www.watchwork.co.il/UploadsProjectUser1/invitation.php?key=" . $key . "'>click me</a>
        </body>
        </html>";

        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}
