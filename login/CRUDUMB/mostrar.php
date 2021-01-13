<?php //Abrimos php
	//hacemos la conexion para la base de datos:
	$conectar= new mysqli('localhost', 'root', 'heartfilia',"nuevos_correos","3308");

	//verificamos la conexion
	if(!$conectar){
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}else{
		$baseDedatos= mysqli_select_db($conectar,"nuevos_correos");
	//verificamos la base de datos
		if(!$baseDedatos){
			echo"No Se Encontro La Base De Datos";
		}
	}
	
	//Se Hace la sentencia sql:
	$sql="SELECT * FROM informacion"; //->Donde * es igual a todos los campos entonces la sentencia seria esta-> seleccionamos todos los campos de la tabla datos
	//ejecutamos la sentencia de slq:
	$ejecutar=mysqli_query($conectar,$sql);
	//traenos todos los valores en un array:
	$datos=mysqli_fetch_array($ejecutar);
	//imprimimos los datos de manera dinamica
	echo "<table border='1'>";
	echo"<tr>";
	echo "<th align='center'><b>Nombre</th>";
	echo "<th align='center'><b>Correo</th>";
	echo "<th align='center'><b>Mensaje</th>";
	echo"</tr>";
	for($i=0; $i<$datos; $i++){
		echo"<tr><td>$datos[0]</td>";
		echo"<td>$datos[1]</td>";
		echo"<td>$datos[2]</td>";
		echo"</tr>";
		$datos=mysqli_fetch_array($ejecutar);
	}
	echo"</table>";
?>