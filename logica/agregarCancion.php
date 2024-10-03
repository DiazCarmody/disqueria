<?php
require_once('./main.php');
$con = conectar();

$nombreCancion=$_POST['nombreCancion'];
$duracionCancion=$_POST['duracionCancion'];
$generoCancion=$_POST['generoCancion'];
$id_artista=$_POST['id_artista'];
$id_album=$_POST['id_artista'];
$artista_colab=$_POST['artista_colab'];
// $var=$_POST[''];
$insertar=$con->prepare("INSERT INTO `canciones`(`cancion_id`, `cancion_nombre`, `cancion_duracion`, `genero`, `album_id`, `artista_id`, `artista_colab`) VALUES (NULL,:nombreCancion,:duracionCancion,:generoCancion,:id_artista,:id_album,:artista_colab)");
$datos_cancion=[
"nombreCancion"=>$nombreCancion,
"cancion_duracion"=>$duracionCancion,
"genero"=>$generoCancion,
"id_artista"=>$id_artista,
"id_album"=>$id_album,
"artista_colab"=>$artista_colab
];
$insertar->execute($datos_cancion);
$insertar=null;
?>