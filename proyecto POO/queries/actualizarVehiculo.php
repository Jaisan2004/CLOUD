<?php
require_once '../clases/vehiculo.php';
$datos= array($_POST["modelo"],$_POST["marca"],$_POST["placa"],$_POST["color"],$_POST["tipo"],$_POST["duenio"],$_POST["id"]);
$vehiculo = new vehiculo($datos[0],$datos[1],$datos[2],$datos[3], $datos[4], $datos[5], $datos[6]);
$vehiculo->guardar();
if($vehiculo){
    header('Location: ../Paginas/vehiculo.php');
}else{
    echo "no se pudo modificar la informacion del vehiculo con id= ".$datos[6];
}
?>