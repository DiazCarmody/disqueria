<?php
$id_album=limpiarString($_GET['album']);
$con=conectar();
$traerAlbum=$con->query("SELECT * FROM albumes INNER JOIN artistas ON albumes.id_artista = artistas.artista_id  WHERE album_id = '$id_album';");
if($traerAlbum->rowCount()>0){
    $traerAlbum=$traerAlbum->fetch(); // Obtener un solo álbum
}
?>
    <main class="albumes">
    <?php if (!empty($traerAlbum)): // Verifica que el álbum no esté vacío ?>
        <div class="product-container">
            <div class="product-image">
                <img src="./images/albumes/<?php echo $traerAlbum['album_foto'];?>" alt="portada del álbum">
            </div>
            <div class="product-info">
                <div class="product-name"><?php echo $traerAlbum['album_nombre'];?></div>
                <div class="product-artist"><?php echo $traerAlbum['artista_nombre'];?></div>
                <div class="product-price">$ <?php echo $traerAlbum['album_precio'];?></div>
                <button class="add-to-cart">Agregar al carrito</button> <!-- Botón agregado -->
            </div>
        </div>
    <?php else: ?>
        <p>No se encontró el álbum.</p> <!-- Mensaje si no hay álbum -->
    <?php endif; ?>
    </main>