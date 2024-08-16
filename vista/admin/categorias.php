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
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>AulaGuuard </title>
  <!-- plugins:css -->
  <link href="bootstrap.minC.css" rel="stylesheet">
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
  <script src="https://kit.fontawesome.com/a45e4463fd.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
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
              <div class="container">
                <h1 class="page-header text-center">Categorias</h1>
                <div class="row">
                  <div class="col-sm-12">

                    <a href="#addNew" class="btn btn-primary" data-toggle="modal" style="margin-bottom: 8px;"><span class="fa fa-plus"></span> Nuevo</a>

                    <?php
                    if (isset($_SESSION['message'])) {
                    ?>
                      <div class="alert alert-dismissible alert-success" style="margin-top: 20px;">
                        <button type="button" class="close" data-dismiss="alert">
                          &times;
                        </button>
                        <?php echo $_SESSION['message']; ?>
                      </div>

                    <?php
                      unset($_SESSION['message']);
                    }
                    ?>
                    <table class="table table-bordered table-striped" id="MiAgenda" style="margin-top:20px;">
                      <thead>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>ACCIONES</th>
                      </thead>
                      <tbody>
                        <?php
                        require("../../modelo/conexion1.php");
                        $database = new ConectarDB();
                        $db = $database->open();
                        try {
                          $sql = 'SELECT * FROM categorias';
                          foreach ($db->query($sql) as $row) {
                        ?>
                            <tr>
                              <td><?php echo $row['categoria_id']; ?></td>
                              <td><?php echo $row['categoria_nombre']; ?></td>
                              <td><a href="#editC_<?php echo $row['categoria_id']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="fa fa-edit"></span> Editar</a>
                                <a href="#deleteC_<?php echo $row['categoria_id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="fa fa-trash"></span> Eliminar</a>
                              </td>
                              <?php include('EditarEliminarCategoria.php'); ?>
                            </tr>

                        <?php

                          }
                        } catch (PDOException $e) {
                          echo 'Hay probleas con la conexion : ' . $e->getmessage();
                        }
                        $database->close();

                        ?>

                      </tbody>
                    </table>
                  </div>

                </div>

              </div><!-- /.container -->
              <?php include('agregarCategoria.php'); ?>
            </main>
            <!-- partial -->
          </div>
          <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
      <!-- container-scroller -->

      <!-- plugins:js -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="bootstrap.minC.js"></script>
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