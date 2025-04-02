<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/stylees.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Hotel Kodigo</title>
</head>
<body>
    
<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-white sticky-top">
  <div class="container">
    <h1><a class="navbar-brand" href="#hero">Hotel Kodigo</a></h1>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        
        <?php if (isset($_SESSION['user_id'])): ?>
          <!-- Si el usuario está logueado, solo mostramos "Mis Alojamientos" -->
          <li class="nav-item">
            <a class="nav-link" href="mis_alojamientos.php">Mis Alojamientos</a>
          </li>
        <?php else: ?>
          <!-- Si NO está logueado, mostramos el menú normal -->
          <li class="nav-item">
            <a class="nav-link" href="#hero">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">Nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#alojamientos">Alojamientos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact">Contactos</a>
          </li>
        <?php endif; ?>

      </ul>
      
      <!-- Botón de sesión -->
      <?php if (isset($_SESSION['user_id'])): ?>
        <a href="logout.php" class="btn btn-danger ms-lg-3">Cerrar Sesión</a>
      <?php else: ?>
        <a href="login.php" class="btn btn-brand ms-lg-3">Iniciar Sesión</a>
      <?php endif; ?>

    </div>
  </div>
</nav>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
