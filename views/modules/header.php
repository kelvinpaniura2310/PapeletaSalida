<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
  <img class="animation__wobble" src="" alt="PapeletaSIESTPA" height="60" width="60">
</div>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark" style="background-color: black;">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="home" class="nav-link">Guia de Uso</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">

    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>

    <?php
    $nombre = $_SESSION['nombre'];
    $apellidos = $_SESSION['apellidos'];
    ?>

    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="">
          <img src="views/resources/img/logo.png" class="img-circle elevation-2" style="width: 30px; height: 30px;" alt="User Image">
          <?php echo $nombre . " " . $apellidos ?>
        </i>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a href="perfil" class="dropdown-item">
          <i class="fas fa-user mr-2"></i> Ver Perfil
        </a>
        <div class="dropdown-divider"></div>
        <a href="controller/logout.php" class="dropdown-item">
          <i class="fas fa-sign-out-alt mr-2"></i> Cerrar Sesion
        </a>
    </li>

  </ul>
</nav>
<!-- /.navbar -->