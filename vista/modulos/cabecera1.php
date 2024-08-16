<header class="header">
  <nav>
    <!--LOGO-->
    <div class="nav_logo">
      <a href="../index.php">
        <img src="recursos/img/AulaGuard-NoBack.png" alt="" />
      </a>
    </div>
    <!--NAVLINKS-->
    <ul class="nav_links" id="nav-links">
      <li class="link"><a href="../index.php">Inicio</a></li>
      <li class="link"><a href="productos.php">Productos</a></li>
      <li class="link"><a href="acerca.php">Acerca de</a></li>
      <li class="link"><a href="contact.php">Contactanos</a></li>
    </ul>
    <!--LOGO-->
    <div class="nav_menu_btn" id="menu-btn">
      <span><i class="ri-menu-line"></i></span>
    </div>

    <!--ACTIONS-->
    <div class="nav_actions">
      <a href="vista/carrito.php"><span><i class="ri-shopping-cart-2-fill"></i></span></a>

      <li class="nav-item dropdown d-none d-lg-block user-dropdown ">

        <a href="vista/login.php" class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
          <span><i class="ri-user-fill"></i></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
          <div class="dropdown-header text-center">
            <p class="mb-1 mt-3 font-weight-semibold">Bienvenido</p>
          </div>
          <a class="dropdown-item" href="perfil.php"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Ver Perfil</a>
          <a class="dropdown-item" href="../vista/login.php"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Iniciar sesion</a>
          <a class="dropdown-item" href="../vista/php/cerrar_session.php"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Cerrar Sesion</a>
        </div>
      </li>
    </div>
  </nav>
</header>
