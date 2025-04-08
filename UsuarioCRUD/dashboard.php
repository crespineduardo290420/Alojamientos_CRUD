<?php
include('../includes/header.php');
include('../db/database.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Consulta para obtener todos los alojamientos disponibles
$sql = "SELECT id, nombre, descripcion, imagen FROM alojamientos";
$result = $conn->query($sql);

// Consulta para obtener los alojamientos reservados por el usuario
$misAlojamientos = "SELECT a.id, a.nombre, a.descripcion, a.imagen 
                    FROM usuario_alojamientos ua
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
    <link rel="stylesheet" href="../assets/css/dashboardusuario.css">
    <title>Dashboard Usuario</title>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Alojamientos Disponibles</h2>
    <div class="row">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="col-md-4">
                <div class="card alojamiento-card mb-4">
                    <img src="../assets/img/<?= htmlspecialchars($row['imagen']) ?>" class="card-img-top" alt="<?= htmlspecialchars($row['nombre']) ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($row['nombre']) ?></h5>
                        <p class="card-text"><?= htmlspecialchars($row['descripcion']) ?></p>
                        <a href="agregar_alojamiento.php?id=<?= $row['id'] ?>" class="btn btn-primary">Reservar</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <h2 class="text-center mt-5">Mis Alojamientos</h2>
    <div class="row">
        <?php while ($row = $mis_result->fetch_assoc()) { ?>
            <div class="col-md-4">
                <div class="card alojamiento-card mb-4">
                    <img src="../assets/img/<?= htmlspecialchars($row['imagen']) ?>" class="card-img-top" alt="<?= htmlspecialchars($row['nombre']) ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($row['nombre']) ?></h5>
                        <p class="card-text"><?= htmlspecialchars($row['descripcion']) ?></p>
                        <a href="eliminar_alojamiento.php?id=<?= $row['id'] ?>" class="btn btn-danger">Eliminar</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

</body>
</html>

<?php include('../includes/footer.php'); ?>


