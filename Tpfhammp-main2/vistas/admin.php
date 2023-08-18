
<!-- Establecer conexion -->
<?php

    $conexion = mysqli_connect('localhost', 'root', '', 'fhammp');

    if (!$conexion) {
        die('Error al conectar a la base de datos: ' . mysqli_connect_error());
      }
?>
    
<!DOCTYPE html>
<html lang="ES">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
  
   <link rel="stylesheet" href="../Styles/estilocabina.css">
   <link rel="stylesheet" href="../Styles/estilotabla.css">

   <script src="Script.js"></script>
  
   
   <script src="conexion.php"></script>
</head>
   <body>

    <div class="nav">

      <a href="admin.php" class="logo">
      <img src="../Imagenes/logo.png">
      </a>
     
   </div>

   
   
    
    <div class="navegacion">
      
       <div class="btnsalir">
          <a href="../vistas/index.html"> Cerrar Sesion</a>
       </div>

        <a href="#Precios" class="precios">Precios</a>
        <a href="#Usuarios" class="precios">Usuarios</a>
        <a href="#Cabinas" class="precios">Cabinas</a>
  
    </div>
 
  <br>
  <br>

    <!-- usuarios -->
    <div id="Usuarios">
    <div class ="text1">
      
      <h1> Lista de usuarios </h1>
      
      </div>
     <?php
     $sql="select * from usuarios";
     $resultado=mysqli_query($conexion,$sql)
     ?>
      <table class="styled-table">
        <thead>
          <tr>

            <th>id.</th>
            <th>Email.</th>
            <th>Contraseña.</th>
            <th>Nombre.</th>
            <th>Turno.</th>
            <th>Acciones.</th>

          </tr>
        </thead>
        <tbody>
              <?php
                   while($filas=mysqli_fetch_assoc($resultado)) {
              ?>
          <tr>
            <td> <?php echo $filas ['id'] ?> </td>
            <td> <?php echo $filas ['Email'] ?> </td>
            <td> <?php echo $filas ['Contrasena'] ?></td>
            <td> <?php echo $filas ['Nombre'] ?></td>
            <td> <?php echo $filas ['Turno'] ?></td>
            <td> 
              
            <a class="textdelete" href="javascript:void(0);" onclick="confirmarEliminacion(<?php echo $filas['id'] ?>)">ELIMINAR</a>
            -
            
            <?php echo "<a href= '../procesos/editaruser.php?id=".$filas['id']."' class='BNTA'> MODIFICAR </a>"; ?>
            </td>
            
          </tr>
          <?php
             }
          ?>
        </tbody>
        <!-- Script de pregunta -->
        <script>
            function confirmarEliminacion(id) {
              if (confirm('¿Estás seguro de que deseas eliminar este usuario?')) {
              window.location.href = '../procesos/eliminar.php?id=' + id;
                 }
              }   
         </script>
      </table> 
      <br>
      <br>
      <form action="../vistas/createuser.html" method="post">
       <input type="submit" value ="AGREGAR USUARIO" class="agregarbtn">
       </form>
      </div>
    </div> 
    </div>


 <br>
 <br>
 <br>
 <br>
 <br>
 
  <div id="Precios">
    <!-- precios-->
    <div class = "Editardatos">
      <div class ="text1">
      
      <h1> Lista de precios </h1>
      
      </div>

     <?php
      $sql="select * from precios";
      $resultados=mysqli_query($conexion,$sql)
     ?>
     
      <table class="styled-table">
        <thead>
          <tr>

            <th>id.</th>
            <th>opcion.</th>
            <th>precio.</th>
            <th>Acciones.</th>

          </tr>
        </thead>
        <tbody>
              <?php
                   while($filas=mysqli_fetch_assoc($resultados)) {
              ?>
          <tr>
            <td> <?php echo $filas ['id'] ?> </td>
            <td> <?php echo $filas ['opcion'] ?> </td>
            <td> <?php echo $filas ['precio'] ?></td>
            <td> 
              <?php echo "<a href= '../procesos/editarprecios.php?id=".$filas['id']."'> EDITAR </a>"; ?>
              
            </td>
          </tr>
          <?php
             }
          ?>
        </tbody>
      </table> 

    
    </div> 
    </div>


   <!-- estado de cabinas !-->
   <div id="Cabinas">
    <div class = "Editardatos">
      <div class ="text1">
      
      <h1> Cabinas </h1>
      
      </div>

     <?php
      $sql="select * from cabinas";
      $resultados=mysqli_query($conexion,$sql)
     ?>
     
      <table class="styled-table">
        <thead>
          <tr>

            
            <th>Numero de cabina</th>
            <th>Estado</th>
            <th>Acciones</th>

          </tr>
        </thead>
        <tbody>
              <?php
                   while($filas=mysqli_fetch_assoc($resultados)) {
              ?>
          <tr>
          
            <td> <?php echo $filas ['Ncabina'] ?> </td>
            <td> <?php echo $filas ['estado'] ?> </td>
          
            <td><form action= "../procesos/editarcabinas.php" method="post">
              
              <input type="submit" value="ADMINISTRAR" class="agregarbtn">
              
            </form></td>
          </tr>
          <?php
             }
          ?>
        </tbody>
      </table> 

      <?php 
      mysqli_close($conexion);
      ?>
    </div>
    </div> 
<br>


    <footer class="footer">
        <p>&copy; <?php echo date("Y"); ?> FHAMMP - Todos los derechos reservados.</p>
    <footer>
    
</body>
</html>