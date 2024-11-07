<?php
require_once ('./logica/main.php');
$conexion= conectar();
$datosArtista=$conexion->query("SELECT * FROM artistas;");
$datosArtista=$datosArtista->fetchAll();
$datosAlbum=$conexion->query("SELECT * FROM albumes;");
$datosAlbum=$datosAlbum->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form action="../logica/agregarCancion.php" method="POST" class="FormularioAjax">
		<input type="text" name="cancion_nombre" placeholder="nombre" class="input">
		<input type="text" name="cancion_duracion" placeholder="duracion" class="input">
		<input type="text" name="cancion_genero" placeholder="genero" class="input">
		<select name="artista">
			<option value="desconocido" selected="">elija un artista</option>
			<?php
			foreach($datosArtista as $rows){
				echo '<option value="'.$rows['artista_id'].'">'.$rows['artista_nombre'].'</option>';
			}
			 ?>
		</select>
		<select name="artista">
			<option value="desconocido" selected="">elija un álbum</option>
			<?php
			foreach($datosAlbum as $rows2){
				echo '<option value="'.$rows2['album_id'].'">'.$rows2['album_nombre'].'</option>';
			}
			 ?>
		</select>
		<input type="text" name="artista_colab" placeholder="Artista invitado" class="input">
		 <input type="submit" value="subir">
	</form>
</body>
</html>