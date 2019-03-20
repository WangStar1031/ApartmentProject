<?php

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require __DIR__ . '/mail/PHPMailer.php';
// require __DIR__ . '/mail/SMTP.php';
// require __DIR__ . '/mail/Exception.php';

require __DIR__ . '/vendor/autoload.php';

function sendMail($_UserEmail, $key){

    $email = new \SendGrid\Mail\Mail();
    $email->setFrom("noreply@fixallphotos.com", "Fix All Photos");
    $email->setSubject("Welcome!");
    $email->addTo($_UserEmail,"");
    // $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
    $Message = "<html>
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
    $email->addContent(
        "text/html", $Message
    );

    $sendgrid = new \SendGrid('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');
    try {
        $response = $sendgrid->send($email);
        echo "Message has been sent";
        // if( $response->statusCode() == )
        // print_r($response);
        // print $response->statusCode() . "\n";
        // print_r($response->headers());
        // print $response->body() . "\n";
    } catch (Exception $e) {
        echo 'Caught exception: '.  $e->getMessage(). "\n";
    }

    // $mail = new PHPMailer(true);
    // try {
    //     $mail->isSMTP();
    //     $mail->Host = 'smtp.outlook.com';
    //     $mail->SMTPAuth = true;
    //     $mail->Username = 'noreply@fixallphotos.com';
    //     $mail->Password = '1qaz2wsx!QAZ';
    //     $mail->SMTPSecure = 'tls';
    //     $mail->Port = 25;

    //     //Recipients
    //     $mail->setFrom('fixallph@israel01.jetserver.net', 'fixallph');
    //     $mail->addAddress($_UserEmail);

    //     $mail->isHTML(true);
    //     $mail->Subject = 'Welcome!';
    //     $mail->Body = "<html>
    //         <head>
    //             <title>Invitation.</title>
    //         </head>
    //     <body>
    //     <h4>Hello, there.</h4>
    //     <p>We invite you to our building reparation system.</p>
    //     <p>Please click bellow link url.</p>
    //     <a href='http://www.watchwork.co.il/UploadsProjectUser1/invitation.php?key=" . $key . "'>click me</a>
    //     </body>
    //     </html>";

    //     $mail->SMTPOptions = array(
    //         'ssl' => array(
    //             'verify_peer' => false,
    //             'verify_peer_name' => false,
    //             'allow_self_signed' => true
    //         )
    //     );
    //     $mail->send();
    //     echo 'Message has been sent';
    // } catch (Exception $e) {
    //     echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    // }
}
