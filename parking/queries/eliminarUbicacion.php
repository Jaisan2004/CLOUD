<?php
require_once '../clases/ubicacion.php';
$id_ubica = $_GET['id'];
$eliminar = ubicacion::eliminar($id_ubica);
if($eliminar){
    echo "no se pudo eliminar la ubicacion con id= ".$ubicacion;
}else{
    header('Location: ../Paginas/ubicacion.php');
}

?>