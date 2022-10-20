<?php
	//arranca la sesion
	session_start();
	include_once "../Modelo/usuario.php";

    /*Se unserializa de la variable sesión USER para recuperar el objeto Usuario*/

  	if (isset($_SESSION['user'])) {
  		$Susuario=unserialize($_SESSION['user']);

?>
<!DOCTYPE html>
<html lang="es">
	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--========== BOX ICONS ==========-->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <!--========== CSS ==========-->
        <link rel="stylesheet" href="./assets/css/styles.css">

        <title>Asador Al - Joleo</title>
	</head>
<?php    
        // Carga todo
        require 'index.php';
?>
</html>
<?php
	}
	else{
		include '../Vista/sweetAlert.php';
		echo"<script type='text/javascript'>
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Es necesario estar logueado!',
				}).then((result) => {
					window.location.href='../Controlador/loginUsuario.php';
					})                            
			</script>";
	}
?>