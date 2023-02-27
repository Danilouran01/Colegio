<?php session_start();

if ($_SESSION['usuario']) {
  $user = $_SESSION['usuario'];

  if ($_SESSION['rol'] == "1") {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

      <title>Document</title>
      <style>
        .fakeimg {
          height: 200px;
          background: #aaa;
        }

        .boton {
          position: absolute;
          right: 10px;
          top: 75px;


        }
      </style>
    </head>

    <body>

      <?php
      include("nav_estudiante.php")
      ?>



      <div class="boton">
        <a class="btn btn-info" href="salir.php">Salir</a>
        <!-- <input type="submit" value="salir" href="salir.php"> -->
      </div>





      <?php
                        include("conexion.php");
                        $query = "SELECT estudiante.id_estudiante,CONCAT(estudiante.nombre, ' ', estudiante.apellido) AS nombre, estudiante.correo, matricula.cod_matricula,curso.nombre_curso,matricula.fecha_inicio,matricula.fecha_fin,curso.jornada FROM estudiante INNER JOIN matricula ON matricula.id_estudiante=estudiante.id_estudiante INNER JOIN curso_matricula ON curso_matricula.codigo_matricula=matricula.cod_matricula INNER JOIN curso ON curso.codigo_curso=curso_matricula.codigo_curso WHERE estudiante.id_estudiante='$user' ; ";
                        $consulta = mysqli_query($conexion, $query);
                        ?>
                        <table class="table ">
                        <thead>
                            <tr>
                                <th class="text-center">Número de documento</th>
                                <th class="text-center">Nombres completos</th>
                                <th class="text-center">Correo</th>
                                <th class="text-center">N° matricula</th>
                                <th class="text-center">Nombre curso</th>
                                <th class="text-center">Fecha de inicio</th>
                                <th class="text-center">Fecha final de curso</th>
                                <th class="text-center">Jornada</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php


                            while ($row = mysqli_fetch_assoc($consulta)) {
                            ?>
                                <tr>
                                    <td class="text-center"><?php echo $row['id_estudiante']; ?></td>
                                    <td class="text-center"><?php echo $row['nombre']; ?></td>
                                    <td class="text-center"><?php echo $row['correo']; ?></td>
                                    <td class="text-center"><?php echo $row['cod_matricula']; ?></td>
                                    <td class="text-center"><?php echo $row['nombre_curso']; ?></td>
                                    <td class="text-center"><?php echo $row['fecha_inicio']; ?></td>
                                    <td class="text-center"><?php echo $row['fecha_fin']; ?></td>
                                    <td class="text-center"><?php echo $row['jornada']; ?></td>
                                </tr>
                            <?php
                            }

                            ?>






                        </tbody>












                    </table>
        </div>
        <?php


        ?>







    </body>

    </html>

<?php
  } else {
    header("Location: index.php");
  }
}
?>