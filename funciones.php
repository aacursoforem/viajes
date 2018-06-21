<?php

// Función que crea una conexión a la base de datos y devuelve el identificador de recurso
// En caso de error, de momento no trata excepciones

function conectaBD(){

// Para compatibilizar versiones local y clase usamos lo siguiente
// Si NO EXISTE en la carpeta superior el fichero conexion_viajes.php (estamos en servidor de clase) ejecutamos la conexión al servidor de clase
if (!file_exists("../datos_conexion_viajes.php")) { 
	$servidor ='localhost';
	$usuario='root';
	$password='';
	$basedatos='viajes';
	// Conectamos a la base de datos

} else {  // En caso contrario estamos en server local (home) y podemos usar el fichero de conexion a la BD de home
	require("../datos_conexion_viajes.php");
}
	$conexion = mysqli_connect($servidor, $usuario, $password, $basedatos) or die ("Error al conectar a la base de datos ".$basedatos);
	return $conexion;

}



?>
