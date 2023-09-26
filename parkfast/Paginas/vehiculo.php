<?php
 require_once '../clases/vehiculo.php';
 $vehiculo = vehiculo::recuperarTodos();
?>
<html>
   <head>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="../ESTILOS/fondo.css">
   <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
   <title>Estacionamientos</title>
   </head>
   <body>
      <ul>
      <br>
    <div class="container text-center bg-light-subtle border border-dark-subtle rounded-3">
      <br>
        <div class="row">
        <div class="col-md-3">  
            <a href="../formularios/clientes.html">
            <button type="submit" class="btn btn-outline-primary btn-sm">volver</button>
            </a>
          </div>
          <div class="col-md-6">
            <h3>Vehiculos</h3>
         </div>
         <div class="col-md-3">  
            <a href="../formularios/formularioVehiculo.html">
            <button type="submit" class="btn btn-outline-success btn-sm">agregar</button>
            </a>
            <br>
            <br>
            <br>
          </div>
        </div>
        <div class="row">
         <div class="col">
         <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>modelo</th>
                <th>marca</th>
                <th>placa</th>
                <th>color</th>
                <th>Tipo Vehiculo</th>
                <th>Dueño</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
         <?php foreach($vehiculo as $item): ?>
            <tr>
            <td> <?php echo $item['id']; ?> </td>
            <td> <?php echo $item['modelo']; ?> </td>
            <td> <?php echo $item['marca']; ?> </td>
            <td> <?php echo $item['placa']; ?> </td>
            <td> <?php echo $item['color']; ?> </td>
            <td> <?php echo $item['tipo_vehiculo']; ?> </td>
            <td> <?php echo $item['duenio']; ?> </td>
            <td><a href="../formularios/actualizaVehiculo.php?id=<?php echo $item['id'] ?>">
            <button type="submit" class="btn btn-outline-info btn-sm">editar</button></a>
            <a href="../queries/eliminarVehiculo.php?id=<?php echo $item['id'] ?>">
            <button type="submit" class="btn btn-outline-danger btn-sm">eliminar</button></a> </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
         </table>
         <br>
         <br>
         </div>
        </div>
      </div>
        <footer id="creditos">
          <p >Trabajo realizado por: JOSE FELIPE CARVAJAL y SANTIAGO JAIMES</p>
      </footer>
      
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
      <script>
         $(document).ready(function () {
         $('#example').DataTable();
         })
      </script>
   </body>
</html>