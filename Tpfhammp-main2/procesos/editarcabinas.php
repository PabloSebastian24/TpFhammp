<?php
$conexion = mysqli_connect('localhost', 'root', '', 'fhammp');

if (!$conexion) {
    die('Error al conectar a la base de datos: ' . mysqli_connect_error());
}

if (isset($_POST['enviar'])) {
    $ncabina = $_POST['ncabina'];
    $nuevoEstado = $_POST['estado'];

    $sql = "UPDATE cabinas SET estado='" . $nuevoEstado . "' WHERE Ncabina='" . $ncabina . "'";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        echo "<script language ='JavaScript'>
        alert('Los datos se actualizaron correctamente');
        window.location.href = '../vistas/admin.php';
        </script>";
    } else {
        echo "<script language ='JavaScript'>
        alert('Los datos NO se actualizaron correctamente');
        window.location.href = '../vistas/admin.php';
        </script>";
    }
    mysqli_close($conexion);
} elseif (isset($_GET['ncabina'])) {
    $ncabina = $_GET['ncabina'];
    $sql = "SELECT * FROM cabinas WHERE Ncabina='" . $ncabina . "'";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);
        $estado = $fila["estado"];
    } else {
        echo "No se encontró la cabina.";
        exit;
    }

    mysqli_close($conexion);
} 

?>

<html>

<head>
    <title>EDITAR</title>
    <link rel="stylesheet" href="../styles/estilocabina.css">
    <link rel="stylesheet" href="../styles/estilotabla.css">
</head>

<body>
    <div class="Edicion">
        <h1>Editar Estado de Cabinas</h1>

        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">

            <label>Número de Cabina</label>
            <input type="text" name="ncabina" > <br>
        <div class="selectestado">
            <label>Nuevo Estado</label>
            <select name="estado" id="nuevoestado ">
            <option value="NUEVA"> NUEVA </option>
            <option value="INHABILITADO"> INHABILITADO </option>
            <option value="REPARADO"> REPARADO </option>
            </select>
        </div>
            <input type="submit" name="enviar" value="ACTUALIZAR"> <br>

            <a href="../vistas/admin.php">Volver</a>
        </form>
    </div>
</body>

</html>
