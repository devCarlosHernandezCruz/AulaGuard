<div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog " role="document">
		<div class="modal-content">
			<div class="modal-header">
				<center>
					<h4 class="modal-title">Agregar Categoria </h4>
				</center>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<div class="container-fluid">

					<form method="POST" action="agregar.php">
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label">Nombre:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="categoria_nombre">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
							<button type="submit" name="add" class="btn btn-primary"><span class="fa fa-save"></span> Guardar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>