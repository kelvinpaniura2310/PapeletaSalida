<?php
$servername = "localhost";  // Nombre del servidor o IP
$username = "root";    // Usuario de la base de datos
$password = "*paniura1997"; // Contraseña del usuario
$dbname = "papeletas"; // Nombre de la base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>

