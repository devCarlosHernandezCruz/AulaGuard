<?php
// Obtener las categorías antes de mostrar el formulario
$stmt_categorias = $db->query("SELECT * FROM categorias");
$categorias = $stmt_categorias->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog " role="document">
		<div class="modal-content">
			<div class="modal-header">
				<center>
					<h4 class="modal-title">Agregar Producto </h4>
				</center>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<div class="container-fluid">
					<form method="POST" action="agregarPro.php" enctype="multipart/form-data">
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label">Nombre:</label>
							</div>&nbsp;
							<div class="col-sm-10">
								<input type="text" class="form-control" name="producto_nombre">
							</div>

						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label">Descripción:</label>
							</div>&nbsp;
							<div class="col-sm-10">
								<input type="text" class="form-control" name="producto_descripcion">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label">Foto:</label>
							</div>&nbsp;
							<div class="col-sm-10">
								<input type="file" class="form-control" name="producto_imagen" required>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label">Precio:</label>
							</div>&nbsp;
							<div class="col-sm-10">
								<input type="number" class="form-control" name="producto_precio">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label">Descuento:</label>
							</div>&nbsp;
							<div class="col-sm-10">
								<input type="number" class="form-control" name="producto_descuento">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label">Stock:</label>
							</div>&nbsp;
							<div class="col-sm-10">
								<input type="number" class="form-control" name="producto_stock">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label">Categoria:</label>
							</div>&nbsp;
							<div class="col-sm-10">
								<select name="producto_categoria_id" id="producto_categoria_id" class="form-control">
									<option value="">Selecciona una categoria</option>
									<?php foreach ($categorias as $categoria) : ?>
										<option value="<?php echo $categoria['categoria_id']; ?>"><?php echo $categoria['categoria_nombre']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-closer"></span> Cancelar</button>
							<button type="submit" name="add" class="btn btn-success"><span class="fa fa-save"></span> Guardar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>