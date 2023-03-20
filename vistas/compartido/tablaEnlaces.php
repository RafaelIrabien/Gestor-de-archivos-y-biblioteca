
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
	$sql = "SELECT id_enlace, enlace FROM enlaces";
	$result = mysqli_query($conexion, $sql);

 ?>


	<div class="tabla">
	<div class="col-sm-12">
	<div class="table-responsive">
			<h1 class="display-4">Enlaces</h1>
			<br>
			<h5>Estimado usuario, haga click sobre un enlace para poder copiarlo.</h5>
		<table class="table table-hover" id="tablaEnlacesDatatable">
			<thead>
				 <tr>
				 	<th style="text-align: center;">No.</th>
					<th style="text-align: center;">Enlace</th>
			   <!-- <th style="text-align: center;">Acciones</th> -->
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
					<td style="font-weight: bold;"><?php echo $id_enlace; ?></td>
					<td onclick="Copiar(this)"><?php echo $mostrar['enlace']; ?></td>
			   <!-- <td></td> -->
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
	


	}else {
		header("location:../../index.php");
	}

 ?>