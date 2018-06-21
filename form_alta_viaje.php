<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Alta de viaje</title>
</head>
<body>
	<h2>Alta de viaje</h2>
	<form method="post" action="alta_viaje.php">		
		<label for="id_destino">Destinos</label>
		<select id="id_destino" name="id_destino">
		
<?php
// Incluimos el fichero funciones.php (contiene la función conectaBD
	require("funciones.php");
// Conectamos a la base de datos	
	$conexion = conectaBD();

	// Preparamos una consulta que devuelva todos los datos de destino (id y lugar)
	$sql = "SELECT id, lugar FROM destinos";
	$destinos = mysqli_query($conexion, $sql) OR die ("Error recuperando destinos".mysqli_error($conexion));
	// Mostramos un select con los distintos destinos que se encuentran en la base de datos
	while ($dest = mysqli_fetch_assoc($destinos)) {
		echo'<option value="'.$dest['id'].'">'.$dest['lugar'].'</option>';		
	}
	mysqli_close($conexion);
	?>				
		</select><br/>
		<label for="precio">Precio</label>
		<input type="text" name="precio" id="precio" /><br/>		
		<button type="submit">Enviar</button>	
	</form>

</body>
</html>
