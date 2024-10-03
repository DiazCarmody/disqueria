<?php
require_once("../logica/main.php");
$con=conectar();
$datos=$con->query("SELECT * FROM artistas");
$datos=$datos->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
	<h1 class="text-center">lista de álbumes</h1>
	<!-- TABLA -->
<div class="p-3 table-responsive">
		<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
cargar
</button>

<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Álbum</h1>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	        <form action="../logica/agregarAlbum.php" method="POST" class="FormularioAjax" enctype="multipart/form-data">
	        	<div class="form-rest"></div>
	        	<label>Portada</label>
	        	<input class="form-control" type="file" name="album_foto">
	        	<label for="nombre">Nombre del álbum</label>
						<input class="form-control" type="text" name="album_nombre">
						<label for="artista">Artista</label>
						<select class="form-control" name="artista">
							<option value="desconocido" selected="">elija un artista</option>
								<?php
									foreach($datos as $rows){
										echo '<option value="'.$rows['artista_id'].'">'.$rows['artista_nombre'].'</option>';
									}
			 					?>
						</select>
						<label for="precio">Precio</label>
						<input class="form-control" type="number" step="0.01" name="precioAlbum">
						<input class="form-control btn btn-success" type="submit" value="Cargar" name="btnregistrar">
	        </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
	      </div>
	    </div>
	  </div>
	</div>	
<!-- modal  -->

	<table class="table table-hover table-stripped table-dark ">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Portada</th>
      <th scope="col">Título</th>
      <th scope="col">Artista</th>
      <th scope="col">Precio</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
				<?php
				$conexion=conectar();
				$queryAlbumes=$conexion->query("SELECT * FROM albumes INNER JOIN artistas ON albumes.id_artista = artistas.artista_id;");
				$queryAlbumes=$queryAlbumes->fetchAll();
				foreach ($queryAlbumes as $datosAlbumes) {
					echo'
					<tr>'.
					'<td>'.$datosAlbumes['album_id'].'</td>'.
					'<td>'.'<img height="100px" src="../images/albumes/'.$datosAlbumes['album_foto'].'"alt="album">'.'</td>'.
					'<td>'.$datosAlbumes['album_nombre'].'</td>'.
					'<td>'.$datosAlbumes['artista_nombre'].'</td>'.
					'<td>'.'$'.$datosAlbumes['album_precio'].'</td>'.
					'<td>
						<a href=""  class="btn btn-warning">Editar</a>
						<a href="" class="btn btn-danger">Borrar</a>
					</td>'.
					'</tr>';
				}?>
	</tbody>
</table>
	</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="../logica/ajax.js"></script>
</html>