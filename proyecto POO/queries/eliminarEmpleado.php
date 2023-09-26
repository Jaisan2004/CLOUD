<?php
require_once '../clases/empleado.php';
$id_emplea = $_GET['id'];
$eliminar = empleado::eliminar($id_emplea);

if($eliminar){
    echo "no se pudo eliminar el empleado con id = ".$id_emplea;
}else {
    header('Location: ../Paginas/empleado.php');
}

?>