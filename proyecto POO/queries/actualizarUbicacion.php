<?php
require_once '../clases/ubicacion.php';
$datos= array($_POST["nombre"],$_POST["estado"],$_POST["piso"],$_POST["plaza"],$_POST["estacionamiento"],$_POST["id"]);
$ubicacion = new ubicacion($datos[0],$datos[1],$datos[2],$datos[3], $datos[4], $datos[5]);
$ubicacion->guardar();
if($ubicacion){
    header('Location: ../Paginas/ubicacion.php');
}else{
    echo "no se pudo modificar el estacionamiento con el id= ".$datos[5];
}

?>