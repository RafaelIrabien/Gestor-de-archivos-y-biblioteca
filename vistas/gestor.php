<?php 

	session_start();

	//Se valida que exista un usuario ya logueado, de lo contrario no se le permite el acceso
	if (isset($_SESSION['nombre'])) {
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


	<div>
		<br>
		<div class="contenido_gestor">
			<br>
		<div class="container">
			<h1 class="display-4">Gestor de archivos</h1>
			
			<div id="btn">
			<span class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarArchivos">
				<span class="fa-solid fa-file-circle-plus"></span>
			 	Agregar Archivos
			</span>
			</div>
			<br>
			<div id="tablaGestorArchivos"></div>
		</div>
	</div>
	<br>
	</div>



	<!-- Modal para Agregar Archivos -->
<div class="modal fade" id="modalAgregarArchivos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar nueva categoría</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        	<form id="frmArchivos" enctype="multipart/form-data" method="POST">
        		<label>Categoría:</label>
        		<div id="cetegoriasLoad"></div>
        		<br>
        		<label>Selecciona archivos:</label>
        		<input type="file" name="archivos[]"  id="archivos[]" class="form-control" multiple="">
        	</form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnGuardarArchivos">Guardar</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>





<?php 
     include "footer.php";
  } else {
  	header("location:../index.php");
  }
?>

<script type="text/javascript" src="../js/Gestor.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaGestorArchivos').load("gestor/tablaGestor.php");
		$('#cetegoriasLoad').load("categorias/selectCategorias.php");

		//Evento para guardar archivos
		$('#btnGuardarArchivos').click(function(){
			agregarArchivosGestor();

		});
	});
</script>
