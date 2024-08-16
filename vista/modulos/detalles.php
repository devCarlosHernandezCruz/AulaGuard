<main>
  <div class="container-img">
    <img src="<?php echo $imagenSrc ?>" alt="..." />
  </div>
  <div class="container-info-product">
    <br /><br /><br />
    <div class="container-price">
      <h1>
        <?php echo $row['producto_nombre']; ?>
      </h1>
    </div>
    <br />
    <div class="container-price">
      <span>Precio:
        <?php echo '$' . number_format($producto_precio, 2, '.', '.'); ?>
      </span>
    </div>
    <br />
    <form
      action="../controlador/ctrlCarrito.php?producto_id=<?php echo $row['producto_id'] ?>&precioUnitario=<?php echo $producto_precio; ?>&id_usuario=2>"
      method="post">
      <div class="container-add-cart">
        <h3 class="cant">Cantidad:</h3>
        <div class="container-quantity">
          <input type="number" placeholder="1" value="1" min="1" class="input-quantity" name="cantidad" />
          <div class="btn-increment-decrement">
            <i class="fa-solid fa-chevron-up" id="increment"></i>
            <i class="fa-solid fa-chevron-down" id="decrement"></i>
          </div>
        </div>
        <button class="btn-add-to-cart">
          <i class="fa-solid fa-cart-shopping"></i>
          <input class="btn-add-to-cart" type="submit" value="Añadir al carrito">
          <input type="hidden" name="opcion" id="opcion" value="1">
        </button>
      </div>
    </form>

    <div class="container-description">
      <div class="title-description">
        <h4>Descripción</h4>
        <i class="fa-solid fa-chevron-down"></i>
      </div>
      <div class="text-description">
        <p>
          <?php
          echo $producto_descripcion
            ?>
        </p>
      </div>
    </div>

    <div class="container-social">
      <span>Compartir</span>
      <div class="container-buttons-social">
        <a href="#"><i class="fa-solid fa-envelope"></i></a>
        <a href="#"><i class="fa-brands fa-facebook"></i></a>
        <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
        <a href="#"><i class="fa-brands fa-instagram"></i></a>
        <a href="#"><i class="fa-brands fa-pinterest"></i></a>
      </div>
    </div><br>

    <div class="container-pun">
      <div class="title-description">
        <h4>Comentarios</h4>
      </div>
      <div>
        <div>
          <div class="text-center">
            <h3 class="text-warning mt-1 mb-1"><b><span id="average_rating">0.0</span> / 5</b></h3>
            <div class="mb-1">
              <i class="fas fa-star star-light mr-1 main_star"></i>
              <i class="fas fa-star star-light mr-1 main_star"></i>
              <i class="fas fa-star star-light mr-1 main_star"></i>
              <i class="fas fa-star star-light mr-1 main_star"></i>
              <i class="fas fa-star star-light mr-1 main_star"></i>
            </div>
            <h4><span id="total_review">0</span> Comentarios</h4><br>
            <h4>¡Comenta aquí!</h4><br>
            <button type="button" name="add_review" id="add_review"
              class="btn btn-primary">Comentar</button><br><br><br>
          </div>
        </div>

        <div id="review_modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Enviar Comentario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="text-center mt-2 mb-4">
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                </h4>
                <div class="form-group">
                    <input type="text" name="user_name" id="user_name" class="form-control"
                        placeholder="Ingresa tu nombre" />
                </div>
                <div class="form-group">
                    <textarea name="user_review" id="user_review" class="form-control"
                        placeholder="Ingresa tu comentario"></textarea>
                </div>
                <div class="form-group text-center mt-4">
                    
                    <button type="button" class="btn btn-primary" id="save_review">Enviar</button>
                    
                </div>
            </div>
        </div>
    </div>
</div>

  </div>

  </div>

  <script>
    var rating_data = 0;

    $('#add_review').click(function () {

        $('#review_modal').modal('show');

    });

    $(document).on('mouseenter', '.submit_star', function () {

        var rating = $(this).data('rating');

        reset_background();

        for (var count = 1; count <= rating; count++) {

            $('#submit_star_' + count).addClass('text-warning');

        }

    });

    function reset_background() {
        for (var count = 1; count <= 5; count++) {

            $('#submit_star_' + count).addClass('star-light');

            $('#submit_star_' + count).removeClass('text-warning');

        }
    }

    $(document).on('mouseleave', '.submit_star', function () {

        reset_background();

        for (var count = 1; count <= rating_data; count++) {

            $('#submit_star_' + count).removeClass('star-light');

            $('#submit_star_' + count).addClass('text-warning');
        }

    });

    $(document).on('click', '.submit_star', function () {

        rating_data = $(this).data('rating');

    });

    $('#save_review').click(function () {
    var user_name = $('#user_name').val();
    var user_review = $('#user_review').val();
    var id_product = <?php echo $row['producto_id'] ?>;

    if (user_name == '' || user_review == '') {
        alert("Por favor, complete ambos campos");
        return false;
    }
    else {
        $.ajax({
            url: "modulos/puntuaciones.php",
            method: "POST",
            data: { rating_data: rating_data, user_name: user_name, user_review: user_review, id_product : id_product},
            success: function (data) {
                $('#review_modal').modal('hide');
                load_rating_data();
                alert(data);
            }
        });
    }
});


    load_rating_data();

    function load_rating_data() {
        $.ajax({
            url: "modulos/puntuaciones.php",
            method: "POST",
            data: { action: 'load_data' },
            dataType: "JSON",
            success: function (data) {
                $('#average_rating').text(data.average_rating);
                $('#total_review').text(data.total_review);

                var count_star = 0;

                $('.main_star').each(function () {
                    count_star++;
                    if (Math.ceil(data.average_rating) >= count_star) {
                        $(this).addClass('text-warning');
                        $(this).addClass('star-light');
                    }
                });

                $('#total_five_star_review').text(data.five_star_review);

                $('#total_four_star_review').text(data.four_star_review);

                $('#total_three_star_review').text(data.three_star_review);

                $('#total_two_star_review').text(data.two_star_review);

                $('#total_one_star_review').text(data.one_star_review);

                $('#five_star_progress').css('width', (data.five_star_review / data.total_review) * 100 + '%');

                $('#four_star_progress').css('width', (data.four_star_review / data.total_review) * 100 + '%');

                $('#three_star_progress').css('width', (data.three_star_review / data.total_review) * 100 + '%');

                $('#two_star_progress').css('width', (data.two_star_review / data.total_review) * 100 + '%');

                $('#one_star_progress').css('width', (data.one_star_review / data.total_review) * 100 + '%');

                if (data.review_data.length > 0) {
                    var html = '';

                    for (var count = 0; count < data.review_data.length; count++) {
                        html += '<div class="row mb-3">';

                        html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">' + data.review_data[count].user_name.charAt(0) + '</h3></div></div>';

                        html += '<div class="col-sm-11">';

                        html += '<div class="card">';

                        html += '<div class="card-header"><b>' + data.review_data[count].user_name + '</b></div>';

                        html += '<div class="card-body">';

                        for (var star = 1; star <= 5; star++) {
                            var class_name = '';

                            if (data.review_data[count].rating >= star) {
                                class_name = 'text-warning';
                            }
                            else {
                                class_name = 'star-light';
                            }

                            html += '<i class="fas fa-star ' + class_name + ' mr-1"></i>';
                        }

                        html += '<br />';

                        html += data.review_data[count].user_review;

                        html += '</div>';

                        html += '<div class="card-footer text-right">On ' + data.review_data[count].datetime + '</div>';

                        html += '</div>';

                        html += '</div>';

                        html += '</div>';
                    }

                    $('#review_content').html(html);
                }
            }
        })
    }
</script>
</main>
