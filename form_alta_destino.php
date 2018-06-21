<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Alta de destino</title>
</head>
<body>
	<h2>Alta de viaje</h2>
	<form method="post" action="alta_destino.php">
		<label for="lugar">Lugar</label>
		<input type="text" name="lugar" id="lugar" /><br/>		
		<label for="continente">Continente</label>
		<select id="continente" name="continente">
			<option>America</option>
			<option>Europa</option>
			<option>Asia</option>
			<option>Oceania</option>
			<option>Africa</option>
		</select><br/>
		<button type="submit">Enviar</button>	
	</form>

</body>
</html>
