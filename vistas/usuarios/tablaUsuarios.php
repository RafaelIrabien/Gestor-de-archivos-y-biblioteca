<?php 

	session_start();

	require_once "../../clases/Conexion.php";

	

	$c = new Conectar;
	$conexion = $c->conexion();

	$sql = "SELECT  
    				usuario.nombre AS nombreUsuario,
    				usuario.email AS Email,
    				rol.rol AS Rol
			FROM
    			usuarios AS usuario
        			INNER JOIN
    			roles AS rol ON usuario.id_rol = rol.id_rol";

    $result = mysqli_query($conexion, $sql);

 ?>




	<div class="tabla">
		<div class="col-sm-9">
			<div class="table-responsive">
				
				<table class="table table-hover" id="tablaUsuariosDatatable">
					<br>
					<thead>
						<tr>
							<th style="text-align: center;">Nombre</th>
							<th style="text-align: center;">Correo</th>
							<th style="text-align: center;">Rol</th>
							<th style="text-align: center;">Acciones</th>
						</tr>
					</thead>

					<?php 
							while ($mostrar = mysqli_fetch_array($result)) {
						 ?>
					<tbody>
						<tr>
						
							<td><?php echo $mostrar['nombreUsuario']; ?></td>
							<td><?php echo $mostrar['Email']; ?></td>
							<td><?php echo $mostrar['Rol']; ?></td>
							<td></td>
						
						</tr>
						<?php 
							}
						 ?>
					</tbody>
				</table>
				<br>
			</div>
		</div>
	</div>


<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaUsuariosDatatable').DataTable();
	});
</script>