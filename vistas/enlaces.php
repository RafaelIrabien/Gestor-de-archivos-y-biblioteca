<?php 
		session_start();

		require_once "../clases/Conexion.php";
		$c = new Conectar;
		$conexion = $c->conexion();

		$idUsuario = $_SESSION['id_usuario'];

		$sql = "SELECT id_usuario, id_rol FROM usuarios WHERE id_usuario = '$idUsuario'";
		$result = mysqli_query($conexion, $sql);
		$fila = mysqli_fetch_array($result);

		if ($fila['id_rol'] == '2') {

			if ($_SESSION['nombre']) {
				include "header.php";
    		include "fondo.php";
 ?>  





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/tablas.css">
	<title></title>
</head>
<body>

	<div class="contenido compartir">
		<br>
		<div class="container">
			<div id="tablaEnlaces"></div>
		</div>
	</div>


	<!-- Modal Agregar Enlace -->
<div class="modal fade" id="modalEnlace" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title w-100 text-center" id="exampleModalLabel">Agregar enlace</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        	<form id="frmEnlaces" method="POST">
        		<label>Enlace:</label>
        		<input type="text" name="Enlace" id="Enlace" class="form-control">
        		<br>
        		<label>Descripción:</label>
        		<textarea id="instruccion" name="instruccion" class="form-control"></textarea>
        	</form>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-primary" id="btnGuardarEnlace">Guardar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal Editar Enlace -->
<div class="modal fade" id="modalEditarEnlace" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title w-100 text-center" id="exampleModalLabel">Editar enlace</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        	<form id="frmActualizarEnlaces">
        		<label>Enlace:</label>
        		<input type="text" name="id_Enlace" id="id_Enlace" hidden="">
        		<input type="text" name="EnlaceE" id="EnlaceE" class="form-control">
        		<br>
        		<label>Descripción:</label>
        		<textarea name="InstruccionE" id="InstruccionE" class="form-control"></textarea>
        	</form>
      </div>
      <div class="modal-footer">
      
        <button type="button" class="btn btn-warning" id="btnActualizarEnlace">Actualizar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>



</body>
</html>

<?php 
	include "footer.php";
 ?>

<script type="text/javascript" src="../js/Enlace.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaEnlaces').load('compartir/tablaEnlaces.php');

		$('#btnGuardarEnlace').click(function(){
			agregarEnlace();
		});

		$('#btnActualizarEnlace').click(function(){
			actualizarEnlace();
		});

	});
</script>


<?php 

 	} else {
 		header("location:../index.php");
 }

} else {
	header("location:inicio.php");
}

 ?>
