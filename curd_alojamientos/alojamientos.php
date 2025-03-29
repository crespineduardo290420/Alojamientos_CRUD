<?php 
include('includes/header.php'); 
include('db/database.php');

if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'admin') {
    header("Location: index.php");
    exit();
}

$sql = "SELECT * FROM alojamientos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/stylees.css">
    <title>Document</title>
</head>
<body>
<h2>Gestión de Alojamientos</h2>

<form method="POST" action="admin/agregar_alojamiento.php">
    <input type="text" name="nombre" placeholder="Nombre del alojamiento" required>
    <textarea name="descripcion" placeholder="Descripción"></textarea>
    <button type="submit">Agregar Alojamiento</button>
</form>

<h3>Alojamientos existentes</h3>
<ul>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <li><?= $row['nombre'] ?> - <?= $row['descripcion'] ?></li>
    <?php } ?>
</ul>
</body>
</html>



<?php include('includes/footer.php'); ?>
