<?php
include('../../config/conexion.php');
$sql_programas = "SELECT * FROM programa_estudio";
$result_programas = $conn->query($sql_programas);

$sql_areas = "SELECT * FROM Area";
$result_areas = $conn->query($sql_areas);
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../resources/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../resources/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../resources/dist/css/adminlte.min.css">

  <!-- Tempus Dominus Bootstrap 4 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tempusdominus-bootstrap-4@5.39.0/build/css/tempusdominus-bootstrap-4.min.css" />

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

  <!-- Moment.js -->
  <script src="https://cdn.jsdelivr.net/npm/moment@2.24.0/moment.min.js"></script>

  <!-- Tempus Dominus Bootstrap 4 JS -->
  <script src="https://cdn.jsdelivr.net/npm/tempusdominus-bootstrap-4@5.39.0/build/js/tempusdominus-bootstrap-4.min.js"></script>


</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="../../index2.html" class="h1"><b>PapeletaS</b>IESTPA</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Registrate como nuevo ususario</p>

        <form action="../../../papeleta/controller/registrousuario.controller.php" method="post">

          <!-- checkbox -->
          <div class="form-group">
            <label for="tipo_usuario">Tipo de Usuario:</label><br>
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="customCheckbox1" name="tipo_usuario[]" value="Docente">
              <label for="customCheckbox1" class="custom-control-label">Docente</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="customCheckbox2" name="tipo_usuario[]" value="Personal-Administrativo">
              <label for="customCheckbox2" class="custom-control-label">Administrativo</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="customCheckbox3" name="tipo_usuario[]" value="Estudiante">
              <label for="customCheckbox3" class="custom-control-label">Estudiante</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="customCheckbox4" name="tipo_usuario[]" value="Administrador">
              <label for="customCheckbox4" class="custom-control-label">Administrador Del Sistema</label>
            </div>
          </div>

          <div class="col-sm-12" id="programa_estudio_div" style="display:none;">
            <!-- Select multiple-->
            <div class="form-group">
              <label>Programa de Estudios</label>
              <select multiple class="form-control" id="programa_estudio" name="programa_estudio[]">
                <?php
                while ($row = $result_programas->fetch_assoc()) {
                  echo "<option value='{$row['idprograma']}'>{$row['nombre']}</option>";
                }
                ?>
              </select>
            </div>
          </div>

          <div class="col-sm-6" id="area_administrativa_div" style="display:none;">
            <!-- select -->
            <div class="form-group">
              <label>Área Administrativa:</label>
              <select class="custom-select" id="area_administrativa" name="area_administrativa">
                <?php
                while ($row = $result_areas->fetch_assoc()) {
                  echo "<option value='{$row['idarea']}'>{$row['nombre']}</option>";
                }
                ?>
              </select>
            </div>
          </div>

          <div class="col-sm-6" id="semestre_div" style="display:none;">
            <!-- select -->
            <div class="form-group">
              <label>Semestre: </label>
              <select class="custom-select" id="semestre" name="semestre">
                <option value="I">I</option>
                <option value="II">II</option>
                <option value="III">III</option>
                <option value="IV">IV</option>
                <option value="V">V</option>
                <option value="VI">VI</option>
              </select>
            </div>
          </div>

          <script>
            document.getElementById('customCheckbox1').onchange = function() {
              document.getElementById('programa_estudio_div').style.display = this.checked ? 'block' : 'none';
              document.getElementById('customCheckbox4').disabled = this.checked;
              document.getElementById('customCheckbox3').disabled = this.checked;
            };

            document.getElementById('customCheckbox2').onchange = function() {
              document.getElementById('area_administrativa_div').style.display = this.checked ? 'block' : 'none';
              document.getElementById('customCheckbox4').disabled = this.checked;
              document.getElementById('customCheckbox3').disabled = this.checked;
            };

            document.getElementById('customCheckbox3').onchange = function() {
              document.getElementById('programa_estudio_div').style.display = this.checked ? 'block' : 'none';
              document.getElementById('semestre_div').style.display = this.checked ? 'block' : 'none';
              document.getElementById('customCheckbox1').disabled = this.checked;
              document.getElementById('customCheckbox2').disabled = this.checked;
              document.getElementById('customCheckbox4').disabled = this.checked;
            };
          </script>

          <div class="input-group mb-3">
            <input type="text" class="form-control"  name="id" placeholder="DNI o Numero de Extranjeria">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control"  name="name" placeholder="Nombres">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control"  name="firtname" placeholder="Apellidos">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="input-group date" id="reservationdate" data-target-input="nearest">
              <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"  name="fechanacimiento" placeholder="Fecha de Nacimiento" />
              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="text" class="form-control"  name="direccion" placeholder="Direccion">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>

          <!-- phone mask -->
          <div class="form-group">
            <div class="input-group">
              <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask  name="telefono" placeholder="Teléfono">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-phone"></i></span>
              </div>
            </div>
            <!-- /.input group -->
          </div>
          <!-- /.form group -->

          <div class="input-group mb-3">
            <input type="email" class="form-control"  name="email" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control"  name="password" placeholder="Contraseña">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Registrar</button>
            </div>
            <!-- /.col -->
            <a href="../../index.php" class="text-center">Ya tienes una Cuenta?</a>
          </div>
        </form>



      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->

  <!-- jQuery -->
  <script src="../resources/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../resources/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../resources/dist/js/adminlte.min.js"></script>

  <!-- Tempus Dominus Bootstrap 4 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tempusdominus-bootstrap-4@5.39.0/build/css/tempusdominus-bootstrap-4.min.css" />

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

  <!-- Moment.js -->
  <script src="https://cdn.jsdelivr.net/npm/moment@2.24.0/moment.min.js"></script>

  <!-- Tempus Dominus Bootstrap 4 JS -->
  <script src="https://cdn.jsdelivr.net/npm/tempusdominus-bootstrap-4@5.39.0/build/js/tempusdominus-bootstrap-4.min.js"></script>


  <script>
    $(function() {
      $('#reservationdate').datetimepicker({
        format: 'L' // Formato para solo fecha (puedes cambiarlo según tus necesidades)
      });
    });
  </script>
</body>

</html>