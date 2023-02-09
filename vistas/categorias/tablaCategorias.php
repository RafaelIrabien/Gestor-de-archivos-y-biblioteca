
<?php 
	session_start();
	require_once "../../clases/Conexion.php";
	
	//Requerimos el id del usuario
	$id_Usuario = $_SESSION['id_usuario'];

	//Instaciamos la clase Conexion
	$conexion = new Conectar;

	//Llamamos al método conexion()
	$conexion = $conexion->conexion();

 ?>


	<div class="tabla">
	<div class="col-sm-9">
	<div class="table-responsive">

		<table class="table table-hover" id="tablaCategoriasDatatable">
			<thead>
				 <tr>
					<th style="text-align: center;">Nombre</th>
					<th style="text-align: center;">Fecha</th>
					<th style="text-align: center;">Acciones</th>
				 </tr>
			</thead>
			<br>
			<?php 
				$sql = "SELECT id_categoria, nombre, fecha_insert FROM categorias WHERE id_usuario = '$id_Usuario' ";

				$result = mysqli_query($conexion, $sql);

				//Bucle que se repite las veces que sean necesarias
				while ($mostrar = mysqli_fetch_array($result)) {
					$id_categoria = $mostrar['id_categoria'];
			 ?>
			 
			

			<tbody>

			
				<tr>
					<td><?php echo $mostrar['nombre']; ?></td>
					<td><?php echo $mostrar['fecha_insert']; ?></td>
					<td>
						<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalActualizarCategoria" onclick="obtenerDatosCategoria('<?php echo $id_categoria ?>')">
							<span class="fa-solid fa-pen-to-square"></span>
					</span>
				    
						<span class="btn btn-danger btn-sm" onclick="eliminarCategoria('<?php echo $id_categoria ?>')">
							<span class="fa-solid fa-trash"></span>
					</span>
				    </td>
				</tr>

				<?php 
					} //Fin del while
				 ?> 
			</tbody>
		</table>
		<br>
	</div>
  </div>
</div>


	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaCategoriasDatatable').DataTable();
		});
	</script>