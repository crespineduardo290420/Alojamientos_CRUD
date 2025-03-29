<?php
session_start();
include('includes/header.php');
include('../db/database.php');

if ($_SESSION['user_type'] != 'admin') {
    header("Location: ../dashboard.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    $sql = "INSERT INTO alojamientos (nombre, descripcion) VALUES ('$nombre', '$descripcion')";
    $conn->query($sql);
}

?>

<form method="POST">
    <input type="text" name="nombre" placeholder="Nombre del alojamiento" required>
    <textarea name="descripcion" placeholder="Descripción"></textarea>
    <button type="submit">Agregar</button>
</form>

<?php include('includes/footer.php'); ?>

