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
			<!--========== JQUERY ==========-->
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
			<!--========== BOOTSTRAP ==========-->
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
			<!--========== CSS ==========-->
			<link rel="stylesheet" href="../Vista/assets/css/styles.css">

			<title>Al - Joleo: Instalaciones</title>
		</head>
<body>
<?php    
        // Carga el pie de pagina
        include 'header.php';
	?>
	<!-- ChatBot -->
	<script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
	<df-messenger
		intent="WELCOME"
		chat-title="Asador"
		agent-id="1ad8dbb7-eab4-4909-a022-290ee41a7ffa"
		language-code="es">
	</df-messenger>
	<meta name="viewport">
	<main>
		<div class="instalaciones_contenedor">
			<div class='container d-flex justify-content-center align-items-center '>
				<div id="carouselExampleControls" class="carousel slide w-90 rounded" data-bs-ride="carousel">
					<div class="carousel-inner rounded">
						<div class="carousel-item active ">
							<img src="../Vista/assets/img/exteriorTamano3.jpg" class="d-block w-100" alt="...">
						</div>
						<div class="carousel-item rounded">
							<img src="../Vista/assets/img/cartel.jpg" class="d-block w-100" alt="...">
						</div>
						<div class="carousel-item rounded">
							<img src="../Vista/assets/img/exteriorTamano.jpg" class="d-block w-100" alt="...">
						</div>
						<div class="carousel-item rounded">
							<img src="../Vista/assets/img/exteriorTamano2.jpg" class="d-block w-100" alt="...">
						</div>
						<div class="carousel-item rounded">
							<img src="../Vista/assets/img/tamano.jpg" class="d-block w-100" alt="...">
						</div>
						<div class="carousel-item rounded">
							<img src="../Vista/assets/img/exteriorTamano4.jpg" class="d-block w-100" alt="...">
						</div>
					</div>
					<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Imagen Anterior</span>
					</button>
					<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Siguiente Imagen</span>
					</button>
				</div>
			</div>
			<br/>
			<div class="container w-50 d-flex justify-content-center align-items-center mt-4 mb-4">
				<h2>Nuestras instalaciones</h2>
	  		</div>
			<div class="container w-50 d-flex justify-content-center align-items-center mt-4 mb-4">
				<p>Desde 2005, Asador Al-Joleo es uno de los restaurantes de referencia de la zona, reconocido como tal por los clientes que cada día vienen a nuestro local. Empezamos como un restaurante típico extremeño, con el tiempo hemos ido ampliando nuestra carta para poder cubrir las necesidades de todas y cada una de las personas que nos visitan.</p>
	  		</div>
			<div class="container w-50 d-flex justify-content-center align-items-center mt-0 mb-4">
				<p>Aunque nuestras especialidades son los asados de cordero y cochinillo en horno de leña y las carnes rojas a la brasa, puedes optar por nuestros deliciosos arroces o pescados.</p>
			</div>
			<div class="container w-50 d-flex  align-items-center mt-0 mb-4">
				<p>Ideal para comidas en el día a día o para celebraciones especiales en nuestro salón privado.</p><br/>
			</div>
			<div class="container w-50 d-flex justify-content-center align-items-center mt-4">
				<p>Disponemos tanto de un comedor en exterior en el que se puede disfrutar de nuestros platos a la par de la naturaleza que nos rodea, como de un comedor en interior climatizado tanto para los días de frio o calor. </p>
			</div>
		</div>
	</main>
<?php    
        // Carga el pie de pagina
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