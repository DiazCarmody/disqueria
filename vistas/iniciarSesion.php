<main class="intro">
    <div class="contenedor intro-content">
        <form action="" method="POST" class="">
            <img src="./vistas/images/icon/vinilo.png" class="intro-content img">
            <h1 class="titulo_sesion">VinilVerse</h1>
            <div class="form-rest"></div>
            <input type="email" class="intro-content input" name="email_usuario" placeholder="Ingrese su Email..." required>
            <input type="password" class="intro-content input" name="clave_usuario" placeholder="Ingrese su contraseña..." required>
            <button type="submit" class="intro-content button">Ingresar</button>
            <p class="intro-content texto2">¿No posees una cuenta? <a href="index.php?vista=usuario_nuevo" class="intro-content link">Regístrate</a></p>
            <?php 
            if (isset($_POST['email_usuario']) && isset($_POST['clave_usuario'])){
                include_once('./logica/login.php');
            }
            ?>
        </form>
    </div>
</main>