
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
    
