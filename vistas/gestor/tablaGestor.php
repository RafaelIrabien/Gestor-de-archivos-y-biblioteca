


<div class="row">
	<div class="col-sm-8">
		<div class="table-responsive">
			<table class="table table-hover table-dark" id="tablaGestorDataTable">
				<thead>
					<tr>
						<th style="text-align: center;">Nombre</th>
						<th style="text-align: center;">Tipo de archivo</th>
						<th style="text-align: center;">Descargar</th>
						<th style="text-align: center;">Visualizar</th>
						<th style="text-align: center;">Eliminar</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td></td>
						<td></td>
						<td>
							<span class="btn btn-success">
								<span class="fas fa-download"></span>
							</span>
						</td>
						<td></td>
						<td>
							<span class="btn btn-danger">
								<span class="fas fa-trash-alt"></span>
							</span>
						</td>
					</tr>
				</tbody>
			</table>

		</div>
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaGestorDataTable').DataTable();
	});
</script>