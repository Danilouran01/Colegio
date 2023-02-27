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

      <title>Document</title>

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


      require("nav_admin.php");



      ?>

      <div class="boton">
        <a class="btn btn-info" href="salir.php">Salir</a>
        <!-- <input type="submit" value="salir" href="salir.php"> -->
      </div>
      <br><br><br><br><br><br>
      <br>
      <center>
        <h1>Bienvenido <?php echo $_SESSION['nombre']; ?></h1>
      </center>



    <?PHP
  } elseif ($_SESSION['rol'] == "1") {

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
        <br><br><br><br><br><br>
        <br>
        <center>
          <h1>Bienvenido <?php echo $_SESSION['nombre']; ?></h1>
        </center>
      </body>

      </html>











    <?php
  } elseif ($_SESSION['rol'] == "2") { ?>
      <!DOCTYPE html>
      <html lang="en">

      <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
      </head>

      <body>
        <?php
        require("nav_profesor.php"); ?>
        <h2>hola profesor</h2>
        <a href="salir.php">Salir</a> <br><br><br><br><br><br>
        <br>
        <center>
          <h1>Bienvenido <?php echo $_SESSION['nombre']; ?></h1>
        </center>

      </body>

      </html>


  <?php
  }
} else {
  header("Location: index.php");
}


  ?>