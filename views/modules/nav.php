      <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">
          <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
      </div>

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
          <!-- Brand Logo -->
          <a href="#" class="brand-link">
              <img src="views/resources/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
              <span class="brand-text font-weight-light">PapeletaS || IESTPA</span>
          </a>

          <!-- Sidebar -->
          <div class="sidebar">
              <!-- Sidebar user panel (optional) -->
              <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                  <div class="image">
                      <img src="views/resources/img/logo.png" class="img-circle elevation-2" alt="User Image">
                  </div>
                  <div class="info">
                    <?php 
                    $nombre=$_SESSION['nombre'];
                    $apellidos=$_SESSION['apellidos'];
                    ?>
                      <a href="#" class="d-block"> <?php echo $nombre." ".$apellidos ?> </a>
                  </div>
              </div>

              <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                      <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                      <li class="nav-header">OPCIONES</li>
                      <li class="nav-item">
                          <a href="users" class="nav-link">
                              <i class="nav-icon far fa-circle text-danger"></i>
                              <p class="text">Ver Usuarios</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="newpapeleta" class="nav-link">
                              <i class="nav-icon far fa-circle text-warning"></i>
                              <p>Registrar Papeleta</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="mispapeletas" class="nav-link">
                              <i class="nav-icon far fa-circle text-info"></i>
                              <p>Ver Mis Papeletas</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="registropapeletas" class="nav-link">
                              <i class="nav-icon far fa-circle text-white"></i>
                              <p>Ver Papeletas Registradas</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="role" class="nav-link">
                              <i class="nav-icon far fa-circle text-primary"></i>
                              <p>Crear Roles</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="areas" class="nav-link">
                              <i class="nav-icon far fa-circle text-green"></i>
                              <p>Crear Areas</p>
                          </a>
                      </li>

                  </ul>
              </nav>
              <!-- /.sidebar-menu -->
          </div>
          <!-- /.sidebar -->
      </aside>
      <!-- Sidebar Menu -->