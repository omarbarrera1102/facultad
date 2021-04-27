<?php
//Abrir una conexion al manejador de BD:
$con = pg_connect("port=5432 dbname=prueba1 user=usuario1 password=hola1") or die (pg_last_error());
if($con){
	echo "Se conectó a la BD";
}
else{
	echo "Hubo un problema al conectar a la BD";
}


?>
