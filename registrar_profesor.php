<?php session_start();
if ($_SESSION['usuario']) {
    echo $_SESSION['nombre'];
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

    <title>Document</title>
</head>
<body>

<?php

     
require("nav_admin.php");



?>
 <div class="boton">
  <a class="btn btn-info" href="salir.php">Salir</a>
    <!-- <input type="submit" value="salir" href="salir.php"> -->
  </div>
<br>
<div class="principal">
<form action="registrar_profesor.php" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Identificacion</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="identificacion">
    
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nombre">
    
  </div>


  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Apellido</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="apellido">
    
  </div>



  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Correo</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="correo">
 
  </div>


  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">profesion</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="profesion">
 
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">contraseña</label>
    <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="contraseña">
 
  </div>

  
  <div class="mb-3">
    <label >Sexo</label>
    <select name="sexo" >
      <option value="Mujer">Mujer</option>
      <option value="Hombre">Hombre</option>
    </select>
    
  </div>


  <button type="submit" class="btn btn-primary " name="enviar">Submit</button>


  </div>

</form>


<?php
if(isset($_REQUEST['enviar'])){

    $identificacion=$_REQUEST['identificacion'];
    $nombre=$_REQUEST['nombre'];
    $apellido=$_REQUEST['apellido'];
    $correo=$_REQUEST['correo'];
    $profesion=$_REQUEST['profesion'];
    $contraseña=$_REQUEST['contraseña'];
    $sexo=$_REQUEST['sexo'];

    require("conexion.php");
    $query="INSERT INTO profesor(id_profesor,nombre, apellido, correo, profesion, contrasena,estado,sexo) 
    VALUES ('$identificacion','$nombre','$apellido','$correo','$profesion','$contraseña','1','$sexo');";
    $consulta=mysqli_query($conexion,$query);
    if ($consulta) {
     
        echo"funciono la consulta";
        
    }else{

        echo"No funciono la consulta";



    }





}else{

    //echo"NO FUNCIONO LA CONSULTA";
}


?>
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