<?php
require_once '../clases/ubicacion.php';
$id_ubica = $_GET['id'];
$ubicacion = ubicacion::buscarPorId($id_ubica);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>
    <div class="container  bg-light-subtle border border-dark-subtle rounded-3">
        <br>
                <div class="row justify-content-md-center">
                    <div class="col-md-3">  
                        <a href="../Paginas/ubicacion.php">
                        <button type="submit" class="btn btn-outline-primary btn-sm">volver</button>
                        </a>
                      </div>
                      <div class="col-md-6">
                        <h3>Agrgar Ubicacion</h3>
                        <br>
                     </div>
                    </div> 
        <div class="row justify-content-md-center">
            <div class="col-md-12 text-center">
              
                    <form class="form-horizontal" method="post" action="../queries/actualizarUbicacion.php">
                        <fieldset>
                        <div class="form-group">
                                
                                <div class="col-md-8">
                                    <input id="id" name="id" type="number" placeholder="id" class="form-control" 
                                    value="<?php echo $ubicacion['id'] ?>" readonly required>
                                </div>
                            </div>
    
                            <div class="form-group">
                                
                                <div class="col-md-8">
                                    <input id="nombre" name="nombre" type="text" placeholder="Nombre" class="form-control" 
                                    value="<?php echo $ubicacion['nombre'] ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8">
                                    <input id="estado" name="estado" type="number" placeholder="estado" class="form-control"
                                    value="<?php echo $ubicacion['estado'] ?>" required>
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <div class="col-md-8">
                                    <input id="piso" name="piso" type="number" placeholder="Piso" class="form-control"
                                    value="<?php echo $ubicacion['piso'] ?>" required>
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="col-md-8">
                                    <input id="plaza" name="plaza" type="text" placeholder="Plaza" class="form-control"
                                    value="<?php echo $ubicacion['lugarDeEstacionamiento'] ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8">
                                    <input id="estacionamiento" name="estacionamiento" type="number" placeholder="Estacionamiento" class="form-control"
                                    value="<?php echo $ubicacion['id_estacionamiento'] ?>" required>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>