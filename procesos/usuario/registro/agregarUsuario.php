<?php 

      require_once "../../../clases/Usuario.php";


      //sha1 es una función para encriptar
      $password = sha1($_POST['password']);
      $idRol = $_POST['Roles'];

      $datos = array(
                   "nombre" => $_POST['nombre'],
                   "correo" => $_POST['correo'],
                   "password" => $password,
                   "idRol" => $idRol

                  );

      //Instaciamos la clase usuario
      $usuario = new Usuario();
      echo $usuario->agregarUsuario($datos);
 ?>