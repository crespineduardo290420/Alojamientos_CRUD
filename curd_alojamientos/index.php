<?php 
include('includes/header.php'); 
include('db/database.php');

$sql = "SELECT * FROM alojamientos";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/stylees.css">
    <title>Alojamientos Kodigo</title>
</head>
<body>
<h1>Bienvenido a la Plataforma de Alojamientos</h1>

<div class="alojamientos">
    <?php while ($row = $result->fetch_assoc()) { ?>
        <div class="alojamiento">
            <h3><?= $row['nombre'] ?></h3>
            <p><?= $row['descripcion'] ?></p>
            <a href="login.php">Ver Más</a>
        </div>
    <?php } ?>
</div>
</body>
</html>



<?php include('includes/footer.php'); ?>
