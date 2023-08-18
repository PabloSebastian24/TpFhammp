<html>
<head>
    <title>ELIMINAR Usuario</title>
    <link rel="stylesheet" href="../styles/estilocabina.css">
    <link rel="stylesheet" href="../styles/estilotabla.css">
</head>
<?php
$conexion = mysqli_connect('localhost', 'root', '', 'fhammp');

if (!$conexion) {
    die('Error al conectar a la base de datos: ' . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM usuarios WHERE id='".$id."'";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        echo "<script language ='JavaScript'>
            alert('Registro de usuario eliminado correctamente');
            window.location.href = '../vistas/admin.php';
            </script>";
    } else {
        echo "<script language ='JavaScript'>
            alert('Error al eliminar el registro de usuario');
            window.location.href = '../vistas/admin.php';
            </script>";
    }

    mysqli_close($conexion);
}
?>


<body>
    <div class="Edicion">
        <h1>Eliminar Usuario</h1>
        <p>¿Estás seguro de que deseas eliminar este usuario?</p>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <input type="submit" value="ELIMINAR">
        </form>
        <a href="../vistas/admin.php">Volver</a>
    </div>
</body>
</html>
