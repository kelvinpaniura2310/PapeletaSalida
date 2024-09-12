<?php
include('../config/conexion.php');

// Verificar si los datos fueron enviados por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir y sanitizar los datos
    $idarea = $conn->real_escape_string($_POST['id_area']);
    $nombrearea = $conn->real_escape_string($_POST['nombre_area']);

    // Validar longitud del ID del area
    if (strlen($idarea) !== 3) {
        echo "<div class='alert alert-danger alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h5><i class='icon fas fa-ban'></i> Alert!</h5>El ID del area debe tener exactamente 3 caracteres.</div>";
        exit;
    }

    // Verificar si el nombre del area no está vacío
    if (empty($nombrearea)) {
        echo "<div class='alert alert-danger'>El nombre del area no puede estar vacío.</div>";
        exit;
    }

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO area(idarea, nombre) VALUES ('$idarea', '$nombrearea')";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h5><i class='icon fas fa-check'></i> Alert!</h5>Nuevo Área creado exitosamente.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error al crear el area: " . $conn->error . "</div>";
    }
}

// Cerrar la conexión
$conn->close();
?>
