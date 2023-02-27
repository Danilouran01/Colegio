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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <title>Document</title>
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
  <form action="">
    <table>
      <tr>
     <td> <label >Estudiante</label></td>

      <td><select class="form-select" aria-label="Default select example" name="estudiante">
      <option selected>Estudiante</option>
      <?php
      include("conexion.php");
      $query = "SELECT id_estudiante, CONCAT(nombre , '  ', apellido ) AS nombre FROM `estudiante`;";
      $consulta = mysqli_query($conexion, $query);
      while ($row = mysqli_fetch_assoc($consulta)) {

      ?>
        <option value="<?php echo $row['id_estudiante']; ?>"><?php echo $row['nombre']; ?></option>



      <?php
      }
      ?>
    </select></td></tr>


    <tr><td><label >Curso</label></td>
    <td><select class="form-select" aria-label="Default select example" name="curso">
      <option selected>curso</option>
      <?php
      include("conexion.php");
      $query = "SELECT * FROM curso";
      $consulta = mysqli_query($conexion, $query);
      while ($row = mysqli_fetch_assoc($consulta)) {

      ?>
        <option value="<?php echo $row['codigo_curso']; ?>"><?php echo $row['nombre_curso']; ?></option>



      <?php
      }
      ?>
    </select></td></tr>
    <br>
    <tr>
    <td>
      <label>Fecha inicio</label></td>

      <td> <input type="date" name="fechaIni"></td></tr>


    <tr>
      <td>
    <label> Fecha fin</label></td>
    <td><input type="date" name="fechaFin"> </td></tr>




     <tr><td>
    <select class="form-select" aria-label="Default select example" name="administrador" required>
      <option selected>administrador</option>
      <?php
      include("conexion.php");
      $query = "SELECT  * FROM administrador;";
      $consulta = mysqli_query($conexion, $query);
      while ($row = mysqli_fetch_assoc($consulta)) {

      ?>
        <option value="<?php echo $row['id_administrador']; ?>"><?php echo $row['nombre']; ?></option>



      <?php
      }
      ?>
    </select></td></tr>


    <tr><td><input type="submit" name="envia" value="enviar"></td></tr>
    </table>
  </form>

  <?php
  if (isset($_REQUEST['envia'])) {
    $estudiante = $_REQUEST['estudiante'];
    $curso = $_REQUEST['curso'];
    $administrador = $_REQUEST['administrador'];
    $fecha_ini = $_REQUEST['fechaIni'];
    $fecha_fin = $_REQUEST['fechaFin'];

    echo $estudiante;

    include("conexion.php");
    $query = "INSERT INTO `matricula`(`cod_matricula`, `id_estudiante`, `fecha_inicio`, `fecha_fin`, `id_administrador`) VALUES ('','$estudiante','$fecha_ini','$fecha_fin','$administrador')";
    $resultado = mysqli_query($conexion, $query);
    $id_matricula = mysqli_insert_id($conexion);

    $query2 = "INSERT INTO `curso_matricula`(`codigo_curso`, `codigo_matricula`) VALUES ('$curso','$id_matricula')";
    $resultado2 = mysqli_query($conexion, $query2);

    if ($resultado && $resultado2) {
      echo "------matricula llena <br>";
      echo $id_matricula;
      echo "---intermedia llena";
    }
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