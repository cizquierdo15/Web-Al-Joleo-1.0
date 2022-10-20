<?php
   //comprobar si me han mandado el post
    if(isset($_POST['reservaMesa'])){
        include_once '../Modelo/usuario.php';
        include_once '../Modelo/funcionesBBDD.php';
        include_once 'validar_campos.php';
        include_once '../Vista/sweetAlert.php';

        //la info se limpia de espacios y de /
        if (isset($_POST['idUsu']) && ($_POST['idUsu']!="")) {
                $nUsuario= $_POST['idUsu'];
                $nUsuario = validar_input($nUsuario);
        }
        if (isset($_POST['numMesa']) && ($_POST['numMesa']!="")) {
            //si el div donde se guarda la mesa seleccionada esta relleno
                $numMesa = $_POST['numMesa'];
                $numMesa = validar_input($numMesa);  
        }
        if (isset($_POST['fecha_reserva']) && ($_POST['fecha_reserva']!="")) {
            //donde se guarda la fecha elegida
                $f_reserva = $_POST['fecha_reserva'];                
        }
        if (isset($_POST['mensaje']) && ($_POST['mensaje']!="")) {
            //donde se guarda el msj
                $mensaje_adicional = $_POST['mensaje'];
                $mensaje_adicional = validar_input($mensaje_adicional);                
        }
        else{
            $mensaje_adicional = "sin comentario";
        }
        //si los campos cumplen la expresion
        if(preg_match($patron_texto, $nUsuario) && preg_match($patron_numeros, $numMesa) && preg_match($patron_mixto, $mensaje_adicional)){
            //si la mesa está libre
            if(compruebaMesaLibre($numMesa)){
                //procede a reservarla
                if (reservarMesa($numMesa, $nUsuario , $f_reserva , $mensaje_adicional)) {
                    include '../Vista/reserva.php';
                    echo"<script type='text/javascript'>
                    Swal.fire({
                            position: 'middle',
                            icon: 'success',
                            title: 'Reserva creada',
                            showConfirmButton: false,
                            timer: 1500
                            }).then((result) => {
                                window.location.href='reserva_Mesa.php';
                            })                            
                            </script>";
                    exit();
                }
                             
            }else{

                include '../Vista/reserva.php';
                echo"<script type='text/javascript'>
                Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'En esa fecha, la mesa seleccionada se encuentra ocupada',
                        footer: 'Prueba a reservar otra mesa'
                        }).then((result) => {
                            window.location.href='reserva_Mesa.php'; 
                        })                            
                        </script>";               
                exit();
            }      
        }
        else{ 
            //si alguno de los datos no es correcto
            include '../Vista/reserva.php';
            echo"<script type='text/javascript'>
            Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Datos de mesa / usuario incorrectos',
                    showConfirmButton: false,
                    timer: 2000,
                    footer: 'Prueba a reservar otra mesa'
                    }).then((result) => {
                        window.location.href='reserva_Mesa.php'; 
                    })                            
                    </script>";  

                exit(); 
        }
    }     
    //sino mostrar el formulario de registro
    else{
?>
	
<?php
       // Carga el Formulario
        include '../Vista/reserva.php';
    }
?>