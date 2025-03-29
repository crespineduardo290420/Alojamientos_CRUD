<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alojamientos</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <nav>
        <a href="index.php">Inicio</a>
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="dashboard.php">Mi Cuenta</a>
            <a href="logout.php">Cerrar Sesión</a>
        <?php else: ?>
            <a href="login.php">Iniciar Sesión</a>
            <a href="register.php">Registrarse</a>
        <?php endif; ?>
    </nav>
