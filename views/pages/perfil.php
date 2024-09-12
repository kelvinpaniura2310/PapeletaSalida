<div class="container-fluid">
    <!-- SELECT2 EXAMPLE -->
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title"><b>Datos Personales</b></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>DNI:
                            <input type="text" class="form-control" style="border: none; outline: none;  background: white;" name="id" value="<?php echo $_SESSION['dni']; ?>" readonly>
                        </label>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label>Nombres:
                            <input type="text" class="form-control" style="border: none; outline: none;  background: white;" name="dni" value="<?php echo $_SESSION['nombre']; ?>" readonly>
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Apellidos:
                            <input type="text" class="form-control" style="border: none; outline: none;  background: white;" name="dni" value="<?php echo $_SESSION['apellidos']; ?>" readonly>
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Fecha de Nacimiento:
                            <input type="text" class="form-control" style="border: none; outline: none;  background: white;" name="dni" value="<?php echo $_SESSION['fecha_nacimiento']; ?>" readonly>
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Dirección:
                            <input type="text" class="form-control" style="border: none; outline: none;  background: white;" name="dni" value="<?php echo $_SESSION['direccion']; ?>" readonly>
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Teléfono:
                            <input type="text" class="form-control" style="border: none; outline: none;  background: white;" name="dni" value="<?php echo $_SESSION['telefono']; ?>" readonly>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Correo Electrónico:
                            <input type="text" class="form-control" style="border: none; outline: none;  background: white;" name="dni" value="<?php echo $_SESSION['correo']; ?>" readonly>
                        </label>

                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label>Fecha De Registro:
                            <input type="text" class="form-control" style="border: none; outline: none;  background: white;" name="dni" value="<?php echo $_SESSION['fecha_registro']; ?>" readonly>
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Rol que Ejerce en el IESTPA:
                            <input type="text" class="form-control" style="border: none; outline: none;  background: white;" name="dni" value="<?php echo $_SESSION['tipo_usuario']; ?>" readonly>
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Estado Actual: <br>
                            <?php
                            $estado = $_SESSION['estado'] ? 'Activo' : 'Inactivo';
                            $color = $_SESSION['estado'] ? 'btn-success' : 'btn-danger';
                            echo "<button type='button' class='btn {$color} toggle-estado' data-dni='{$_SESSION['dni']}'>{$estado}</button>";
                            ?>
                        </label>
                    </div>

                    <a href="updateuser" class="btn btn-app bg-warning">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>