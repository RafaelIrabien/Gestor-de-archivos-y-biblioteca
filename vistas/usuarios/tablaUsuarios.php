<?php 

	session_start();

	if(isset($_SESSION['nombre'])) {

	require_once "../../clases/Conexion.php";

	$c = new Conectar;
	$conexion = $c->conexion();
	$id_Usuario = $_SESSION['id_usuario'];

	$sql = "SELECT  usuario.id_usuario AS idUsuario,
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
								$id_Usuario = $mostrar['idUsuario'];
						 ?>
					<tbody>
						<tr>
							
							<td><?php echo $mostrar['nombreUsuario']; ?></td>
							<td><?php echo $mostrar['Email']; ?></td>
							<td><?php echo $mostrar['Rol']; ?></td>
							<td>
								<a class="btn btn-primary" href="usuarios/archivosUsuario.php" onsubmit="<?php $id_Usuario; ?>">
									<span class="fas fa-regular fa-folder-open"></span>
								</a>
								
							</td>
						
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



<script type="text/javascript" src="../../js/Gestor.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaUsuariosDatatable').DataTable();

	});
</script>


<?php 
} else {
	header("location:../../index.php");
}

 ?>