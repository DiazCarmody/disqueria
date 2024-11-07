<?php
require_once("./logica/main.php");
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
	<h1 class="text-center">lista de artistas</h1>
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
	        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar artista</h1>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	        <form action="../logica/agregarArtista.php" method="POST" class="FormularioAjax" enctype="multipart/form-data">
	        	<div class="form-rest"></div>
	        	<label for="nombre">Nombre del artista</label>
						<input class="form-control" type="text" name="artista_nombre">
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
      <th scope="col">Nombre</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
				<?php
				foreach ($datos as $rows) {
					echo'
					<tr>'.
					'<td>'.$rows['artista_id'].'</td>'.
					'<td>'.$rows['artista_nombre'].'</td>'.
					'<td>
						<a href="" class="btn btn-warning">Editar</a>
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