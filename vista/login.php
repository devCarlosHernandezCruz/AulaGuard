<?php
    //Metodo Session iniciada
    session_start();
	 

	if (isset($_SESSION['usuario_email']) && $_SESSION['usuario_rol'] === 'administrador') {
		echo '
			<script>
				alert("No tienes permiso para acceder a esta página.");
				window.location = "admin/index.php";
			</script>
		';
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">

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
	<link rel="stylesheet" href="recursos/css/login.css"/>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
</head>

<body>
	<!--HEADER-->
	<?php
    include "modulos/cabecera1.php";
    ?>
	<!--SECTION LOGIN-->
	<section class="section_login">
		<div class="center">
			<h1>Inicia Sesion</h1>
			<form action="php/login_usuario_be.php" method="POST">
				<div class="txt_field">
					<input type="email" name="usuario_email" required />
					<span></span>
					<label>Correo electronico</label>
				</div>
				<div class="txt_field">
					<input type="password" name="usuario_password" required />
					<span></span>
					<label>Contraseña</label>
				</div>
				<!--<div class="pass">Recuperar contraseña?</div>-->
				<input type="submit" value="Iniciar Sesión"/></a>
				<div class="signup_link">
					Aun no tienes cuenta? <a href="registrarse.php">Registrate</a>
				</div>
			</form>
		</div>
	</section>
	<!--FOOTER-->
	<?php
    include "modulos/footer.php";
    ?>
	<script src="https://unpkg.com/scrollreveal"></script>
	<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
