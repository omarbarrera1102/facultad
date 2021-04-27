<?php
/* alta_alumno.php
 * Recibe los datos de form_alumno.php, los procesa e inserta en la BD
 * Author: omarbarrera11
 * date: 18 03 2021
 */
//Incluir el archivo de conexion a la BD:
include "conexion.php";

//recibe los datos
//print_r($_POST);
$nombre = $_POST['nombre'];
$apaterno = $_POST['apaterno'];
$amaterno = $_POST['amaterno'];
$telefono = $_POST['telefono'];
$correoe = $_POST['correoe'];

//abrir conexión al manejador
//$con=pg_connect("port=5432 dbname=prueba1 user=usuario1 password=hola1") or die(pg_last_error());
//print_r($con);
if($con){
//Genera la consulta:
$query="insert into profesor(nombre_profesor,apaterno_profesor,amaterno_profesor,tel_profesor,correoe_profesor)values('".$nombre."','".$apaterno."','".$amaterno."','".$telefono."','".$correoe."')";
	$query=pg_query($con,$query)or die(pg_last_error());
	if($query){
	echo"<p>Se guardó el registro del profesor</p>";
	echo"<a href='index.php'>Volver al inicio</a></br>";
	echo"<a href='form_profesor.php'>Volver al formulario de registro</a>";
	}
	else{
		echo "No se pudo ejecutar la sentencia SQL";
	}
}
	else{
	echo "Hubo un error al intentar conectar";
}
?>
