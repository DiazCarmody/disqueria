<head>
    <link rel="stylesheet" href="../estilos/style.css">
</head>

<main class="intro">
    <div class="contenedor intro-content">
        <form autocomplete="off" action="./logica/signin.php" method="POST" class="FormularioAjax">
            <img src="./vistas/images/icon/vinilo.png" class="intro-content img" style="background: none;">
            <h1>VinilVerse</h1>
            <div class="form-rest"></div>
            <input type="text" name="usuario_nombre" placeholder="Nombre de usuario" required class="intro-content input">
            <input type="email" name="email" placeholder="Correo electrónico" required class="intro-content input">
            <input type="password" name="usuario_clave" placeholder="Contraseña" required class="intro-content input">
            <input type="password" name="usuario_clave_confirm" placeholder="Confirmar Contraseña" required class="intro-content input">
            <?php if(isset($_SESSION['id_rol']) && $_SESSION['id_rol']==1): ?>
                <label for="usuario_cargo" class="intro-content label">Cargo</label>
                <input list="rango" name="usuario_cargo" placeholder="Rango" required class="intro-content input">
                <datalist id="rango" name="rango-usuario">
                    <option value="3">Genérico</option>
                    <option value="1">Administrador</option>
                </datalist>
            <?php endif; ?>
            <button type="submit" class="intro-content button">Registrar</button>
            <p>¿Ya posees una cuenta? <a href="index.php?vista=iniciarSesion" class="intro-content link">Inicia sesión</a></p>
        </form>
    </div>
    <br><br>
</main>
</body>
</html>