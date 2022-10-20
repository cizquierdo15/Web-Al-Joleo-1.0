<?php
	//arranca la sesion
	session_start();
	include_once "../Modelo/usuario.php";
	include_once "../Modelo/funcionesBBDD.php";

    /*Se unserializa de la variable sesión USER para recuperar el objeto Usuario*/

  	if (isset($_SESSION['user'])) {
  		$Susuario=unserialize($_SESSION['user']);

  		$objEntrantes = getDatosEntrantes();
  		$objCarnes = getDatosCarnes();
  		$objPescados = getDatosPescados();
  		$objEspecialidades = getDatosEspecialidades();
  		$objEncargos = getDatosEncargos();
  		$objPostres = getDatosPostres();
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
        <link rel="stylesheet" href="./assets/css/styles.css">
        <title>Al - Joleo: Carta</title>
	</head>

<?php    
        include 'header.php';
	//en estilos pisar colocacion del footer y alto del main, no van a caber los platos
?>
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
	<div class = "contenedor_carta mt-10">
		<main>
			<h1 class="d-flex justify-content-center"> Elige y disfruta</h1>
			<p class="d-flex justify-content-center mt-5">"Que tu medicina sea tu alimento y tu alimento tu medicina " -(Hipócrates)</p>
			<div class="container mt-5">
				<section id="platos">
					<article id="entrantes">
						<div class="l_entrantes d-flex justify-content-center">
							<img src="../Vista/assets/img/paraPicar.jpg">
						</div>
						<?php
							//insertar objetos (platos) entrantes
							foreach ($objEntrantes as $entrante) {
						?>
								<div class="container d-flex justify-content-center mt-5 mb-5 w-100">
									<h3 class="col-lg-3 d-flex justify-content-left"><?php echo ($entrante->nombre);?>: </h3>
									<p class="col-lg-1 d-flex justify-content-center"><?php echo ($entrante->precio);?> €</p>
									<p class="col-lg-4 d-flex justify-content-left">Descripcion: <?php echo ($entrante->descripcion);?> </p>
									<p class="col-lg-2 d-flex justify-content-end"><strong>Alergenos:&nbsp </strong> <?php echo ($entrante->alergenos);?> </p>
									<br>
								</div>
						<?php	} ?>
						
					</article>
					<article id="carnes">
						<div class="l_carnes d-flex justify-content-center">
							<img src="../Vista/assets/img/carneBrasa.jpg">
						</div>
						<?php
							//insertar objetos (platos) carnes a la brasa
							foreach ($objCarnes as $carne) {
						?>
								<div class="container d-flex justify-content-center mt-5 mb-5 w-100">
									<h3 class="col-lg-3 d-flex justify-content-left"><?php echo ($carne->nombre);?></h3>
									<p class="col-lg-1 d-flex justify-content-center" ><?php echo ($carne->precio);?> €</p>
									<p class="col-lg-3 d-flex justify-content-left">Descripcion: <?php echo ($carne->descripcion);?></p>
									<p class="col-lg-3 d-flex justify-content-end"><strong>Alergenos:&nbsp </strong><?php echo ($carne->alergenos);?></p>									
									<br>
								</div>
						<?php	} ?>
					</article>
					<article id="pescados">
						<div class="l_pescados d-flex justify-content-center">
						<img src="../Vista/assets/img/pescadoBrasa.jpg">
						</div>
						<?php
							//insertar objetos (platos) carnes a la brasa
							foreach ($objPescados as $pescado) {
						?>
								<div class="container d-flex justify-content-center mt-5 mb-5 w-100">
									<h3 class="col-lg-3 d-flex justify-content-left"><?php echo ($pescado->nombre);?></h3>
									<p class="col-lg-1 d-flex justify-content-center"><?php echo ($pescado->precio);?> €</p>
									<p class="col-lg-3 d-flex justify-content-left">Descripcion: <?php echo ($pescado->descripcion);?></p>
									<p class="col-lg-3 d-flex justify-content-end"><strong>Alergenos:&nbsp </strong><?php echo ($pescado->alergenos);?></p>
									
									<br>
								</div>
						<?php	} ?>
					</article>
					<article id="especialidades">
						<div class="l_especialidades d-flex justify-content-center">
							<img src="../Vista/assets/img/Especialidades.jpg">
						</div>
						<?php
							//insertar objetos (platos) carnes a la brasa
							foreach ($objEspecialidades as $especialidad) {
						?>
								<div class="container d-flex justify-content-center mt-5 mb-5 w-100">
									<h3 class="col-lg-3 d-flex justify-content-left"><?php echo ($especialidad->nombre);?></h3>
									<p class="col-lg-1 d-flex justify-content-center"><?php echo ($especialidad->precio);?> €</p>
									<p class="col-lg-3 d-flex justify-content-left">Descripcion: <?php echo ($especialidad->descripcion);?></p>
									<p class="col-lg-3 d-flex justify-content-end"><strong>Alergenos:&nbsp </strong><?php echo ($especialidad->alergenos);?></p>
									
									<br>
								</div>
						<?php	} ?>
					</article>
					<article id="conReserva">
						<div class="l_conReserva d-flex justify-content-center">
							<img src="../Vista/assets/img/conReserva.png">
						</div>
						<?php
							//insertar objetos (platos) carnes a la brasa
							foreach ($objEncargos as $encargo) {
						?>
								<div class="container d-flex justify-content-center mt-5 mb-5 w-100">
									<h3 class="col-lg-3 d-flex justify-content-left"><?php echo ($encargo->nombre);?></h3>
									<p class="col-lg-1 d-flex justify-content-center"><?php echo ($encargo->precio);?> €</p>
									<p class="col-lg-3 d-flex justify-content-left">Descripcion: <?php echo ($encargo->descripcion);?></p>
									<p class="col-lg-3 d-flex justify-content-end"><strong>Alergenos:&nbsp </strong><?php echo ($encargo->alergenos);?></p>
									
									<br>
								</div>
						<?php	} ?>
					</article>
					<article id="postres">
						<div class="l_postres d-flex justify-content-center">
							<img src="../Vista/assets/img/postres.jpg">
						</div>
						<?php
							//insertar objetos (platos) carnes a la brasa
							foreach ($objPostres as $postre) {
						?>
								<div class="container d-flex justify-content-center mt-5 mb-0 w-100">
									<h3 class="col-lg-3 d-flex justify-content-left"><?php echo ($postre->nombre);?></h3>
									<p class="col-lg-1 d-flex justify-content-center"><?php echo ($postre->precio);?> €</p>
									<p class="col-lg-3 d-flex justify-content-left">Descripcion: <?php echo ($postre->descripcion);?></p>
									<p class="col-lg-3 d-flex justify-content-end"><strong>Alergenos:&nbsp </strong> <?php echo ($postre->alergenos);?></p>
									
									<br>
								</div>
						<?php	} ?>
					</article>
				</section>
			</div>
		</main>
	</div>
	<?php    
        // Carga el pie de pagina
        include 'footer.php';
	?>
</body>
	<!--========== SCROLL ==========-->
	<script src="https://unpkg.com/scrollreveal"></script>
	<!--========== MAIN JS ==========-->
	<script src="../Vista/assets/js/vanilla.js"></script>
	<!--========== JAVASCRIPT BOOTSTRAP ==========-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
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