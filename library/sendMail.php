<?php

require __DIR__ . '/vendor/autoload.php';

function sendMail($_UserEmail, $key){

    $email = new \SendGrid\Mail\Mail();
    $email->setFrom("noreply@fixallphotos.com", "Fix All Photos");
    $email->setSubject("Welcome!");
    $email->addTo($_UserEmail,"");
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
    } catch (Exception $e) {
        echo 'Caught exception: '.  $e->getMessage(). "\n";
    }

}
