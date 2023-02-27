<?php session_start();
if ($_SESSION['usuario']) {
    
    if ($_SESSION['rol'] == "0") {


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/funciones.js"></script>
    <title>Document</title>
</head>
<body>

<?php
include("nav_admin.php");

?>
 <div class="boton">
  <a class="btn btn-info" href="salir.php">Salir</a>
    <!-- <input type="submit" value="salir" href="salir.php"> -->
  </div>

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Identificacion</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Correo</th>
      <th scope="col">Profesión</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  <?php
     include("conexion.php");
     $query="SELECT * FROM profesor";
     $consulta=mysqli_query($conexion,$query);
    while ($row=$consulta->fetch_assoc()) {?>
    <tr>
        <td><?php echo $row['id_profesor'];  ?></td>
        <td><?php echo $row['nombre'];  ?></td>
        <td><?php echo $row['apellido'];  ?></td>
        <td><?php echo $row['correo'];  ?></td>
        <td><?php echo $row['profesion'];  ?></td>
        <td><a class="btn btn-info" 
            href="modificar_profesor.php?cedula=<?php echo $row['id_profesor'];?>" 
            onclick="return confirmacionModificar()">Editar</a>
            <a class="btn btn-info" 
            href="pro_eliminar_profesor.php?cedula=<?php echo $row['id_profesor'];?>" 
            onclick="return confirmacionModificar()">Eliminar</a>


            <?php
                    if ($row['estado'] == '1') {
                      
                      
                    ?>
                    <a class="btn btn-info" href="pro_deshabilitar_profesor.php?cedula=<?php echo $row['id_profesor']; ?>" onclick="return confirmacionh()()">Deshabilitar</a>
                    <?php
                    } else {
                      
                    ?>
                      <a class="btn btn-info" href="pro_habilitar_profesor.php?cedula=<?php echo $row['id_profesor']; ?>" onclick="return confirmacionh()()">Habilitar</a>
                    <?php
                    }

                    ?>


        </td>
       
        
    </tr>
    <?php
}

?>
  </tbody>
</table>
    
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