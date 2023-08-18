<?php
    $conexion = mysqli_connect('localhost', 'root', '', 'fhammp');

    if (!$conexion) {
        die('Error al conectar a la base de datos: ' . mysqli_connect_error());
      }
?>

<html>
 <head>
    <title>EDITAR</title>
    <head>
   <link rel="stylesheet" href="../styles/estilocabina.css">
   <link rel="stylesheet" href="../styles/estilotabla.css">
</head>
<body>
    <?php
        if (isset($_POST['enviar'])) {
            $id=$_POST['id'];
            $precio=$_POST['precio'];

            $sql="update precios set precio='".$precio."' where id='".$id."'";
            $resultado=mysqli_query($conexion,$sql);

            if($resultado)
            {
                echo "<script language ='JavaScript'>
                alert('Los datos se actualizaron correctamente');
                window.location.href = '../vistas/admin.php';
                </script>";
                
            }else{
                echo "<script language ='JavaScript'>
                alert('Los datos NO se actualizaron correctamente');
                window.location.href = '../vistas/admin.php';
                </script>";
            } 
            mysqli_close($conexion);
        }else{
        $id=$_GET['id'];
        $sql="select * from precios where id='".$id."'";
        $resultado=mysqli_query($conexion, $sql);

        $fila=mysqli_fetch_assoc($resultado);
        $precio=$fila["precio"];

        mysqli_close($conexion);
    
    ?>
     <div class="Edicion">
    <h1 >Editar Precios</h1>
    
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
      

        <label>Nuevo Precio</label>
        <input type="text" name="precio" value = "<?php echo $precio; ?>"> <br>

        <input type="hidden" name="id" value="<?php echo $id; ?>">
        
        <input type="submit" name="enviar" value="ACTUALIZAR"> <br>
        
        <a href="../vistas/admin.php">Volver</a>
    </form>
    <?php
    }
    ?>
    </div>

</body>
</html>