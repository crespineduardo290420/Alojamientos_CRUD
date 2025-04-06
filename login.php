<?php
include('db/database.php');
session_start();

$error = ""; // Variable para almacenar el mensaje de error

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consulta segura con prepared statements
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verificar la contraseña hasheada
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['tipo']; // Guardar el tipo de usuario (cliente/admin)
            header("Location: index.php");
            exit();
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        $error = "El correo no está registrado.";
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
    <title>Inicio de Sesion</title>
</head>

<body class="d-flex justify-content-center align-items-center vh-100" id="bg-login">
    <div class="bg-white p-5 rounded-5 text-secondary" id="login-form">
        <div class="d-flex justify-content-center">
            <img class="login-icon" src="https://static.vecteezy.com/system/resources/previews/019/879/186/large_2x/user-icon-on-transparent-background-free-png.png" alt="">
        </div>
        <div class="text-center fs-1 fw-bold">Iniciar Sesion</div>

        <!-- Mostrar alerta si hay un error -->
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger text-center" role="alert">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <div>
            <form method="POST">
                <!-- Campo de Email -->
                <div class="input-group mb-3">
                    <span class="input-group-text bg-info text-white">
                        <i class="fa-regular fa-user"></i>
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

                <!-- Recordar cuenta -->
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Recordar Mi Cuenta</label>
                </div>

                <!-- Olvidé mi contraseña -->
                <div class="mb-3">
                    <a href="#">Olvidé Mi Contraseña</a>
                </div>

                <!-- Botón de inicio de sesión -->
                <button type="submit" class="btn btn-info w-100 text-white">Iniciar Sesión</button>

                <!-- Crear cuenta -->
                <div class="text-center mt-3">
                    <p>No tienes cuenta? <a href="register.php">Crear Cuenta</a></p>
                </div>

                <!-- Iniciar sesión con Google -->
                <div class="text-center mt-3">
                    <p>Iniciar sesión con</p>
                    <i class="fa-brands fa-google fa-2x"></i>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-YUe2LzesAfftltw+PEaao2tjU/QATaW/rOitAq67e0CT0Zi2VVRL0oC4+gAaeBKu" crossorigin="anonymous"></script>
</body>

</html>