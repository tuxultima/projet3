<?php 
ob_start();
?>

<h1 class="text-white">accueil</h1>

<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
if(isset($_POST['email'])){
    //envia correo desde el servidor local (pruebas)
    require("vendor/phpmailer/phpmailer/src/PHPMailer.php");
    require("vendor/phpmailer/phpmailer/src/SMTP.php");
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPDebug = 2;
    $mail->Username = "billet.alaska@gmail.com";
    $mail->Password = "bookalaska2019";
    $mail->Debugoutput = 'html';

    $mail->From = "billet.alaska@gmail.com";
    $mail->FromName = "jean";
    $mail->Subject = "Subject del Email";
    $mail->AltBody = "Hola, te doy mi nuevo numero\nxxxx.";
    $mail->MsgHTML("Hola, te doy mi nuevo numero<br><b>xxxx</b>.");
    //$mail->AddAttachment("files/files.zip");
    //$mail->AddAttachment("files/img03.jpg");
    $mail->AddAddress($_POST['email'], "user name");
    $mail->IsHTML(true);

    if(!$mail->Send()) {
        echo "Error: " . $mail->ErrorInfo;
        return false;
    }

    //fin enviar correo usuando servidor local  
}
?>

<form id="form1" name="form1" method="post" action="">
    <p>
        <label for="email"></label>
        <input type="text" name="email" id="email" />
    </p>
    <p>
        <input type="submit" name="enviar" id="enviar" value="Enviar" />
    </p>
</form>

<?php 
$content = ob_get_clean();
require('src/View/template.php');
?>