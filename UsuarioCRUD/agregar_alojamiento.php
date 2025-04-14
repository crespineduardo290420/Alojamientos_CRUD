<?php
session_start();
include '../db/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

if (isset($_GET['id'])) {
    $alojamiento_id = intval($_GET['id']);
    $user_id = intval($_SESSION['user_id']);

    // Verifica si ya está reservado
    $check = "SELECT id FROM usuario_alojamientos WHERE usuario_id = ? AND alojamiento_id = ?";
    $stmt = $conn->prepare($check);
    $stmt->bind_param("ii", $user_id, $alojamiento_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        // Inserta el alojamiento en la lista del usuario
        $sql = "INSERT INTO usuario_alojamientos (usuario_id, alojamiento_id) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $user_id, $alojamiento_id);
        if ($stmt->execute()) {
            header("Location: dashboard.php");
            exit();
        } else {
            echo '<div class="popup-message">
                    <div class="popup-content">
                        <p>Error al reservar alojamiento.</p>
                        <button onclick="window.location.href=\'dashboard.php\'">Aceptar</button>
                    </div>
                  </div>';
        }
    } else {
        echo '<div class="popup-message">
                <div class="popup-content">
                    <p>Este alojamiento ya está reservado.</p>
                    <button onclick="window.location.href=\'dashboard.php\'">Aceptar</button>
                </div>
              </div>';
    }
}
?>
<style>
.popup-message {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

.popup-content {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    text-align: center;
    max-width: 300px;
    width: 90%;
}

.popup-content p {
    margin: 0 0 15px 0;
    color: #333;
}

.popup-content button {
    background-color: #0d6efd;
    color: white;
    border: none;
    padding: 8px 20px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
}

.popup-content button:hover {
    background-color: #0b5ed7;
}
</style>
