<?php 
	

	//if (isset($_SESSION['nombre'])) {
	/*
	$sql = "SELECT id_archivo, id_usuario, nombre, tipo, ruta FROM archivos";

	$result = mysqli_query($conexion, $sql); */
	

 ?>

	<div class="tabla">
		<div class="col-sm-7">
			<div class="table-responsive">
				
				<table class="table table-hover" id="tablaArchivosDatatable">
					<br>
					<thead>
						<tr>
							<th hidden=""></th>
							<th hidden=""></th>
							<th style="text-align: center;">Nombre</th>
							<th style="text-align: center;">Tipo de archivo</th>
							<th style="text-align: center;">Descargar</th>
						</tr>
					</thead>

						
					<?php 
						
						/*

						while ($archivo) {

							$rutaDescarga = "../../archivos/".$archivo['id_usuario']."/".$archivo['nombre'];
							$nombreArchivo = $archivo['nombre'];
						*/
					 ?>

					<tbody>
						<tr>
							<td id="id_Archivo" hidden=""></td>
							<td id="id_Usuario" hidden=""></td>
							<td id="nombreA"><?php // echo $mostrar['nombre']; ?></td>
							<td id="tipoA"><?php // echo $mostrar['tipo']; ?></td>
							<td id="rutaA">
								<a href="<?php // echo $rutaDescarga; ?>" download="<?php $nombreArchivo ?>" class="btn btn-success btn-sm">
									<span class="fas fa-download"></span>
								</a>
							</td>
						</tr>
					<?php 
						//} //Fin de while
					 ?>
					</tbody>

				</table>
<br>
			</div>
		</div>
	</div>



<?php 
/*
	} else {
		header("location:../../index.php");
	}
*/
 ?>