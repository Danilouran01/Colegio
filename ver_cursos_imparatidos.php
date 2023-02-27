<?php session_start();
if ($_SESSION['usuario']) {
    echo $_SESSION['nombre'];
    if ($_SESSION['rol'] == "0") {


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        .btn{
            position:absolute;
    top:10px;
    right: 10px;
        }
    </style>
    <title>Ver Matriculas</title>
</head>
<body>

<?php
include("nav_admin.php");

?>
<div >

<a class="btn btn-info" href="salir.php">Salir</a>
</div>
<form action="ver_cursos_imparatidos.php">
<div >
    <input type="text" name="documento">
    <input type="submit" value="buscar" name="buscar">
</div>
</form>
    <?php
    
    if (isset($_REQUEST['buscar'])) {

        $busqueda=$_REQUEST['documento'];
        include("conexion.php");
           $query=" SELECT profesor.id_profesor,CONCAT(profesor.nombre, ' ',profesor.apellido) AS nom, curso.nombre_curso,curso.jornada FROM profesor INNER JOIN profesor_curso on profesor.id_profesor=profesor_curso.id_profesor INNER JOIN curso on profesor_curso.codigo_curso=curso.codigo_curso WHERE profesor.id_profesor='$busqueda'";
            $consulta=mysqli_query($conexion,$query);

            if ($consulta) {
               
            
       
   

    ?>



    <table class="table table-bordered table-dark">
        <thead>
            <tr>
            <th class="text-center">Número de documento</th>
                <th class="text-center">Nombres completos</th>
               
                <th class="text-center">Curso que esta impartiendo</th>
                <th class="text-center">Jornada</th>
                </tr>
        </thead>
        <tbody>
            <?php
         

            while ($row=mysqli_fetch_assoc($consulta)) {
                ?>
                <tr>
                <td class="text-center"><?php echo $row['id_profesor'];?></td>
                <td class="text-center"><?php echo $row['nom'];?></td>
                <td class="text-center"><?php echo $row['nombre_curso'];?></td>
                <td class="text-center"><?php echo $row['jornada'];?></td>
                </tr>
                <?php
            }
        }else {
            echo mysqli_error($conexion,$consulta);
        }
            ?>






        </tbody>
        <?php
    }

?>












    <table class="table table-bordered table-dark">

    <?php
     include("conexion.php");
     $query=" SELECT profesor.id_profesor,CONCAT(profesor.nombre, ' ',profesor.apellido) AS nom, curso.nombre_curso,curso.jornada FROM profesor INNER JOIN profesor_curso on profesor.id_profesor=profesor_curso.id_profesor INNER JOIN curso on profesor_curso.codigo_curso=curso.codigo_curso;";
      $consulta=mysqli_query($conexion,$query);
    ?>
        <thead>
            <tr>
                <th class="text-center">Número de documento</th>
                <th class="text-center">Nombres completos</th>
               
                <th class="text-center">Curso que esta impartiendo</th>
                <th class="text-center">Jornada</th>
               
                </tr>
        </thead>
        <tbody>
            <?php
           

            while ($row=mysqli_fetch_assoc($consulta)) {
                ?>
                <tr>
                <td class="text-center"><?php echo $row['id_profesor'];?></td>
                <td class="text-center"><?php echo $row['nom'];?></td>
                <td class="text-center"><?php echo $row['nombre_curso'];?></td>
                <td class="text-center"><?php echo $row['jornada'];?></td>
             
                <?php
            }
            
            ?>






        </tbody>












    </table>
</body>
</html>

<?php
    } else {
        header("Location: index.php");
    }
}else {
    header("Location: index.php");
}
?>