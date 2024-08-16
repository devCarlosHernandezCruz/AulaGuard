<?php
$id_usuario = $_GET['id_usuario'];

$conectar = mysqli_connect("localhost", "root", "", "aulaguard");

$sql = "SELECT dc.*, p.* FROM detalles_compras dc JOIN productos p ON dc.producto_id = p.producto_id WHERE dc.id_usuario = '$id_usuario'";
$consulta = mysqli_query($conectar, $sql);
?>

<main>
  <br /><br />
  <div class="container">
    <h2 class="text-center">Carrito de compra</h2>
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="productos.php">Productos</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Carrito</li>
      </ol>
    </nav>
    <!-- Breadcrumbs -->
    <div class="row mb-5">
      <form class="col-md-12" method="post">
        <div class="site-blocks-table">
          <table class="table">
            <thead>
              <tr>
                <th class="product-thumbnail">Productos</th>
                <th class="product-name">Descripcion</th>
                <th class="product-price">Precio</th>
                <th class="product-quantity">Cantidad</th>
                <th class="product-total">Total</th>
                <th class="product-remove">Eliminar</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($row = mysqli_fetch_assoc($consulta)) {
                ?>
                <tr class="producto-row" data-producto-id="<?php echo $row['producto_id']; ?>">
                  <td class="product-thumbnail">
                    <?php echo $row['producto_nombre']; ?>
                  </td>
                  <td class="product-name">
                    <h2 class="h5 text-black">
                      <?php echo $row['producto_descripcion']; ?>
                    </h2>
                  </td>
                  <td class="precio">
                    <?php echo '$' . number_format($row['producto_precio'], 2, '.', ','); ?>
                  </td>
                  <td class="Cantidad">
                    <div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px">
                      <div class="input-group-prepend">
                        <button class="btn btn-outline-dark decrease" type="button">-</button>
                      </div>
                      <input type="text" class="form-control text-center quantity-amount"
                        value="<?php echo $row['det_com_cantidad']; ?>" readonly />
                      <div class="input-group-append">
                        <button class="btn btn-outline-dark increase" type="button">+</button>
                      </div>
                    </div>
                  </td>
                  <td class="total">
                    <?php
                    $precio = $row['producto_precio'];
                    $cantidad = $row['det_com_cantidad'];
                    $total = $precio * $cantidad;
                    echo '$' . number_format($total, 2, '.', ',');
                    ?>
                  </td>
                  <td>
                    <form id="eliminarForm" method="post" action="../controlador/ctrlCarrito.php?id_usaurio=1">
                      <input type="hidden" name="opcion" id="opcion" value="2">
                      <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
                      <input type="hidden" name="producto_id" value="<?php echo $row['producto_id']; ?>">
                      <!-- Otros campos ocultos o visibles según tus necesidades -->
                      <button type="button" class="btn btn-black btn-sm eliminar-btn">X</button>
                    </form>
                  </td>
                  </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </form>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="row mb-5">
          <div class="col-md-6 mb-3 mb-md-0">
            <form id="vaciarForm" method="post" action="../controlador/ctrlCarrito.php?id_usuario=2>">
              <input type="hidden" name="opcion" id="opcion" value="3">
              <button type="submit" class="btn1 btn-black btn-sm btn-block eliminar-btn">Vaciar carrito</button>
            </form>
          </div>
          <div class="col-md-6">
            <a href="productos.php">
              <button class="btn1 btn-outline-black btn-sm btn-block">
                Seguir comprando
              </button>
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-6 pl-5">
        <div class="row justify-content-end">
          <div class="col-md-7">
            <div class="row">
              <div class="col-md-12 text-right border-bottom mb-5">
                <h3 class="text-black h4 text-uppercase">Total</h3>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <span class="text-black">Subtotal</span>
              </div>
              <div class="col-md-6 text-right">
                <strong class="text-black subtotal"></strong>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <span class="text-black">Iva</span>
              </div>
              <div class="col-md-6 text-right">
                <strong class="text-black iva"></strong>
              </div>
            </div>
            <div class="row mb-5">
              <div class="col-md-6">
                <span class="text-black">Total</span>
              </div>
              <div class="col-md-6 text-right">
                 <strong class="text-black total-general"></strong>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <!-- O poner etiqueta a-->
                <button class="btn1 btn-black btn-lg py-3 btn-block" onclick="window.location='checkout.php?id_usuario=1'">
                  Realizar pedido
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<script>
$(document).ready(function() {
  // Llama a la función calcularTotal() al cargar la página
  calcularTotal();

  // Manejar eventos de aumento
  $('.increase').on('click', function() {
    var row = $(this).closest('.producto-row');
    var cantidadInput = row.find('.quantity-amount');
    var precio = parseFloat(row.find('.precio').text().replace('$', '').replace(',', ''));
    var cantidad = parseInt(cantidadInput.val());
    
    cantidad += 1;
    cantidadInput.val(cantidad);
    
    var total = precio * cantidad;
    row.find('.total').text('$' + total.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));

    // Llama a la función calcularTotal() después de cambiar la cantidad
    calcularTotal();
  });

  // Manejar eventos de disminución
  $('.decrease').on('click', function() {
    var row = $(this).closest('.producto-row');
    var cantidadInput = row.find('.quantity-amount');
    var precio = parseFloat(row.find('.precio').text().replace('$', '').replace(',', ''));
    var cantidad = parseInt(cantidadInput.val());
    
    if (cantidad > 1) {
      cantidad -= 1;
      cantidadInput.val(cantidad);
      
      var total = precio * cantidad;
      row.find('.total').text('$' + total.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));

      // Llama a la función calcularTotal() después de cambiar la cantidad
      calcularTotal();
    }
  });

  // Manejar evento clic del botón de eliminar
  $('.eliminar-btn').on('click', function() {
    if (confirm('¿Estás seguro de que deseas eliminar este producto?')) {
      // Enviar el formulario
      $(this).closest('form').submit();
    }
  });

  // Calcular el total general
  function calcularTotal() {
    var subtotal = 0;

    $('.producto-row').each(function() {
      var row = $(this);
      var precio = parseFloat(row.find('.precio').text().replace('$', '').replace(',', ''));
      var cantidad = parseInt(row.find('.quantity-amount').val());
      var total = precio * cantidad;
      subtotal += total;
    });

    var iva = subtotal * 0.1; // Puedes ajustar este valor según tus necesidades
    var totalGeneral = subtotal + iva;

    // Actualizar el subtotal en el HTML
    $('.subtotal').text('$' + subtotal.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));

    // Actualizar el IVA en el HTML
    $('.iva').text('$' + iva.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));

    // Actualizar el total general en el HTML
    $('.total-general').text('$' + totalGeneral.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));

  }
});
</script>