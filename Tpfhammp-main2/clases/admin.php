<?php
include("empleado.php");
class administrador
{
    public $nombre;
    public $email;
    public $contra;
    public $turno;

    //Constructor del administrador. 
    public function __construct($nombre,$email,$contra,$turno)
    {
        
        $this->nombre=$nombre;
        $this->email=$email;
        $this->contra=$contra;
        $this->turno=$turno;
        
    }

    
        //Metodo para crear el empleado. 
    public function crearusuario()
    {
    
     // Crea un objeto del tipo empleado
            

        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        
        {
    
        $nombre = $_POST['nombre'];
        $email=$_POST['email'];
        $contra=$_POST['contra'];
        $turno = $_POST['turno'];
        $nuevoempleado= new empleado($nombre,$email,$contra,$turno);
        if($nuevoempleado)
                {
                    //Muestra por un mensaje de script el usuario que se creo 
                   
        
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

        //Conexionnnnn
        $nombredelservidor="localhost";
        $username="root";
        $contrasenia="";
        $dbnombre="fhammp";
        $conexion =new mysqli($nombredelservidor,$username,$contrasenia,$dbnombre);

            if($conexion->connect_error)
            {
                die("Error de conexion".$conexion->connect_error);
            }


                //Crear un if que verifique el correo si esta ingresado en la base de datos. 

                //inserta los valores de el usuario creado 
                $consulta="INSERT INTO usuarios(Nombre,email,contrasena,Turno)
                VALUES ('$nuevoempleado->nombre','$nuevoempleado->email','$nuevoempleado->contra','$nuevoempleado->turno')";

                if($conexion->query($consulta)== TRUE )
                    {
                        echo "<br>";
                        echo "los datos fueron cargados con exito a la base de datos !!!!!";
                    }
                    else
                    {
                        echo "Error en la carga de datos ".$conexion->error;
                    }
            
    }
}
}

//Instancia de un objeto tipo administrador. 
$administrador=new administrador("Administrador","FERCENTENOGMAIL.COM","1234567","mañana");
//metodo para crear el usuario.
$administrador->crearusuario();
mysqli_close($conexion);












?>