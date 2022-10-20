<?php
   //comprobar si me han mandado el post
if(isset($_POST['Entrar'])){
        include_once '../Modelo/usuario.php';
        include_once '../Modelo/funcionesBBDD.php';
        include_once 'validar_campos.php';
        include_once '../Vista/sweetAlert.php';
        
        //ver si los imput estan vacios o no
       if (isset($_POST['login']) && ($_POST['login']!="")) {
                $rlogin= $_POST['login'];
                $rlogin = validar_input($rlogin);
                //si el nombre del usuario ya existe en la bd
                if(usuarioRepetido($rlogin)){
                        include '../Vista/form_registro.php';
                        echo"<script type='text/javascript'>
                        Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Usuario repetido',
                                showConfirmButton: false,
                                timer: 2000,
                                footer: 'Prueba con otro usuario'
                                }).then((result) => {
                                        window.location.href='../Controlador/addUsuario.php';
                                })                            
                                </script>";                        
                    exit();      
                }           
        }

       if (isset($_POST['nombre']) && ($_POST['nombre']!="")) {
                $rnombre= $_POST['nombre'];
                $rnombre = validar_input($rnombre);       
        }

        if (isset($_POST['apellido']) && ($_POST['apellido']!="")) {
                $rapellido= $_POST['apellido'];
                $rapellido = validar_input($rapellido);        
        }

        if (isset($_POST['email']) && ($_POST['email']!="")) {
                $remail= $_POST['email'];           
        }
        //si introducen una contraseña se hashea
        if (isset($_POST['pass']) && ($_POST['pass']!="")) {
                $rpass= $_POST['pass'];
                $rpass = validar_input($rpass);
               	$rpass = hash('sha512' , $rpass);
        }

        if (isset($_POST['tlf']) && ($_POST['tlf']!="")) {
                $rtlf= $_POST['tlf'];
                $rtlf = validar_input($rtlf);          
        }
        //si los campos cumplen la expresion
        if(preg_match($patron_texto, $rlogin) && preg_match($patron_texto, $rnombre) && preg_match($patron_texto, $rapellido) && preg_match($patron_mixto, $rpass) && preg_match($patron_numeros, $rtlf) ){
            //crear usuario en DB
                if(agregarUsuario($rlogin,$rnombre,$rapellido,$remail,$rpass,$rtlf)){
                    
                    //si lo agrega correctamente se crea el obj
                     //crear objeto de usuario
                    $usuario = new Usuario($rlogin, $rnombre, $rapellido, $remail, $rpass, $rtlf, "1");

                        include '../Vista/form_registro.php';
                        echo"<script type='text/javascript'>
                        Swal.fire({
                                position: 'middle',
                                icon: 'success',
                                title: 'Usuario creado',
                                showConfirmButton: false,
                                timer: 1500
                                }).then((result) => {
                                        window.location.href='../index.php';
                                })                            
                                </script>";                       
                    
                    exit();
                }else{ 
                        include '../Vista/form_registro.php';
                        echo"<script type='text/javascript'>
                        Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'No se ha podido crear el usuario',
                                showConfirmButton: false,
                                timer: 1500,
                                footer: 'Prueba de nuevo'
                                }).then((result) => {
                                        window.location.href='../Vista/form_registro.php';
                                })                            
                                </script>";          
                }
        }
        else{ //si los datos introducidos no cumplen las restricciones
                include '../Vista/form_registro.php';
                        echo"<script type='text/javascript'>
                        Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Datos ingresados incorrectos',
                                showConfirmButton: false,
                                timer: 2500,
                                footer: 'Solo se permiten letras, excepto email'
                                }).then((result) => {
                                        window.location.href='addUsuario.php';
                                })                            
                                </script>";          
        }               
}  
    //sino mostrar el formulario de registro
else{

       // Carga el Formulario
        include '../Vista/form_registro.php';

}

?>
