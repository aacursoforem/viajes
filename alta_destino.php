<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Alta de destino</title>
</head>
<body>

<?php
// Mostramos los datos que recibimos a través de post
	//echo'<pre>'; print_r($_POST); echo'</pre>';
	
// Recogemos los datos que nos pasan por POST	
	$lugar = $_POST['lugar'];
	$continente = $_POST['continente'];
	
// Conectamos a la base de datos	
	$conexion = mysqli_connect('localhost', 'root', '', 'viajes') OR die ("No se puedo realizar la conexión a la base de datos");
	
// Preparamos la consulta a ejecutar (llamada a un procedimiento predefinido en la base de datos)
	$sql = "CALL recogeDestino('$lugar', '$continente')";
	//echo'<p>Contenido de la consulta</p>'; echo $sql;
// Ejecutamos la consulta	
	mysqli_query($conexion, $sql) Or die ("Error dando de alta el destino".mysqli_error($conexion));
// En caso de no producirse el error en la inserción (a través del procedimiento de la BBDD) mostramos todo OK	
	echo'<p>Alta de destino realizada con éxito</p>';
// Cerramos la conexión a la base de datos	
	mysqli_close($conexion);
?>
<p> <a href="index.php">Volver al inicio</a>  </p>

</body>
</html>