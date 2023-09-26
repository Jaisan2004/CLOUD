<?php
require_once '../clases/usuario.php';
$datos= array($_POST["usuario"],$_POST["password"]);
$usuario = usuario::iniciarSesion($datos[0],$datos[1]);
if($usuario==1){
    header('Location: ../Paginas/home.html');
}else{
    echo '<script>alert("No se pudo iniciar sesión. Verifique sus credenciales.");</script>';
    echo '<script>window.location.href = "../index.html";</script>';
}

?>