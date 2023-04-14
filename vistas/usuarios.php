<?php 
	session_start();

   

	require_once "../clases/Conexion.php";
  	$c = new Conectar;
  	$conexion = $c->conexion();

  	$id_Usuario = $_SESSION['id_usuario'];
   

  	$sql = "SELECT id_usuario, id_rol FROM usuarios WHERE id_usuario = '$id_Usuario'";
  	$result = mysqli_query($conexion, $sql);
  	$fila = mysqli_fetch_array($result);
	 // $id = $fila['id_usuario'];
	   if($fila['id_rol'] == '2') {
   
     if(isset($_SESSION['nombre'])) {
      include "header.php";
	

 ?>

 	<!DOCTYPE html>
 	<html>
 	<head>
 		<meta charset="utf-8">
 		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 		<link rel="stylesheet" type="text/css" href="../css/tablas.css">
 		<title></title>
 	</head>
 	<body>

 		<div>
		<div class="contenido_usuario">
			<br>
		<div class="container">
			<div id="tablaUsuarios"></div>
		</div>
	</div>
	<br>
	</div>


	<!-- Modal para Ver Archivos del usuario seleccionado -->
<div class="modal fade" id="modalArchivos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title w-100 text-center" id="exampleModalLabel">Archivos del usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

       <div></div>

  <div class="tabla">
    <div class="col-sm-10">
      <div class="table-responsive">
        
        <table class="table table-hover" id="tablaArchivosUsuario">
          <br>
          <thead id="theadArchivos">
            
          </thead>

          <tbody>
            
            
          </tbody>

        </table>  
<br>
      </div>
    </div>
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
 
    </div>
   </div>
  </div>
</div>





  <!-- Modal para Ver Archivos del usuario seleccionado -->
<div class="modal fade" id="modalVer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="margin-left: 30px;" class="modal-title" id="exampleModalLabel">Archivos del usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <div class="tabla">
            <div class="col-sm-10">
              <div class="table-responsive">
              </div>
            </div>
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
 
    </div>
   </div>
  </div>
</div>
 	
 	</body>
 	</html>


<?php 

include "fondo.php";
include "footer.php"; ?>


<script type="text/javascript" src="../js/Secretario.js"></script>
  <script type="text/javascript">
  	$(document).ready(function(){
  		$('#tablaUsuarios').load('usuarios/tablaUsuarios.php');
     // $('#tablaArchivosUsuario').load('usuarios/archivosUsuario.php');
    
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
