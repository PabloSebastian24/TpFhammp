<?php


class Vehiculos
{


  public $ejes;
  public $peso;
  public $hora;
  public $precio;
 

  public function __construct($ejes, $peso, $hora)
    {
      $this -> ejes=$ejes;
      $this -> peso=$peso;
      $this-> hora=$hora;
    }

  public function getdatos($ejes,$peso)
    {
      $this->ejes=$ejes;
      $this->peso=$peso;


      echo "El vehiculo cuenta con : $ejes <br>";
      echo "El vehiculo es : $peso <br>";
      echo "¡El vehiculo se ha cargado correctamente!";
    }

   


} 


?>