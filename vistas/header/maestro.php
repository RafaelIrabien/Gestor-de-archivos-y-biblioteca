

<ul class="navbar-nav ml-auto">
          <div id="inicio">
          <li class="nav-item active">
            <a href="inicio.php"><span class="fa-solid fa-house-chimney"></span> Inicio
              <span class="sr-only">(current)</span>
            </a>
          </li>
          </div>

          <li class="nav-item">
            <a href="categorias.php"><span class="fa-solid fa-tags"></span> Categorías</a>
          </li>

          <li class="nav-item">
            <a href="gestor.php"><span class="fa-solid fa-cloud"></span> Mis archivos</a>
          </li>


          <li class="nav-item">
            <a href="gestor.php"><span class="fa-solid fa-book"></span> Biblioteca</a>
          </li>  

          

</ul>




<?php 
    require_once "../clases/Conexion.php";
    $c = new Conectar;
    $conexion = $c->conexion();

    $id_Usuario = $_SESSION['id_usuario'];
    $sql = "SELECT foto FROM fotos WHERE id_usuario = '$id_Usuario'";
    $result = mysqli_query($conexion, $sql);

    if ($foto = mysqli_fetch_array($result)) {
            $nombreFoto = $foto['foto'];
            $ruta = "../archivos/" . $id_Usuario . "/Foto_Perfil/" .  $nombreFoto;

 ?>


          <div class="nav-item list__item list__item--click">
            <div class="list__button list__button--click">
                <a class="nav__link" href="#">
                  <div class="foto" style="background-image: url('<?php echo $ruta; ?>');"></div>
                </a>
            </div>
            <ul class="list__show menu-vertical">
                  <li class="list__inside">
                    <a class="nav__link nav__link--inside" href="perfil.php">
                      <span class="fa-solid fa-user-circle"></span> Perfil
                    </a>
                 </li>

                 <li class="list__inside">
                    <a class="nav__link nav__link--inside" href="../procesos/usuario/salir.php">
                      <span class="fa-solid fa-arrow-right-from-bracket"></span> Cerrar sesión
                    </a>
                 </li>
           </ul>
          </div>


<?php 
    } else {
 ?>


          <div class="nav-item list__item list__item--click">
            <div class="list__button list__button--click">
                <a class="nav__link" href="#">
                  <div class="foto" style="background-image: url(../img/Foto_perfil.png);"></div>
                </a>
            </div>
            <ul class="list__show menu-vertical">
                  <li class="list__inside">
                    <a class="nav__link nav__link--inside" href="perfil.php">
                      <span class="fa-solid fa-user-circle"></span> Perfil
                    </a>
                 </li>

                 <li class="list__inside">
                    <a class="nav__link nav__link--inside" href="../procesos/usuario/salir.php">
                      <span class="fa-solid fa-arrow-right-from-bracket"></span> Cerrar sesión
                    </a>
                 </li>
           </ul>
          </div>


 <?php 
    }
  ?>