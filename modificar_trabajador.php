<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Todo lo de boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
    crossorigin="anonymous"></script>
  <style>
    .fakeimg {
      height: 200px;
      background: #aaa;
    }
  </style>
    <title>Modificar Usuario </title>
<!--Fin boostrap -->
</head>

<body>
<?php
        
            require("menu.php");
       
        ?>
      <div class="container mt-5">
            <div class="row">
               
                <div class="col-sm-8">
                    <!-- Contenido -->
                    <center>
                    <h2 class="text-info">Modificar Usuario</h2>   
                    </center>
                  <?php 
                  include("conexion.php");
                  $cedula=$_REQUEST['cedula'];
                  $query="SELECT * FROM tbltrabajador WHERE idtrabajador='$cedula'";
                  $resultado=$conexion->query($query);
                  $row=$resultado->fetch_assoc();

                  ?>
                  <form action="proceso_modificar_trabajador.php"  method="POST">
               
                    <div class="mb-3">
                        <label for="documento" class="form-label">Documento</label>
                        <input type="text" class="form-control" id="cedula" name="cedula" value="<?php echo $row['idtrabajador']?>">
                    </div>

                    

                    <div class="mb-3">
                        <label for="documento" class="form-label">Nombres</label>
                        <input type="text" class="form-control" id="" name="nombre" value="<?php echo $row['nombre']?>">
                    </div>

                    <div class="mb-3">
                        <label for="documento" class="form-label">telefono</label>
                        <input type="text" class="form-control" id="" name="telefono" value="<?php echo $row['telefono']?>">
                    </div>






                    <button type="submit" name="enviar" class="btn btn-primary">Enviar</button>







                  </form>







                


                </div>
           </div>
        </div>



</body>
</html>