<?php
require_once '../clases/estacionamiento.php';
$datos= array($_POST["nombre"],$_POST["direccion"],$_POST["horarionAbre"],$_POST["horarionCierre"],$_POST["id"]);
$estacionamiento = new Estacionamiento($datos[0],$datos[1],$datos[2],$datos[3],$datos[4]);
$estacionamiento->guardar();
if($estacionamiento){
    header('Location: ../Paginas/estacionamiento.php');
}else{
    echo "no se pudo modificar el estacionamiento con el id= ".$datos[4];
}

?>