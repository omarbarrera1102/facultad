<?php
/* alta_alumno.php
 * Abre una conexion a la BD, consulta los registros y los muestra en una tabla
 * Author: omarbarrera11
 * date: 23 03 2021
 */
//abrir conexión al manejador
$con=pg_connect("port=5432 dbname=prueba1 user=usuario1 password=hola1") or die(pg_last_error());

if($con){
	//Genera la consulta:
	$query="select id_alumno, nombre_alumno, apaterno_alumno, amaterno_alumno, tel_alumno, correoe_alumno from alumnos order by apaterno_alumno asc";

	$query= pg_query ($con, $query) or die (pg_last_error());
	if ($query){
		echo "<p>Lista de alumnos</p>";
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
		while ($row = pg_fetch_array($query)){
			echo "<tr>";
			echo "<td>".$row['id_alumno']."</td>";
			echo "<td>".$row['nombre_alumno']."</td>";
			echo "<td>".$row['apaterno_alumno']."</td>";
			echo "<td>".$row['amaterno_alumno']."</td>";
			echo "<td>".$row['tel_alumno']."</td>";
			echo "<td>".$row['correoe_alumno']."</td>";
			echo "<td><a href='edita_alumno.php?id=".$row['id_alumno']."'>Editar registro</a></td>";
			echo "<td><a href='borrar_alumno.php?id=".$row['id_alumno']."'>Eliminar registro</a></td>";
			echo "</tr>";
		}
?>
	</tbody>
</table>
<?php
		echo "<a href='index.php'>Volver al inicio</a><br/>";
		echo "<a href='form_alumno.php'>Volver al formulario de registro</a>";
	}
	else{
		echo "No se puede ejecutar la sentencia SQL";
	}
}
else {
	echo "Hubo un error al intentar conectar";
}
?>
