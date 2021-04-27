<?php
/* alta_profesor.php
 * Abre una conexion a la BD, consulta los registros y los muestra en una tabla
 * Author: omarbarrera11
 * date: 23 03 2021
 */
//abrir conexión al manejador
$con=pg_connect("port=5432 dbname=prueba1 user=usuario1 password=hola1") or die(pg_last_error());

if($con){
//Genera la consulta:
$query="select id_profesor, nombre_profesor, apaterno_profesor, amaterno_profesor, tel_profesor, correoe_profesor from profesor";
	$query= pg_query ($con, $query) or die (pg_last_error());
	$arreglo = pg_fetch_all($query);
	if ($query){
		echo "<p>Lista de profesores</p>";
?>
<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Apellido paterno</th>
			<th>Apellido materno</th>
			<th>Teléfono</th>
			<th>Correo electrónico</th>
		</tr>
	</thead>
	<tbody>
<?php
		/*foreach($arreglo as $clave => $valor){
			echo "la clave: ".$clave." el valor: ".$valor;
			echo "<br/>";
		}*/
?>
<?php
		while ($row = pg_fetch_array($query)){
			echo "<tr>";
			echo "<td>".$row['id_profesor']."</td>";
			echo "<td>".$row['nombre_profesor']."</td>";
			echo "<td>".$row['apaterno_profesor']."</td>";
			echo "<td>".$row['amaterno_profesor']."</td>";
			echo "<td>".$row['tel_profesor']."</td>";
			echo "<td>".$row['correoe_profesor']."</td>";
			echo "<td><a href='edita_profesor.php?id=".$row['id_profesor']."'>Editar registro</td>";
			echo "</tr>";
		}
?>
	</tbody>
</table>
<?php
		echo "<a href='index.php'>Volver al inicio</a><br/>";
		echo "<a href='form_profesor.php'>Volver al formulario de registro</a>";
	}
	else{
		echo "No se puede ejecutar la sentencia SQL";
	}
}
else {
	echo "hubo un error al intentar conectar";
}

		/*echo "<a href='index.php'>Volver al inicio</a><br/>";
		echo "<a href='form_alumno.php>Volver al formulario de registro</a>";
	}
	else{
		echo "No se pudo ejecutar la sentencia SQL";	
	}
}
else {
	echo "Hubo un error al intentar conectar";
}*/
?>
