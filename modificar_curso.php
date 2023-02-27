<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>modificar curso</title>
</head>
<body>
    <?php
    require("conexion.php");
    $codigo=$_REQUEST['id_curso'];
    $query="SELECT * FROM curso WHERE codigo_curso='$codigo'";
    $consulta=mysqli_query($conexion,$query);
    $row= $consulta->fetch_assoc();
    ?>
    <form action="pro_modificar_curso.php" method="POST">

    <div class="mb-3">
        <label for="">codigo_curso</label>
        <input type="text" name="codigo_curso" value="<?php echo $row['codigo_curso'];?>">

    </div>

    <div class="mb-3">
        <label for="">nombre del curso</label>
        <input type="text" name="nombre_curso" value="<?php echo $row['nombre_curso'];?>">

    </div>

    <div class="mb-3">
        <label for="">jornada</label>
         <select name="jornada"> 
            <option value="<?php echo $row['jornada'];?>"><?php echo $row['jornada'];?></option> 
                <option value="mañana">mañana</option>
                <option value="tarde">tarde</option>
                

            
             
        </select>
    

    </div>
    <button type="submit" class="btn btn-primary" name="enviar">modificar

    </button>


    </form>

</body>
</html>