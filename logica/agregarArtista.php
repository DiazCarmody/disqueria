<?php
require_once('./main.php');
$conexion=conectar();
$artista_nombre=$_POST['artista_nombre'];
$querySelectArtistas=$conexion->query("SELECT * FROM artistas WHERE artista_nombre='$artista_nombre';");
if ($querySelectArtistas->RowCount()>1) {
 	echo " 
 	<div>
 		Este artista ya se encuentra registrado.
 	</div>
 	";
}else{
	$queryInsertarArtistas=$conexion;
	$queryInsertarArtistas=$queryInsertarArtistas->prepare("INSERT INTO artistas VALUES (NULL,:artista_nombre);");
	$array=[
		":artista_nombre"=>$artista_nombre
	];
	$queryInsertarArtistas->execute($array);
	if ($queryInsertarArtistas->RowCount()>1) {
		echo " 
 		<div>
 			Artista registrado con éxito.
 		</div>
 		";
	}
}
?>