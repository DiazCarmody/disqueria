<?php
require_once('../logica/main.php');
//variables
$nombreAlbum=limpiarString($_POST['album_nombre']);
$id_artista=limpiarString($_POST['artista']);
$precioAlbum=$_POST['precioAlbum'];
$conexion=conectar();
//compruebo que el nombre del album no se repita
$check_album=$conexion->query("SELECT * FROM albumes WHERE album_nombre='$nombreAlbum';");
if($check_album->RowCount()>1){
	echo "ESTE ÁLBUM YA FUE REGISTRADO";
}

//directorio de imagenes
$img_dir="../images/albumes/"; 
//compruebo si la imagen fue seleccionada
if ($_FILES['album_foto']['name']!="" && $_FILES['album_foto']['size']>0) {
	//crear directorio
	if (!file_exists($img_dir)) {
		if(!mkdir($img_dir,0777)){
			echo'ERROR AL CREAR EL DIRECTORIO';
			exit();
		}
	}
	if (mime_content_type($_FILES['album_foto']['tmp_name'])!="image/jpeg" &&
		mime_content_type($_FILES['album_foto']['tmp_name'])!="image/png") {
			echo "LA IMAGEN SELECCIONADA COINCIDE CON UN FORMATO NO PERMITIDO";
			exit();
		}
		##verifico el peso de la imagen
	if (($_FILES['album_foto']['size']/1024)>3072) {
		echo'
		ERROR'.'<br>'.'
		LA IMAGEN ES MUY PESADA
		';
	}
	switch (mime_content_type($_FILES['album_foto']['tmp_name'])) {
		case 'image/jpeg':
			$img_ext=".jpg";
			break;
		case 'image/png':
			$img_ext=".png";
			break;
	}
	chmod($img_dir, 0777);
	$img_nombre=renombrarFotos($nombreAlbum);
	$foto=$img_nombre.$img_ext;
	##mover imagen al directorio
	if (!move_uploaded_file($_FILES['album_foto']['tmp_name'], $img_dir.$foto)) {
		echo"
		¡ERROR!, NO ES POSIBLE SUBIR LA IMAGEN AHORA 
		";
		exit(); 
	}
}else{
	$foto="";
}
$guardarAlbum=conectar();
$guardarAlbum=$guardarAlbum->prepare("INSERT INTO `albumes`(`album_id`, `album_foto`, `album_nombre`, `album_precio`, `id_artista`) VALUES (NULL,:foto,:nombreAlbum,:precioAlbum,:id_artista)");
$datosAlbum=[
	":foto"=>$foto,
	":nombreAlbum"=>$nombreAlbum,
	":precioAlbum"=>$precioAlbum,
	":id_artista"=>$id_artista
];
$guardarAlbum->execute($datosAlbum);

?>