<?php
include("conexion.php");
$cedula=$_REQUEST['cedula'];

$query="UPDATE estudiante SET estado='0' WHERE id_estudiante='$cedula'";
$resultado= mysqli_query($conexion,$query);
if($resultado){
    echo"deshabilitado con exito";
    header("location: ver_estudiante.php");
}
else{
    echo("El Registro no se deshabilito");
}


?>