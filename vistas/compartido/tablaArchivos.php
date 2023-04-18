<?php 
	session_start();
	if (isset($_SESSION['nombre'])) {
		
	
	require_once "../../clases/Conexion.php";
	
	//Requerimos el id del usuario
	

	//Instaciamos la clase Conexion
	$conexion = new Conectar;

	//Llamamos al método conexion()
	$conexion = $conexion->conexion();
	$sql = "SELECT id_archivo_compartir, id_usuario, nombre, tipo, ruta, fecha, instruccion FROM archivos_compartir";
	$result = mysqli_query($conexion, $sql);

 ?>


	<div class="tabla">
	<div class="col-sm-11">
	<div class="table-responsive">
		<h1 class="display-4">Archivos</h1>
		<br>
		<h5>Estimado usuario, haga click en el botón <i style="border: 2px solid black; padding: 2.5px; border-radius: 4px;" class="fas fa-align-justify"></i> para poder ver la descripción relacionada con el archivo a trabajar.</h5>
		<table class="table table-hover" id="tablaArchivosDatatable">
			<thead>
				 <tr>
				 	<th style="text-align: center;">Nombre</th>
				 	<th style="text-align: center;">Fecha y hora de subida</th>
					<th style="text-align: center;">Tipo</th>
					<th style="text-align: center;">Acciones</th>
				 </tr>
			</thead>
			<br>
			
			<tbody>
				<?php 
				//Arreglo de extensiones validas
				$extensionesValidas = array(
											'png',
											'jpg',
											'pdf',
											'mp4',
											'mp3',
											'flac'
												);

				
				//Bucle que se repite las veces que sean necesarias
				while ($mostrar = mysqli_fetch_array($result)) {
					$nombreArchivo = $mostrar['nombre'];
					$fechaSubida = $mostrar['fecha'];
					$id_Usuario = $mostrar['id_usuario'];
					$rutaDescarga = "../archivos/" . $id_Usuario . "/Archivos_Compartidos/" . $nombreArchivo;
					$idArchivoC = $mostrar['id_archivo_compartir'];
			 	?>
			
				<tr>
					<td><?php echo $nombreArchivo; ?></td>
					<td><?php echo $fechaSubida; ?></td>
					<td><?php echo $mostrar['tipo']; ?></td>
					<td >
					
						<a href="<?php echo $rutaDescarga; ?>" download="<?php echo $nombreArchivo; ?>" class="btn btn-success btn-sm">
							<span class="fas fa-download"></span>
						</a>

						<?php 
							for ($i=0; $i < count($extensionesValidas) ; $i++) { 
								if ($extensionesValidas[$i] == $mostrar['tipo']) {
									
							
						 ?>

						<span class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalVerArchivos" onclick="obtenerArchivoPorId('<?php echo $idArchivoC; ?>')">
							<span class="fas fa-eye"></span>
						</span>

						<?php 
								}
							}
						 ?>

						 <span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalVerInstruccion" onclick="obtenerInstruccion('<?php echo $idArchivoC; ?>')">
						 	<span class="fas fa-align-justify"></span>
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

	}else {
		header("location:../../index.php");
	}

 ?>