<?php
require 'conexion.php';

if (isset($_POST['correo'])) {
    $correo = $_POST['correo'];

    $sql = "SELECT id FROM usuarios WHERE correo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "usado";
    } else {
        echo "disponible";
    }

    $stmt->close();
    $conn->close();
}
?>
