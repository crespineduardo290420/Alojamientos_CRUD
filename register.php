<?php
include('db/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: login.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/stylees.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-DQvkBjpPgn7RC31MCQoOeC9TI2kdqa4+BSgNMNj8v77fdC77Kj5zpWFTJaaAoMbC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Registro de Usuario</title>
</head>
<body class="d-flex justify-content-center align-items-center vh-100" id="bg-register">
    <div class="bg-white p-5 rounded-5 text-secondary" id="register-form">
        <div class="d-flex justify-content-center">
            <img class="login-icon" src="https://static.vecteezy.com/system/resources/previews/019/879/186/large_2x/user-icon-on-transparent-background-free-png.png" alt="">
        </div>
        <div class="text-center fs-1 fw-bold">Registrarme</div>
        <div>
            <form method="POST">
                <!-- Campo de Nombre -->
                <div class="input-group mb-3">
                    <span class="input-group-text bg-info text-white">
                        <i class="fa-regular fa-user"></i>
                    </span>
                    <input class="form-control" type="text" name="nombre" placeholder="Nombre" required>
                </div>

                <!-- Campo de Email -->
                <div class="input-group mb-3">
                    <span class="input-group-text bg-info text-white">
                        <i class="fa-solid fa-envelope"></i>
                    </span>
                    <input class="form-control" type="email" name="email" placeholder="Email" required>
                </div>

                <!-- Campo de Contraseña -->
                <div class="input-group mb-3">
                    <span class="input-group-text bg-info text-white">
                        <i class="fa-solid fa-unlock"></i>
                    </span>
                    <input class="form-control" type="password" name="password" placeholder="Contraseña" required>
                </div>

                <!-- Botón de registro -->
                <button type="submit" class="btn btn-info w-100 text-white">Registrarse</button>

                <!-- Iniciar sesión con Google -->
                <div class="text-center mt-3">
                    <p>Registrarme con</p>
                    <i class="fa-brands fa-google fa-2x"></i>
                </div>

                <!-- Ya tienes cuenta -->
                <div class="text-center mt-3">
                    <p>¿Ya tienes cuenta? <a href="login.php">Iniciar Sesión</a></p>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-YUe2LzesAfftltw+PEaao2tjU/QATaW/rOitAq67e0CT0Zi2VVRL0oC4+gAaeBKu" crossorigin="anonymous"></script>
</body>
</html>