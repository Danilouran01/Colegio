<?php session_start();

if ($_SESSION['usuario']) {
    $user = $_SESSION['usuario'];

    if ($_SESSION['rol'] == "1" || $_SESSION['rol'] == "0") {

        include("conexion.php");

        $cedula = $_REQUEST['identificacion'];
        /*aca se pone despues del posrt como esta en el name del form */
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $contraseña = $_POST['contrasena'];
        $telefono = $_POST['telefono'];


        $query = "UPDATE estudiante SET nombre='$nombre',apellido='$apellido',correo='$correo',contrasena='$contraseña',telefono='$telefono' WHERE  id_estudiante='$cedula'";
        $resultado = $conexion->query($query);

        if ($resultado) {
            if ($_SESSION['rol'] == "0") {
                header("Location: ver_estudiante.php");
            } elseif ($_SESSION['rol'] == "1") {
                header("Location: ver_informacion_estudiante.php");
            } else {

                echo "No se realizo la actualizacion";
            }
        } else {

            echo "No se realizo la actualizacion";
        }
    } else {
        header("Location: index.php");
    }
} else {
    header("Location: index.php");
}
?>

<!-- UPDATE `estudiante` SET `id_estudiante`='',`nombre`='',`apellido`='',`correo`='',`contraseña`='',`telefono`='' WHERE  -->