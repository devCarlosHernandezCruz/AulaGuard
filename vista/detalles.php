<?php

$producto_id = $_GET['producto_id'];
$id_usuario = $_GET['id_usuario'];
$conectar = mysqli_connect("localhost", "root", "", "aulaguard");
$sql = "SELECT * FROM productos where producto_id = '$producto_id'";
$consulta = mysqli_query($conectar, $sql);


if ($row = mysqli_fetch_array($consulta)) {

  $producto_nombre = $row['producto_nombre'];
  $producto_descripcion = $row['producto_descripcion'];
  $producto_precio = $row['producto_precio'];

  $img = base64_encode($row['producto_imagen']);
  $imagenSrc = "data:image/png;base64," . $img;
  $producto_descuento = $row['producto_descuento'];
  $precio_desc = $producto_precio - (($producto_precio * $producto_descuento) / 100);
} else {
  echo 'Error al procesar la peticion';
  exit;
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AULAGUARD | CODECREATORS</title>
    <!--LINKS-->
    <link rel="stylesheet" href="recursos/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="recursos/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="recursos/css/bootstrap.min.css" type="text/css" />
    <script src="https://kit.fontawesome.com/a45e4463fd.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="recursos/css/style.css" type="text/css">
    <script
    src="https://kit.fontawesome.com/81581fb069.js"
    crossorigin="anonymous"
  ></script>
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="recursos/css/acercaDe.css" />
    <link rel="stylesheet" href="recursos/css/detailsProducts.css" />
  </head>
  <body>
    <!--HEADER-->
    <?php
    include "modulos/cabecera1.php";
    ?>
    <br><br><br><br>
    <?php
    include "modulos/detalles.php";
    ?>
    <!-- Seccion de servicios -->
    <?php
    include "modulos/servicios.php";
    ?>
    <!-- Seccion de servicios -->
    <!--Productos relacionados-->
    <?php
    include "modulos/masProductos.php";
    ?>
    <!--FOOTER-->
    <?php
    include "modulos/footer.php";
    ?>
    <script src="https://kit.fontawesome.com/a45e4463fd.js" crossorigin="anonymous"></script>
    <script src="recursos/js/jquery-3.3.1.min.js"></script>
    <script src="recursos/js/bootstrap.min.js"></script>
    <script src="recursos/js/jquery.magnific-popup.min.js"></script>
    <script src="recursos/js/jquery-ui.min.js"></script>
    <script src="recursos/js/mixitup.min.js"></script>
    <script src="recursos/js/jquery.countdown.min.js"></script>
    <script src="recursos/js/jquery.slicknav.js"></script>
    <script src="recursos/js/owl.carousel.min.js"></script>
    <script src="recursos/js/jquery.nicescroll.min.js"></script>
    <!--Nuevos-->
	<script src="recursos/js/details.js"></script>
	<script src="recursos/js/detalles.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="recursos/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
