<?php 

      require_once "../../../clases/Usuario.php";


      //sha1 es una función para encriptar
      $password = sha1($_POST['password']);

      $datos = array(
                   "nombre" => $_POST['nombre'],
                   "correo" => $_POST['correo'],
                   "password" => $password

                  );

      //Instaciamos la clase usuario
      $usuario = new Usuario();
      echo $usuario->agregarUsuario($datos);
 ?>