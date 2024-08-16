<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Productos relacionados</h2>
        <?php
            $sql = "SELECT * FROM productos";
            $resultado = mysqli_query($conectar, $sql);
        ?>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        <?php
          foreach ($resultado as $row) {
          ?>
            <div class="col mb-5">
            <?php
              $producto_id = $row['producto_id'];
              ?>
                <div class="card h-100">
                    <!-- Product image-->
                    <?php echo '<img src="data:image/jpeg; base64,' . base64_encode(($row['producto_imagen'])) . '" class="card-img-top">'; ?>
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder"><?php echo $row['producto_nombre']; ?></h5>
                            <p class="card-text"><?php echo '$'.number_format($row['producto_precio'], 2, '.', ','); ?></p>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <input type="hidden" name="productoId" value="<?php echo $producto_id ?>">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Ver más</a></div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>