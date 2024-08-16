<?php
include "../modelo/conexion.php";

// Método Session iniciada
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

// Verificar si el usuario está autenticado
$usuario_autenticado = isset($_SESSION['usuario_email']);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $usuario_autenticado) {
    $tipo = $_POST['tipo'];
    $email = $_SESSION['usuario_email'];
    $contenido = $_POST['comentario'];

    $exito = $comentario->agregarComentario($tipo, $email, $contenido);

    if ($exito) {
        echo "Comentario agregado exitosamente.";
    } else {
        echo "Error al agregar el comentario.";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && !$usuario_autenticado) {
    echo "Debes iniciar sesión para enviar un comentario.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AULAGUARD | CODECREATORS</title>
    <!--LINKS-->
    <link rel="stylesheet" href="recursos/css/font-awesome.min.css" type="text/css" />
    <script src="https://kit.fontawesome.com/a45e4463fd.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="recursos/css/productos.css">
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
</head>

<body>
    <!--HEADER-->
    <?php
    include "modulos/cabecera1.php";
    ?>
    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__content">
                        <div class="contact__address">
                            <h5>Informacion de contacto</h5>
                            <ul>
                                <li>
                                    <h6><i class="fa fa-map-marker"></i> Dirección</h6>
                                    <p>Condesa Ave Petroleos, Nezahualcoyotl, CP 57820</p>
                                </li>
                                <li>
                                    <h6><i class="fa fa-phone"></i> Numero Telefonico</h6>
                                    <p><span>55-71-17-81-31</span><span>51-25-66-88-86</span></p>
                                </li>
                                <li>
                                    <h6><i class="fa fa-headphones"></i> Soporte</h6>
                                    <p>Support.aulaGuard@gmail.com</p>
                                </li>
                            </ul>
                        </div>
                        <div class="contact__form">
                            <h5>Envianos un mensaje o comentario</h5>
                            <!--FORMULARIO-->
                            <form action="../controlador/ctrlComentario.php" method="POST">
                                <select name="tipo">
                                    <option value="Pregunta y Consulta">Pregunta y Consulta</option>
                                    <option value="Agradecimiento">Agradecimiento</option>
                                    <option value="Sugerencia">Sugerencia</option>
                                    <option value="Quejas o Problemas">Quejas o Problemas</option>
                                    <option value="Denuncia">Denuncia</option>
                                    <option value="Soporte tecnico">Soporte tecnico</option>
                                    <option value="Otro">Otro</option>
                                </select>
                                <br>
                                <input type="email" name="email" placeholder="Correo electrónico">
                                <textarea name="comentario" placeholder="Mensaje"></textarea>
                                <button type="submit" class="site-btn">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <h5 class="text-center">Nuestra ubicación</h5>
                    <div class="contact__map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d8877.896456313678!2d-99.00393730827892!3d19.3896875438705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2smx!4v1695887457989!5m2!1ses!2smx" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
    <!--FOOTER-->
    <?php
    include "modulos/footer.php";
    ?>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

