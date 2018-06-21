<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Probando la vista</title>
</head>
<body>
<?php
// Conectamos a la base de datos. En caso de error salimos
	$conexion = mysqli_connect('localhost', 'root', '', 'viajes') OR die ("No se puedo realizar la conexión a la base de datos");
	
// Si es la primera vez que llamamos al script del formulario, no hay datos en $_POST['id_destino'] por lo
// que procedemos a mostrar el formulario para que el usuario elija el destino
if (!isset($_POST['id_destino'])) {
?>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<label for="id_destino">Destinos</label>
		<select id="id_destino" name="id_destino">
		
<?php
	// Consulta que devuelva todos los datos de destino para mostrarlos en un select
	$sql = "SELECT id, lugar FROM destinos";
	$destinos = mysqli_query($conexion, $sql) OR die ("Error recuperando destinos".mysqli_error($conexion));
	// A través de un while confeccionamos el código HTML para mostrar un select con los distintos destinos
	while ($dest = mysqli_fetch_assoc($destinos)) {
		echo'<option value="'.$dest['id'].'">'.$dest['lugar'].'</option>';		
	}  // fin while
	echo'</select><br/>';
	echo'<button type="submit">Enviar</button>';
	echo'</form>';
	
} else { // Equivale a la condición if(isset($_POST['id_destino']))
	// En caso de que ya lleguen datos por POST (id_destino) procedemos a mostrar los resultados de la opción del 
	// select (destino) seleccionada por el usuario
	$id_destino = $_POST['id_destino'];
	// Usamos la vista creada en la base de datos a la que añadimos la condicion del destino seleccionado por el usuario
	$sql2 = "SELECT * FROM todoViajes WHERE id_destino=$id_destino";
	//echo'<p>Contenido de la consulta</p>'; echo $sql2; echo'<br/>';
	
	// devuelve los campos precio, id, lugar, zona
	
	$registros = mysqli_query($conexion, $sql2) OR DIE ("Error probando la vista".mysqli_error($conexion));
	// Inicialmente no se publica el título
	$tituloPublicado = false;
	while ($reg = mysqli_fetch_assoc($registros)) {
		// Si el título no se ha publicado lo publicamos e indicamos que ya está publicado para próximas pasadas
		if (!$tituloPublicado) {  		
			echo'<h3>Viajes con destino a '.$reg['lugar'].'</h3>';
			$tituloPublicado = true;
		}
		//echo"Identificador: ".$reg['id']."<br/>";
		echo"Precio: ".$reg['precio']."<br/>";
		//echo"Tipo de viaje: ".$reg['tipo']."<br/>";
		echo"Zona de viaje: ".$reg['zona']."<br/>";
		echo "<hr/>";		
	}
}	// fin else
	mysqli_close($conexion);
?>
<p> <a href="index.php">Volver al inicio</a>  </p>

</body>
</html>