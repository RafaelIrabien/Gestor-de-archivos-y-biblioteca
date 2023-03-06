<?php 
	

	//if (isset($_SESSION['nombre'])) {
	/*
	require_once "../../clases/Conexion.php";
	$c = new Conectar;
	$conexion = $c->conexion();
	$sql = "SELECT id_usuario FROM usuarios";
	$result = mysqli_query($conexion, $sql);
	$archivo= mysqli_fetch_array($result);
	$id = $archivo['id_usuario']; 
	*/

 ?>

	<div class="tabla">
		<div class="col-sm-10">
			<div class="table-responsive">
				
				<table class="table table-hover">
					<br>
					<thead>
						<tr>
							<th hidden=""></th>
							<th hidden=""></th>
							<th >Nombre</th>
							<th >Tipo de archivo</th>
							<th >Descargar</th>
						</tr>
					</thead>
					<tbody id="tablaArchivosUsuario">
						<tr>
						<td id="id_Archivo"></td>
						<td id="id_Usuario"></td>
						<td id="nombreA"></td>
						<td id="tipoA"></td>
						<td id="rutaA"></td>
						</tr>
						
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