<?php
require_once('../logica/main.php');
$conexion= conectar();
$datos=$conexion->query("SELECT * FROM artistas;");
$datos=$datos->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Agregar Álbum</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
	<form action="../logica/agregarAlbum.php" method="POST" class="form-rest" enctype="multipart/form-data">
		<label for="nombre">Nombre del álbum</label>
		<input type="text" name="album_nombre">
		<label for="artista">Artista</label>
		<select name="artista">
			<option value="desconocido" selected="">elija un artista</option>
			<?php
			foreach($datos as $rows){
				echo '<option value="'.$rows['artista_id'].'">'.$rows['artista_nombre'].'</option>';
			}
			?>
		</select>
		<input type="number" step="0.01" name="precioAlbum">
		<input type="file" name="album_foto">
		<input type="submit" value="agregar">
	</form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="../logica/ajax.js"></script>
</html>