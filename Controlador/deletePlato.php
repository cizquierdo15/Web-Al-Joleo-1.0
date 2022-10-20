<?php
//comprobar si me han mandado el post
if(isset($_POST['eliminar'])){
       
        include_once '../Modelo/funcionesBBDD.php';
        include_once 'validar_campos.php';
        include_once '../Vista/sweetAlert.php';
        
        //ver si los imput estan vacios o no, la info se limpia de espacios y de /
       if (isset($_POST['nombre']) && ($_POST['nombre']!="")) {
                $nPlato = $_POST['nombre'];
                $nPlato = validar_input($nPlato);
                //si cumple el patron
                if( preg_match($patron_texto, $nPlato) ){
                     //comprueba si no existe el plato
                    if( !platoRepetido($nPlato )){
                        include '../Vista/form_eliminarPlato.php';
                        echo"<script type='text/javascript'>
                        Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'El nombre del plato no existe',
                                showConfirmButton: false,
                                timer: 2000,
                                footer: 'Prueba con otro'
                                }).then((result) => {
                                    window.location.href='../Controlador/deletePlato.php';
                                })                            
                                </script>";                
                        exit();      
                    }
                    else{// si existe
                        if(borrarPlato($nPlato)){
                            //si lo elimina correctamente se avisa

                            include '../Vista/form_eliminarPlato.php';
                            echo"<script type='text/javascript'>
                            Swal.fire({
                                    position: 'middle',
                                    icon: 'success',
                                    title: 'Plato eliminado',
                                    showConfirmButton: false,
                                    timer: 1500
                                    }).then((result) => {
                                        window.location.href='../Controlador/deletePlato.php'
                                    })                            
                                    </script>";
                                    
                                  exit();
                        }else{

                            include '../Vista/form_eliminarPlato.php';
                            echo"<script type='text/javascript'>
                            Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'No se ha podido eliminar el plato',
                                    showConfirmButton: false,
                                    timer: 2500,
                                    footer: 'Prueba de nuevo'
                                    }).then((result) => {
                                        window.location.href='../Controlador/deletePlato.php';
                                    })                            
                                    </script>";             
                        }
                    }
                }
                else{//si no cumple
                    
                    include '../Vista/form_eliminarPlato.php';
                    echo"<script type='text/javascript'>
                    Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'El nombre solo puede contener letras y espacios',
                            showConfirmButton: false,
                            timer: 2500,
                            }).then((result) => {
                                window.location.href='../Controlador/deletePlato.php';
                            })                            
                            </script>";             
                }              
        }
          
}
//sino mostrar el formulario para añadir los platos
else{
?>
<?php
       // Carga el Formulario
        include '../Vista/form_eliminarPlato.php';   
}

?>