<?php
include("conexion.php");
$cedula=$_REQUEST['cedula'];

$query="DELETE FROM profesor WHERE id_profesor='$cedula'";
$resultado= mysqli_query($conexion,$query);
if($resultado){
    echo"eliminado con exito";
    header("location: ver_profesor.php");
}
else{
    echo("El Registro no se elimino");
}


?>