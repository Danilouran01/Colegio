<?php session_start();
if ($_SESSION['usuario']) {
    
    if ($_SESSION['rol'] == "1") {
        $user=$_SESSION['usuario'];


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap 5 Website Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .fakeimg {
      height: 200px;
      background: #aaa;
    }

    .boton {
      position: absolute;
      right: 10px;
      top: 80px;
    }
  </style>
</head>

<body>

<?php
include("nav_estudiante.php")
?>



  <div class="boton">
  <a class="btn btn-info" href="salir.php">Salir</a>
    <!-- <input type="submit" value="salir" href="salir.php"> -->
  </div>

  <center>
    <div class="col-sm-8">
      <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Identificacion</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Correo</th>
            <th scope="col">contraseña</th>
            <th scope="col">Telefono</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include("conexion.php");
          $query = "SELECT * FROM estudiante WHERE 	id_estudiante='$user'";
          $consulta = mysqli_query($conexion, $query);
          while ($row = $consulta->fetch_assoc()) { ?>
            <tr>
              <td><?php echo $row['id_estudiante'];  ?></td>
              <td><?php echo $row['nombre'];  ?></td>
              <td><?php echo $row['apellido'];  ?></td>
              <td><?php echo $row['correo'];  ?></td>
              <td><?php echo $row['contrasena'];  ?></td>
              <td><?php echo $row['telefono'];  ?></td>
              <td><a class="btn btn-info" href="modificar_estudiante.php?id_estudiante=<?php echo $row['id_estudiante']; ?>" onclick="return confirmacionModificar()">Editar</a>
               


              </td>


            </tr>
          <?php
          }

          ?>
        </tbody>
      </table>
    </div>
  </center>


</body>

</html>

<?php
    } else {
        header("Location: index.php");
    }
}else {
    header("Location: index.php");
}
?>