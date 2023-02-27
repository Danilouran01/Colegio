<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>



    <?php

    include("conexion.php");
    $matricula = $_GET['matricula'];
    echo $matricula;


    ?>

    <form action="insertar_Nuevo_curso.php" method="GET">
     <input type="text" name="matricula" value="<?php echo $matricula; ?>" readonly>
        <select class="form-select" aria-label="Default select example" name="curso">
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
        </select>
        <input type="submit" name="registrar" value="registrar">

    </form>
    <?php

    if (isset($_REQUEST['registrar'])) {
        $curso = $_REQUEST['curso'];
        $matricula = $_GET['matricula'];


        include("conexion.php");

        $consulta = "INSERT INTO `curso_matricula` (`codigo_curso`, `codigo_matricula`) VALUES ('$curso', '$matricula');";
        $sql = mysqli_query($conexion, $consulta);
        if ($sql) {

            header("Location:ver_matricula.php ");
        } else {
            echo "no funciono la consula" . mysqli_error($conexion);
        }
    }

    ?>

</body>

</html>