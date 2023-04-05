<?php
if($_SERVER['REQUEST_METHOD'] != 'POST' ){
    header("Location: index.html" );
}

require 'phpmailer/PHPMailer.php';
require 'phpmailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$ciudad = $_POST['ciudad'];
$mensaje = $_POST['mensaje'];

if( empty(trim($nombre)) ) $nombre = 'anonimo';
if( empty(trim($email)) ) $email = '';

$body = <<<HTML
    <h1>Usuario interesado en cotizar un proyecto</h1>
    <p>De: $nombre $ciudad / $telefono</p>
    <h2>Mensaje</h2>
    $mensaje
HTML;

$mailer = new PHPMailer();
$mailer->setFrom( $email, "$nombre $ciudad" );
$mailer->addAddress('hernandez-theman@hotmail.com
','Sitio web');
$mailer->Subject = "Mensaje web: Cotización de proyecto";
$mailer->msgHTML($body);
$mailer->AltBody = strip_tags($body);
$mailer->CharSet = 'UTF-8';


$rta = $mailer->send( );

//var_dump($rta);
header("Location: gracias.html" );