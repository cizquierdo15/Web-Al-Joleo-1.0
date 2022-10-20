<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
include_once 'validar_campos.php';
include_once '../Vista/sweetAlert.php';

$pathPHPMailer = "/opt/lampp/htdocs/alJoleo/MailPHP";
require("PHPMailer/src/PHPMailer.php");
require("PHPMailer/src/SMTP.php");
require("PHPMailer/src/Exception.php");

//capturamos el mensaje que nos deja el usuario en una variable
$contenido=$_POST['mensaje'];
$contenido = validar_input($contenido);

//capturamos nombre del usuario en una variable
$nombre=$_POST['name'];
$nombre = validar_input($nombre);

//capturamos asunto del mail en una variable
$asunto=$_POST['asunto'];
$asunto = validar_input($asunto);

//capturamos mail del usuario en una variable
$correo=$_POST['email'];


//Creamos el objeto PHPMailer
$mail = new PHPMailer();

$mail->isSMTP();

$mail->SMTPDebug = SMTP::DEBUG_OFF;

//Host
$mail->Host = 'smtp.gmail.com';

//Puerto
$mail->Port = 587;


$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;


$mail->SMTPAuth = true;

//Nuestra cuenta de Gmail
$mail->Username = 'proyectoAljoleo@gmail.com';

//Nuestra contraseña de Gmail
$mail->Password = 'Proyecto22';

//Usuario que nos manda la consulta
$mail->setFrom($correo,$nombre);


//El mail del admin
$mail->addAddress('proyectoAljoleo@gmail.com', 'Admin');

//Subjet del correo
$mail->Subject = $asunto;


//convertimos un HTML en texto plano
$mail->msgHTML($contenido);


//Comprobamos y notificamos si el mail se envia 
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
 
        include '../Vista/form_mail.php';
        echo"<script type='text/javascript'>
        Swal.fire({
                position: 'middle',
                icon: 'success',
                title: 'Correo enviado',
                showConfirmButton: false,
                timer: 1500
                }).then((result) => {
                    window.location.href='../Vista/form_Mail.php';
                })                            
                </script>";
}


