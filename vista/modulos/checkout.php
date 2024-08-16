<main><br><br>

  <?php
  $id_usuario = $_GET['id_usuario'];

  $conectar = mysqli_connect("localhost", "root", "", "aulaguard");

  $sql = "SELECT dc.*, p.* FROM detalles_compras dc JOIN productos p ON dc.producto_id = p.producto_id WHERE dc.id_usuario = '$id_usuario'";
  $consulta = mysqli_query($conectar, $sql);
  ?>

  <div class="container">
    <!--<div class="row mb-5">
          <div class="col-md-12">
            <div class="border p-4 rounded" role="alert">
              Eres cliente? <a href="#">Haz click aqui</a> para ingresar
            </div>
          </div>
        </div>-->
    <div class="row">
      <div class="col-md-6 mb-5 mb-md-0">
        <h2 class="h3 mb-3 text-black">Detalles de facturación</h2>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="productos.html">Productos</a></li>
            <li class="breadcrumb-item"><a href="carrito.php">Carrito</a></li>
            <li class="breadcrumb-item active" aria-current="page">Facturación</li>
          </ol>
        </nav>
        <div class="p-3 p-lg-5 border bg-white">
          <div class="form-group">
            <label for="c_country" class="text-black">Pais <span class="text-danger">*</span></label>
            <select id="c_country" class="form-control">
              <option value="1">Seleccione un pais</option>
              <option value="2">Estados Unidos</option>
              <option value="3">México</option>
              <option value="4">Canada</option>
              <option value="5">Puerto rico</option>
              <option value="6">Colombia</option>
              <option value="7">Peru</option>
              <option value="8">Brasil</option>
              <option value="9">Venezuela</option>
            </select>
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <label for="c_fname" class="text-black">Nombre(s) <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="c_fname" name="c_fname">
            </div>
            <div class="col-md-6">
              <label for="c_lname" class="text-black">Apellido(s) <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="c_lname" name="c_lname">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label for="c_address" class="text-black">Dirección <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="c_address" name="c_address" placeholder="Calle">
            </div>
          </div>

          <div class="form-group mt-3">
            <input type="text" class="form-control" placeholder="Mz y Lt">
          </div>

          <div class="form-group row">
            <div class="col-md-6">
              <label for="c_state_country" class="text-black">Estado <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="c_state_country" name="c_state_country">
            </div>
            <div class="col-md-6">
              <label for="c_postal_zip" class="text-black">Codigo Postal <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="c_postal_zip" name="c_postal_zip">
            </div>
          </div>

          <div class="form-group row mb-5">
            <div class="col-md-6">
              <label for="c_email_address" class="text-black">Correo Electronico <span
                  class="text-danger">*</span></label>
              <input type="email" class="form-control" id="c_email_address" name="c_email_address">
            </div>
            <div class="col-md-6">
              <label for="c_phone" class="text-black">Numero celular <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="c_phone" name="c_phone" placeholder="Numero de celular">
            </div>
          </div>

          <div class="form-group">
            <label for="c_ship_different_address" class="text-black" data-bs-toggle="collapse"
              href="#ship_different_address" role="button" aria-expanded="false"
              aria-controls="ship_different_address"><input type="checkbox" value="1" id="c_ship_different_address">
              ¿Enviar a una direccion diferente?</label>
            <div class="collapse" id="ship_different_address">
              <div class="py-2">
                <div class="form-group">
                  <label for="c_country" class="text-black">Pais <span class="text-danger">*</span></label>
                  <select id="c_country" class="form-control">
                    <option value="1">Seleccione un pais</option>
                    <option value="2">Estados Unidos</option>
                    <option value="3">México</option>
                    <option value="4">Canada</option>
                    <option value="5">Puerto rico</option>
                    <option value="6">Colombia</option>
                    <option value="7">Peru</option>
                    <option value="8">Brasil</option>
                    <option value="9">Venezuela</option>
                  </select>
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="c_fname" class="text-black">Nombre(s) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_fname" name="c_fname">
                  </div>
                  <div class="col-md-6">
                    <label for="c_lname" class="text-black">Apellido(s) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_lname" name="c_lname">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_address" class="text-black">Dirección <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_address" name="c_address" placeholder="Calle">
                  </div>
                </div>

                <div class="form-group mt-3">
                  <input type="text" class="form-control" placeholder="Mz y Lt">
                </div>

                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="c_state_country" class="text-black">Estado <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_state_country" name="c_state_country">
                  </div>
                  <div class="col-md-6">
                    <label for="c_postal_zip" class="text-black">Codigo Postal <span
                        class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_postal_zip" name="c_postal_zip">
                  </div>
                </div>

                <div class="form-group row mb-5">
                  <div class="col-md-6">
                    <label for="c_email_address" class="text-black">Correo Electronico <span
                        class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="c_email_address" name="c_email_address">
                  </div>
                  <div class="col-md-6">
                    <label for="c_phone" class="text-black">Numero celular <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_phone" name="c_phone" placeholder="Numero de celular">
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>
      <div class="col-md-6">
        <div class="row mb-5">
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">Tu orden</h2>
            <div class="p-3 p-lg-5 border bg-white">
              <table class="table site-block-order-table mb-5">
                <thead>
                  <th>Producto</th>
                  <th>Precio</th>
                </thead>
                <tbody>
                  <?php
                  $subtotal = 0;
                  while ($row = mysqli_fetch_assoc($consulta)) {
                    $producto_nombre = $row['producto_nombre'];
                    $precio = $row['producto_precio'];
                    $cantidad = $row['det_com_cantidad'];
                    $total = $precio * $cantidad;
                    $subtotal += $total;
                    ?>
                    <tr>
                      <td>
                        <?php echo $producto_nombre; ?> <strong class="mx-2">x</strong>
                        <?php echo $cantidad; ?>
                      </td>
                      <td>$
                        <?php echo number_format($total, 2); ?>
                      </td>
                    </tr>
                    <?php
                  }
                  ?>
                  <tr>
                    <td class="text-black font-weight-bold"><strong>Subtotal</strong></td>
                    <td class="text-black">$
                      <?php echo number_format($subtotal, 2); ?>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-black font-weight-bold"><strong>IVA</strong></td>
                    <td class="text-black">$
                      <?php echo number_format($subtotal * 0.1, 2); ?>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-black font-weight-bold"><strong>Total</strong></td>
                    <td class="text-black font-weight-bold"><strong>$
                        <?php echo number_format($subtotal * 1.1, 2); ?>
                      </strong></td>
                  </tr>
                </tbody>
              </table>

              <div id="paypal-button-container">
                <script>

                  paypal.Buttons({
                    style: {
                      color: 'blue',
                      shape: 'pill',
                      label: 'pay',
                    },
                    createOrder: function (data, actions) {
                      return actions.order.create({
                        purchase_units: [{
                          amount: {
                            value: 100
                          }
                        }]
                      });
                    },
                    onApprove: function (data, actions) {
                      actions.order.capture().then(function (detalles) {
                        alert("Gracias por su pago");
                      });
                    },



                    onCancel: function (data) {
                      alert("Pago cancelado");
                      console.log(data);
                    }
                  }).render('#paypal-button-container')</script>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- </form> -->
  </div>
</main><br><br>