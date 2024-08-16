<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AULAGUARD | CODECREATORS</title>
    <!--LINKS-->
    <link rel="stylesheet" href="vista/recursos/css/font-awesome.min.css" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="vista/recursos/css/estilos.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <!--HEADER-->
    <header class="header">
        <nav>
            <!--LOGO-->
            <div class="nav_logo">
                <a href="../index.php">
                    <img src="vista/recursos/img/AulaGuard-NoBack.png" alt="">
                </a>
            </div>
            <!--NAVLINKS-->
            <ul class="nav_links" id="nav-links">
                <li class="link"><a href="index.php">Inicio</a></li>
                <li class="link"><a href="vista/productos.php">Productos</a></li>
                <li class="link"><a href="vista/acerca.php">Acerca de</a></li>
                <li class="link"><a href="vista/contact.php">Contactanos</a></li>
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
                        <a class="dropdown-item" href="vista/perfil.php"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Ver Perfil</a>
                        <a class="dropdown-item" href="vista/login.php"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Iniciar sesion</a>
                        <a class="dropdown-item" href="vista/php/cerrar_session.php"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Cerrar Sesion</a>
                    </div>
                </li>

            </div>
        </nav>
        <!--HEADER CONTAINER-->
        <div class="section_container header_container" id="home">
            <h1>Clases seguras para todos</h1><br><br>
            <form><br><br>
                <input type="text" placeholder="Buscar">
                <button><i class="ri-search-line"></i></button>
            </form>
            <a href="#"><i class="ri-arrow-down-double-line"></i></a>
        </div>
    </header>
    <!--SECCTION CHOOSE-->
    <?php
    include "vista/modulos/inicio.php";
    ?>

    <!--FOOTER-->
    <?php
    include "vista/modulos/footer.php";
    ?>
    <!--SCRIPTS-->
    <script src="https://kit.fontawesome.com/a45e4463fd.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="vista/recursos/js/main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
