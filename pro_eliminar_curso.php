<?php
require("conexion.php");
$codigo=$_REQUEST['id_curso'];
$query="DELETE FROM curso WHERE codigo_curso='$codigo'";
$consulta=mysqli_query($conexion,$query);

if ($consulta) {
    echo "Eliminado con exito";
    header("Location:ver_curso.php");
} else {
    echo "No se elimino el registro";
 
}
?>