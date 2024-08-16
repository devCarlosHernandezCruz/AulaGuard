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
	<link rel="stylesheet" href="recursos/css/font-awesome.min.css" type="text/css" />
    <script src="https://kit.fontawesome.com/a45e4463fd.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet"/>
	<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
	<link rel="stylesheet" href="recursos/css/login.css" />
</head>
  <body>
  <section class="section_login">
        <div class="center">
        
        <h1 class="title">Modificar Dirección</h1>
        <form action="../Controlador/Control.php" method="post">

        <div class="txt_field">
        Nombre de la calle
        <br>
        <input type="text" class="col-sm-2 col-form-label" name="Calle" id="Calle">
        </div>


        <div class="txt_field">        
        Numero Interior
        <br>
        <input type="number" class="col-sm-2 col-form-label" name="NumeroInterior" id="NumeroInterior">
         </div>

        <div class="txt_field">
        Numero Exterior
        <br>
        <input type="number" class="col-sm-2 col-form-label" name="NumeroExterior" id="NumeroExterior">
         </div> 
        <div class="txt_field">
        Estado
        <br>
        <input type="text" class="col-sm-2 col-form-label" name="Estado" id="Estado">
         </div> 
        <div class="txt_field">
        Colonia
        <br>
        <input type="text" class="col-sm-2 col-form-label" name="Colonia" id="Colonia">
         </div> 
        <div class="txt_field">
        Codigo Postal
        <br>
        <input type="number" class="col-sm-2 col-form-label" name="CodigoPos" id="CodigoPos">
         </div> 
        <div class="txt_field">        
        Ciudad
        <input type="text" class="col-sm-2 col-form-label" name="Ciudad" id="Ciudad">
        </div> 
        
        <input type="number" name="idCliente" value="<?php print $usuario_data['usuario_id']?>">
        
        <button type="submit" class="btn btn-warning" name="AgregarDireccion">Agregar direccion</button>
        
        </form>
        </div>
    </section>
 

    
    
    <script src="https://kit.fontawesome.com/a45e4463fd.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="recursos/js/main.js"></script>
  </body>
</html>
