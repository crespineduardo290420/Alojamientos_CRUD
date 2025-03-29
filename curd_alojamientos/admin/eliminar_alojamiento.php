<?php
session_start();
include('db/database.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$alojamiento_id = $_GET['id'];

$sql = "DELETE FROM usuario_alojamientos WHERE usuario_id = $user_id AND alojamiento_id = $alojamiento_id";
$conn->query($sql);

header("Location: dashboard.php");
?>
