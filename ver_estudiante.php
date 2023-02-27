<?php session_start();
if ($_SESSION['usuario']) {

  if ($_SESSION['rol'] == "0" || $_SESSION['rol'] == "2") {


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
                  <li>
                    <hr class="dropdown-divider">
                  </li>
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
                  <li>
                    <hr class="dropdown-divider">
                  </li>
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
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="ver_cursos_imparatidos.php">Ver cursos impartidos</a></li>
                </ul>
              </li>


              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
              </li>
            </ul>
            <h5 class="mb-2"><strong><?php echo $_SESSION['nombre'] . "  "; ?></strong></h5>
            <img src="images/avatar.jpg" class="rounded-circle mb-3" style="width: 80px;" alt="Avatar" />


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
              $query = "SELECT * FROM estudiante";
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
                    <?php
                    if ($row['estado'] == '1') {
                      
                      
                    ?>
                    <a class="btn btn-info" href="pro_deshabilitar_estudiante.php?cedula=<?php echo $row['id_estudiante']; ?>" onclick="return confirmacionModificar()">Deshabilitar</a>
                    <?php
                    } else {
                      
                    ?>
                      <a class="btn btn-info" href="pro_habilitar_estudiante.php?cedula=<?php echo $row['id_estudiante']; ?>" onclick="return confirmacionModificar()">Habilitar</a>
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
        </div>
      </center>


    </body>

    </html>

<?php
  } else {
    header("Location: index.php");
  }
} else {
  header("Location: index.php");
}
?>