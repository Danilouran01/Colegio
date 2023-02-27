<?php

include("conexion.php");
$identificacion=$_REQUEST['identificacion'];
$nombre=$_REQUEST['nombre'];
$apellido=$_REQUEST['apellido'];
$correo=$_REQUEST['correo'];
$telefono=$_REQUEST['telefono'];


$query="UPDATE `estudiante` SET `id_estudiante`='$identificacion',`nombre`='$nombre',`apellido`='$apellido',`correo`='$correo',`contraseña`='',`telefono`='$telefono' WHERE '$identificacion' ";

?>