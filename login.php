<?php
session_start();

// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "alimentos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el número de control desde el formulario
$control_num = $_POST['control_num'];

// Consulta para verificar si el usuario existe en la base de datos
$sql = "SELECT * FROM usuarios WHERE username='$control_num'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Si el usuario es válido, redirige a principal.html
    header("Location:  inicio.html");
    exit();
} else {
    // Si el usuario no es válido, redirige de nuevo al login con un mensaje de error
    header("Location: index.html?error=1");
    exit();
}

