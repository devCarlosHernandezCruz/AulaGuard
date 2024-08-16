<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="es" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AULAGUARD | CODECREATORS</title>
  <!--LINKS-->
  <link rel="stylesheet" href="recursos/css/font-awesome.min.css" type="text/css" />
    <script src="https://kit.fontawesome.com/a45e4463fd.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <link rel="stylesheet" href="recursos/css/registro.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

  <!--HEADER-->
  <?php
    include "modulos/cabecera1.php";
    ?>

  <!--SECTION REGISTER-->
  

  <!--SECCTION CONTAINER-->
  <section class="section_cont">
    <div class="section_login">
      <div class="center">
        <h1>Registrate</h1>

        <form method="POST" action="php/registro_usuario_be.php">
          <div class="txt_field">
            <input type="text" name="usuario_nombre" required>
            <span></span>
            <label>Nombre(s)</label>
          </div>
          <div class="txt_field">
            <input type="text" name="usuario_apellidoP" required>
            <span></span>
            <label>Apellido</label>
          </div>
          <div class="txt_field">
            <input type="email" name="usuario_email" required>
            <span></span>
            <label>Correo electronico</label>
          </div>
          <div class="txt_field">
            <input type="password" name="usuario_password" required>
            <span></span>
            <label>Contraseña</label>
          </div>
          
          <input type="checkbox" name="" id="">
          <label>Acepto terminos y condiciones</label> <br><br>
          <div class="pass">Recuperar contraseña?</div>
          <input type="submit" value="Registrarse">
          <div class="signup_link">
            Ya tienes cuenta? <a href="/HTML/iniciosesion.html">Inicia Sesión</a>
          </div>
        </form>
      </div>
    </div>

  </section>

  <!--FOOTER-->
  <?php
    include "modulos/footer.php";
    ?>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>


</html>
