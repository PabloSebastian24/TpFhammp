<?php

include("../vistas/index.html");

$conection = mysqli_connect("localhost", "root", "", "fhammp")or die("Problemas con la conexion". mysqli_error($conection));
      
        
      if(isset($_POST['registro'])){

          if(strlen($_POST['correo'])>= 1 && strlen($_POST['contrasenia'])>=1)
          {
              $mail= trim($_POST['correo']);
              $contra= trim($_POST['contrasenia']);
              $consulta = mysqli_query($conection, "SELECT email,contrasena,adm FROM usuarios WHERE Email='$_REQUEST[correo]' AND contrasena='$_REQUEST[contrasenia]'") 
              or die("Problemas en el select:" . mysqli_error($conection));
              if ($reg= mysqli_fetch_array($consulta))
              {
                  if ($reg['adm']== 1) {
                      header("Location: ../vistas/admin.php");
                  } else {
                      if ($reg['adm']== 0) {
                          header("Location: ../vistas/empleado.html");    
                      }else {
                          echo "El usuario no se encuentra en el servidor";
                      } 
                  }
              }else
              {
               echo "Usuario incorrecto";
              }

          }else{
              echo "Por favor completa los datos ";
          }

      }
      mysqli_close($conection);
      
     ?>