<?php
require_once '../clases/estacionamiento.php';
$id_estac = $_GET['id'];
$eliminar = estacionamiento::eliminar($id_estac);
if($eliminar){
    header('Location: ../Paginas/estacionamiento.php');
}

?>