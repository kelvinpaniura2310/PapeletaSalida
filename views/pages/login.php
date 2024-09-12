  <div class="login-box login-page" style="
   background: black;
  width: 100%;">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="" class="h1"><b>PapeletaS</b>IESTPA</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg"><b>INICIAR SESIÓN</b></p>
        <form action="controller/Login.Controller.php" method="post">
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Correo Electrónico">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Contraseña">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-5">
              <button type="submit" class="btn btn-primary btn-block">INGRESAR</button>
            </div>
            <div style="width: 5px;"></div>
            <div class="col-5">
              <a class="btn" style="color: blue;" href="views/pages/newuser.php"  
              onmouseover="this.style.backgroundColor='black'; this.style.color='white';" 
              onmouseout="this.style.backgroundColor='transparent'; this.style.color='blue';">
              <u>Registrarme</u></a>
            </div>
          </div>
        </form>

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->
  </body>