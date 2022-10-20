<?php
//require '../Modelo/menu.php';  el archivo aun no existe

//Comprobar si nos envian datos del formulario de añadir plato
if (isset($_POST["carta"])) {
    /*
    //creamos ruta y la insertamos.
    include_once '../Modelo/funcionesBBDD.php';
    if(getDatosCarta(1)){
        $pepe = getDatosCarta(1);
        var_dump($pepe);
        //echo "muestra carta";
        echo $pepe[0]['nombre'];
        
         echo'<script type="text/javascript">
                           alert("Muestra Carta");
                          </script>';
    */

      $plato = new Plato($_POST["nombre"], $_POST["precio"], $_POST["alergenos"],$_POST["descripcion"]);
    
      $plato->insert();

}else {
    echo "esto revienta";  
}

?>
