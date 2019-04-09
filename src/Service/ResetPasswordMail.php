<?php

namespace App\Service;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';

class ResetPasswordMail {
    public function sendResetMail($token)
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
            $mail->addAddress('monmail');


            
            $mail->isHTML(true);
            $mail->Subject = 'Vous avez demander a changer de mot de passe ?';
            $mail->Body    = '<a href="http://localhost/projet3/changement-mdp&token=<?= $token; ?>">Changement de mot de passe</a>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}

