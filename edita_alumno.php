<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Formulario de alta de alumnos</title>
	</head>
	<body>
<?php
//Recibir el valor que viaja en la URL
$id = $_GET['id'];
//echo "el id del alumno es: ".$id;
//Consulta de los datos de alumno con ese ID, para mostrarlos en el formulario
$con = pg_connect("port=5432 dbname=prueba1 user=usuario1 password=hola1") or die (pg_last_error());
if ($con){
	$query = "select id_alumno, nombre_alumno, apaterno_alumno, amaterno_alumno, correoe_alumno, tel_alumno from alumnos where id_alumno='".$id."'";
	$query = pg_query($con,$query);
	$resultado = pg_fetch_assoc($query);
	print_r($resultado);
?>
		<h1>Formulario de edicion de alumnos</h1>
		<p>Favor de ingresar los siguientes datos para registrar al alumno:</p>
		<form name="edita" action="actualiza_alumno.php" method="post">
			<label for="nombre">Nombre: </label>
			<input type="text" name="nombre" value="<?=$resultado['nombre_alumno']; ?>"><br/>
			
			<label for="apaterno">Apellido paterno: </label>
			<input type="text" name="apaterno" value= "<?=$resultado['apaterno_alumno']; ?>"><br/>
			
			<label for="amaterno">Apellido materno: </label>
			<input type="text" name="amaterno" value= "<?=$resultado['amaterno_alumno']; ?>"><br/>

			<label for="correoe">Correo electrónico: </label>
			<input type="email" name="correoe" value= " <?=$resultado['correoe_alumno']; ?>"><br/>

			<label for="telefono">Telefono: </label>
			<input type="telefono" name="telefono" value= "<?php $resultado['tel_alumno']; ?>"><br/>
			<input type="hidden" name="id" value="<?php echo $id; ?>"><br/>
			<input type="submit" value="Enviar">
		</form>
<?php
}
?>
	</body>
</html>
