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

// Recibir datos del formulario
$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT); // Encripta la contraseña

// Insertar en la base de datos
//$sql = "INSERT INTO usuarios (usuario, correo, contraseña) VALUES ($usuario, $correo, $contraseña)";
$sql = "INSERT INTO usuarios (usuario, correo, contraseña) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $usuario, $correo, $contraseña);
if ($stmt->execute()) {
    echo "Usuario registrado exitosamente.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
