<?php 

  require_once "../../clases/Conexion.php";
  $c = new Conectar;
  $conexion = $c->conexion();

  $id_Usuario = $_SESSION['id_usuario'];

  $sql = "SELECT id_usuario, id_rol FROM usuarios WHERE id_usuario = '$id_Usuario'";

  $result = mysqli_query($conexion, $sql);

  $fila = mysqli_fetch_array($result);


 ?>

<!DOCTYPE html>
<html>
<head>
  
  <title>Gestor</title>
  <link rel="stylesheet" type="text/css" href="../../librerias/bootstrap_4/bootstrap.min.css
  ">
  <link rel="stylesheet" type="text/css" href="../../librerias/fontawesome/css/all.css">
  <link rel="stylesheet" type="text/css" href="../../librerias/datatable/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="css_l/header.css">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


</head>
<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand"  href="../inicio.php">
        <img src="../../img/logo_2.png" alt="..." width="140px">
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
     
      <div class="collapse navbar-collapse" id="navbarResponsive">
       
     <?php 
        if ($fila['id_rol'] == '1') {
         include "header/maestro.php";
      } elseif ($fila['id_rol'] == '2'){
                include "header/secretario.php";
      } elseif ($fila['id_rol'] == '3') {
                include "header/bibliotecario.php";
      } 
      ?>

       
      </div>
    </div>
  </nav>

  

<script type="text/javascript" src="../../js/header.js"></script>