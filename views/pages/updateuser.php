<div class="container-fluid"><br>
    <!-- SELECT2 EXAMPLE -->
    <div class="card card-primary">
        <div class="card-header ">
            <h3 class="card-title"><b>Editar Datos Personales</b></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>DNI:
                            <input type="number" class="form-control" maxlength="8" name="id" value="<?php echo $_SESSION['dni']; ?>">
                        </label>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label>Nombres:
                            <input type="text" class="form-control" name="nombre" value="<?php echo $_SESSION['nombre']; ?>">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Apellidos:
                            <input type="text" class="form-control" name="apellidos" value="<?php echo $_SESSION['apellidos']; ?>">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Fecha de Nacimiento:
                            <input type="date" class="form-control" name="fecha_nacimiento" value="<?php echo $_SESSION['fecha_nacimiento']; ?>">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Dirección:
                            <input type="text" class="form-control" name="direccion" value="<?php echo $_SESSION['direccion']; ?>">
                        </label>
                    </div>

                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Teléfono:
                            <input type="number" class="form-control" maxlength="9" name="telefono" value="<?php echo $_SESSION['telefono']; ?>">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Correo Electrónico:
                            <input type="email" class="form-control" name="email" value="<?php echo $_SESSION['correo']; ?>" readonly>
                        </label>

                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label>Rol que Ejerce en el IESTPA:
                            <input type="text" class="form-control" name="rol" value="<?php echo $_SESSION['tipo_usuario']; ?>" readonly>
                        </label>
                    </div>
                    <a class="btn btn-app bg-primary">
                        <i class="fas fa-save"></i> Save
                    </a>
                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>