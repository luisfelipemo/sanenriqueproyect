<?php 

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
 
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// // Load Composer's autoloader
// require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
$nombre=$_POST['nombre'];
$email=$_POST['correo'];
$tel=$_POST['telefono'];
$ciudad=$_POST['ciudad'];
$mensaje=$_POST['mensaje'];

try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'luisfelipemo1998@gmail.com';                     // SMTP username
    $mail->Password   = 'serviciosLJJJJEFA';                               // SMTP password
    $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('luisfelipemo1998@gmail.com', 'San Enrique - Contacto');
    $mail->addAddress('hernandez-theman@hotmail.com', 'San Enrique - COTIZACIÓN');
    // $mail->addAddress('isc_jmartin@hotmail.com', 'CID Fares - COTIZACIÓN');
    // $mail->addAddress('cidfarescontacto@gmail.com', 'CID Fares - LEAD');  
    // $mail->addAddress('contacto@cidfares.com', 'CID Fares - COTIZACIÓN');     // Add a recipient

   
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = ''.$asunto.'';
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
    $mail->Body    ='<div style="width: 100%; height: 150px; background-color: #fff;">
        <div class="logo">
        </div>
        <div class="yellowSeparator" style="background-color: #002655; width: 100%; height: 30px; "></div>
    </div>
    <div style="color: #002655; background-color: #fff; display: block; margin-top: 30px; font-family: sans-serif;">
        <h3 style="text-align: center; font-size: 26px; padding: 10px 0px 3px 0px; margin-bottom: 0; color: #002655">Mensaje de Contacto</h3>
        <p style="text-align: center; padding: 10px 0px; color: #002655">Se ha recibido un <strong>nuevo mensaje de contacto</strong>. A continuación se describe el mensaje:</p>
        <table style="width: 100%;">
            <thead>
                <th style="background-color: #002655; color: #fff; text-align: center; font-weight: bold; width: 50%; height: 30px;">Título</th>
                <th style="background-color: #002655; color: #fff; text-align: center; font-weight: bold; width: 50%; height: 30px;">Descripción</th>
            </thead>
            <tbody style="text-align: center; background-color: #fff;">
                <tr style="height: 30px;">
                    <td>Nombre:</td>
                    <td>'.$nombre.'</td>
                </tr>
                <tr style="height: 30px;">
                    <td>Ciudad:</td>
                    <td>'.$ciudad.'</td>
                </tr>
                <tr style="height: 30px;">
                    <td>Correo:</td>
                    <td>'.$email.'</td>
                </tr>
                <tr style="height: 30px;">
                    <td>Teléfono</td>
                    <td>'.$tel.'</td>
                </tr>
                <tr style="height: 30px;">
                    <td>Mensaje</td>
                    <td>'.$mensaje.'</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div style="background-color: #002655; height: 20px; width: 100%; padding: 11px 0px;">
        <p style="margin: 0; color: #fff; text-align: center; font-family: sans-serif; font-size: 11px;">*Cualquier error con el correo favor de contactar con soporte técnico.</p>
    </div>
    ';
    $mail->AltBody = 'El cliente '.$nombre.' ha enviado un mensaje de contacto. Sus datos son: Nombre: '.$nombre.', Ciudad: '.$ciudad.', Correo: '.$email.', Teléfono: '.$tel.'; con el mensaje: '.$mensaje.'';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>