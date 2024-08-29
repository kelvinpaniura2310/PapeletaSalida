<div class="content" style="min-height: 717px;">
    <section class="content-header">
        <div class="content-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Administración de Usuarios</h1>
                </div>
            </div>
        </div>
    </section>
    <?php
    // Incluye la conexión a la base de datos
    include('config/conexion.php');

    // Verifica si se ha enviado una búsqueda
    
    $search = "";
    if (isset($_POST['table_search']) && !empty($_POST['table_search'])) {
        $search = mysqli_real_escape_string($conn, $_POST['table_search']);
    }

    // Construcción de la consulta SQL con o sin filtro de búsqueda
    $sql = "SELECT 
        Persona.dni,
        Persona.nombre,
        Persona.apellidos,
        Persona.fecha_nacimiento,
        Persona.direccion,
        Persona.telefono,
        Persona.correo,
        Persona.contraseña,
        Persona.fecha_registro,
        Persona.tipo_usuario,
        Estudiante.semestre_academico,
        Programa_Estudio.nombre AS nombre_programa,
        Personal_Administrativo.area_id,
        Area.nombre AS nombre_area,
        GROUP_CONCAT(DISTINCT ProgramaDocente.nombre SEPARATOR ', ') AS nombre_programa_docente
    FROM 
        Persona
    LEFT JOIN 
        Estudiante ON Persona.dni = Estudiante.dni
    LEFT JOIN 
        Programa_Estudio ON Estudiante.programa_estudio_id = Programa_Estudio.idprograma
    LEFT JOIN 
        Personal_Administrativo ON Persona.dni = Personal_Administrativo.dni
    LEFT JOIN 
        Area ON Personal_Administrativo.area_id = Area.idarea
    LEFT JOIN 
        Docente ON Persona.dni = Docente.dni
    LEFT JOIN 
        Docente_Programa ON Docente.dni = Docente_Programa.dni_docente
    LEFT JOIN 
        Programa_Estudio AS ProgramaDocente ON Docente_Programa.programa_estudio_id = ProgramaDocente.idprograma";

    // Agregar cláusula WHERE si se realiza una búsqueda
    if (!empty($search)) {
        $sql .= " WHERE 
            Persona.dni LIKE '%$search%' OR
            Persona.nombre LIKE '%$search%' OR
            Persona.apellidos LIKE '%$search%' OR
            Persona.fecha_nacimiento LIKE '%$search%' OR
            Persona.direccion LIKE '%$search%' OR
            Persona.telefono LIKE '%$search%' OR
            Persona.correo LIKE '%$search%' OR
            Persona.tipo_usuario LIKE '%$search%' OR
            Estudiante.semestre_academico LIKE '%$search%' OR
            Programa_Estudio.nombre LIKE '%$search%' OR
            Area.nombre LIKE '%$search%' OR
            ProgramaDocente.nombre LIKE '%$search%'";
    }

    $sql .= " GROUP BY Persona.dni";

    $resultado = mysqli_query($conn, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
    ?>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lista de Usuarios</h3>

                        <div class="card-tools">
                            <!-- Formulario de búsqueda -->
                            <form method="POST" action="">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search" value="<?php echo htmlspecialchars($search); ?>">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>DNI</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Fecha de Nacimiento</th>
                                    <th>Dirección</th>
                                    <th>Teléfono</th>
                                    <th>Correo</th>
                                    <th>Contraseña</th>
                                    <th>Fecha de Registro</th>
                                    <th>Tipo de Usuario</th>
                                    <th>Semestre Académico</th>
                                    <th>Programa de Estudio</th>
                                    <th>Área</th>
                                    <th>Programas donde Enseña</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($fila = mysqli_fetch_assoc($resultado)) {
                                    echo "<tr>";
                                    echo "<td>{$fila['dni']}</td>";
                                    echo "<td>{$fila['nombre']}</td>";
                                    echo "<td>{$fila['apellidos']}</td>";
                                    echo "<td>{$fila['fecha_nacimiento']}</td>";
                                    echo "<td>{$fila['direccion']}</td>";
                                    echo "<td>{$fila['telefono']}</td>";
                                    echo "<td>{$fila['correo']}</td>";
                                    echo "<td>{$fila['contraseña']}</td>";
                                    echo "<td>{$fila['fecha_registro']}</td>";
                                    echo "<td>{$fila['tipo_usuario']}</td>";

                                    // Datos del Estudiante
                                    echo "<td>" . (!empty($fila['semestre_academico']) ? $fila['semestre_academico'] : 'N/A') . "</td>";
                                    echo "<td>" . (!empty($fila['nombre_programa']) ? $fila['nombre_programa'] : 'N/A') . "</td>";

                                    // Datos del Personal Administrativo
                                    echo "<td>" . (!empty($fila['nombre_area']) ? $fila['nombre_area'] : 'N/A') . "</td>";

                                    // Datos del Docente (combinados en una sola celda)
                                    echo "<td>" . (!empty($fila['nombre_programa_docente']) ? $fila['nombre_programa_docente'] : 'N/A') . "</td>";
                                ?>
                                    <td>
                                        <?php
                                        echo "<form action='modificar.php' method='post' style='display:inline;'>";
                                        echo "<input type='hidden' name='dni' value='{$fila['dni']}'>";
                                        echo "<input type='submit' class='btn btn-warning' value='Modificar'>";
                                        echo "</form>";

                                        // Formulario para Eliminar
                                        echo "<form action='../controladores/Eliminaruser.php' method='post' style='display:inline;'>";
                                        echo "<input type='hidden' name='dni' value='{$fila['dni']}'>";
                                        echo "<input type='submit' class='btn btn-danger' value='Eliminar'>";
                                        echo "</form>";
                                        ?>
                                    </td>
                                <?php
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    <?php
    } else {
        echo "<div class='alert alert-warning'>No se encontraron datos.</div>";
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conn);
    ?>
</div>
