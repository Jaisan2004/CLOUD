<?php
require_once '../clases/cliente.php';
$id = $_GET['id'];
$eliminar = cliente::eliminar($id);
if($eliminar){
    echo "no se pudo eliminar el cliente con el id= ".$id;
}else{
    header('Location: ../Paginas/cliente.php');
}

?>