<?php
$conexion = mysqli_connect('localhost', 'root', '', 'fhammp');

if (!$conexion) {
    die('Error al conectar a la base de datos: ' . mysqli_connect_error());
}

if (isset($_POST['enviar'])) {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];
    $nombre = $_POST['nombre'];
    $turno = $_POST['turno'];

    $sql = "UPDATE usuarios SET Email='$email', Contrasena='$contrasena', Nombre='$nombre', Turno='$turno' WHERE id='$id'";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        echo "<script language='JavaScript'>
            alert('Los datos se actualizaron correctamente');
            window.location.href = '../vistas/admin.php';
            </script>";
    } else {
        echo "<script language='JavaScript'>
            alert('Los datos NO se actualizaron correctamente');
            window.location.href = '../vistas/admin.php';
            </script>";
    }
    mysqli_close($conexion);
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM usuarios WHERE id='$id'";
    $resultado = mysqli_query($conexion, $sql);

    $fila = mysqli_fetch_assoc($resultado);
    $email = $fila["Email"];
    $contrasena = $fila["Contrasena"];
    $nombre = $fila["Nombre"];
    $turno = $fila["Turno"];

    mysqli_close($conexion);
}
?>

<html>
<head>
    <title>EDITAR USUARIO</title>
    <link rel="stylesheet" href="../styles/estilocabina.css">
    <link rel="stylesheet" href="../styles/estilotabla.css">
    <link rel="stylesheet" href="../styles/empleado.css">
</head>
<body>
    <div class="Edicion">
        
            <h1>Editar Usuario</h1>
        
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <label>Email</label>
            <input type="text" name="email" value="<?php echo $email; ?>"><br>

            <label>Contraseña</label>
            <input type="text" name="contrasena" value="<?php echo $contrasena; ?>"><br>

            <label>Nombre</label>
            <input type="text" name="nombre" value="<?php echo $nombre; ?>"><br>

            <label>Turno</label>
            <input type="text" name="turno" value="<?php echo $turno; ?>"><br>

            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="enviar" value="ACTUALIZAR"><br>
            
            <a href="../vistas/admin.php">Volver</a>
        </form>
    </div>
</body>
</html>

