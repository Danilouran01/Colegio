<?php
include("conexion.php");
if (isset($_REQUEST['enviar'])) {
  $codigo_curso=$_REQUEST['codigo_curso'];
  $nombre_curso=$_REQUEST['nombre_curso'];
  $jornada=$_REQUEST['jornada'];

  
  $query="UPDATE `curso` SET `codigo_curso`='$codigo_curso',`nombre_curso`='$nombre_curso',
  `jornada`='$jornada' WHERE `codigo_curso`='$codigo_curso';";
  $consulta=mysqli_query($conexion,$query);
    if ($consulta) {
        header("Location: ver_curso.php");
    }

}
?>