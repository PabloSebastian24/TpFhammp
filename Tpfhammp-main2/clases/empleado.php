<?php
include("vehiculo.php");
class empleado
{
    public $nombre;
    public $email;
    public $contra;
    public $turno;



    public function __construct($nombre,$email,$contra,$turno)
    {
        
        $this->nombre=$nombre;
        $this->email=$email;
        $this->contra=$contra;
        $this->turno=$turno;
        
    }



    Public function pasapeaje()
    {
        $conexion = mysqli_connect('localhost', 'root', '', 'fhammp') or die('Error al conectar a la base de datos: ' . mysqli_connect_error($conexion));
        // registro de 2 y 3 ejes
        $registros2_3 = mysqli_query($conexion, "SELECT precio FROM precios WHERE id = 1");
        $reg2_3 = mysqli_fetch_array($registros2_3);
        $precio2_3_ejes = $reg2_3['precio'];


        // registro de 4 ejes
        $registros4 = mysqli_query($conexion, "SELECT precio FROM precios WHERE id = 2");
        $reg4 = mysqli_fetch_array($registros4);
        $precio4_ejes = $reg4['precio'];

        // registro de 5 o mas ejes
        $registros5_6 = mysqli_query($conexion, "SELECT precio FROM precios WHERE id = 3");
        $reg5_6 = mysqli_fetch_array($registros5_6);
        $precio5_6_ejes = $reg5_6['precio'];

            // if de asignacion para crear el objeto
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
        
        $ejes=$_POST['ejes'];
        $peso=$_POST['peso'];
        $hora=$_POST['hora'];
        
        
        }
        //if para añadir el precio 
        if($hora =="Hora Pico")
        {       
            $precio;
            //PRECIOS HORA PICO
            if($ejes=="2 ejes"&& $peso="liviano")
            { // 2 y 3 ejes Hora pico
                $precio = $precio2_3_ejes + 120;
                echo "el monto pagado es :". $precio;
            }else if($ejes=="2 ejes"&& $peso="pesado")
            {
                $precio = $precio2_3_ejes + 200;
                echo "el monto pagado es :". $precio;
            }else if($ejes=="3 ejes"&& $peso="liviano" )
            {
                $precio = $precio2_3_ejes + 120 ;
                echo "el monto pagado es :". $precio;
            }else if($ejes=="3 ejes"&& $peso="pesado" )
            {
                $precio = $precio2_3_ejes + 200;
                echo "el monto pagado es :". $precio;
            }else if($ejes=="4 ejes" && $peso="pesado") 
            {  // 4 ejes Hora pico
                $precio = $precio4_ejes + 200;
                echo "el monto pagado es :". $precio;
            }else  if($ejes=="5 ejes o mas"&& $peso="pesado")
            { // 5 ejes Hora pico
                $precio = $precio5_6_ejes + 200;
                echo "el monto pagado es :". $precio;
            }

        }else
        {
            //PRECIOS HORARIO NORMAL
            $precio;


            if($ejes=="2 ejes"&& $peso="liviano")
            {
                $precio = $precio2_3_ejes;
                echo "el monto pagado es :". $precio;
            }else if($ejes=="2 ejes"&& $peso="pesado")
            {
                $precio = $precio2_3_ejes;
                echo "el monto pagado es :". $precio;
            }else if($ejes=="3 ejes"&& $peso="liviano" )
            {
                $precio = $precio2_3_ejes;
                echo "el monto pagado es :". $precio;
            }else if($ejes=="3 ejes"&& $peso="pesado" )
            {
                $precio = $precio2_3_ejes;
                echo "el monto pagado es :". $precio;
            }else if($ejes=="4 ejes" && $peso="pesado")
            {
                $precio = $precio4_ejes;
                echo "el monto pagado es :". $precio;
            }else if($ejes=="5 ejes" && $peso="pesado")
            {
                $precio = $precio5_6_ejes;
                echo "el monto pagado es :". $precio;
            }else if($ejes=="6 ejes"&& $peso="pesado")
            {
                $precio = $precio5_6_ejes;
                echo "el monto pagado es :". $precio;
            }

        }
        

        $auto = new Vehiculos($ejes,$peso,$hora);
        
        
        
        
        $nombredelservidor="localhost";
        $username="root";
        $contrasenia="";
        $dbnombre="fhammp";
        
        $conexion =new mysqli($nombredelservidor,$username,$contrasenia,$dbnombre);
        
        if($conexion->connect_error){
        die("Error de conexion".$conexion->connect_error);
        }
        
        
        $consulta="INSERT INTO vehiculos(ejes,peso,hora,pago)
        VALUES ('$auto->ejes','$auto->peso','$auto->hora','$precio')";
        
        if($conexion->query($consulta)=== TRUE )
        {
            echo "<script language ='JavaScript'>
            alert('El vehiculo paso correctamente');
            window.location.href = '../vistas/empleado.html';
            </script>";

            
        }
    }
}

// CARTEL DE CARGA NO TOCAR

$empleado=new empleado("marcos","Marcos@gmail.com","1234","mañana");
$empleado->pasapeaje();


?>