<?php
include('../config/conexion.php');

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dni = $_POST['id'];
    $name = $_POST['name'];
    $firtname = $_POST['firtname'];
    $fecha_nacimiento_input = $_POST['fechanacimiento'];
    $fechanacimiento = date('Y-m-d', strtotime($fecha_nacimiento_input));
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $tipo_usuario = $_POST['tipo_usuario'];

    // Clave secreta para el cifrado
    $encryption_key = '76194862'; // Cambia esto por una clave segura y mantenla protegida
    $cipher = "AES-256-CBC"; // Algoritmo de cifrado
    $options = 0;
    $iv_length = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($iv_length); // Generar un IV aleatorio
    // Cifrar la contraseña
    $ciphertext = openssl_encrypt($pass, $cipher, $encryption_key, $options, $iv);

    // Almacenar el IV junto con el texto cifrado
    $encrypted_data = base64_encode($iv . $ciphertext);

    $sql = "INSERT INTO persona (dni,nombre,apellidos,fecha_nacimiento,direccion,telefono,correo,contraseña, fecha_registro,tipo_usuario)
    VALUES ('$dni','$name','$firtname','$fechanacimiento','$direccion','$telefono','$email', '$encrypted_data', NOW(),'" . implode(",", $tipo_usuario) . "')";


    if ($conn->query($sql) === TRUE) {
        $persona_id = $dni;
        // Manejar los tipos de usuarios seleccionados
        if (in_array('Docente', $tipo_usuario)) {
            $sql_docente = "INSERT INTO docente (dni) VALUES ('$persona_id')";
            $conn->query($sql_docente);
            
            //Agregar a la tabla Progrma de Estudios.
            $programas = $_POST['programa_estudio'];
            foreach ($programas as $programa_id) {
                $sql_docente_programa = "INSERT INTO docente_programa (dni_docente, programa_estudio_id) VALUES ('$persona_id', '$programa_id')";
                $conn->query($sql_docente_programa);
            }
        }

        if (in_array('Personal-Administrativo', $tipo_usuario)) {
            $area_id = $_POST['area_administrativa'];
            $sql_administrativo = "INSERT INTO personal_administrativo (dni, area_id) VALUES ('$persona_id', '$area_id')";
            $conn->query($sql_administrativo);
        }

        if (in_array('Estudiante', $tipo_usuario)) {
            $programa_id = $_POST['programa_estudio'][0]; // Solo un programa permitido para estudiantes
            $semestre = $_POST['semestre'];
            $sql_estudiante = "INSERT INTO estudiante (dni,semestre_academico,programa_estudio_id) VALUES ('$persona_id', '$semestre', '$programa_id')";
            $conn->query($sql_estudiante);
        }

        echo "Registro completado con éxito.";
        header("Location: ../index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
