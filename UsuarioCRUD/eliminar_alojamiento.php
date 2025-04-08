<?php
session_start();
include '../db/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

if (isset($_GET['id'])) {
    $alojamiento_id = intval($_GET['id']);
    $user_id = intval($_SESSION['user_id']);

    $sql = "DELETE FROM usuario_alojamientos WHERE usuario_id = ? AND alojamiento_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $alojamiento_id);

    if ($stmt->execute()) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error al eliminar alojamiento.";
    }
}
?>
