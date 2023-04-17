
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
	$sql = "SELECT id_enlace, enlace FROM enlaces WHERE id_usuario = '$id_Usuario' ";
	$result = mysqli_query($conexion, $sql);

	$sql2 = "SELECT id_usuario, id_rol FROM usuarios WHERE id_usuario = '$id_Usuario'";
	$result2 = mysqli_query($conexion, $sql2);
	$fila = mysqli_fetch_array($result2);

	if ($fila['id_rol'] == '2') {
		
	

 ?>


	<div class="tabla">
	<div class="col-sm-12">
	<div class="table-responsive">
		<h1 class="display-4">Enlaces</h1>
		<br>
			<div id="btn">
				<span class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalEnlace">
				  <span class="fa fa-upload"></span>
				  Agregar enlace
				</span>
			</div>
			
		<table class="table table-hover" id="tablaEnlacesDatatable">
			<thead>
				 <tr>
			<!--	<th style="text-align: center;">No.</th> -->
					<th style="text-align: center;">Enlace</th>
					<th style="text-align: center;">Acciones</th>
				 </tr>
			</thead>
			<br>
			
			<tbody>
				<?php 
				
				//Bucle que se repite las veces que sean necesarias
				while ($mostrar = mysqli_fetch_array($result)) {
					$id_enlace = $mostrar['id_enlace'];
			 	?>
			
				<tr>
			<!--	<td style="font-weight: bold;"><?php //echo $id_enlace; ?></td> -->
					<td onclick="Copiar(this)"><?php echo $mostrar['enlace']; ?></td>
					<td>
					
						<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditarEnlace" onclick="obtenerDatosEnlace('<?php echo $id_enlace; ?>')">
							<span class="fa-solid fa-pen-to-square"></span>
					</span>
				    
						<span class="btn btn-danger btn-sm" onclick="eliminarEnlace('<?php echo $id_enlace; ?>')">
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
			$('#tablaEnlacesDatatable').DataTable();
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