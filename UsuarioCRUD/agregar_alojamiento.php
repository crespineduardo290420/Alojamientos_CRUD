<?php
session_start();
include '../db/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

if (isset($_GET['id'])) {
    $alojamiento_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    // Verifica si ya está agregado
    $check = "SELECT * FROM usuario_alojamientos WHERE usuario_id = ? AND alojamiento_id = ?";
    $stmt = $conn->prepare($check);
    $stmt->bind_param("ii", $user_id, $alojamiento_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        // Inserta el alojamiento en la cuenta del usuario
        $sql = "INSERT INTO usuario_alojamientos (usuario_id, alojamiento_id) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $user_id, $alojamiento_id);
        if ($stmt->execute()) {
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Error al agregar alojamiento.";
        }
    } else {
        echo "Ya tienes este alojamiento en tu cuenta.";
    }
}
?>
