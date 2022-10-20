<?php

	session_start();
	include_once "../Modelo/usuario.php";
	

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

        <title>Al - Joleo: Contacto</title>
	</head>
<body>
	<!-- ChatBot -->
	<script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
	<df-messenger
		intent="WELCOME"
		chat-title="Asador"
		agent-id="1ad8dbb7-eab4-4909-a022-290ee41a7ffa"
		language-code="es">
	</df-messenger>
	<meta name="viewport">
<?php    
        // Carga el NAV
        include 'header.php';
?>
	<div class="contenedor_email w-100 p-3 d-flex justify-content-center mt-5">
		<section class="mailer w-25 p-3 mt-5">
				<h2>Contacta con nostros</h2>
				<br>
				</form> 
				<form method="POST" action="../Controlador/archivoMail.php" class="form">
					<div class="form-group">
						<label for="name">Nombre Usuario</label>
						<input type="text" name="name" class="form-control" id="name" >
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" name="email" class="form-control" id="email" >
					</div>
					<div class="form-group">
						<label for="asunto">Asunto</label>
						<input type="text" name="asunto" class="form-control" id="asunto" >
					</div>
					<div class="form-group">
						<label for="mensaje">Mensaje</label>
						<textarea class="form-control rounded-0" id="mensaje" rows="10" name="mensaje"></textarea>
					</div>
					<br>
					<button type="submit" name="Entrar" value="Enviar correo" class="btn boton-entrar btn-block mb-4">Enviar</button>
				</form>
		</section>
	</div>
	<?php
		include '../Vista/footer.php';
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

	}else{
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