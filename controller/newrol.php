<?php
include('../config/conexion.php');

// Verificar si los datos fueron enviados por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir y sanitizar los datos
    $idRol = $conexion->real_escape_string($_POST['id_rol']);
    $nombreRol = $conexion->real_escape_string($_POST['nombre_rol']);

    // Validar longitud del ID del rol
    if (strlen($idRol) !== 3) {
        echo "<div class='alert alert-danger'>El ID del rol debe tener exactamente 3 caracteres.</div>";
        exit;
    }

    // Verificar si el nombre del rol no está vacío
    if (empty($nombreRol)) {
        echo "<div class='alert alert-danger'>El nombre del rol no puede estar vacío.</div>";
        exit;
    }

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO roles (idarea, nombre) VALUES ('$idRol', '$nombreRol')";
    if ($conexion->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Rol creado exitosamente.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error al crear el rol: " . $conexion->error . "</div>";
    }
}

// Cerrar la conexión
$conexion->close();
?>
