<?php
    require_once '../clases/cliente.php';
    $id = $_GET['id'];
    $cliente = cliente::buscarPorId($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Cliente </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../ESTILOS/fondo.css"> 
</head>
<body>
    <br>
    <div class="container  bg-light-subtle border border-dark-subtle rounded-3">
        <br>
        <div class="row">
        <div class="col-md-3 text-center"><a href="../Paginas/cliente.php">
            <button type="submit" class="btn btn-outline-primary btn-sm">Volver</button>
            </a></div>    
        <div class="col-md-6 text-center"><h3>Actualizar Cliente</h3></div>
        <br>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-12 text-center">
                <br>
                    <form action="../queries/actualizarCliente.php" class="form-horizontal" method="post">
                        <fieldset>
                        <div class="form-group">
                                <div class="col-md-8">
                                    <input id="id" name="id" type="text" placeholder="id" class="form-control"
                                    value="<?php echo $cliente['id']?>" readonly required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8">
                                    <input id="nombre" name="nombre" type="text" placeholder="Nombre" class="form-control"
                                    value="<?php echo $cliente['nombre']?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8">
                                    <input id="apellido" name="apellido" type="text" placeholder="Apellido" class="form-control"
                                    value="<?php echo $cliente['apellido']?>" required>
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="col-md-8">
                                    <input id="edad" name="edad" type="number" placeholder="Edad" class="form-control"
                                    value="<?php echo $cliente['edad']?>" required>
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="col-md-8">
                                    <input id="cedula" name="cedula" type="number" placeholder="Cédula" class="form-control"
                                    value="<?php echo $cliente['cedula']?>" required>
                                </div>
                            </div>

    
                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <br>
                                    <button type="submit" class="btn btn-primary btn-lg">Modificar</button>
                                    <br>
                                </div>
                            </div>
                        </fieldset>
                        <br>
                    </form>
                </div>
            </div>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>