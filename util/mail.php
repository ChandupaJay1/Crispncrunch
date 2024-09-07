<?php

use PHPMailer\PHPMailer\Exception as MailerException;
use PHPMailer\PHPMailer\PHPMailer;


/**
 * @param string $from
 * @param string $subject
 * @param string $body
 * @param string $altBody
 * @param array|null $attachments
 * @return bool
 * @throws Exception
 */
function sendContactForm(string $from, string $subject, string $body, string $altBody = '', array $attachments = null): bool
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer($_ENV['APP_DEBUG']);
    $success = true;

    try {
        //Server settings
        $mail->SMTPDebug = $_ENV['APP_DEBUG'];                      // Enable/Disable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = $_ENV['MAIL_HOST'];                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = $_ENV['MAIL_USERNAME'];                     //SMTP username
        $mail->Password = $_ENV['MAIL_PASSWORD'];                               //SMTP password
//        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->SMTPSecure = $_ENV['MAIL_ENCRYPTION'];            //Enable implicit TLS encryption
        $mail->Port = $_ENV['MAIL_PORT'];                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        // From
        $mail->setFrom($from, APP_NAME . " | Contact");

        // Recipients
        $mail->addAddress(APP_EMAIL, APP_NAME);
        // $mail->addAddress($recipient);

        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        if ($attachments != null) {
            foreach ($attachments as $attachment) {
                if (gettype($attachment) == "object")
                    $mail->addAttachment($attachment->value, $attachment->key);
                else
                    $mail->addAttachment($attachment);
            }
        }

        //Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AltBody = $altBody;

        $mail->send();
    } catch (MailerException $e) {
        handle($e, continue: true);
        $success = false;
    }

    return $success;
}
