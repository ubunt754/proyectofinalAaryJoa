<?php
// Datos de conexión
$host = "localhost";
$usuario_db = "root";
$contrasena_db = "soyyo"; // tu contraseña si la tienes
$base_de_datos = "base_de_clientes";

// Conexión a MariaDB
$conn = new mysqli($host, $usuario_db, $contrasena_db, $base_de_datos);

// Verifica conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}