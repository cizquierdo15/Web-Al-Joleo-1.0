<?php
    //iniciamos la sesion
session_start();
   //comprobar si me han mandado el post
if(isset($_POST['Entrar'])){
        include_once '../Modelo/Usuario.php';
        include_once '../Modelo/funcionesBBDD.php';
        include_once 'validar_campos.php';
        include_once '../Vista/sweetAlert.php';
        //ver si los imput estan vacios o no
       if (isset($_POST['login']) && ($_POST['login']!="")) {
                $rusuario= $_POST['login'];
                $rusuario = validar_input($rusuario);
        }
       if (isset($_POST['pass']) && ($_POST['pass']!="")) {
                $rpass= $_POST['pass'];
                $rpass = validar_input($rpass);
                $rpass = hash('sha512' , $rpass);        
        }
        //si los campos cumplen la expresion
        if(preg_match($patron_texto, $rusuario) && preg_match($patron_mixto, $rpass)){
            //comprobar usuario en DB
                if(comprobarUsuario($rusuario, $rpass)){
                    //si existe recojo los datos del usuario
                    $codUsu = getIdUsuario($rusuario);
                    $id = $codUsu[0]['id_usuario'];
                    $usuario = getDatosUsu($id);
                    
                    //serializar el obj
                    $objserializado = serialize($usuario);
                    //meter datos usuario en $_sesion 
                    //crear variables de sesion
                    $_SESSION["user"] = $objserializado;
              
                    
                    echo'<script type="text/javascript">
                           alert("Login Correcto");
                          </script>';
                    
                    header('Location: ../Vista/main.php');
                    exit();
                }else{
                    include '../Vista/form_acceso.php';
                    echo"<script type='text/javascript'>
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'El usuario o la contraseña no existe!',
                                footer: 'Prueba de nuevo!'
                            }).then((result) => {
                                window.location.href='loginUsuario.php';
                                })                            
                          </script>";
                }
        }
        else{
            include '../Vista/form_acceso.php';
            echo"<script type='text/javascript'>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Los datos del usuario solo pueden contener letras',
                    }).then((result) => {
                        window.location.href='loginUsuario.php';
                        })                            
                </script>";
        }
    }

    //si no mostrar el formulario de registro
else{
        
        // Carga el Formulario
        include '../Vista/form_acceso.php';
}
?>