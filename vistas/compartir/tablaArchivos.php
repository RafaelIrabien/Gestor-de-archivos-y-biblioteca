
<?php 
	session_start();
	if (isset($_SESSION['nombre'])) {
		
	
	require_once "../../clases/Conexion.php";
	
	//Requerimos el id del usuario
	$id_Usuario = $_SESSION['id_usuario'];

	//Instaciamos la clase Conexion
	$conexion = new Conectar;

	//Llamamos al método conexion()
	$conexion = $conexion->conexion();
	$sql = "SELECT id_archivo_compartir, nombre, tipo, ruta FROM archivos_compartir WHERE id_usuario = '$id_Usuario' ";
	$result = mysqli_query($conexion, $sql);

	$sql2 = "SELECT id_usuario, id_rol FROM usuarios WHERE id_usuario = '$id_Usuario'";
	$result2 = mysqli_query($conexion, $sql2);
	$fila = mysqli_fetch_array($result2);

	if ($fila['id_rol'] == '2') {
		
	

 ?>


	<div class="tabla">
	<div class="col-sm-12">
	<div class="table-responsive">

		<table class="table table-hover" id="tablaArchivosDatatable">
			<thead>
				 <tr>
				 	<th style="text-align: center;">Nombre</th>
					<th style="text-align: center;">Tipo</th>
					<th style="text-align: center;">Ruta</th>
					<th style="text-align: center;">Acciones</th>
				 </tr>
			</thead>
			<br>
			
			<tbody>
				<?php 
				
				//Bucle que se repite las veces que sean necesarias
				while ($mostrar = mysqli_fetch_array($result)) {
					$idArchivoC = $mostrar['id_archivo_compartir'];
			 	?>
			
				<tr>
					<td><?php echo $mostrar['nombre']; ?></td>
					<td><?php echo $mostrar['tipo']; ?></td>
					<td><?php echo $mostrar['ruta'] ?></td>
					<td>
					
						<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditarEnlace" onclick="obtenerDatosEnlace('<?php echo $idArchivoC; ?>')">
							<span class="fa-solid fa-pen-to-square"></span>
					</span>
				    
						<span class="btn btn-danger btn-sm" onclick="eliminarArchivo('<?php echo $idArchivoC; ?>')">
							<span class="fas fa-thin fa-trash-can"></span>
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
			$('#tablaArchivosDatatable').DataTable();
		});
	</script>


<?php 
	} else {
		header("location:../inicio.php");
	}


	}else {
		header("location:../../index.php");
	}

 ?>