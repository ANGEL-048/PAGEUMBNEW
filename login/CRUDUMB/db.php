<?php
session_start();

$conn= new mysqli('localhost', 'root', 'heartfilia',"comentarios","3308");

//verificamos la conexion
if(!$conn){
  printf("Connect failed: %s\n", mysqli_connect_error());
  exit();
}else{
  $baseDedatos= mysqli_select_db($conn,"comentarios");
//verificamos la base de datos
  if(!$baseDedatos){
    echo"No Se Encontro La Base De Datos";
  }
}
?>