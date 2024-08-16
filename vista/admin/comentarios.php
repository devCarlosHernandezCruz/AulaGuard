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
  <title>Comentarios - Admin AulaGuuard </title>
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
                <h1 class="page-header text-center">Comentarios</h1>
                <!--BARRA BUSQUEDA-->
                <div class="col-8 p-4" style="margin: 0 auto">
                  <div class="d-flex">
                  <input type="text" id="busqueda" class="form-control me-2" placeholder="Buscar...">
                  <button id="buscar" class="btn btn-outline-success">Buscar</button>
                  </div>
                </div>   
                <div class="row">
                  <div class="col-sm-12">

                    <table class="table table-bordered table-striped" id="MiAgenda" style="margin-top:20px;">
                      <thead>
                        <th>ID</th>
                        <th>TIPO</th>
                        <th>EMAIL</th>
                        <th>COMENTARIO</th>
                        <th>ACCIONES</th>
                      </thead>
                      <tbody>
                        <?php
                        require("../../modelo/conexion1.php");
                        $database = new ConectarDB();
                        $db = $database->open();
                        try {
                          $sql = 'SELECT * FROM comentarios';
                          foreach ($db->query($sql) as $row) {
                        ?>
                            <tr class="usuario-fila">
                              <td><?php echo $row['comentario_id']; ?></td>
                              <td><?php echo $row['comentario_tipo']; ?></td>
                              <td><?php echo $row['comentario_email']; ?></td>
                              <td><?php echo $row['comentario_comentario']; ?></td>
                              <td>
                                <a href="#deleteComment_<?php echo $row['comentario_id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="fa fa-trash"></span> Eliminar</a>
                              </td>
                              </td>
                              <!-- Eliminar -->
                              <div class="modal fade" id="deleteComment_<?php echo $row['comentario_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog " role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <center>
                                        <h4 class="modal-title">Borrar comentario </h4>
                                      </center>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>

                                    <div class="modal-body">
                                      <p class="text-center">¿Estas seguro en borrar los datos de? </p>
                                      <h2 class="text-center"> <?php echo $row['comentario_email']; ?></h2>
                                    </div>

                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
                                      <a href="deleteComment.php?comentario_id=<?php echo $row['comentario_id']; ?>" class="btn btn-danger"><span class="fa fa-trash"></span> Si</a>

                                    </div>
                                  </div>
                                </div>
                              </div>
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
              </div>
              <?php include('agregarCategoria.php'); ?>
            </main>
          </div>
        </div>
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
      <script>
          $(document).ready(function () {
              $("#buscar").on("click", function () {
                  var inputValor = $("#busqueda").val().toLowerCase();

                  $(".usuario-fila").each(function () {
                      var filaVisible = false;

                      $(this).find("td").each(function () {
                          var textoCelda = $(this).text().toLowerCase();

                          if (textoCelda.indexOf(inputValor) !== -1) {
                              filaVisible = true;
                              return false; // Rompe el bucle al encontrar una coincidencia
                          }
                      });

                      // Muestra u oculta la fila según la búsqueda
                      if (filaVisible) {
                          $(this).show();
                      } else {
                          $(this).hide();
                      }
                  });
              });
          });
      </script>
</body>
</html>
