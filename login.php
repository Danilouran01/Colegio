<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>



    </style>
</head>


<body >
<form action="login.php" method="POST">
<table style="text-align: left; margin-left: auto; margin-right: auto;" border="1" cellpadding="1" cellspacing="1">

<tbody>
                    <tr>
                        <td>
                            <label >usuario:</label>
                        </td>
                        <td>
                        <input type="text" name="usuario" >
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label >contraseña:</label>
                        </td>
                        <td>
                        <input type="password" name="contrasena">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label >rol: </label>
                        </td>
                        <td>
                        <select name="rol" id="">
        <option value="0">Administrador</option>
        <option value="1">Estudiante</option>
        <option value="2">Profesor</option>
</select>
                        </td>
                    </tr>
  
 
 

</tr>
                    <tr align="center">
                        <td colspan="2" rowspan="1">
                        <input type="submit"  name="enviar" value="Ingresa">
                        </td>
                    </tr>
                </tbody>
            </table>
</form>
<?php
if (isset($_REQUEST['enviar'])) {
    $rol=$_REQUEST['rol'];
    $contrasena=$_REQUEST['contrasena'];
    $usuario=$_REQUEST['usuario'];
  
    if ($rol=="0"){
        include("conexion.php");
        $query="SELECT * FROM administrador WHERE id_administrador='$usuario' AND contrasena = '$contrasena'";
        $consulta=mysqli_query($conexion,$query);
        if(mysqli_num_rows( $consulta)>0){
            $row=mysqli_fetch_row($consulta);
            $_SESSION['usuario']=$usuario;
            $_SESSION['contrasema']=$contrasena;
            $_SESSION['rol']=$rol;
            $_SESSION['nombre']=$row[1];


            header("Location: home.php");
           
        }else{
            echo"   USUARIO NO EXISTE";
        }
        

    }elseif($rol=="1"){
        include("conexion.php");
        $query2="SELECT * FROM estudiante WHERE id_estudiante='$usuario' AND contrasena= '$contrasena'AND estado='1'";
        $consulta2=mysqli_query($conexion,$query2);
        if(mysqli_num_rows( $consulta2)>0){
            $row=mysqli_fetch_row($consulta2);
            $_SESSION['usuario']=$usuario;
            $_SESSION['rol']=$rol;
            $_SESSION['nombre']=$row[1];
            $_SESSION['sexo']=$row[7];

            header("Location: home.php");
        }else{
            echo"   USUARIO NO EXISTE";
        }
       

    }elseif($rol=="2"){
        
        include("conexion.php");
        $query="SELECT * FROM profesor WHERE id_profesor='$usuario' AND contrasena= '$contrasena'AND estado='1'";
        $consulta2=mysqli_query($conexion,$query);
        if(mysqli_num_rows( $consulta2)>0){
            $row=mysqli_fetch_row($consulta2);
            $_SESSION['usuario']=$usuario;
            $_SESSION['rol']=$rol;
            $_SESSION['nombre']=$row[1];
            $_SESSION['sexo']=$row[7];

            header("Location: home.php");
        }else{
            echo"   USUARIO NO EXISTE";
        }

    }  
}



?>
    
</body>
</html>
