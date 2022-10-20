<?php
	//arranca la sesion
	session_start();
	include_once "../Modelo/usuario.php";
	include "../Controlador/controlAdmin.php";
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
		<!--========== JQUERY ==========-->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
		<!--========== BOOTSTRAP ==========-->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<!--========== CSS ==========-->
		<link rel="stylesheet" href="../Vista/assets/css/styles.css">

        <title>Al - Joleo: Eliminar Plato</title>
	</head>
<body>
	<?php    
			// Carga el NAV
		include 'header.php';
	?>
	<section class="principal">
		<div class="contenedor_eliminar">
			<h2>Eliminar un plato de la carta</h2><br>
			<form class="row g-3" action="#" name="form_eliminar_plato" method="post" class="form">
				<div class="col-auto">
					<input type="text" class="form-control" id="n_plato" name="nombre" placeholder="Nombre del plato" required>
				</div>
				<div class="col-auto">
					<input type="submit" class="btn btn-primary mb-3" name="eliminar" value="Eliminar Plato" class="boton_formulario">
				</div>
			</form>
		</div>
	</section>
	<?php
		include 'footer.php';
	?>
	<!--========== SCROLL ==========-->
	<script src="https://unpkg.com/scrollreveal"></script>
	<!--========== MAIN JS ==========-->
	<script src="../Vista/assets/js/vanilla.js"></script>
	<!--========== JAVASCRIPT BOOTSTRAP ==========-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
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