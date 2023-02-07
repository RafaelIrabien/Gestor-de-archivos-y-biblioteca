<!DOCTYPE html>
<html>
<head>
  
  <title>Gestor</title>
  <link rel="stylesheet" type="text/css" href="../librerias/bootstrap_4/bootstrap.min.css
  ">
  <link rel="stylesheet" type="text/css" href="../librerias/fontawesome/css/all.css">
  <link rel="stylesheet" type="text/css" href="../librerias/datatable/dataTables.bootstrap4.min.css">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


</head>
<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="../img/logo.png" alt="..." width="100px">
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="inicio.php"><span class="fa-solid fa-house-chimney"></span> Inicio
              <span class="sr-only">(current)</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="categorias.php"><span class="fa-solid fa-tags"></span> Categorías</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="gestor.php"><span class="fa-solid fa-folder"></span> Mis archivos</a>
          </li>
          
          
  
          <li class="list_item">
              <a class="nav-link" href="perfil.php">
             <span class="fa-solid fa-user"></span>
             Usuario
           </a>

            <ul class="menu-vertical list_show">
                
                  <li>
                    <a class="nav-link" href="../procesos/usuario/salir.php"><span class="fa-solid fa-arrow-right-from-bracket"></span> Cerrar sesión
                    </a>
                 </li>

                   <li>
                     <a class="nav-link" href="../procesos/usuario/salir.php"><span class="fa-solid fa-arrow-right-from-bracket"></span> Salir</a>
                    </li>
                
                
       
           </ul>
          </li>
        
           
        
        </ul>
      </div>
    </div>
  </nav>



<style type="text/css">

  
  
  .menu-vertical {
    position: absolute;
    display: none;
    list-style: none;
    width: 110px;
    background-color: #CE2408;
  }

  .navbar-nav li:hover .menu-vertical {
    display: block;
  }

  .menu-vertical li a{
    display: block;
  }
</style>
