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
            <style>
                .fakeimg {
                    height: 200px;
                    background: #aaa;
                }

                .boton {
                    position: absolute;
                    right: 10px;
                    top: 100px;
                }
            </style>
        </head>

        <body>

           

<nav class="navbar navbar-expand-lg navbar-light bg-light ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#"></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Gestionar Estudiante
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="registrar_estudiante.php">Registrar Estudiante</a></li>
            <li><a class="dropdown-item" href="ver_estudiante.php">Listar estudiante</a></li>
            <li><a class="dropdown-item" href="estudiante_curso.php">Registrar matricula</a></li>
            <li><a class="dropdown-item" href="ver_matricula.php">Ver Matricula</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Gestinar Profesor
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="registrar_profesor.php">Registrar Profesor</a></li>
            <li><a class="dropdown-item" href="ver_profesor.php">Ver Profesor</a></li>
            <li><a class="dropdown-item" href="curso_profesor.php">Registrar cursos impartidos</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="ver_cursos_imparatidos.php">Ver cursos impartidos</a></li>
          </ul>
        </li>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cursos
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="insertar_curso.php">Registrar cursos</a></li>
            <li><a class="dropdown-item" href="ver_curso.php">ver curso</a></li>
            <li><a class="dropdown-item" href="curso_profesor.php">Registrar cursos impartidos</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="ver_cursos_imparatidos.php">Ver cursos impartidos</a></li>
          </ul>
        </li>


        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <h5 class="mb-2"><strong><?php echo $_SESSION['nombre'] ."  ";?></strong></h5>
      <img src="images/avatar.jpg" class="rounded-circle mb-3" style="width: 80px;"
  alt="Avatar" />


<br>
<span class="badge bg-primary"><?php 
if ($_SESSION['rol'] == "0") {
  echo " Administrador";
}elseif($_SESSION['rol'] == "1"){

  echo " Estudiante";
}else{
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
    


            <div class="boton">
                <a class="btn btn-info" href="salir.php">Salir</a>
                <!-- <input type="submit" value="salir" href="salir.php"> -->
            </div>

            
            <form action="ver_matricula.php">
                <div>
                    <input type="text" name="documento">
                    <input type="submit" value="buscar" name="buscar">
                </div>
            </form>
            <?php

            if (isset($_REQUEST['buscar'])) {

                $busqueda = $_REQUEST['documento'];
                include("conexion.php");
                $query = "SELECT estudiante.id_estudiante,CONCAT(estudiante.nombre, ' ', estudiante.apellido) AS nombre, estudiante.correo, matricula.cod_matricula,curso.nombre_curso,matricula.fecha_inicio,matricula.fecha_fin,curso.jornada FROM estudiante INNER JOIN matricula ON matricula.id_estudiante=estudiante.id_estudiante INNER JOIN curso_matricula ON curso_matricula.codigo_matricula=matricula.cod_matricula INNER JOIN curso ON curso.codigo_curso=curso_matricula.codigo_curso WHERE estudiante.id_estudiante=' $busqueda' ;";
                $consulta = mysqli_query($conexion, $query);

                if (mysqli_num_rows($consulta) > 0) {





            ?>



                    <table class="table table-bordered table-dark">
                        <thead>
                            <tr>
                                <th class="text-center">Número de documento</th>
                                <th class="text-center">Nombres completos</th>
                                <th class="text-center">Correo</th>
                                <th class="text-center">N° matricula</th>
                                <th class="text-center">Nombre curso</th>
                                <th class="text-center">Fecha de inicio</th>
                                <th class="text-center">Fecha final de curso</th>
                                <th class="text-center">Jornada</th>
                                <th class="text-center">Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php


                            while ($row = mysqli_fetch_assoc($consulta)) {
                            ?>
                                <tr>
                                    <td class="text-center"><?php echo $row['id_estudiante']; ?></td>
                                    <td class="text-center"><?php echo $row['nombre']; ?></td>
                                    <td class="text-center"><?php echo $row['correo']; ?></td>
                                    <td class="text-center"><?php echo $row['cod_matricula']; ?></td>
                                    <td class="text-center"><?php echo $row['nombre_curso']; ?></td>
                                    <td class="text-center"><?php echo $row['fecha_inicio']; ?></td>
                                    <td class="text-center"><?php echo $row['fecha_fin']; ?></td>
                                    <td class="text-center"><?php echo $row['jornada']; ?></td>
                                    <td class="text-center">
                                        <a href="insertar_Nuevo_curso.php?matricula=<?php echo $row['cod_matricula']; ?>">nuevo curso</a>

                                    </td>


                                </tr>
                        <?php
                            }
                        } else {
                            echo mysqli_error($conexion, $consulta);
                        }
                        ?>






                        </tbody>
                    <?php
                }

                    ?>












                    <table class="table table-bordered table-dark">

                        <?php
                        include("conexion.php");
                        $query = "SELECT estudiante.id_estudiante,CONCAT(estudiante.nombre, ' ', estudiante.apellido) AS nombre, estudiante.correo, matricula.cod_matricula,curso.nombre_curso,matricula.fecha_inicio,matricula.fecha_fin,curso.jornada FROM estudiante INNER JOIN matricula ON matricula.id_estudiante=estudiante.id_estudiante INNER JOIN curso_matricula ON curso_matricula.codigo_matricula=matricula.cod_matricula INNER JOIN curso ON curso.codigo_curso=curso_matricula.codigo_curso; ";
                        $consulta = mysqli_query($conexion, $query);
                        ?>
                        <thead>
                            <tr>
                                <th class="text-center">Número de documento</th>
                                <th class="text-center">Nombres completos</th>
                                <th class="text-center">Correo</th>
                                <th class="text-center">N° matricula</th>
                                <th class="text-center">Nombre curso</th>
                                <th class="text-center">Fecha de inicio</th>
                                <th class="text-center">Fecha final de curso</th>
                                <th class="text-center">Jornada</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php


                            while ($row = mysqli_fetch_assoc($consulta)) {
                            ?>
                                <tr>
                                    <td class="text-center"><?php echo $row['id_estudiante']; ?></td>
                                    <td class="text-center"><?php echo $row['nombre']; ?></td>
                                    <td class="text-center"><?php echo $row['correo']; ?></td>
                                    <td class="text-center"><?php echo $row['cod_matricula']; ?></td>
                                    <td class="text-center"><?php echo $row['nombre_curso']; ?></td>
                                    <td class="text-center"><?php echo $row['fecha_inicio']; ?></td>
                                    <td class="text-center"><?php echo $row['fecha_fin']; ?></td>
                                    <td class="text-center"><?php echo $row['jornada']; ?></td>
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