<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AULAGUARD | CODECREATORS</title>
  <!--LINKS-->
  <link rel="stylesheet" href="recursos/css/tarjetas.css">
  <link rel="stylesheet" href="recursos/css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="recursos/css/font-awesome.min.css" type="text/css" />
  <script src="https://kit.fontawesome.com/a45e4463fd.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <link rel="stylesheet" href="recursos/css/productos.css">
  <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
</head>

<body>
  <!--HEADER-->
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
        <li class="link"><a href="direcciones.php">Direcciones</a></li>
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
  <!-- Seccion de productos -->
  <main><br><br>
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4">
          <div class="section-title">
            <h4>Nuestros productos</h4>
          </div>
        </div>
      </div>
    </div>
    <section>
      <div class="container px-4 px-lg-5 mt-5">
        <?php
        require_once '../modelo/conexion2.php';

        $db = new conexion();
        $con = $db->conectar();

        $sql = $con->prepare("SELECT * FROM productos");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
          <?php
          foreach ($resultado as $row) {
          ?>
            <div class="col mb-5">
              <?php
              $producto_id = $row['producto_id'];
              ?>
              <div class="card h-100">
                <!-- Sale badge-->
                <!-- Product image-->
                <?php echo '<img src="data:image/jpeg;base64,' . base64_encode(($row['producto_imagen'])) . '" class="card-img-top">'; ?>
                <!-- Product details-->
                <div class="card-body p-4">
                  <div class="text-center">
                    <!-- Product name-->
                    <h5 class="fw-bolder"><?php echo $row['producto_nombre']; ?></h5>
                    <!-- Product reviews-->
                    <div class="d-flex justify-content-center small text-warning mb-2">
                      <div class="bi-star-fill"></div>
                      <div class="bi-star-fill"></div>
                      <div class="bi-star-fill"></div>
                      <div class="bi-star-fill"></div>
                      <div class="bi-star-fill"></div>
                    </div>
                    <p class="card-text"><?php echo '$'.number_format($row['producto_precio'], 2, '.', ','); ?></p>
                  </div>
                </div>
                <!-- Product actions-->
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                  <div class="text-center">
                  
                    <a class="btn btn-outline-dark mt-auto" href="detalles.php?producto_id=<?php echo $row['producto_id']; ?>&id_usuario=1">Comprar Ahora</a>
                  </div>
                </div>
              </div>
            </div>
          <?PHP } ?>
        </div>
      </div>
    </section>
    <!-- Seccion de productos -->
    <!-- Seccion de servicios -->
    <section class="services spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="services__item">
              <i class="fa fa-car"></i>
              <h6>Compras seguras</h6>
              <p>Productos de calidad</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="services__item">
              <i class="fa fa-money"></i>
              <h6>Garantia de devolucion</h6>
              <p>Todos nuestros productos tienen garantia</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="services__item">
              <i class="fa fa-support"></i>
              <h6>Soporte 24/7</h6>
              <p>Disponibilidad para atenderte</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="services__item">
              <i class="fa fa-headphones"></i>
              <h6>Métodos de pago</h6>
              <p>Pagos seguros 100%</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Seccion de servicios -->
  </main>

  <!--FOOTER-->
  <?php
  include "modulos/footer.php";
  ?>
  <!--FOTTER FIN-->
  <script src="https://kit.fontawesome.com/a45e4463fd.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/scrollreveal"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
