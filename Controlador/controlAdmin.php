<?php
    // Comprueba que es el usuario ADMIN, sino redirige a la galería y muestra un mensaje de error
    include_once '../Vista/sweetAlert.php';
    if (isset($_SESSION['user'])) {
        $Susuario=unserialize($_SESSION['user']);
        if($Susuario[0]["tipo"] !== '2') {
     

            echo"<script type='text/javascript'>
            Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Acceso exclusivo del administrador',
                    footer: '<a href=../Vista/form_acceso.php>Volver al inicio</a>'
                    }).then((result) => {
                            window.location.href='../Controlador/loginUsuario.php';
                    })                            
                    </script>";                 
            exit();
        }
    }