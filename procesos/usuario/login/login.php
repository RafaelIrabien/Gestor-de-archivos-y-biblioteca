<?php 

	session_start();

	require_once("../../../clases/Usuario.php");

	$nombre = $_POST['login'];
	$password = sha1($_POST['password']);

	//Creamos un objeto
	$usuario = new Usuario();
	//Llamamos al metodo login
	echo $usuario->login($nombre, $password);
 ?>