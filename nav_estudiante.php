<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <div class="container-fluid">
        <a class="navbar-brand" href="home.php">Inicio</a>
            <a class="navbar-brand" href="ver_cursos_estudiante.php">Consultar Mis Cursos</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">



                    <li class="nav-item">
                        <a class="navbar-brand " href="ver_informacion_estudiante.php" >Consultar Mi Información</a>
                    </li>

                    <!-- <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li> -->
                </ul>
                <h5 class="mb-2"><strong><?php echo $_SESSION['nombre'] . "  "; ?></strong></h5><?php
                                                if ($_SESSION['sexo'] == "Mujer") { ?>
                                                    <img src="images/avatarm.png" class="rounded-circle mb-3" style="width: 80px;" alt="Avatar" />

                                                    <?php
                                                } elseif ($_SESSION['sexo'] == "Hombre") {?>
                                                    <img src="images/avatar.jpg" class="rounded-circle mb-3" style="width: 80px;" alt="Avatar" />

                                                    <?php 
                                                }    ?>

                


                <br>
                <span class="badge bg-primary"><?php
                                                if ($_SESSION['rol'] == "0") {
                                                    echo " Administrador";
                                                } elseif ($_SESSION['rol'] == "1") {

                                                    echo " Estudiante";
                                                } else {
                                                    echo " Profesor";
                                                }
                                                ?></span></p>
                <!-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
            </div>
        </div>
    </nav>
    <?php
  
