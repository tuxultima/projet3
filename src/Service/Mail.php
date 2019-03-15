<?php

namespace App\Service;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';

trait Mail {
    public function sendMail($emails, $chapter)
    {
        $mail = new PHPMailer(true);
        try {
            
            $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = 'localhost';
            $mail->SMTPAuth = true;
            $mail->Username = 'user@example.com';
            $mail->Password = 'secret';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->setLanguage('fr', 'src/vendor/phpmailer/phpmailer/language');

            
            $mail->setFrom('newsletter@billetalaska.com', 'Mailer');
            //$mail->addAddress('joe@example.net', 'Joe User');
            $mail->addAddress($emails);
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            
            //$mail->addAttachment('/var/tmp/file.tar.gz');
            $mail->addAttachment('/tmp/image.jpg', 'new.jpg');

            
            $mail->isHTML(true);
            $mail->Subject = 'Un nouveau chapitre est parut';
            $mail->Body    = '<h1>Nouveau chapitre publié</h1>'. '<br>'. '<p>'. $chapter->getTitle(). '</p>'. '<br>'. '<p>'. substr($chapter->getContent(), 0,200). '...</p>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}

