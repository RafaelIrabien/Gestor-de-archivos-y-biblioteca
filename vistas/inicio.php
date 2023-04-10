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
	<link rel="stylesheet" type="text/css" href="../css/tablas_compartidas.css">
	<title></title>
</head>
<body>
<br><br>
	
	<!-- Tabla archivos compartidos -->
	<div class="contenido_compartido">
		<br>
		<div class="container">
			<div id="tablaArchivosCompartidos"></div>
		</div>
	</div>
	<br><br><br><br><br><br><br>


	<!-- Modal para Visualizar Archivos -->
<div class="modal fade" id="modalVerArchivos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title w-100 text-center" id="exampleModalLabel">Archivo</h5>
        <div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
      </div>

      <div class="modal-body">
      	<div id="archivoObtenido">
      		
      	</div>
      </div>
      

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
       
      </div>
    </div>
  </div>
</div>


<!-- Modal para Visualizar Instrucciones -->
<div class="modal fade" id="modalVerInstruccion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title w-100 text-center" id="exampleModalLabel">Instrucciones</h5>
        <div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
      </div>

      <div class="modal-body">
      	<p id="instruccionObtenido" class="form-control">
      		
      	</p>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
       
      </div>
    </div>
  </div>
</div>




	<!-- Tabla enlaces compartidos -->
	<div class="contenido_compartido">
		<br>
		<div class="container">
			<div id="tablaEnlacesCompartidos"></div>
		</div>
	</div>



	<!-- Modal para Visualizar Instrucciones -->
<div class="modal fade" id="modalVerInstrucciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title w-100 text-center" id="exampleModalLabel">Instrucciones</h5>
        <div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
      </div>

      <div class="modal-body">
      	<p type="text" id="instruccionObtenida" class="form-control">
      		
      	</p>
      		

      </div>
      

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
       
      </div>
    </div>
  </div>
</div>

	<br>
	<br>

</body>
</html>







<?php 
	include "footer.php"; 

  } else {
  	header("location:../index.php");
  }
?>

<script type="text/javascript" src="../js/Archivo_Compartido.js"></script>
<script type="text/javascript" src="../js/Enlace.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaArchivosCompartidos').load('compartido/tablaArchivos.php');
		$('#tablaEnlacesCompartidos').load('compartido/tablaEnlaces.php');
	});
</script>