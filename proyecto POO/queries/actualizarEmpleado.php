<?php
require_once '../clases/empleado.php';
$datos= array($_POST["nombre"],$_POST["apellido"],$_POST["cedula"],$_POST["correo"],$_POST["entrada"],$_POST["salida"],
$_POST["estacionamiento"], $_POST['id']);
$empleado = new empleado($datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5],$datos[6],$datos[7]);
$empleado->guardar();
if($empleado){
    header('Location: ../Paginas/empleado.php');
}else{
    echo "no se pudo modificar el empleado con el id= ".$datos[7];
}
 ?>
