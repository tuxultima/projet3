<?php

namespace App\Service;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';

class NewsletterMail {
    public function sendMail($email, $title, $content)
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
            foreach ($email as $e) {
                $mail->addAddress($e->getEmail());
            }
            
            




            
            $mail->isHTML(true);
            $mail->Subject = 'Un nouveau chapitre est sorti';
            $mail->Body    = '<h2>  ' . $title . '  </h2> <br>
            <br>
            <p>  '  . substr($content, 0,250);  '  </p>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}

