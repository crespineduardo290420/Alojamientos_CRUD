<?php
//session_start();
include('includes/header.php'); 
include('db/database.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM alojamientos";
$result = $conn->query($sql);

$misAlojamientos = "SELECT * FROM usuario_alojamientos ua
                    JOIN alojamientos a ON ua.alojamiento_id = a.id
                    WHERE ua.usuario_id = $user_id";
$mis_result = $conn->query($misAlojamientos);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/stylees.css">
    <title>Dashboard</title>
</head>
<body>
<h2>Alojamientos Disponibles</h2>
<?php while ($row = $result->fetch_assoc()) { ?>
    <div>
        <h3><?= $row['nombre'] ?></h3>
        <p><?= $row['descripcion'] ?></p>
        <a href="./admin/agregar_alojamiento.php?= $row['id'] ?>">Seleccionar</a>
    </div>
<?php } ?>

<h2>Mis Alojamientos</h2>
<?php while ($row = $mis_result->fetch_assoc()) { ?>
    <div>
        <h3><?= $row['nombre'] ?></h3>
        <a href="./admin/eliminar_alojamiento.php?= $row['id'] ?>">Eliminar</a>
    </div>
<?php } ?>
</body>
</html>

<?php include('includes/footer.php'); ?>


