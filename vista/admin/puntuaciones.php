<?php
// Método Session iniciada
session_start();

// Verificar si la sesión está iniciada y si el rol del usuario es "administrador"
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/646ac4fad6.js" crossorigin="anonymous"></script>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>AulaGuuard </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../recursos/">
  <link rel="stylesheet" href="../recursos/vendors/feather/feather.css">
  <link rel="stylesheet" href="../recursos/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../recursos/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../recursos/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../recursos/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../recursos/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../recursos/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../recursos/js1/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../recursos/css/vertical-layout-light/style.css">
  <!-- endinject -->
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php
    include "../modulos/barra.php";
    ?>
    <!-- partial -->

    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <?php
      include "../modulos/lateral.php";
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
            <main>
              <script>
                function eliminar() {
                  var respuesta = confirm("¿Estás seguro que deseas eliminar la puntuación?");
                  return respuesta;
                }
              </script>
              <h1 class="page-header text-center" >Puntuaciones</h1><br><br>
              <?php
              include "../../modelo/conexion.php";
              include "../../controlador/eliminar_puntuacion.php";
              ?>
              <table class="table table-bordered table-striped" id="MiAgenda" style="margin-top:5px;">
                <thead>
                  <tr>
                    <th>ID PUNTUACION</th>
                    <th>ID USUARIO</th>
                    <th>NOMBRE</th>
                    <th>ID VENTA</th>
                    <th>ID PRODUCTO</th>
                    <th>CALIFICACIÓN</th>
                    <th>DESCRIPCIÓN</th>
                    <th>FECHA</th>
                    <th>Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include("../../modelo/conexion.php");
                  include("../../controlador/eliminar_puntuacion.php");
                  $sql = $conexion->query(" SELECT * FROM puntuaciones");
                  while ($datos = $sql->fetch_object()) { ?>
                    <tr>
                      <td>
                        <?= $datos->review_id ?>
                      </td>
                      <td>
                        <?= $datos->id_product ?>
                      </td>
                      <td>
                        <?= $datos->user_name ?>
                      </td>
                      <td>
                        <?= $datos->id_product ?>
                      </td>
                      <td>
                        <?= $datos->id_product ?>
                      </td>
                      <td>
                        <?= $datos->user_rating ?>
                      </td>
                      <td>
                        <?= $datos->user_review ?>
                      </td>
                      <td>
                        <?= $datos->datetime ?>
                      </td>
                      <td>
                        <!-- Se está enviando el ID de la puntuación en una variable ID y ese id se debe capturar en el controlador -->
                        <a onclick="return eliminar()" href="../admin/puntuaciones.php?id=<?= $datos->review_id ?>"  class="btn btn-danger btn-sm" data-toggle="modal"><span class="fa fa-trash"></span> Eliminar</a>
                              </td>
                      </td>
                    </tr>
                  <?php }
                  ?>
                </tbody>
              </table>
          </div>
          </main>
          <!-- partial:partials/_footer.html -->
          <?php
          include "../modulos/footerDash.php";
          ?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="../recursos/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../recursos/vendors/chart.js/Chart.min.js"></script>
    <script src="../recursos/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="../recursos/vendors/progressbar.js/progressbar.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../recursos/js1/off-canvas.js"></script>
    <script src="../recursos/js1/hoverable-collapse.js"></script>
    <script src="../recursos/js1/template.js"></script>
    <script src="../recursos/js1/settings.js"></script>
    <script src="../recursos/js1/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../recursos/js/dashboard.js"></script>
    <script src="../recursos/js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->

</body>
</html>
