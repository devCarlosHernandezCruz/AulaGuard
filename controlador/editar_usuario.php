<?php
include "../modelo/conexion.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario_id = $_POST['usuario_id'];
    $nuevoNombre = $_POST['nuevo_nombre'];
    $nuevoApellidoP = $_POST['nuevo_apellidoP'];
    $nuevoApellidoM = $_POST['nuevo_apellidoM'];
    $nuevoCorreo = $_POST['nuevo_correo'];
    $nuevoPassword = $_POST['nuevo_password'];
    $nuevoTelefono = $_POST['nuevo_telefono'];
    $nuevoRol = $_POST['nuevo_rol'];

    // Realizar la actualización en la base de datos
    $updateQuery = "UPDATE usuarios 
                    SET usuario_nombre = '$nuevoNombre', 
                        usuario_apellidoP = '$nuevoApellidoP', 
                        usuario_apellidoM = '$nuevoApellidoM', 
                        usuario_email = '$nuevoCorreo', 
                        usuario_password = '$nuevoPassword', 
                        usuario_telefono = '$nuevoTelefono', 
                        usuario_rol = '$nuevoRol' 
                    WHERE usuario_id = $usuario_id";
    $conexion->query($updateQuery);

    // Redirigir a la página de lista de usuarios después de la edición
    header("Location: ../vista/admin/usuarios.php");
}

if (isset($_GET['id'])) {
    $usuario_id = $_GET['id'];
    $query = "SELECT * FROM usuarios WHERE usuario_id = $usuario_id";
    $result = $conexion->query($query);
    $usuario = $result->fetch_object();
}
?>

<?php if (isset($usuario)) : ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>AulaGuuard </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../vista/recursos/">
    <link rel="stylesheet" href="../vista/recursos/vendors/feather/feather.css">
    <link rel="stylesheet" href="../vista/recursos/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../vista/recursos/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vista/recursos/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../vista/recursos/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../vista/recursos/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../vista/recursos/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../vista/recursos/js1/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../vista/recursos/css/vertical-layout-light/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- endinject -->
    </head>

    <body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <?php
        include "../vista/modulos/barra.php";
        ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        <?php
        include "../vista/modulos/lateral.php";
        ?>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-12">
                <div class="home-tab">
                    <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">

                    </div>
                    </div>
                </div>
                </div>
                <!-- content-wrapper ends -->
                <h1 class="text-center p-3">Editar Usuarios</h1>
                <?php
                    include "../vista/modulos/barra.php";
                    ?>
                    
                    
                    <!--1-->
                    <form method="POST" class="container-fluid w-75 p-3">
                        <!--Nombre-->
                        <input type="hidden" name="usuario_id" value="<?= $usuario->usuario_id ?>">
                        <!--Nombre-->
                        <div class="mb-3">
                            <label class="form-label">Nombre:</label>
                            <input type="text" name="nuevo_nombre" class="form-control" value="<?= $usuario->usuario_nombre ?>">
                        </div>
                        <!--Apellido Paterno-->
                        <div class="mb-3">
                            <label class="form-label">Apellido Paterno</label>
                            <input type="text" name="nuevo_apellidoP" class="form-control" value="<?= $usuario->usuario_apellidoP ?>">
                        </div>
                        <!--Apellido Materno-->
                        <div class="mb-3">
                            <label class="form-label">Apellido Materno</label>
                            <input type="text" name="nuevo_apellidoM" class="form-control" value="<?= $usuario->usuario_apellidoM ?>">
                        </div>
                        <!--Correo-->
                        <div class="mb-3">
                            <label class="form-label">Correo</label>
                            <input type="text" name="nuevo_correo" class="form-control" value="<?= $usuario->usuario_email ?>">
                        </div>
                        <!--Password-->
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="text" name="nuevo_password" class="form-control" value="<?= $usuario->usuario_password ?>">
                        </div>
                        <!--Telefono-->
                        <div class="mb-3">
                            <label class="form-label">Telefono</label>
                            <input type="text" name="nuevo_telefono" class="form-control" value="<?= $usuario->usuario_telefono ?>">
                        </div>
                        <!--Rol-->
                        <div class="mb-3">
                            <label class="form-label">Rol</label>
                            <input type="text" name="nuevo_rol" class="form-control" value="<?= $usuario->usuario_rol ?>">
                        </div>
                     
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </form>

                    
                <?php else : ?>
                    <p>Usuario no encontrado.</p>
                <?php endif; ?>
                <!-- partial:partials/_footer.html -->
                <?php
                include "../vista/modulos/footerDash.php";
                ?>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->

        <!-- plugins:js -->
        <script src="../vista/recursos/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="../vista/recursos/vendors/chart.js/Chart.min.js"></script>
        <script src="../vista/recursos/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="../vista/recursos/vendors/progressbar.js/progressbar.min.js"></script>

        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="../vista/recursos/js1/off-canvas.js"></script>
        <script src="../vista/recursos/js1/hoverable-collapse.js"></script>
        <script src="../vista/recursos/js1/template.js"></script>
        <script src="../vista/recursos/js1/settings.js"></script>
        <script src="../vista/recursos/js1/todolist.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="../vista/recursos/js/dashboard.js"></script>
        <script src="../vista/recursos/js/Chart.roundedBarCharts.js"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        

        <!-- End custom js for this page-->
    </body>
</html>
