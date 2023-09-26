<?php
require_once '../clases/empleado.php';
$id_emplea = $_GET['id'];
$empleado = empleado::buscarPorId($id_emplea);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../ESTILOS/fondo.css">
</head>
<body>
    <br>
    <div class="container  bg-light-subtle border border-dark-subtle rounded-3">
        <br>
        <div class="row">
        <div class="col-md-3 text-center"><a href="../Paginas/empleado.php">
            <button type="submit" class="btn btn-outline-primary btn-sm">Volver</button>
            </a></div>    
        <div class="col-md-6 text-center"><h3>Actualizar Empleado</h3></div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-12 text-center">
                    <form action="../queries/actualizarEmpleado.php" class="form-horizontal" method="post">
                        <fieldset>
                        <div class="form-group text-center">
                                
                                <div class="col-md-8">
                                    <input id="id" name="id" type="number" placeholder="id" class="form-control"
                                    value="<?php echo $empleado['id']?>" readonly required>
                                </div>
                            </div>

                            <div class="form-group text-center">
                                
                                <div class="col-md-8">
                                    <input id="nombre" name="nombre" type="text" placeholder="Nombre" class="form-control"
                                    value="<?php echo $empleado['nombre']?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8">
                                    <input id="apellido" name="apellido" type="text" placeholder="Apellido" class="form-control"
                                    value="<?php echo $empleado['apellido']?>" required>
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="col-md-8">
                                    <input id="cedula" name="cedula" type="number" placeholder="Cédula" class="form-control"
                                    value="<?php echo $empleado['cedula']?>" required>
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="col-md-8">
                                    <input id="correo" name="correo" type="email" placeholder="Correo Electrónico" class="form-control"
                                    value="<?php echo $empleado['correo']?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8">
                                    <input id="entrada" name="entrada" type="time" placeholder="hora de entrada" class="form-control"
                                    value="<?php echo $empleado['horarioEntrada']?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8">
                                    <input id="salida" name="salida" type="time" placeholder="hora de salida" class="form-control"
                                    value="<?php echo $empleado['horarioSalida']?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8">
                                    <input id="estacionamiento" name="estacionamiento" type="number" placeholder="Estacionamiento" class="form-control"
                                    value="<?php echo $empleado['id_estacionamiento']?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <br>
                                    <button type="submit" class="btn btn-primary btn-lg">Modificar</button>
                                    
                                </div>
                            </div>
                            <br>
                        </fieldset>
                    </form>
                </div>
            </div>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>