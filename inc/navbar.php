<header>
        <input type="checkbox" name="" id="open_menu">
        
        <label for="open_menu" class="header_open_nav_button" role="button">
            <span class="material-symbols-outlined menu">menu</span>
        </label> 

        <label for="toggler" class="togglercontainer darkmode">
            <span class="material-symbols-outlined" id="lightmodeicon">light_mode</span> 
            <span class="material-symbols-outlined" id="darkmodeicon">dark_mode</span>
        </label>
        <input type="checkbox" name="" id="toggler" class="toggler">   
        <?php if(isset($_SESSION['id'])){
            echo'<a href="index.php?vista=miCuenta" class="navoption account">
            <span class="material-symbols-outlined navicon">account_circle</span>
        </a>';
        }else{
            echo'<a href="index.php?vista=iniciarSesion" class="navoption account">
            <span class="material-symbols-outlined navicon">account_circle</span>
        </a>';
        } 
        ?>

        <nav class="nav">
            <ul>
                <li> <a href="" class="principaloption">Recientes</a> </li>
                <li> <a href="" class="principaloption">Populares</a> </li>
                <li> <a href="" class="principaloption">Ofertas</a> </li>
                <li> <a href="" class="principaloption">Géneros</a> </li>
                <li> <a href="" class="principaloption">Artistas</a> </li>
            </ul>
        </nav>

    </header> 