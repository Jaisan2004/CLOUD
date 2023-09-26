<?php
require_once '../clases/estacionamiento.php';
$datos= array($_POST["nombre"],$_POST["direccion"],$_POST["horarionAbre"],$_POST["horarionCierre"]);
$estacionamiento = new Estacionamiento($datos[0],$datos[1],$datos[2],$datos[3]);
$estacionamiento->guardar();

?>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../ESTILOS/fondo.css">
    </head>
    <body>
        <br>
        <div class="container text-center bg-light-subtle border border-dark-subtle rounded-3">
            <div class="row">
                <div class="col">
            <?php echo $estacionamiento->getNombre() . ' se ha guardado correctamente con el id: ' . $estacionamiento->getId();?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                <a href="../Paginas/estacionamiento.php">
                <button type="submit" class="btn btn-primary btn-lg">Volver</button>
                </a>
                </div>
            </div>
        </div>
    </body>
</html>