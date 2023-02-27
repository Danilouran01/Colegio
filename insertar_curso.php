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
      < <style>
        .fakeimg {
        height: 200px;
        background: #aaa;
        }

        .boton {
        position: absolute;
        right: 10px;
        top: 60px;
        }
        </style>
    </head>

    <body>

      <?php




      require("nav_admin.php");
      ?>


      <div class="boton">
        <a class="btn btn-info" href="salir.php">Salir</a>
        <!-- <input type="submit" value="salir" href="salir.php"> -->
      </div>
      <form>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">nombre del curso</label>
          <input type="text" class="form-control" name="nombre" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">jornada</label>
          <input type="text" class="form-control" name="jornada" id="exampleInputPassword1">
        </div>

        <button type="submit" name="insertar" class="btn btn-primary">insertar curso</button>
      </form>


      <?php

      if (isset($_REQUEST['insertar'])) {
        # code...

        $nombre = $_REQUEST['nombre'];
        $jornada = $_REQUEST['jornada'];

        require("conexion.php");
        $query = "INSERT INTO `curso`(`codigo_curso`, `nombre_curso`, `jornada`) 
    VALUES ('','$nombre','$jornada');";
        $consulta = mysqli_query($conexion, $query);

        if ($consulta) {
          # code...

          echo " curso insertado con exito ";
        } else

          echo " curso insertado incorrectamente ";
      }





      ?>








    </body>

    </html>

<?php
  } else {
    header("Location: index.php");
  }
}
?>