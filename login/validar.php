<?php
$usuarios=$_POST['usuarios'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;

$conexion= new mysqli('localhost', 'root', 'heartfilia',"login","3308");

$consulta="SELECT*FROM usuarios where usuarios='$usuarios' and contraseña='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_fetch_array($resultado);

if($filas['id_cargo']==1){ //administrador
    header("location:C:/xampp/htdocs/PAGINA PRINCIPAL UMB/UMB PARTICICLE/login/CRUDUMB/index.php");

}else
if($filas['id_cargo']==2){ //cliente
header("location:cliente.php");
}
else{
    ?>
    <?php
    include("index.html");
    ?>
    <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);

