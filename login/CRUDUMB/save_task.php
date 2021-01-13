<?php

include('db.php');
$id = '';
$nombre = '';
$mensaje= '';

if (isset($_GET['SEARCH'])) {
  $id = $_GET['ID'];
  $nombre = $_GET['NOMBRE'];
  $mensaje = $_GET['MENSAJE'];
  $query = "SELECT nombre,mensaje FROM cajacomentarios where id = $id or nombre = '$nombre' or mensaje = '$mensaje'";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }


	$datos=mysqli_fetch_array($result);
	//imprimimos los datos de manera dinamica
	echo "<table border='1'>";
	echo"<tr>";
	echo "<th align='center'><b>Nombre</th>";
	echo "<th align='center'><b>Mensaje</th>";
	echo"</tr>";
	for($i=0; $i<$datos; $i++){
		echo"<tr><td>$datos[0]</td>";
		echo"<td>$datos[1]</td>";
		echo"</tr>";
		$datos=mysqli_fetch_array($result);
	}
	echo"</table>";



}

?>

