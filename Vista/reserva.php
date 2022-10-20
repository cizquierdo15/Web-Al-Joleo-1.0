<?php
	//arranca la sesion
	session_start();
	include_once "../Modelo/usuario.php";

    	/*Se unserializa de la variable sesión USER para recuperar el objeto Usuario*/
  	if (isset($_SESSION['user'])) {
  		$Susuario=unserialize($_SESSION['user']);
  		$id_usuario = $Susuario[0]["login"];
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
	
		<title>Reserva de mesa</title>	
		<style type="text/css">
			table {
				margin:30px auto;
				width: 50%;
				height: 300px;
				border-radius: 7px;
			}

			td{
				background-color: peru;
				border-radius: 7px;
				height: 55px;
			}

			td:hover{
				background-color: tomato;
			}

			.respuesta , #idUsuario{
				display: none;
			}
		</style>
	</head>
	<body>
<?php    
        // Carga el pie de pagina
        include 'header.php';
?>
	<!--========== PRUEBA API ========-->
<?php
//Aquí usamos servicio web para obtener los datos en tiempo real de la zona del asador
require_once "../Controlador/funcionTiempo.php";
$arrayTiempo = tiempoZona(); 
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
	<div class="contenedor_reserva">
		<main>
			<h1 class="d-flex justify-content-center align-items-center"> Reserva una mesa del comedor</h1>
			<table border="1" class="tabla_reserva">
		            <tr id="fila_0">
		                <td id="id_0_0" class="imagen_mesa"><img src="../Vista/assets/img/mesa.jpg" ></td> 
		                <td id="id_0_1" class='td_hidden'></td> 
		                <td id="id_0_2" class="imagen_mesa"><img src="../Vista/assets/img/mesa.jpg" ></td> 
		                <td id="id_0_3" class='td_hidden'></td> 
		                <td id="id_0_4" class="imagen_mesa"><img src="../Vista/assets/img/mesa.jpg" ></td> 
		              
		            </tr>
		            <tr id="fila_1">
		                <td id="id_1_0" class='td_hidden'></td> 
		                <td id="id_1_1" class='td_hidden'></td> 
		                <td id="id_1_2" class='td_hidden'></td> 
		                <td id="id_1_3" class='td_hidden'></td> 
		                <td id="id_1_4" class='td_hidden'></td> 
		               
		            </tr>
		            <tr id="fila_2">
		                <td id="id_2_0" class="imagen_mesa"><img src="../Vista/assets/img/mesa.jpg" ></td> 
		                <td id="id_2_1" class='td_hidden'></td> 
		                <td id="id_2_2" class="imagen_mesa"><img src="../Vista/assets/img/mesa.jpg" ></td> 
		                <td id="id_2_3" class='td_hidden'></td> 
		                <td id="id_2_4" class="imagen_mesa"><img src="../Vista/assets/img/mesa.jpg" ></td> 
		                 
		            </tr>
		            <tr id="fila_3">
		                <td id="id_3_0" class='td_hidden'></td> 
		                <td id="id_3_1" class='td_hidden'></td> 
		                <td id="id_3_2" class='td_hidden'></td> 
		                <td id="id_3_3" class='td_hidden'></td> 
		                <td id="id_3_4" class='td_hidden'></td> 
		          
		            </tr>
		            <tr id="fila_4">
		                <td id="id_4_0" class="imagen_mesa"><img src="../Vista/assets/img/mesa.jpg"></td> 
		                <td id="id_4_1" class='td_hidden'></td> 
		                <td id="id_4_2" class="imagen_mesa"><img src="../Vista/assets/img/mesa.jpg" ></td> 
		                <td id="id_4_3" class='td_hidden'></td> 
		                <td id="id_4_4" class="imagen_mesa"><img src="../Vista/assets/img/mesa.jpg"></td> 
		                 
		            </tr>       
		        </table>
				<div class="container mt-0 d-flex justify-content-center align-items-center w-100">
					<div class="row g-0 d-flex justify-content-center align-items-center w-100">
						<div class="col-lg-6 mb-5 mb-lg-0 ">
							<form action="../Controlador/reserva_Mesa.php" name="form_datosMesa" method="post">
								<input type="text" name="idUsu" id="idUsuario" value="<?php echo $id_usuario ?>">
								<input type="text" name="numMesa" id="nMesa" class="respuesta">						
								<label for="fecha_reserva"> Elige el dia para reservar tu mesa: </label>
								<input type="date" name="fecha_reserva" required>
								<textarea class="form-control rounded-0" id="mensaje" rows="3" name="mensaje" placeholder="Comentarios adicionales para la reserva (Platos a reservar...)"></textarea>
								</br>
								<button type="submit" class="btn btn-primary btn-lg" name="reservaMesa" value="Reservar Mesa Seleccionada">Reservar Mesa Seleccionada</button>
							</form>
						</div>
						<div class="col-lg-4 mb-0 mb-lg-5 d-flex justify-content-center align-items-center w-100">
							<div class="clima ml-5 ">
								<?php $temperatura=$arrayTiempo[0] - 273;?>
								<h4> Tiempo Actual <img src="../Vista/assets/img/sol.png" style="width:45px;" class="icon ml-3"></h4>
								<p><?php echo "Temperatura <b>".$temperatura ." grados</b><br>";?></p>
								<p><?php echo "Humedad <b>".$arrayTiempo[3]."%</b><br>"; ?></p>
								<p><?php echo "Viento <b>".$arrayTiempo[6]." km/h</b><br>"; ?></p>
            						</div>
						</div>
					</div>
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
	<script src="../Vista/assets/js/reserva.js" defer></script>
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