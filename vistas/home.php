<?php
require_once('./logica/main.php');
$conexion=conectar();
$queryAlbumes=$conexion->query("SELECT * FROM albumes INNER JOIN artistas ON albumes.id_artista = artistas.artista_id;");
$queryAlbumes=$queryAlbumes->fetchAll();
?>

<head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/color-thief/2.3.0/color-thief.umd.js"></script>
</head>
<main>

        <section class="intro">

            <div class="intro-content">
                <img src="./vistas/images/icon/vinilo.png" alt="VinilVerse icon">    <h4>VinilVerse</h4>
                <h1>Álbumes</h1>
                <p>Explora una variada colección de álbumes de todos los géneros. Compra y disfruta de música de calidad, 
                desde clásicos hasta los últimos lanzamientos. Encuentra el sonido perfecto y apoya a tus artistas favoritos.</p>
                <button>Explora álbumes</button>
            </div>

            <figure>
            </figure>

        </section>
    <section class="albumsection">
        <?php foreach($queryAlbumes as $album){
        echo '
        <a style="text-decoration: none;" href="index.php?vista=album&album='.$album['album_id'].'">
            <div class="albumcard id="albumcard">
                <div class="albumcard-portrait">
                    <img id="albumimgcolor" src="./images/albumes/'.$album['album_foto'].'" class="albumcard-image" alt="portada del álbum">
                </div>
                <div class="albumcard-name">
                    <p>'.$album['album_nombre'].'</p>
                    <p>'.$album['artista_nombre'].'</p>
                    <p>'.$album['album_precio'].'</p>
                </div>
            </div>
        </a>';
    } ?>
    </section>

    </a>

 


</main>