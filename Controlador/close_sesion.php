<?php
    session_start();
    //borra la sesion y redirige al login
    unset($_SESSION['user']);
    header('Location: ../Controlador/loginUsuario.php');
    die;
 ?>