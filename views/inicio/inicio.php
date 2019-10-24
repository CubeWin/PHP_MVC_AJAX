<div class="container-fluid">
	<h1 class="primary-heading">Usuarios</h1>
	<hr>
	<div class="card mt-5">
		<div class="cw-front-title blue-gradient d-flex mx-4 px-4 py-2 rounded justify-content-center align-items-center text-white cw-shadow-front">
			<h2 class="h5 m-0">Registro de Usuarios</h2>
		</div>
		<div class="card-body">
			<form autocomplete="off" onsubmit="return false" id="usuarioRegistro">
				<div class="row">
					<div class="col-12">
						<input type="text" class="form-control d-none" name="idInicio" disabled>
					</div>
					<div class="col-12 col-lg-4">
						<small class="pl-2 text-muted"><i class="fa fa-user"></i> Usuario</small>
						<input type="text" class="form-control" id="usuarioId" name="usuarioInicio" minlength="4" required>
						<label for="usuarioId" class="error small text-danger"></label>
					</div>
					<div class="col-12 col-lg-4">
						<small class="pl-2 text-muted"><i class="fa fa-key"></i> Clave</small>
						<input type="text" class="form-control" id="claveId" name="claveInicio" minlength="4" required>
						<label for="claveId" class="error small text-danger"></label>
					</div>
					<div class="col-12 col-lg-4">
						<small class="pl-2 text-muted"><i class="fa fa-key"></i> Repetir clave</small>
						<input type="text" class="form-control" id="repetirId" name="repetirInicio" minlength="4" required>
						<label for="repetirId" class="error small text-danger"></label>
					</div>
					<div class="col-12 text-right">
						<a class="btn btn-outline-info mt-3" onclick="clearReg();"><i class="fa fa-eraser"></i> Limpiar</a>
						<button type="submit" class="btn btn-info mt-3" onclick="saveUser();"><i class="fa fa-save"></i> Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="card mt-5">
		<div class="cw-front-title blue-gradient d-flex mx-4 px-4 py-2 rounded justify-content-center align-items-center text-white cw-shadow-front">
			<h2 class="h5 m-0">Lista de Usuarios</h2>
		</div>
		<div class="card-body table-responsive">
			<table class="table table-hover text-center border table-sm">
				<thead class="winter-neva-gradient">
					<tr>
						<td class="text-capitalize font-weight-bold">#</td>
						<td class="text-capitalize font-weight-bold">usuario</td>
						<td class="text-capitalize font-weight-bold">clave</td>
						<td class="text-capitalize font-weight-bold">editar</td>
						<td class="text-capitalize font-weight-bold">eliminar</td>
					</tr>
				</thead>
				<tbody id="listarUsuarios">
					<!--  -->
				</tbody>
			</table>
		</div>
	</div>
</div>