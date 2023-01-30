<?php 
	session_start();
	require_once "../../clases/Conexion.php";

	$c = new Conectar;
	$conexion = $c->conexion();
	$id_Usuario = $_SESSION['id_usuario'];

	$sql = "SELECT id_categoria, nombre FROM categorias WHERE id_usuario = '$id_Usuario' ";

	$result = mysqli_query($conexion, $sql);


 ?>

 <select name="categoriasArchivos" id="categoriasArchivos" class="form-control">
 	<?php 
 		while ($mostrar = mysqli_fetch_array($result)) {
 			$idCategoria = $mostrar['id_categoria'];
 			$nombreCategoria = $mostrar['nombre'];
 		
 	 ?>
 	 	<!-- El value solo va a cargar o mandar el id de la categoria y el otro lado el nombre -->
 	 	<option value="<?php echo $idCategoria ?>">
 	 		<?php echo $nombreCategoria; ?>
 	 	</option>

 	 <?php 
 	 	}
 	  ?>
 </select>