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
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <title>Al - Joleo: Nuevo Plato</title>
	</head>
	<?php    
        // Carga el NAV
        include 'header.php';
	?>
<body>
	<section class="principal">
		<div class="contenedor_principal px-1 py-5 mx-auto justify-content-center">
			<div class="contenedor_secundario d-flex justify-content-center">
				<div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
					<div class="menu">
						<h4 class="text-center mb-4">Registro de nuevo plato</h4>
						<form action="#" name="form_nuevo_plato" method="post" class="form">
							<div class="row justify-content-between text-left">
								<div class="form-group col-sm-6 flex-column d-flex">
								<label class="labels px-3">Tipo de plato<span class="text-danger"> *</span></label> 
									<select class="form-select form-select-lg" aria-label=".form-select-lg example" id="t_plato" name="tipo" required>
										<option value="entrante">Entrante</option>
										<option value="carne">Carne</option>
										<option value="especialidades">Especialidades</option>
										<option value="pescado">Pescado</option>
										<option value="encargo">Encargo</option>
										<option value="postre">Postre</option>
									</select>
								</div>
								<div class="form-group col-sm-6 flex-column d-flex"> <label class="labels px-3">Nombre del plato<span class="text-danger"> *</span></label> <input type="text"  name="nombre" id="n_plato" placeholder="introduce el nombre del plato" required> </div>
							</div>
							<div class="row justify-content-between text-left">
																																										
								<div class="form-group col-sm-6 flex-column d-flex"> <label class="labels px-3">Precio<span class="text-danger"> *</span></label> <input type="number" name="precio" id="p_plato" min="0" placeholder="Precio del plato" required> </div>
																																											
								<div class="form-group col-sm-6 flex-column d-flex"> <label class="labels px-3">Alergenos<span class="text-danger"> *</span></label> <input type="text" name="alergenos" id="a_plato" placeholder="Alergenos del Plato" required> </div>
							</div>
							<div class="row justify-content-between text-left">
																																										
								<div class="form-group col-sm-6 flex-column d-flex"> <label class="labels px-3">Descripcion<span class="text-danger"> *</span></label> <input type="text" name="descripcion" id="d_plato" placeholder="Descripción del plato" required> </div>
							</div>
							<div class="row justify-content-end">
								<div class="form-group col-sm-6"> <input type="submit" name="añadir" class="btn-block btn-primary" value="Añadir plato al menu"/> </div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section> 
	<?php
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
