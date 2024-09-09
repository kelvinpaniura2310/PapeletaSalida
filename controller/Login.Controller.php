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

            // Obtener el texto cifrado de la base de datos
            $encrypted_password = base64_decode($row['contraseña']);

            // Separar el IV del texto cifrado
            $encryption_key = '76194862'; // Cambia esto por una clave segura y mantenla protegida
            $cipher = "AES-256-CBC";
            $iv_length = openssl_cipher_iv_length($cipher);
            $iv = substr($encrypted_password, 0, $iv_length);
            $ciphertext = substr($encrypted_password, $iv_length);

            // Descifrar la contraseña almacenada
            $decrypted_password = openssl_decrypt($ciphertext, $cipher, $encryption_key, 0, $iv);


            // Verificar la contraseña (considerando que uses password_hash)
            if ($pass == $decrypted_password) {
                // Establecer sesión
                $_SESSION['login'] = $row['dni'];
                $_SESSION['estado'] = $row['estado'];
                $_SESSION['nombre'] = $row['nombre'];
                $_SESSION['apellidos'] = $row['apellidos'];
                $_SESSION['dni'] = $row['dni'];
                $_SESSION['fecha_nacimiento'] = $row['fecha_nacimiento'];
                $_SESSION['direccion'] = $row['direccion'];
                $_SESSION['telefono'] = $row['telefono'];
                $_SESSION['correo'] = $row['correo'];
                $_SESSION['fecha_registro'] = $row['fecha_registro'];
                $_SESSION['tipo_usuario'] = $row['tipo_usuario'];



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
