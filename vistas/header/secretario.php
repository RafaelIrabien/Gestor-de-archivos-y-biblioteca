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

          <li class="nav-item list__item list__item--click">
            <div class="list__button list__button--click">
              <a href="usuarios.php">
                <span class="fa-solid fa-users"></span> 
                Usuarios
              </a>
            </div>
          </li>
        </ul>