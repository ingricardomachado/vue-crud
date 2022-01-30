<form method="POST" v-on:submit.prevent="createKeep">
<div class="modal fade" id="create">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Nueva Tarea</h4>
			</div>
			<div class="modal-body">
				<label for="keep">Crear tarea</label>
				<select name="" id="input" class="form-group form-control" required="required" v-model="category">
					<option v-for="category in categories" v-bind:value="category.id">
						@{{ category.name }}
					</option>
				</select>
				<input type="text" name="keep" class="form-group form-control" v-model="newKeep">
				<span v-for="error in errors" class="text-danger">@{{ $error }}</span>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Guardar</button>
			</div>
		</div>
	</div>
</div>
</form>