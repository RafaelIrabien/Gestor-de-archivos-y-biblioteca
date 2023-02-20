<?php 
	session_start();

    if(isset($_SESSION['nombre'])) {
      include "header.php";
      include "fondo.php";

	require_once "../clases/Conexion.php";
  	$c = new Conectar;
  	$conexion = $c->conexion();

  	$id_Usuario = $_SESSION['id_usuario'];

  	$sql = "SELECT id_usuario, id_rol FROM usuarios WHERE id_usuario = '$id_Usuario'";
  	$result = mysqli_query($conexion, $sql);
  	$fila = mysqli_fetch_array($result);
	
	
	if($fila['id_rol'] == '2') {

	

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
		<br>
		<div class="contenido_usuario">
			<br>
		<div class="container">
			<h1 class="display-4">Usuarios</h1>
			
			<br>
			<div id="tablaUsuarios"></div>
		</div>
	</div>
	<br>
	</div>


	<!-- Modal para Editar Categoria -->
<div class="modal fade" id="modalArchivos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="margin-left: 30px;" class="modal-title" id="exampleModalLabel">Actualizar categoría</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

       

  <div class="tabla">
    <div class="col-sm-10">
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

            while ($archivo = mysqli_fetch_array($result)) {

              $rutaDescarga = "../../archivos/".$archivo['id_usuario']."/".$archivo['nombre'];
              $nombreArchivo = $archivo['nombre'];
            */
           ?>

          <tbody>
            <tr>
              <td id="id_Archivo" hidden=""></td>
              <td id="id_Usuario" hidden=""></td>
              <td id="nombreA"><?php// echo $archivo['nombre']; ?></td>
              <td id="tipoA"><?php// echo $archivo['tipo']; ?></td>
              <td id="rutaA">
                <a href="<?php// echo $rutaDescarga; ?>" download="<?php $nombreArchivo ?>" class="btn btn-success btn-sm">
                  <span class="fas fa-download"></span>
                </a>
              </td>
            </tr>
          <?php 
          //  } //Fin de while
           ?>
          </tbody>

        </table>
<br>
      </div>
    </div>
  </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      
      </div>
    </div>
  </div>
</div>
 	
 	</body>
 	</html>


<?php include "footer.php"; ?>


<script type="text/javascript" src="../js/Gestor.js"></script>
  <script type="text/javascript">
  	$(document).ready(function(){
  		$('#tablaUsuarios').load('usuarios/tablaUsuarios.php');
  	})
  </script>


  <?php 
 		
 		
 	} else {
 		header("location:../index.php");
 	}

 	} else {
 		header("location:../index.php");
 	}

  ?>
