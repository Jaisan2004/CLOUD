<?php
require_once '../clases/vehiculo.php';
$id_vehicu = $_GET['id'];
$vehiculo = vehiculo::buscarPorId($id_vehicu);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Vehículo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../ESTILOS/fondo.css">
</head>
<body>
    <div class="container  bg-light-subtle border border-dark-subtle rounded-3">
        <br>
        <div class="row justify-content-md-center">
        <div class="col-md-3">  
            <a href="../Paginas/vehiculo.php">
            <button type="submit" class="btn btn-outline-primary btn-sm">volver</button>
            </a>
            </div>
            <div class="col-md-6">
                <h3>Agrgar Vehículo</h3>
                <br>
            </div>
        </div> 
        <div class="row justify-content-md-center">
            <div class="col-md-12 text-center">
                    <form class="form-horizontal" method="post" action="../queries/actualizarVehiculo.php"> 
                    <div class="form-group">
                                
                                <div class="col-md-8">
                                    <input id="id" name="id" type="text" placeholder="id" class="form-control"
                                    value="<?php echo $vehiculo['id'] ?>" readonly required>
                                </div>
                            </div>  
                            <div class="form-group">
                                
                                <div class="col-md-8">
                                    <input id="modelo" name="modelo" type="text" placeholder="Modelo" class="form-control"
                                    value="<?php echo $vehiculo['modelo'] ?>" required>
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <div class="col-md-8">
                                    <input id="marca" name="marca" type="text" placeholder="Marca" class="form-control"
                                    value="<?php echo $vehiculo['marca'] ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8">
                                    <input id="color" name="color" type="text" placeholder="Color" class="form-control"
                                    value="<?php echo $vehiculo['color'] ?>" required>
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="col-md-8">
                                    <input id="placa" name="placa" type="text" placeholder="Placa" class="form-control"
                                    value="<?php echo $vehiculo['placa'] ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8">
                                    <input id="tipo" name="tipo" type="number" placeholder="Tipo de vehiculo" class="form-control"
                                    value="<?php echo $vehiculo['id_tipo_vehiculo'] ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8">
                                    <input id="duenio" name="duenio" type="number" placeholder="id propietario" class="form-control"
                                    value="<?php echo $vehiculo['id_duenio'] ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <br>
                                    <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                                </div>
                                <br>
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        
    </div>
    <footer id="creditos">
        <p >Trabajo realizado por: JOSE FELIPE CARVAJAL y SANTIAGO JAIMES</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>