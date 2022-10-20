<header class="l-header" id="header">
    <nav class="nav bd-container">
        <a href="../Vista/main.php" class="nav__logo">AL - JOLEO</a>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item"><a href="../Vista/carta.php" class="nav__link">Carta</a></li>
                <?php
                if ($Susuario[0]["tipo"]=='2') { //Si el tipo de usuario es el 2 admin
                    
                    echo "<li class='nav__item'><a href='../Controlador/addPlato.php' class='nav__link'>Añadir Plato</a></li>";
                    echo "<li class='nav__item'><a href='../Controlador/deletePlato.php' class='nav__link'>Eliminar Plato</a></li>";
                }
                
                ?>
                <li class="nav__item"><a href="../Vista/instalaciones.php" class="nav__link">Instalaciones</a></li>
                <li class="nav__item"><a href="../Vista/reserva.php" class="nav__link">Reserva</a></li>
                <?php
                if ($Susuario[0]["tipo"]=='1') { //Si el tipo de usuario es el 1 usuario

                    echo "<li class='nav__item'><a href='../Vista/form_Mail.php' class='nav__link'>Contacto</a></li>";
                }
                ?>
                <li class="nav__item"><a href="../Controlador/close_sesion.php" class="nav__link">Cerrar sesion</a></li>
                <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>
            </ul>
        </div>
        <div class="nav__toggle" id="nav-toggle">
            <i class='bx bx-menu'></i>
        </div>
    </nav>
</header>