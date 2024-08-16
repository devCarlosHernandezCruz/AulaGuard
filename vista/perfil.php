<?php
//Metodo Session iniciada
session_start();
include "../modelo/conexion.php";

// Verifica si no hay una sesión de usuario activa
if (!isset($_SESSION['usuario_data'])) {
    // Redirige al usuario a la página de inicio de sesión
    echo '
            <script>
                alert("Por favor debes iniciar sesion");
                window.location = "../index.php";  
            </script>        
        ';
    exit(); // Asegura que el script se detenga después de la redirección
}
$usuario_data = $_SESSION['usuario_data'];
//session_destroy();
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
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="recursos/css/perfil.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <!--HEADER-->
    <?php
    include "modulos/cabecera1.php";
    ?>
    <!--PERFIL SECTION-->
    <form action="../controlador/actualizar_perfil.php" method="post">
        <div class="container light-style flex-grow-1 container-p-y">
            <h4 class="font-weight-bold py-3 mb-4">
                Ajustes de Cuenta
            </h4>
            <div class="text-right mt-3">
                <a href="php/cerrar_session.php" class="btn btn-danger">Cerrar Sesion</a>;

            </div>
            <br>
            <div class="card overflow-hidden">
                <div class="row no-gutters row-bordered row-border-light">
                    <div class="col-md-3 pt-0">
                        <div class="list-group list-group-flush account-settings-links">
                            <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-notifications">Notificaciones</a>
                            <a class="list-group-item list-group-item-action" href="direcciones.php">Mis direcciones</a>
                            <a class="list-group-item list-group-item-action" href="citasUsuario.php">Mis citas</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <!--General-->
                            <div class="tab-pane fade active show" id="account-general">
                                <hr class="border-light m-0">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label">Nombre</label>
                                        <input type="text" name="nuevo_nombre" class="form-control" value="<?php echo $usuario_data['usuario_nombre']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Apellido Paterno</label>
                                        <input type="text" name="nuevo_apellidoP" class="form-control" value="<?php echo $usuario_data['usuario_apellidoP']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Apellido Materno</label>
                                        <input type="text" name="nuevo_apellidoM" class="form-control" value="<?php echo $usuario_data['usuario_apellidoM']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Correo</label>
                                        <input type="text" name="nuevo_email" class="form-control mb-1" value="<?php echo $usuario_data['usuario_email']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Contraseña actual</label>
                                        <input type="text" name="nuevo_password" class="form-control" value="<?php echo $usuario_data['usuario_password']; ?>" >
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Celular</label>
                                        <input type="text" name="nuevo_telefono" class="form-control" value="<?php echo $usuario_data['usuario_telefono']; ?>">
                                        <input type="hidden" name="nuevo_rol" value="<?php echo $usuario_data['usuario_rol']; ?>">
                                    </div>
                                </div>

                            </div>

                            <!--Notificaciones-->
                            <div class="tab-pane fade" id="account-notifications">
                                <div class="card-body pb-2">
                                    <h6 class="mb-4">Actividad</h6>
                                    <div class="form-group">
                                        <label class="switcher">
                                            <input type="checkbox" class="switcher-input" checked>
                                            <span class="switcher-indicator">
                                                <span class="switcher-yes"></span>
                                                <span class="switcher-no"></span>
                                            </span>
                                            <span class="switcher-label">Enviar correo cuando ingrese a mi cuenta</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="switcher">
                                            <input type="checkbox" class="switcher-input">
                                            <span class="switcher-indicator">
                                                <span class="switcher-yes"></span>
                                                <span class="switcher-no"></span>
                                            </span>
                                            <span class="switcher-label">Enviar correo de confirmacion de compra</span>
                                        </label>
                                    </div>
                                </div>
                                <hr class="border-light m-0">
                                <div class="card-body pb-2">
                                    <h6 class="mb-4">Aplicación</h6>
                                    <div class="form-group">
                                        <label class="switcher">
                                            <input type="checkbox" class="switcher-input" checked>
                                            <span class="switcher-indicator">
                                                <span class="switcher-yes"></span>
                                                <span class="switcher-no"></span>
                                            </span>
                                            <span class="switcher-label">Noticias y anuncios</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="switcher">
                                            <input type="checkbox" class="switcher-input">
                                            <span class="switcher-indicator">
                                                <span class="switcher-yes"></span>
                                                <span class="switcher-no"></span>
                                            </span>
                                            <span class="switcher-label">Actualizaciones de productos</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="switcher">
                                            <input type="checkbox" class="switcher-input" checked>
                                            <span class="switcher-indicator">
                                                <span class="switcher-yes"></span>
                                                <span class="switcher-no"></span>
                                            </span>
                                            <span class="switcher-label">Resumen semanal del b+</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="text-right mt-3">
                <button type="submit" class="btn btn-primary">Editar Información</button>&nbsp;
            </div>
        </div><br><br>
    </form>
    <!--FOOTER-->
    <?php
    include "modulos/footer.php";
    ?>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>
    <script src="recursos/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

