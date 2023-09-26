<?php
require_once '../clases/cliente.php';
$datos= array($_POST["nombre"],$_POST["apellido"],$_POST["cedula"],$_POST["edad"],$_POST["id"]);
$cliente = new cliente($datos[0],$datos[1],$datos[2],$datos[3],$datos[4]);
$cliente->guardar();
if($cliente){
    header('Location: ../Paginas/cliente.php');
}else{
    echo "no se pudo modificar al cliento con el id= ".$datos[4];
}

?>