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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

    <title>Document</title>
</head>
<body>


<?php
include("nav_admin.php");

?>
 <div class="boton">
  <a class="btn btn-info" href="salir.php">Salir</a>
    <!-- <input type="submit" value="salir" href="salir.php"> -->
  </div>
<form action="curso_profesor.php" method="POST">
    


<select class="form-select" aria-label="Default select example" name="profesor">
  <option selected>profesor</option>
  <?php 
  include("conexion.php");
  $query="SELECT * FROM profesor";
  $consulta=mysqli_query($conexion,$query);
  while($row=mysqli_fetch_assoc($consulta)){
  
  ?>
  <option value="<?php echo $row['id_profesor'];?>"><?php echo $row['nombre']; ?></option>
  <?php
 }
?>
</select>



<select class="form-select" aria-label="Default select example" name="curso">
  <option selected>curso</option>
  <?php
  include("conexion.php");
  $query="SELECT * FROM curso";
  $consulta=mysqli_query($conexion,$query);
  while ($row=mysqli_fetch_assoc($consulta)) {

    ?>
    <option value="<?php echo $row['codigo_curso'];?>"><?php echo $row['nombre_curso']; ?></option>

   

<?php
  }
?>
  </select>
  <input type="submit" name="enviar" value="enviar">

</form>
<?php
if (isset($_REQUEST['enviar'])){

  $profesor=$_REQUEST['profesor'];
  $curso=$_REQUEST['curso'];

   include("conexion.php");
   $query="INSERT INTO `profesor_curso`(`id_profesor`, `codigo_curso`) VALUES ('$profesor','$curso')";
   $consulta=mysqli_query($conexion,$query);
   if ($consulta) {
        echo"Curso insertado con exito";
   }else{
    echo"-------no funciono la consulta ".mysqli_error($conexion);
   }
}

?>
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