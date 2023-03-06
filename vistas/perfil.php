<?php 
	session_start();
	require_once("../clases/Usuario.php"); 

	if (isset($_SESSION['nombre'])) {
		include "header.php";
		include "fondo.php";

		require_once "../clases/Conexion.php";
		$c = new Conectar;
		$conexion = $c->conexion();
		$id_Usuario = $_SESSION['id_usuario'];

		$sql = "SELECT id_usuario, nombre, email, password FROM usuarios WHERE id_usuario = '$id_Usuario'";

		$result = mysqli_query($conexion, $sql);
		
 ?>





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/perfil.css">
	<link rel="stylesheet" type="text/css" href="../css/tablas.css">
</head>
<body>

<br>
<div id="DatosUsuario" class="table-responsive">
	<div class="container" id="datos">
		
		<br>
			
		<h2>Perfil de usuario</h2>
				<br>
	<form id="frmFoto" method="POST" class="table-responsive" enctype="multipart/form-data">


	  <?php 
	  	$sql2 = "SELECT foto FROM fotos WHERE id_usuario = '$id_Usuario'";
            $result2 = mysqli_query($conexion, $sql2);

            if ($foto = mysqli_fetch_array($result2)) {
               $nombreFoto = $foto['foto'];
               $ruta = "../archivos/" . $id_Usuario . "/Foto_Perfil/" . $nombreFoto;
	   ?>


	<div id="instruccion">Click en la imagen para subir una foto:</div>
	    <div class="image-upload">
	    	<label for="file-input">
	    		<div class="circular--landscape">
	    		<img src="<?php echo $ruta; ?>" alt="Click aquí para subir su foto" title="Click aquí para subir su foto">
	    	<!--	<div><img src="" id="img-foto"></div> -->
	    		</div>
	    	</label>
	    </div>
	    	<br>
	    	<span type="button" class="btn btn-primary"  data-toggle="modal" data-target="#modalEditarFoto">Editar
	    	</span>
	   

	    <?php 
	    	} else {

	    	 
	     ?>


	     <div id="instruccion">Click en la imagen para subir una foto:</div>
	    <div class="image-upload">
	    	<label for="file-input">
	    	<div>
	    		<img class="circular--square" src="../img/Foto_perfil.png" alt="Click aquí para subir su foto" title="Click aquí para subir su foto"  id="img-foto">
	    	<!--	<div><img src="" id="img-foto"></div> -->
	    	</div>
	    	</label>

	    	<input type="file" name="archivos[]" id="file-input" accept="image/*" onchange="vista_preliminar(event)">

	    	
	    </div>
	    	 <br>
	    	<button type="button" class="btn btn-primary" id="btnGuardarFotoPerfil">Guardar</button>
	    <?php 
	    	}
	     ?>
	</form>
	<br>

				<?php  
					while ($dato = mysqli_fetch_array($result)) {
						//$contraseña = 
				?>
				<p><strong>Nombre:</strong> <?php echo $dato['nombre']; ?></p>
				<br>
				<p><strong>Correo:</strong> <?php echo $dato['email']; ?></p>
				<br>
				<p><strong>Contraseña:</strong> <?php echo $dato['password']; ?></p>

				<?php 
					}
				 ?>
<br>
 </div>
</div>
	<br>


<!-- Modal para Editar Foto -->
<div class="modal fade" id="modalEditarFoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="margin-left: 50px;" class="modal-title" id="exampleModalLabel">Actualizar foto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
          <form id="frmActualizarCategoria">
            <label>Foto actual:</label>
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


 <script type="text/javascript" src="../js/Usuario.js"></script>
 <script type="text/javascript">

 	let vista_preliminar = (event)=> {
 	 //Creamos un objeto para poder leer la imagen
 	 let leer_img = new FileReader();
 	 //Llamamos al contenedor que va a tener la imagen
 	 let id_img = document.getElementById('img-foto');

 	 //Hacemos uso de una propiedad del objeto FileReader (onload)
 	 //Este va a recibir una funci+on tipo flecha
 	 leer_img.onload = ()=> {
 	 	//Si nuestro archivo ha sido cargado, mande al atributo de nuestro elemento img la dirección
 	 	if (leer_img.readyState == 2) {
 	 		id_img.src= leer_img.result
 	 	}
 	 }

 	 leer_img.readAsDataURL(event.target.files[0])
 }
 </script>



 <script type="text/javascript">
 	$(document).ready(function(){

 		//Evento para guardar foto de perfil
 		$('#btnGuardarFotoPerfil').click(function(){
 			agregarFotoPerfil();
 		});
 	});
 </script>
