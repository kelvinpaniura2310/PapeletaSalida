<?php
include('../config/conexion.php');

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] === "POST") {
    $dni = $_POST['dni'];
    $nuevo_estado = $_POST['estado'] === 'Activo' ? 1 : 0;

    $sql = "UPDATE Persona SET estado='$nuevo_estado' WHERE dni='$dni'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Estado actualizado";
    } else {
        echo "Error al actualizar el estado: " . $conn->error;
    }
    
    $conn->close();
}
?>
