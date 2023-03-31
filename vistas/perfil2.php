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
<div class="table-responsive">
	<div class="container" id="datos">
	<br>	
		<h2>Perfil de usuario</h2>
	<br>
	<form id="frmFoto" action="../procesos/usuario/perfil/proceso_guardar.php" method="POST" class="table-responsive" enctype="multipart/form-data">


	<?php 


	  	$sql2 = "SELECT id_foto, foto FROM fotos WHERE id_usuario = '$id_Usuario'";
        $result2 = mysqli_query($conexion, $sql2);

        if ($foto = mysqli_fetch_array($result2)) {
           $Foto = base64_encode($foto['foto']);
          
 	?>

	<div class="image-upload">
	    <label>
	    	<div id="FotoPerfil" class="circular--landscape">
	    	<section class="container">
	    	<img src="data:image/jpeg;base64,<?php echo $Foto; ?>">
	    
	    	<span id="span" type="button" class="btn btn-primary btn-lg" style="display: block; height: 50px; margin: auto; border-radius: 100%;" data-toggle="modal" data-target="#modalEditarFoto" onclick="<?php echo $foto['id_foto']; ?>">
					<span class="fa fa-camera fa-lg"></span>
				</span>
				</section>
	    	</div>
	    </label>
	</div>
	


	<?php 
		} else {   	 
	?>

	 <div id="instruccion">
	 	<h5>Click en la imagen para subir una foto:</h5>
	 	</div>
	 <div class="image-upload">
	 	<label for="file-input">
	 <img src="../img/Foto_perfil.png" id="img-foto" title="Click aquí para subir su foto">
	  </label>
	
	 <input type="file" id="file-input" required name="imagen" accept="image/*" onchange="vista_preliminar(event)">
	  </div>
	 <input type="submit" class="btn btn-primary" value="Guardar" style="display: block; margin: auto;">
	    
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
		<span type="button" class="btn btn-primary" style="display:block; margin: 0 auto; width: 30%;" data-toggle="modal" data-target="#modalEditarNombre" onclick="obtenerDatosNombre('<?php echo $dato['id_usuario']; ?>')">
		 <span class="fa fa-edit"></span> Editar datos
			</span> 
		<br>
	<?php 
		}
	?>
	<br>
 	</div>
	</div>


	<?php 
		

	 ?>



	<!-- Modal para Editar Foto -->
<div class="modal fade" id="modalEditarFoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title w-100 text-center" id="exampleModalLabel">Actualizar foto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
      	 
      	<div>
      	
          <form action="../procesos/usuario/perfil/proceso_modificar.php?id=<?php echo $foto['id_foto']; ?>" id="frmVisualizarFotoPerfil" method="POST" class="table-responsive" enctype="multipart/form-data">
      
          <div class="image-upload">
          <img width="300px" src="data:image/jpeg;base64,<?php echo $Foto; ?>" id="img-foto" style="display:block; margin:auto;">
        </div>
          
          <br>
          <input type="file" required name="imagen" accept="image/*" onchange="vista_preliminar(event)" style="display:block; margin:auto;">
       
          <br>
         

      <div class="modal-footer">
       
        <button id="btnActualizarFoto" type="submit" class="btn btn-warning">Actualizar</button>
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </form>

        </div>       
      </div>
      </div>
    </div>
  </div>
</div>
	<!-- Fin del modal para Editar Foto -->


	<!-- Modal para Editar Nombre -->
<div class="modal fade" id="modalEditarNombre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title w-100 text-center" id="exampleModalLabel">Actualizar datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
      	 
      	<div>
      	
          <form id="frmActualizarNombre">
          
          <br>
          <input type="text" id="id_Usuario" name="id_Usuario" hidden="">

         	<input type="text" id="Nombre" name="Nombre" class="form-control">
         	<br>
       		<input type="text" id="Email" name="Email" class="form-control">
          <br>
         

      		<div class="modal-footer">
        
        		<button id="btnActualizarNombre" type="button" class="btn btn-warning">Actualizar</button>
        
        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </form>

        </div>       
      </div>
      </div>
    </div>
  </div>
</div>
	<!-- Fin del modal para Editar Nombre -->






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

    //Llamar a la función actualizarNombre del JS
    $('#btnActualizarNombre').click(function(){
      actualizarNombre();
    });

    


    
 	});
 </script>

 