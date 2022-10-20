<?php

	//acceso bd incluye la conf de base de datos desde el archivo xml
	include_once "accesoBD.php";
	//se incluye la clase de usuario ya que se necesitara crear un objeto en alguna funcion
	include_once "Usuario.php";

	//conexion a la BD
	function conectarADB(){
		//variables
		global $dbhost;
		global $dbname;
		global $dbusu;
		global $dbpass;
		//iniciamos la conex
		try {
			$dbcon = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbusu,$dbpass, array(PDO::ATTR_PERSISTENT => true));
			//si se conecta Establece los atributos en el manejador de la BD
			$dbcon->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		} catch (PDOException $e) {
			echo "droga conectar";
			echo "Fallo al conectar en la db ". $e->getMessage();
			die();
		}

		//var_dump("Conectas..."); 
		//var_dump($dbcon); die();
		return $dbcon;
	}


	//FUNCIONES USUARIO

	//fucion agrega usuario a la BD
	function agregarUsuario($usuario,$nombre,$apellidos,$email,$pass,$telefono){
		//variable a retornar, si agrega el usu cambia a true
		$respuesta=false;
		//por defecto son tipo 1, es el tipo de usu basico
		$tipo=1;
		$dbcon= conectarADB();
		try {
			//prepara la sentencia

			$sql = "INSERT INTO usuarios(login,nombre,apellido,email,pass,tlf,tipo) VALUES (:user, :name, :app, :mail, :pass, :tlf ,:tipo)";

			$consulta=$dbcon->prepare($sql);
			//pasamos los parametros

			$consulta->bindParam(':user',$usuario);
			$consulta->bindParam(':name',$nombre);
			$consulta->bindParam(':app',$apellidos);
			$consulta->bindParam(':mail',$email);
			$consulta->bindParam(':pass',$pass);
			$consulta->bindParam(':tlf',$telefono);
			$consulta->bindParam('tipo',$tipo);

			/* Testeos var_dump($consulta);
					   var_dump($sql);*/

			if($consulta->execute()){
				$respuesta=true;
				//$consulta->close();			
				$dbcon=null;
			}
		} catch (Exception $e) {
			//si falla vuelve atras antes de hacer la transaccion
			//$dbcon->rollBack();
			
			echo "Fallo ".$e->getMessage();
			die();
		}
		return $respuesta;		
	}

	//comprueba usuario, comprueba si el usuario existe en la BD y no esta borrado
	function comprobarUsuario($nusuario, $pass){
		$dbcon= conectarADB();
				
		$respuesta=false;
		$consulta=false;

		try {
			$sql="SELECT login , pass FROM usuarios WHERE login= :user AND pass= :pass";			
			$consulta = $dbcon->prepare($sql);
			
			$consulta -> bindParam(':user',$nusuario);
			$consulta -> bindParam(':pass',$pass);
			

			if ($consulta->execute()) {
				$respuesta=$consulta->fetchAll();
				$dbcon=null;
				
			}

		} catch (Exception $e) {
				//si falla vuelve atras antes de hacer la transaccion
				//$dbcon->rollBack();
				
				echo "Fallo ".$e->getMessage();
				die();
			}
		
		return ($respuesta);
	}

	function usuarioRepetido($nusuario){
        $dbcon= conectarADB();
        $respuesta=false;
        try {
            $sql="SELECT login FROM usuarios WHERE login= :user";
            $consulta = $dbcon->prepare($sql);

            $consulta -> bindParam(':user',$nusuario);

            if ($consulta->execute()) {
                $respuesta=$consulta->fetchAll();
                $dbcon=null;
            }

        } catch (Exception $e) {
                //si falla vuelve atras antes de hacer la transaccion
                //S$dbcon->rollBack();
                echo "Fallo ".$e->getMessage();
                die();
            }
        return ($respuesta);
    }



	//get id  del usuario con el nombre del usuario
	function getIdUsuario($usuario){
			$dbcon= conectarADB();
			try {
				//prepara la sentencia
				$sql= "SELECT id_usuario FROM usuarios WHERE login = :user";
				$consulta=$dbcon->prepare($sql);
				//poner parametros
				$consulta->bindParam(':user',$usuario);

				if($consulta->execute()){
					$respuesta=$consulta->fetchAll();
					$dbcon=null;
				}
					
			} catch (Exception $e) {
				//si falla vuelve atras antes de hacer la transaccion
				//$dbcon->rollBack();
				$respuesta = "fallo";
				echo "Fallo ".$e->getMessage();
				die();
			}
			return ($respuesta);
	}

	//funcion datos usuario
	function getDatosUsu($id){
		$dbcon= conectarADB();
		try {
			$sql="SELECT * FROM usuarios WHERE id_usuario =:id";
			//por cada ? , un elemento del array si se ejecuta la consulta guarda los resultados en un array
			$consulta=$dbcon->prepare($sql);
			$consulta->bindParam(':id', $id);

			if ($consulta->execute()) {
				$guarda=$consulta->fetchAll(PDO::FETCH_ASSOC);
				$dbcon=null;
			}			
		} catch (Exception $e) {
			//$dbcon->rollBack();
			echo "Fallo ".$e->getMessage();
			die();
		}
		return $guarda;
	}

	//Funciones Carta

	//funcion get datos carta devuelve array con todos los datos del plato que queramos
	function getDatosCarta($id){
		$dbcon= conectarADB();
		try {
			$sql="SELECT * FROM menu WHERE id_plato =:id";
			$consulta=$dbcon->prepare($sql);
			$consulta->bindParam(':id', $id);
			
			if($consulta->execute()){
				$guarda=$consulta->fetchAll(PDO::FETCH_ASSOC);	
				$dbcon=null;	
			}
		} catch (Exception $e) {
			//$dbcon->rollBack();
			echo "Fallo ".$e->getMessage();
			die();
		}
		return $guarda;
	}


	//Funciones de platos

	//fucion agrega plato a la BD
	function agregarPlato($tipo, $nombre, $precio, $alergenos, $descripcion){
		//variable a retornar, si agrega el plato 
		$respuesta=false;
		
		$dbcon= conectarADB();
		try {
			//prepara la sentencia

			$sql = "INSERT INTO menu(tipo,nombre,precio,alergenos,descripcion) VALUES (:tipo, :nombre, :precio, :alergenos, :descripcion)";

			$consulta=$dbcon->prepare($sql);
			//pasamos los parametros

			$consulta->bindParam(':tipo',$tipo);
			$consulta->bindParam(':nombre',$nombre);
			$consulta->bindParam(':precio',$precio);
			$consulta->bindParam(':alergenos',$alergenos);
			$consulta->bindParam(':descripcion',$descripcion);

			if($consulta->execute()){
				$respuesta=true;
				//$consulta->close();			
				$dbcon=null;
			}
		} catch (Exception $e) {
			//si falla vuelve atras antes de hacer la transaccion
			//$dbcon->rollBack();
			
			echo "Fallo ".$e->getMessage();
			die();
		}
		return $respuesta;		
	}

	//funcion comprobar nombre de plato en bd
	function platoRepetido($nPlato){
        $dbcon= conectarADB();
        $respuesta=false;
        try {
            $sql="SELECT nombre FROM menu WHERE nombre= :nPlato";
            $consulta = $dbcon->prepare($sql);

            $consulta -> bindParam(':nPlato',$nPlato);

            if ($consulta->execute()) {
                $respuesta=$consulta->fetchAll();
                $dbcon=null;
            }

        } catch (Exception $e) {
                //si falla vuelve atras antes de hacer la transaccion
                //S$dbcon->rollBack();
                echo "Fallo ".$e->getMessage();
                die();
            }
        return ($respuesta);
    }
    //fun eliminar
    function borrarPlato($nPlato){
		//variable a retornar, si agrega el usu cambia a true
		$respuesta=false;
		$dbcon = conectarADB();
		try {
			//Preparar sentencia
			$sql = "DELETE FROM menu  WHERE nombre= :nPlato";
			$consulta = $dbcon->prepare($sql);
			//pasar parametros
			$consulta -> bindParam(':nPlato',$nPlato);

			if ($consulta->execute()) {
				$respuesta = true;
				$dbcon=null;
			}		
		} catch (Exception $e) {
			//$dbcon->rollBack();
			echo "Error ".$e->getMessage();
			die();
		}
		return $respuesta;
	}


    //funciones de carta

	//funcion que trae todos los entrantes como un array de objs
	function getDatosEntrantes(){
		$dbcon= conectarADB();
		try {
			$sql="SELECT * FROM menu WHERE tipo = 'entrante' ";
			$consulta=$dbcon->prepare($sql);
			
			if($consulta->execute()){
				$guarda=$consulta->fetchAll(PDO::FETCH_OBJ);	
				$dbcon=null;	
			}
		} catch (Exception $e) {
			//$dbcon->rollBack();
			echo "Fallo ".$e->getMessage();
			die();
		}
		return $guarda;
	}

	function getDatosCarnes(){
		$dbcon= conectarADB();
		try {
			$sql="SELECT * FROM menu WHERE tipo = 'carne' ";
			$consulta=$dbcon->prepare($sql);
			
			if($consulta->execute()){
				$guarda=$consulta->fetchAll(PDO::FETCH_OBJ);	
				$dbcon=null;	
			}
		} catch (Exception $e) {
			//$dbcon->rollBack();
			echo "Fallo ".$e->getMessage();
			die();
		}
		return $guarda;
	}

	function getDatosPescados(){
		$dbcon= conectarADB();
		try {
			$sql="SELECT * FROM menu WHERE tipo = 'pescado' ";
			$consulta=$dbcon->prepare($sql);
			
			if($consulta->execute()){
				$guarda=$consulta->fetchAll(PDO::FETCH_OBJ);	
				$dbcon=null;	
			}
		} catch (Exception $e) {
			//$dbcon->rollBack();
			echo "Fallo ".$e->getMessage();
			die();
		}
		return $guarda;
	}

	function getDatosEspecialidades(){
		$dbcon= conectarADB();
		try {
			$sql="SELECT * FROM menu WHERE tipo = 'especialidades' ";
			$consulta=$dbcon->prepare($sql);
			
			if($consulta->execute()){
				$guarda=$consulta->fetchAll(PDO::FETCH_OBJ);	
				$dbcon=null;	
			}
		} catch (Exception $e) {
			//$dbcon->rollBack();
			echo "Fallo ".$e->getMessage();
			die();
		}
		return $guarda;
	}

	function getDatosEncargos(){
		$dbcon= conectarADB();
		try {
			$sql="SELECT * FROM menu WHERE tipo = 'encargo' ";
			$consulta=$dbcon->prepare($sql);
			
			if($consulta->execute()){
				$guarda=$consulta->fetchAll(PDO::FETCH_OBJ);	
				$dbcon=null;	
			}
		} catch (Exception $e) {
			//$dbcon->rollBack();
			echo "Fallo ".$e->getMessage();
			die();
		}
		return $guarda;
	}

	function getDatosPostres(){
		$dbcon= conectarADB();
		try {
			$sql="SELECT * FROM menu WHERE tipo = 'postre' ";
			$consulta=$dbcon->prepare($sql);
			
			if($consulta->execute()){
				$guarda=$consulta->fetchAll(PDO::FETCH_OBJ);	
				$dbcon=null;	
			}
		} catch (Exception $e) {
			//$dbcon->rollBack();
			echo "Fallo ".$e->getMessage();
			die();
		}
		return $guarda;
	}


	//funciones reserva

	//funcion añadir reserva a bd   falta meter el usuario con la sesion
	function reservarMesa($num , $usu , $fecha ,$mensaje){
		$dbcon= conectarADB();
		try {
			$sql="UPDATE reserva SET estado_reserva = 'ocupado' , fecha_reserva = current_timestamp , fecha_comida = :fech , mensaje_reserva = :msj , n_usuario = :usu WHERE id_reserva= :num  ";
			$consulta=$dbcon->prepare($sql);

			$consulta->bindParam(':num',$num);
			$consulta->bindParam(':usu',$usu);
			$consulta->bindParam(':fech',$fecha);
			$consulta->bindParam(':msj',$mensaje);
			
			if($consulta->execute()){
				$guarda=true;	
				$dbcon=null;	
			}
		} catch (Exception $e) {
			//$dbcon->rollBack();
			echo "Fallo ".$e->getMessage();
			die();
		}
		return $guarda;
	}

	//fun comprueba mesa resevada
	function compruebaMesaLibre($num){
		$dbcon= conectarADB();
		$salida=false;
		try {
			$sql="SELECT * FROM reserva WHERE id_reserva = :num AND estado_reserva = 'libre' ";
			$consulta=$dbcon->prepare($sql);

			$consulta->bindParam(':num',$num);
			
			if($consulta->execute()){
				$respuesta=$consulta->fetchAll();
                if (sizeof($respuesta) >= 1) {  $salida = true;  }
				$dbcon=null;	
			}
		} catch (Exception $e) {
			//$dbcon->rollBack();
			echo "Fallo ".$e->getMessage();
			die();
		}
		return $salida;
	}


?>