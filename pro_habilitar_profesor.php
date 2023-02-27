<?php
include("conexion.php");
$cedula=$_REQUEST['cedula'];

$query="UPDATE profesor SET estado='1' WHERE id_profesor='$cedula'";
$resultado= mysqli_query($conexion,$query);
if($resultado){
    echo "habilitado con exito";
    header("location: ver_profesor.php");
}
else{
    echo("El Registro no se habilito");
}


?>