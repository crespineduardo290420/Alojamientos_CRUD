<?php
session_start();
include '../db/database.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Verificar conexión
if ($conn->connect_error) {
  die("Error en la conexión: " . $conn->connect_error);
}

// Indicador de éxito
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nombreLugar = $_POST['nombreLugar'];
  $ubicacionLugar = $_POST['ubicacionLugar'];
  $horariosDisponibles = $_POST['horariosDisponibles'];
  $huespedes = $_POST['huespedes'];
  $precioPorDia = $_POST['precioPorDia'];
  $imagen = $_FILES['imagen'];

  // Validar que todos los datos estén llenos
  if (!empty($nombreLugar) && !empty($ubicacionLugar) && !empty($horariosDisponibles) && !empty($huespedes) && !empty($precioPorDia) && !empty($imagen['name'])) {
    // Subir imagen
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($imagen["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($imagen["tmp_name"]);
    if ($check !== false && $imagen["size"] <= 2000000 && in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
      if (move_uploaded_file($imagen["tmp_name"], $target_file)) {
        // Insertar datos
        $sql = "INSERT INTO alojamiento (nombre, direccion, horarios, huespedes, precio, imagen) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssiis", $nombreLugar, $ubicacionLugar, $horariosDisponibles, $huespedes, $precioPorDia, $target_file);

        if ($stmt->execute()) {
          $success = true; // Registro exitoso
        } else {
          echo "Error en la consulta: " . $stmt->error . "<br>";
        }
      } else {
        echo "Error al subir la imagen.<br>";
      }
    } else {
      echo "El archivo no cumple con los requisitos.<br>";
    }
  } else {
    echo "Por favor, complete todos los campos.<br>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Hotel Kodigo
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.1.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-dark position-absolute w-100"></div>

  <aside
    class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" target="_blank">
        <!-- agregar logo -->
        <!-- <img src="" width="26px" height="26px" class="navbar-brand-img h-100" alt="main_logo"> -->
        <span class="ms-1 font-weight-bold">Hotel Kodigo</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../pages/dashboard.php">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../pages/clientes.php">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Clientes</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../pages/alojamiento.php">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Alojamiento</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/facturacion.php">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Facturación</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Cuenta</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/perfil.php">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-badge text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Perfil</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../pages/logout.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-button-power text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Cerrar Sesión</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>

  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
      data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Dashboard</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Alojamiento</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Alojamiento</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="container-fluid py-4">
        <!-- Alerta de confirmación -->
        <?php if ($success): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            ¡El alojamiento fue registrado exitosamente!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>

        <!-- Contenedor de la tarjeta -->
        <div class="row">
          <div class="col-md-12 mt-4"> <!-- Contenedor principal -->
            <div class="card">
              <div class="card-header pb-0 px-3">
                <h6 class="mb-0">Agregar Alojamiento</h6>
              </div>
              <div class="card-body pt-4 p-3">
                <form action="../pages/alojamiento.php" method="POST" enctype="multipart/form-data"><!-- Formulario -->
                  <div class="mb-3">
                    <label for="nombreLugar" class="form-label">Nombre del Lugar</label>
                    <input type="text" class="form-control" id="nombreLugar" name="nombreLugar"
                      placeholder="Ingrese el nombre del lugar" required>
                  </div>
                  <div class="mb-3">
                    <label for="ubicacionLugar" class="form-label">Ubicación del Lugar</label>
                    <input type="text" class="form-control" id="ubicacionLugar" name="ubicacionLugar"
                      placeholder="Ingrese la ubicación" required>
                  </div>
                  <div class="mb-3">
                    <label for="horariosDisponibles" class="form-label">Horarios Disponibles</label>
                    <input type="text" class="form-control" id="horariosDisponibles" name="horariosDisponibles"
                      placeholder="Ejemplo: 9 AM - 5 PM" required>
                  </div>
                  <div class="mb-3">
                    <label for="huespedes" class="form-label">Huéspedes</label>
                    <input type="number" class="form-control" id="huespedes" name="huespedes"
                      placeholder="Número máximo de huéspedes" required>
                  </div>
                  <div class="mb-3">
                    <label for="precioPorDia" class="form-label">Precio por día</label>
                    <input type="number" step="0.01" class="form-control" id="precioPorDia" name="precioPorDia"
                      placeholder="Ingrese el precio por día" required>
                  </div>
                  <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
                  </div>
                  <button type="submit" class="btn btn-success">Guardar Alojamiento</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <!-- conectar con pagina de inicio -->
                <a href="" class="font-weight-bold" target="_blank">Kodigo's students</a>
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <!-- agregar conexiones -->
                  <a href="" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link text-muted" target="_blank">GitHub</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    // Cerrar automáticamente las alertas después de 5 segundos
    setTimeout(() => {
      const alert = document.querySelector('.alert');
      if (alert) {
        alert.classList.add('fade'); // Agrega la clase 'fade' para animación
        setTimeout(() => alert.remove(), 500); // Opcionalmente, elimina del DOM
      }
    }, 5000); // Cambia el tiempo (en milisegundos) según prefieras
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.1.0"></script>
</body>

</html>