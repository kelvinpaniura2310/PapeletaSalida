      <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">
          <img class="animation__shake" src="../resources/img/logo.jpeg" alt="PapeletaSIESTPA" height="60" width="60">
      </div>

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: black;">
          <!-- Brand Logo -->
          <a href="" class="brand-link">
              <img src="views/resources/img/logo.jpeg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
              <span class="brand-text font-weight-light">PapeletaSIESTPA</span>
          </a>

          <!-- Sidebar -->
          <div class="sidebar">
              <!-- Sidebar user panel (optional) -->
              <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                      <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                      <li class="nav-header">OPCIONES</li>
                      <li class="nav-item" data-role="Administrador,Docente">
                          <a href="users" class="nav-link">
                              <i class="nav-icon far fa-circle text-danger"></i>
                              <p class="text">Usuarios</p>
                          </a>
                      </li>
                      <li class="nav-item" data-role="Estudiante,Docente,Personal-Administrativo">
                          <a href="newpapeleta" class="nav-link">
                              <i class="nav-icon far fa-circle text-warning"></i>
                              <p>Registrar Papeleta</p>
                          </a>
                      </li>
                      <li class="nav-item" data-role="Administrador,Estudiante,Docente,Personal-Administrativo">
                          <a href="mispapeletas" class="nav-link">
                              <i class="nav-icon far fa-circle text-info"></i>
                              <p>Mis Papeletas</p>
                          </a>
                      </li>
                      <li class="nav-item" data-role="Administrador">
                          <a href="registropapeletas" class="nav-link">
                              <i class="nav-icon far fa-circle text-white"></i>
                              <p>Papeletas Registradas</p>
                          </a>
                      </li>
                      <!--<li class="nav-item" data-role="Administrador,">
                          <a href="role" class="nav-link">
                              <i class="nav-icon far fa-circle text-primary"></i>
                              <p>Crear Roles</p>
                          </a>
                      </li>-->
                      <li class="nav-item" data-role="Administrador">
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

      <script>
          document.addEventListener('DOMContentLoaded', function() {
              // Recuperamos los roles del usuario desde la sesión PHP
              var userRole = <?php echo json_encode($_SESSION['tipo_usuario']); ?>; // Ejemplo: 'Docente,Personal-Administrativo'

              // Convertimos el rol del usuario en un array para manejar combinaciones
              var userRolesArray = userRole.split(','); // ['Docente', 'Personal-Administrativo']

              // Obtén todos los elementos del menú
              var menuItems = document.querySelectorAll('.nav-item');

              // Recorre todos los elementos del menú
              menuItems.forEach(function(item) {
                  // Obtén los roles permitidos para el elemento
                  var allowedRoles = item.getAttribute('data-role');

                  if (allowedRoles) {
                      var allowedRolesArray = allowedRoles.split(','); // Convierte la lista de roles permitidos en un array

                      // Verifica si alguno de los roles del usuario coincide con los permitidos
                      var hasRole = userRolesArray.some(function(role) {
                          return allowedRolesArray.includes(role.trim());
                      });

                      // Si el usuario no tiene ninguno de los roles permitidos, oculta el elemento
                      if (!hasRole) {
                          item.style.display = 'none';
                      }
                  }
              });
          });
      </script>