<?php
require_once '../clases/vehiculo.php';
$id_vehicu = $_GET['id'];
$eliminar = vehiculo::eliminar($id_vehicu);
if($eliminar){
    echo "no se pudo eliminar el vehiculo con el id= ".$id_vehicu;
}else{
    header('Location: ../Paginas/vehiculo.php');
}

?>