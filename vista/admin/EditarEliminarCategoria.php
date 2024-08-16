<!-- Editar -->
<div class="modal fade" id="editC_<?php echo $row['categoria_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog " role="document">
		<div class="modal-content">
			<div class="modal-header">
				<center> <h4 class="modal-title">Editar Categoria </h4></center>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<div class="container-fluid">

					<form method="POST" action="editarC.php?categoria_id=<?php echo $row['categoria_id']; ?>">
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label">Nombre:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="categoria_nombre" value="<?php echo $row['categoria_nombre']; ?>">
							</div>
						</div>				
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
							<button type="submit" name="editC" class="btn btn-success" ><span class="fa fa-check"></span> Actualizar</button>

						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Eliminar -->
<div class="modal fade" id="deleteC_<?php echo $row['categoria_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog " role="document">
		<div class="modal-content">
			<div class="modal-header">
				<center> <h4 class="modal-title">Borrar Categoria </h4></center>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<p class="text-center">¿Estas seguro en borrar los datos de? </p>
				<h2 class="text-center"> <?php echo $row['categoria_nombre']; ?></h2>
			</div>
					
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
				<a href="deleteC.php?categoria_id=<?php echo $row['categoria_id']; ?>" class="btn btn-danger"><span class="fa fa-trash"></span> Si</a>
			</div>
		</div>
	</div>
</div>