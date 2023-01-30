<?php 

	session_start();

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


 		<div class="">
				<div class="container">
					<h1 class="display-4">Categorías</h1>

					<div class="row">
						<div class="col-sm-4">
							<span class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">
								<span class="fa-solid fa-folder-plus"></span>
								Agregar nueva categoría 
							</span>
						</div>
					</div>
					<br>
					<div class="col-sm-12">
						<div id="tablaCategorias"></div>
					</div>
				</div>
		</div>



<!-- Modal Agregar Categoria -->
<div class="modal fade" id="modalAgregarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar nueva categoría</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        	<form id="frmCategorias">
        		<label>Nombre de la categoría</label>
        		<input type="text" name="nombreCategoria" id="nombreCategoria" class="form-control">
        	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnGuardarCategoria">Guardar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal para Editar Categoria -->
<div class="modal fade" id="modalActualizarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar categoría</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
          <form id="frmActualizarCategoria">
            <label>Nombre de la categoría</label>
            <input type="text" id="id_Categoria" name="id_Categoria" hidden="">
            <input type="text" id="categoriaU" name="categoriaU" id="nombreCategoria" class="form-control">
          </form>  
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-warning" id="btnActualizarCategoria">Actualizar</button>
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

<script type="text/javascript" src="../js/Categorias.js"></script>
 <script type="text/javascript">
 	$(document).ready(function(){
 		$('#tablaCategorias').load("categorias/tablaCategorias.php");

    //Cuando le demos click nos permite hacer una acción
    $('#btnGuardarCategoria').click(function(){
       agregarCategoria();
      });

    //Llamar a la función actualizarCategoria del JS
    $('#btnActualizarCategoria').click(function(){
      actualizarCategoria();
    });


    
 	});
 </script>


