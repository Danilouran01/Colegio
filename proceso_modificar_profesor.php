<?php
require("conexion.php");
$cedula=$_REQUEST['identificacion'];
$nombre=$_REQUEST['nombre'];
$apellido=$_REQUEST['apellido'];
$correo=$_REQUEST['correo'];
$profesion=$_REQUEST['profesion'];
$contraseña=$_REQUEST['contraseña'];

$query="UPDATE profesor SET nombre='$nombre',apellido='$apellido',correo='$correo',
profesion='$profesion',contrasena='$contraseña' WHERE id_profesor='$cedula' ";
$resultado = $conexion->query($query);

if($resultado){
header("Location: ver_profesor.php");
}
else{

echo"No se realizo la actualizacion";


}


?>