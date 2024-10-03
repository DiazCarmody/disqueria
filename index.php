<?php
require_once('./inc/session.php');
require_once('./logica/main.php');
?>
<!DOCTYPE html>
<html lang="es" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="Disquería discos musica">
    <meta name="description" content="Disquería web para comprar discos de vinilo de colección"/>
    <meta name="author" content="Nombre del autor" />
    <meta name="copyright" content="Propietario del copyright" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- ICONS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
        .material-symbols-outlined {
        font-variation-settings:
        'FILL' 0,
        'wght' 280,
        'GRAD' 0,
        'opsz' 24
        }
    </style>


    <link rel="stylesheet" href="./estilos/load.css">
    <link rel="stylesheet" href="./estilos/albumes.css">
    <link rel="stylesheet" href="./estilos/style.css">

    <link rel="icon" href="./vistas/images/icon/vinilo.png">

    <script src="./scripts/scripts.js"></script>

    <!-- SCRIPT DARKMODE -->
    <script>

        const storageTheme = localStorage.getItem('theme');
        const systemColorScheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';

        const newTheme = storageTheme ?? systemColorScheme;

        document.documentElement.setAttribute('data-theme', newTheme);

    </script>

    <!-- SCRIPT LOAD -->
		<script>

			window.onload = function(){
			var contenedor = document.getElementById('contenedor_carga');

			contenedor.style.visibility = 'hidden';
			contenedor.style.opacity = '0';
            document.body.style.overflow = 'auto';
			}

		</script>

    <title>VinylVerse</title>
</head>
<body>
    <div id="contenedor_carga">

		<div id="carga">
        
		</div>

        <div id="text">
        <h3>Cargando...</h3>
        </div>
	</div>
    <?php include_once('./inc/navbar.php'); ?>
    <?php
    $vista = limpiarString(isset($_GET['vista'])) ? limpiarString($_GET['vista']) : 'home';
    switch ($vista) {
        case 'iniciarSesion':
            include("./vistas/iniciarSesion.php");
            break;
        default:
            if (is_file("./vistas/$vista.php")) {
                include("./vistas/$vista.php");
            } else {
                include("./vistas/404.php");
            }
            break;
    }
	?>
<?php include("./inc/footer.php");?>   
</body>
<script src="./logica/ajax.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>