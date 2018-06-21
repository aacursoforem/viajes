<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Listado de viajes</title>
</head>
<body>
<h2>Listado de viajes</h2>
<?php
// Incluimos el fichero funciones.php (contiene la función conectaBD
	require("funciones.php");
// Conectamos a la base de datos	
	$conexion = conectaBD();
	
// Preparamos la consulta a la base de datos. Usamos la función definida en la BD tipoViaje que en función 
// del precio indica el tipo de viaje (Normal, Bussness, VIP)
// e 	
	$sql = "SELECT id_destino, precio, tipoViaje(precio) as 'tipo' FROM viajes;";
	//echo $sql;
// Ejecutamos la consulta en la base de datos
	$registros = mysqli_query($conexion, $sql) OR DIE ("Error buscando listado".mysqli_error($conexion));

	// Mostramos los datos de la base de datos	
	while ($reg = mysqli_fetch_array($registros)) {
		echo"Destino: ".$reg['id_destino']."<br/>";
		echo"Precio: ".$reg['precio']."<br/>";
		echo"Tipo de viaje: ".$reg['tipo']."<br/>";
		echo "<hr/>";		
	}
	mysqli_close($conexion);

?>

<p> <a href="index.php">Volver al inicio</a>  </p>
</body>
</html>
