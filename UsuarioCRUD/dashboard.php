<?php
session_start();
include('../includes/header.php');
include('../db/database.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Consulta para obtener todos los alojamientos disponibles
$sql = "SELECT * FROM alojamientos";
$result = $conn->query($sql);

// Consulta para obtener los alojamientos que ha seleccionado el usuario
$misAlojamientos = "SELECT a.* FROM usuario_alojamientos ua
                    JOIN alojamientos a ON ua.alojamiento_id = a.id
                    WHERE ua.usuario_id = ?";
$stmt = $conn->prepare($misAlojamientos);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$mis_result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles.css">
    <title>Dashboard Usuario</title>
</head>
<body>

<h2>Alojamientos Disponibles</h2>
<?php while ($row = $result->fetch_assoc()) { ?>
    <div>
        <h3><?= htmlspecialchars($row['nombre']) ?></h3>
        <p><?= htmlspecialchars($row['descripcion']) ?></p>
        <a href="agregar_alojamiento.php?id=<?= $row['id'] ?>">Seleccionar</a>
    </div>
<?php } ?>

<h2>Mis Alojamientos</h2>
<?php while ($row = $mis_result->fetch_assoc()) { ?>
    <div>
        <h3><?= htmlspecialchars($row['nombre']) ?></h3>
        <a href="eliminar_alojamiento.php?id=<?= $row['id'] ?>">Eliminar</a>
    </div>
<?php } ?>

</body>
</html>

<?php include('../includes/footer.php'); ?>


