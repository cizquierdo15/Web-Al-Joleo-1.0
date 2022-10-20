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

        <title>Al - Joleo: Registro</title>
	</head>

<body>
  <section class="text-center text-lg-start">
        <div class="container py-4 mt-5">
          <div class="row g-0 align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
              <div class="card cascading-right">
                <div class="card-body p-5 shadow-5 text-center">
                  <h2 class="fw-bold mb-5">Registrarse</h2>
                  <form class="formulario_etiqueta" method="post" name="form_registro">
                    <!-- Input de usuario -->
                    <div class="form-outline mb-4">
                    <label class="form-label" for="login">Nombre de Usuario</label>
                      <input type="text" id="login" class="form-control" type="text" name="login" placeholder="Nombre de Usuario" required/>                
                    </div>
                    <!-- Input de nombre -->
                    <div class="form-outline mb-4">
                    <label class="form-label" for="nombre">Nombre</label>
                      <input type="text" id="nombre" class="form-control" type="password" name="nombre" placeholder="Nombre" required/>                
                    </div>
                    <br>
                    <!-- Input de apellido -->
                    <div class="form-outline mb-4">
                    <label class="form-label" for="apellido">Apellidos</label>  
                      <input type="text" id="apellido" class="form-control" type="password" name="apellido" placeholder="Apellidos" pattern="[A-Za-z]+{3,30}" required/>                
                    </div>
                    <br>
                    <!-- Input de email -->
                    <div class="form-outline mb-4">
                    <label class="form-label" for="email">Email</label>  
                      <input type="email" id="email" class="form-control" name="email" placeholder="Email" required/>                
                    </div>
                    <br>
                    <!-- Input de telefono -->
                    <div class="form-outline mb-4">
                    <label class="form-label" for="tlf">Teléfono</label>  
                      <input type="text" id="tlf" class="form-control" name="tlf" placeholder="Teléfono de contacto" required/>                
                    </div>
                    <br>
                    <!-- Input de telefono -->
                    <div class="form-outline mb-4">
                    <label class="form-label" for="pass">Contraseña</label>  
                      <input type="password" id="pass" class="form-control" name="pass" required/>                
                    </div>
                    <br>          
                    <!-- Boton entrar login -->
                    <div class="div-boton">
                              <button type="submit" name="Entrar" value="Registrarse" class="btn boton-entrar btn-block mb-4">Registrarse</button>
                    </div>
                    <!-- Otros botones -->
                    <div class="text-center">
                      <p><a href="../Controlador/loginUsuario.php">Volver a Login</a></p>                                       
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-6 mb-5 mb-lg-0">
            <img src="../Vista/assets/img/logoFinalConShadow3.png" alt="" class="logo_index">
            </div>
          </div>
        </div>
      </section>
</body>

		<!--========== SCROLL ==========-->
	<script src="https://unpkg.com/scrollreveal"></script>
	<!--========== MAIN JS ==========-->
	<script src="../Vista/assets/js/vanillaLoginRegister.js"></script>
	<!--========== JAVASCRIPT BOOTSTRAP ==========-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>