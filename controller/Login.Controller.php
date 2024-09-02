<?php
include('../config/conexion.php');
session_start();

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validar que los campos no estén vacíos
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $user = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = $_POST['password'];

        $sql = "SELECT * FROM persona WHERE correo='$user'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Obtener los datos del usuario
            $row = $result->fetch_assoc();
            
            // Verificar la contraseña (considerando que uses password_hash)
            if ($pass == $row['contraseña']) {
                // Establecer sesión
                $_SESSION['login'] = $row['dni'];
                $_SESSION['estado'] = $row['estado'];
                
                
                // Redirigir a la página principal del usuario
                header("Location: ../index.php");  // Asegúrate de que esta ruta es correcta
                exit();
            } else {
                echo "Contraseña incorrecta";
            }
        } else {
            echo "Usuario no encontrado";
        }
    } else {
        echo "Por favor ingrese ambos, correo y contraseña.";
    }
}

$conn->close();
?>
