<?php

namespace App\Service;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';

class ContactMail {
    public function sendMail($email, $sujet, $message, $boolnews)
    {
        $mail = new PHPMailer(true);
        try {
            
            $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'billet.alaska@gmail.com';
            $mail->Password = 'bookalaska2019';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setLanguage('fr', 'src/vendor/phpmailer/phpmailer/language');

            
            $mail->setFrom('billet.alaska@gmail.com', 'Mailer');
            $mail->addAddress('billet.alaska@gmail.com');


            
            
            $mail->Subject = 'Vous avez recu un nouveau message !';
            $mail->Body    = 'Email du contact : ' .$email. ' <br>
            <br>
            <h3>' . $sujet .'</h3> <br>
            <br>
            <p> ' . $message .' </p> <br>
            <br>
            ';
            $mail->isHTML(true);
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}

