<?php session_start();
if ($_SESSION['usuario']) {
  if ($_SESSION['usuario']=="0"|| $_SESSION['usuario']=="1") {
    # code...
  }
   
   


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>
    <?php
    require("conexion.php");
    $cedula=$_REQUEST['id_estudiante'];
    $query="SELECT * FROM  estudiante WHERE id_estudiante='$cedula'";
    $consulta=mysqli_query($conexion,$query);
    $row=$consulta->fetch_assoc();
    ?>

<form action="proceso_modificar_estudiante.php" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Identificacion</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="identificacion"   value="<?php echo $row['id_estudiante'];  ?>">
    
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nombre"  value="<?php echo $row['nombre'];  ?>">
    
  </div>


  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Apellido</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="apellido"  value="<?php echo $row['apellido'];  ?>">
    
  </div>



  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Correo</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="correo"  value="<?php echo $row['correo'];  ?>">
 
  </div>


  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">contraseña</label>
    <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="contrasena"  value="<?php echo $row['contrasena'];  ?>">
 
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Telefono</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="telefono"  value="<?php echo $row['telefono'];  ?>">
    
  </div>

  


  <button type="submit" class="btn btn-primary " name="enviar">Submit</button>


  </div>

</form>

    
</body>
</html>

<?php
   
}else {
    header("Location: index.php");
}
?>