<?php 

	session_start();

	//Se valida que exista un usuario ya logueado, de lo contrario no se le permite el acceso
	if (isset($_SESSION['nombre'])) {
		include "header.php"; 
		include "fondo.php";
?>



<?php 
	include "footer.php"; 

  } else {
  	header("location:../index.php");
  }
?>