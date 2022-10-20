<?php
//comprobar si me han mandado el post
if(isset($_POST['añadir'])){
       
        include_once '../Modelo/funcionesBBDD.php';
        include_once 'validar_campos.php';
        include_once '../Vista/sweetAlert.php';
        
        //ver si los imput estan vacios o no
       if (isset($_POST['tipo']) && ($_POST['tipo']!="")) {
                $tPlato = $_POST['tipo'];
                $tPlato = validar_input($tPlato);
        }

       if (isset($_POST['nombre']) && ($_POST['nombre']!="")) {
                $nPlato = $_POST['nombre'];
                $nPlato = validar_input($nPlato);  
                //si el nombre del plato ya existe en la bd
                if(platoRepetido($nPlato)){

                        include '../Vista/form_nuevoPlato.php';
                        echo"<script type='text/javascript'>
                        Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Nombre del plato repetido',
                                showConfirmButton: false,
                                timer: 2000,
                                footer: 'Prueba con otro'
                                }).then((result) => {
                                        window.location.href='../Controlador/addPlato.php';
                                })                            
                                </script>";                          
                    exit();      
                }     
        }

        if (isset($_POST['precio']) && ($_POST['precio']!="")) {
                $pPlato = $_POST['precio'];
                $pPlato = validar_input($pPlato);        
        }

        if (isset($_POST['alergenos']) && ($_POST['alergenos']!="")) {
                $aPlato = $_POST['alergenos'];
                $aPlato = validar_input($aPlato);                        
        }

        if (isset($_POST['descripcion']) && ($_POST['descripcion']!="")) {
                $dPlato = $_POST['descripcion'];
                $dPlato = validar_input($dPlato);         
        }
	   
       //si los campos cumplen la expresion
        if(preg_match($patron_texto, $tPlato) && preg_match($patron_texto, $nPlato) && preg_match($patron_numeros, $pPlato) && preg_match($patron_texto, $aPlato) && preg_match($patron_texto, $dPlato) ){
            //crear plato en DB
            if(agregarPlato($tPlato, $nPlato, $pPlato, $aPlato, $dPlato) ){
                                            
                include '../Vista/form_nuevoPlato.php';
                echo"<script type='text/javascript'>
                Swal.fire({
                        position: 'middle',
                        icon: 'success',
                        title: 'Plato creado',
                        showConfirmButton: false,
                        timer: 1500
                        }).then((result) => {
                                window.location.href='../Controlador/addPlato.php';
                        })                            
                        </script>";
                        
                      exit();
            }else{ 
                include '../Vista/form_nuevoPlato.php';
                echo"<script type='text/javascript'>
                Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No se pudo agregar el plato',
                        showConfirmButton: false,
                        timer: 1500,
                        footer: 'Prueba de nuevo'
                        }).then((result) => {
                                window.location.href='../Controlador/addPlato.php';
                        })                            
                        </script>";                    
                        
                }
        }
        else{//si no cumple

                include '../Vista/form_nuevoPlato.php';
                echo"<script type='text/javascript'>
                Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Los campos solo pueden contener letras o numeros',
                        showConfirmButton: false,
                        timer: 2500,
                        }).then((result) => {
                                window.location.href='../Controlador/addPlato.php';
                        })                            
                        </script>";                    
        }       
}

//sino mostrar el formulario para añadir los platos
else{
?>
<?php
       // Carga el Formulario
        include '../Vista/form_nuevoPlato.php';
}
?>