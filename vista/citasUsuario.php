<?php
session_start();
include "../modelo/conexion.php"; 
$usuario_data = $_SESSION['usuario_data'];
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AULAGUARD | CODECREATORS</title>
    <!--LINKS-->
    <script src="https://kit.fontawesome.com/a45e4463fd.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="recursos/css/acercaDe"/>
    <style>
        .tab{
            margin-top: 50px;
        }
    </style>
    </head>
    <?php
    include "modulos/cabecera1.php"
    ?>
    <!--SECCTION CONTAINER-->
   <div >
    <main class="tab">
    <?php
    include "../Modelo/instaladores.php";
    $direc= new Instalador();
    $direc->citasUsuario($usuario_data['usuario_id']);
    ?>
    </main>
  </div>
    </div>
  </div>
 <br>
 <br>
<br>
    <!--FOOTER-->
    <?php
    include "modulos/footer.php";
    ?>
    
    <script src="https://kit.fontawesome.com/a45e4463fd.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="recursos/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
