<?php 

	//Primero nos deja usar lo que son sesiones
	session_start();

	//Elimina todas las sesiones que existan
	session_destroy();

	header("location:../../index.php");

 ?>