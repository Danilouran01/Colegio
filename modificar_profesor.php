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
    $cedula=$_REQUEST['cedula'];
    $query="SELECT * FROM  profesor WHERE id_profesor='$cedula'";
    $consulta=mysqli_query($conexion,$query);
    $row=$consulta->fetch_assoc();
    ?>

<form action="proceso_modificar_profesor.php" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Identificacion</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="identificacion"   value="<?php echo $row['id_profesor']; ?>">
    
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nombre"  value="<?php echo $row['nombre'];  ?>">
    
  </div>


  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Apellido</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="apellido"  value="<?php echo $row['apellido']; ?>">
    
  </div>



  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Correo</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="correo"  value="<?php echo $row['correo'];  ?>">
 
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">profesión</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="profesion"  value="<?php echo $row['profesion'];  ?>">
 
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">contraseña</label>
    <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="contraseña"  value="<?php echo $row['profesion'];  ?>">
 
  </div>

 

  


  <button type="submit" class="btn btn-primary " name="enviar">Submit</button>


  </div>

</form>
    
</body>
</html>