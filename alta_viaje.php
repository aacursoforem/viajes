<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Alta de destino</title>
</head>
<body>
<?php
// Mostramos el contenido de los datos que recibimos por POST
	//echo'<pre>'; print_r($_POST); echo'</pre>';
// Tomamos los datos que nos envían desde el formulario a través del método POST	
	$id_destino = $_POST['id_destino'];
	$precio = $_POST['precio'];

// Incluimos el fichero funciones.php (contiene la función conectaBD
	require("funciones.php");
// Conectamos a la base de datos	
	$conexion = conectaBD();

// Preparamos la consulta para insertar los datos del formulario en la base de datos	
	$sql = "INSERT INTO viajes (id_destino, precio) VALUES ($id_destino, $precio)";
	//echo'<p>Contenido de la consulta</p>';	echo $sql;
	mysqli_query($conexion, $sql) Or die ("Error dando de alta el destino".mysqli_error($conexion));
	mysqli_close($conexion);
	echo'<p>Alta de viaje realizada con éxito</p>';
	
?>
<p> <a href="index.php">Volver al inicio</a>  </p>

</body>
</html>
