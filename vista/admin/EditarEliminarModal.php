<?php
// Obtener las categorías antes de mostrar el formulario
$stmt_categorias = $db->query("SELECT categoria_id, categoria_nombre FROM categorias");
$categorias = $stmt_categorias->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- Editar -->
<div class="modal fade" id="edit_<?php echo $row['producto_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog " role="document">
		<div class="modal-content">
			<div class="modal-header">
				<center>
					<h4 class="modal-title">Editar Producto </h4>
				</center>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<div class="container-fluid">
					<form method="POST" action="editar.php?producto_id=<?php echo $row['producto_id']; ?>" enctype="multipart/form-data">
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label">Nombre:</label>
							</div>&nbsp;
							<div class="col-sm-10">
								<input type="text" class="form-control" name="producto_nombre" value="<?php echo $row['producto_nombre']; ?>">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label">Descripción:</label>
							</div>&nbsp;
							<div class="col-sm-10">
								<input type="text" class="form-control" name="producto_descripcion" value="<?php echo $row['producto_descripcion']; ?>">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label">Precio:</label>
							</div>&nbsp;
							<div class="col-sm-10">
								<input type="number" class="form-control" name="producto_precio" value="<?php echo $row['producto_precio']; ?>">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label">Descuento:</label>
							</div>&nbsp;
							<div class="col-sm-10">
								<input type="number" class="form-control" name="producto_descuento" value="<?php echo $row['producto_descuento']; ?>">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label">Stock:</label>
							</div>&nbsp;
							<div class="col-sm-10">
								<input type="number" class="form-control" name="producto_stock" value="<?php echo $row['producto_stock']; ?>">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label">Categoria:</label>
							</div>&nbsp;
							<div class="col-sm-10">
								<select name="producto_categoria_id" id="producto_categoria_id" class="form-control">
									<?php foreach ($categorias as $categoria) : ?>
										<option value="<?php echo $categoria['categoria_id']; ?>"><?php echo $categoria['categoria_nombre']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label"> Foto: </label>
							</div>&nbsp;
							<div class="col-sm-10">
								<?php echo '<img src="data:image/jpeg; base64,' . base64_encode(($row["producto_imagen"])) . '"/ width= "60px" heigth= "60px"></td>'; ?><br>
								<input type="file" class="form-control" name="nueva_imagen">
								<input type="hidden" name="imagen_actual">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-closer"></span> Cancelar</button>
							<button type="submit" name="edit" class="btn btn-success"><span class="fa fa-save"></span> Guardar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Eliminar -->
<div class="modal fade" id="delete_<?php echo $row['producto_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog " role="document">
		<div class="modal-content">
			<div class="modal-header">
				<center>
					<h4 class="modal-title">Borrar Producto </h4>
				</center>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<p class="text-center">¿Estas seguro en borrar los datos de? </p>
				<h2 class="text-center"> <?php echo $row['producto_nombre']; ?></h2>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
				<a href="delete.php?producto_id=<?php echo $row['producto_id']; ?>" class="btn btn-danger"><span class="fa fa-trash"></span> Si</a>

			</div>
		</div>
	</div>
</div>