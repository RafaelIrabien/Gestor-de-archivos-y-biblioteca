<!DOCTYPE html>
<html>
<head>
  
  <title>Gestor</title>
  <link rel="stylesheet" type="text/css" href="../librerias/bootstrap_4/bootstrap.min.css
  ">
  <link rel="stylesheet" type="text/css" href="../librerias/fontawesome/css/all.css">
  <link rel="stylesheet" type="text/css" href="../librerias/datatable/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="../css/header.css">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


</head>
<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="inicio.php">
        <img src="../img/logo_2.png" alt="..." width="140px">
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a href="inicio.php"><span class="fa-solid fa-house-chimney"></span> Inicio
              <span class="sr-only">(current)</span>
            </a>
          </li>

          <li class="nav-item">
            <a href="categorias.php"><span class="fa-solid fa-tags"></span> Categorías</a>
          </li>

          <li class="nav-item">
            <a href="gestor.php"><span class="fa-solid fa-folder"></span> Mis archivos</a>
          </li>

          <!-- <li class="nav-item list__item list__item--click">
            <div class="list__button list__button--click">
              <a href="#">
                <span class="fa-solid fa-book"></span> 
                Biblioteca
              </a>
            </div>
          </li> -->
          
        
          <li class="nav-item list__item list__item--click">
            <div class="list__button list__button--click">
                <a class="nav__link" href="#">
                 <span class="fa-solid fa-user"></span>
                  Usuario
                </a>
                <img src="../librerias/assets/arrow.svg" class="list__arrow">
            </div>
              
            <ul class="list__show menu-vertical">
                  <li class="list__inside">
                    <a class="nav__link nav__link--inside" href="perfil.php">
                      <span></span> Perfil
                    </a>
                 </li>

                 <li class="list__inside">
                    <a class="nav__link nav__link--inside" href="../procesos/usuario/salir.php">
                      <span class="fa-solid fa-arrow-right-from-bracket"></span> Cerrar sesión
                    </a>
                 </li>
           </ul>
          </li>
        
           
        
        </ul>
      </div>
    </div>
  </nav>

<script type="text/javascript" src="../js/header.js"></script>