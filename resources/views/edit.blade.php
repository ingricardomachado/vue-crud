<form method="POST" v-on:submit.prevent="updateKeep(fillKeep.id)">
<div class="modal fade" id="edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Editar Tarea</h4>
			</div>
			<div class="modal-body">
				<label for="keep">Editar tarea</label>
				<select name="" id="input" class="form-group form-control" required="required" v-model="fillKeep.category">
					<option v-for="category in categories" v-bind:value="category.id">
						@{{ category.name }}
					</option>
				</select>
				<input type="text" name="keep" class="form-control" v-model="fillKeep.keep">
				<span v-for="error in errors" class="text-danger">@{{ $error }}</span>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Actualizar</button>
			</div>
		</div>
	</div>
</div>
</form>